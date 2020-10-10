$(document).on('click', ".trackbutton", function () {

    let tracking_number = $("#trackingcode").val(); 

    if(tracking_number == ''){
        swal('Tracking Code is required','','error'); return;
    }

    $('#trackingModal').modal('show');

    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + 'FreeTrack/',
        data: {
            tracking_number: tracking_number
        },
        dataType: 'json',
        success: function(response){ 
            if(response != 'error'){
                $(".latest_update").text('Latest Update');
            }
            $("#free-tracking-modal-close").removeClass('d-none');
            $(".parcelUpdates").html('');
            $("#freeTrackonProcess").css('display','none');
            $("#FreeTracked").css('display','block');
    
            console.log(response);
            $(".parcelUpdates").append(
                '<ul class="list-group">'+
                    '<li class="list-group-item text-primary">Update: <span class="pull-right">'+ response[0].message +'</span></li>'+
                    '<li class="list-group-item text-primary">Location: <span class="pull-right">'+ response[0].location +'</span></li>'+
                    '<li class="list-group-item text-primary">Checkpoint Time: <span class="pull-right">'+ response[0].checkpoint_time +'</span></li>'+
                '</ul>'
            );
                
    
        },
        error: function(){
            $(".parcelUpdates").html('');
            $(".parcelUpdates").append(
                '<div class="title">'+
                    '<h3 class="text-warning">We have not received any updates from the courier for over 30 days. Please contact the shipper immediately if you still have not yet received the parcel.</h3><br>'+
                '</div>'
            );
            $("#free-tracking-modal-close").removeClass('d-none');
            $("#freeTrackonProcess").css('display','none');
            $("#FreeTracked").css('display','block');
        }
    });
    

})


$(".goToPlans").click(function(){
    $("#trackingModal").modal('hide');
})

function formatCurrency(total) {
    var neg = false;
    if(total < 0) {
        neg = true;
        total = Math.abs(total);
    }
    return (neg ? "-" : '') + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
    // return (neg ? "-₱" : '₱') + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
  }

$(document).on('click', ".claimSubscribe", function () {
    $('#claimModal').modal('show');
})

$(document).on('click', ".subscribe", function () {
    let subscribe = $(this).attr('data-id');
    let planDetails = '';
    $('#availplansModal').modal('show');
    $(".planDetails").html('');

    //RESET
    $(".courierinfo").css('display','none');
    $('.modal-title').text('Order Details');
    $(".proceedPayment").css('display','block');
    $(".paypalButton").css('display','none');
    $(".proceed").attr('disabled',false);
    $(".proceed").text('Confirm & Payment');
    $("#tracking_number").attr('readonly', false);

    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + 'plans/getPlans/' + subscribe,
        data: {},
        async: false,
        dataType: 'text',
        success: function(response){ 
            $.each(JSON.parse(response), function(key, value) {
                planDetails = (
                    '<div>'+
                        '<h3>Plans Details</h3>'+
                        '<hr class="hr-divider hr-left">'+
                        '<h4>'+ value['name'] +' <span class="text-white p">(£ '+ formatCurrency(value['actual_price']) +')</span></h4>'
                );
               
                $.each(JSON.parse(value['description']), function(key, value) {
                    planDetails += ('<label class="p-more-white">* '+ value['description'] +'</label><br>');
                });

                $(".planDetails").html(planDetails);
                $("#subtotal").text(formatCurrency(value['actual_price']));
                $("#total").text(formatCurrency(value['actual_price']));
                $(".paypalButton").attr('data-amount',formatCurrency(value['actual_price']));
                $("#id_plans").val(value['id']);
            });


        },
        error: function(){
            swal('Could not edit data');
        }
    });
})

$(document).on('click', ".cannotsubscribe", function () {
    $('#loginfirst').modal('show');
})

$(document).on('click', ".proceed", function () {
    let tracking_number = $("#tracking_number").val();
    let courier_code = $("#courier_code").val();
    let payment_method = $(this).val();

    if(payment_method == ''){
        swal('Choose your preferred payment method','','info'); return;
    }
    

    if(tracking_number == ''){
        swal('Tracking number is required','','error'); return;
    }
    
    if(courier_code == ''){
        swal('Courier is required','','error'); return;
    }

    var tran_status = 0;

    swal({
        title: "Do you want to proceed, into payment section?",
        text: "",
        icon: "warning",
        buttons: [
            'No, Not yet!',
            'Yes, I am sure!'
        ],
        successMode: true,
        }).then(function(isConfirm) {
        if (isConfirm) {
            
            $(".proceed").attr('disabled','true');
            $(".proceed").text('Loading...');

            //SAVE SHIPMENTS IN AFTERSHIP ACCOUNT

            $.ajax({
                type: 'ajax',
                method: 'POST',
                dataType: 'JSON',
                contentType: "application/json",
                url: 'https://api.aftership.com/v4/couriers/detect',
                headers: {
                    'aftership-api-key'   :'deb5b1b7-b285-4a95-949e-7e98b6a14922',
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: {
                    "tracking": {
                        "tracking_number": tracking_number
                    }
                },
                success: function(response){ 
                    $(".courier_details").html('');
                    
                    if(response.data.couriers.length == 0){
                        ifCourierFailed();
                        swal('Cannot find any courier, Kindly check your tracking number','','error'); return;
                    }
                   
                    tran_status = 1;
                    var data = response.data.couriers;
                    $("#couriername").val(data[0].slug);
                    $("#select2-couriername-container").text(data[0].name);
                    $(".courierinfo").css('display','block');
                    
                    // SWAL
                    var form = document.createElement("div");
                    form.innerHTML =	"<div class='jumbotron'>"+
                                            "<h1 class='text-primary'><b><i class='fa fa-check' style='font-size:70px';></i></h1>"+
                                            "<h3><b>Courier detected successfully!</b></h3>"+
                                            "<br>"+
                                            "<ul class='list-group list-group-bordered'>"+
                                                "<li class='list-group-item' align='left'>Tracking #: <span class='pull-right'>" +  tracking_number + "</span></li>"+
                                                "<li class='list-group-item' align='left'>Courier: <span class='pull-right'>" + data[0].name + "</span></li>"+
                                                "<li class='list-group-item' align='left'>Payment Method: <span class='pull-right'>" + payment_method + "</span></li>"+
                                            "</ul>"+
                                            "<label align='left'>Note! We detect the couriers base on the tracking number format matching. </label>"+
                                            "<label align='left'>You may also select and confirm the right courier here.</label>"+
                                        "</div>";
                    
            
                    swal({
                        title: '',
                        text:   '',
                        content: form,
                        buttons:{      			
                            confirm: {
                                text : 'Okay',
                                className : 'btn btn-success'
                            }
                        },
                        successMode: true,
                        }).then(function(isConfirm) {
                        if (isConfirm) {
                        } else {
            
                        }
                    })
                    // SWAL

                    if(tran_status == 1){
                        $("#tracking_number").attr('readonly', 'readonly');
                        $("#courier_code").attr('readonly', 'readonly');
                        $('.modal-title').text('Payment');
                        $(".proceedPayment").css('display','none');
                        
                        $(".payment-method-container").css('display','none');

                        if(payment_method == 'Paypal'){
                            $(".paypalButton").css('display','block');
                        }else{
                            $(".stripeButton").css('display','block');
                        }
                        
                    }
                },
                error: function(xhr, ajaxOptions, thrownError){
                    ifCourierFailed();
                }
            });

            //SAVE SHIPMENTS IN AFTERSHIP ACCOUNT
            if(courier_code != undefined){
                tran_status = 1;
            }

            
        } else {

        }
    })
})

function ifCourierFailed(){
    $(".proceed").removeAttr('disabled');
    $(".proceed").text('Proceed to Payment');
    $(".courier_details").html(
        '<label class="text-danger">*Error: Could not detect the Courier</label><br>'+
        '<label>Possible Fixes</label><br>'+
        '<label>a. Double check your tracking number</label><br>'+
        '<label>b. Find your Courier Manually <a href="#" id="addCourierManually">Click here</a></label><br>'
    );
}

$(document).on('change', "#courier_code", function () {
    let courier_code = $("#courier_code").val();
    $("#couriername").val(courier_code);
})

$(document).on('click', "#addCourierManually", function () {

    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + 'couriers/get/',
        data: {},
        async: false,
        dataType: 'text',
        success: function(response){ 

            let content =(
                '<label for="">Courier</label>'+
                '<select name="courier_code" id="courier_code" class="input form-white-bg">'+
                '<option value="">Select</option>');

                $.each(JSON.parse(response), function(key, value) {
                    content += '<option value="'+ value.slug +'">'+ value.name +'</option>';
                });


                content += '</select>';
                

                // $(".courier_details_holder").html(content);


        },
        error: function(){
            swal('Could not edit data');
        }
    });

})

// $(document).on('click', ".checkout", function () {
function checkout(){
    let tracking_number = $("#tracking_number").val();
    let id_plans = $("#id_plans").val();
    let courier_code = $("#couriername").val();

    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + 'transactions/add/' + tracking_number + '/' + id_plans + '/' + courier_code,
        data: {},
        dataType: 'text',
        beforeSend: function() {
            $('.modal-title').text('Payment Complete!');
            $(".modalClose").addClass("d-none");
            $(".modal-footer").addClass("d-none");
            $(".loadingTime").html(
                '<div class="col-md-12" align="center">'+
                    '<br>'+
                    '<div class="loading-time" >'+
                    '<h3>Hold on! while we are pulling up some updates based on your tracking number.</h3><br>'+
                    '</div>'+
                    '<img src="'+ base_url +'public/front/dist/img/logo/loading.gif" style="width:20%" alt="">'+
                    '<br>'+
                    '<br>'+
                    '<br>'+
                '</div>'
            );
            $(".paypalButton").hide();
        },
        success: function(response){ 
            window.location.replace( base_url + 'transactions/index/' + id_plans);
        },
        error: function(){
            window.location.replace( base_url + 'transactions/index/' + id_plans);
        }
    });
    // CALL TRANSACTION CONTROLLER TO EXECUTE THE REMAINING PROCESS (2-5)
}


function paypal_hover(element) {
    element.setAttribute('src', base_url + 'public/front/dist/img/paypal-hover.jpg');
}

function paypal_unhover(element) {
    element.setAttribute('src', base_url + 'public/front/dist/img/paypal.jpg');
}

function stripe_hover(element) {
    element.setAttribute('src', base_url + 'public/front/dist/img/stripe-hover.jpg');
}

function stripe_unhover(element) {
    element.setAttribute('src', base_url + 'public/front/dist/img/stripe.jpg');
}

$(".pm-paypal").click(function(){
    $(".pm-stripe").removeClass('pm-active');
    $(".proceed").val('Paypal');
    $(this).addClass('pm-active');
})

$(".pm-stripe").click(function(){
    $(".pm-paypal").removeClass('pm-active');
    $(".proceed").val('Stripe');
    $(this).addClass('pm-active');
})

$(".paypal-button").click(function(){
    alert('huli ka');
})




