$(document).on('click', ".trackbutton", function () {

    let id = $(this).attr('data-id');
    let tracking_number = $(this).attr('data-tracking_number');
    let courier_name = $(this).attr('data-courier_name');
    let courier_code = $(this).attr('data-courier_code');


    $.ajax({//AJAX TO GET REPLACEMENT ACCOUNT DETAILS
		type: 'ajax',
		method: 'post',
		url: base_url + 'transactions/TrackingUpdate/' + courier_code +'/'+ tracking_number,
		data:{},
		// async: false,
        dataType: 'json',
		success: function(response){
            $(".tracking-loading-div").css('display','none');
            $(".tracking-parce-updates").css('display','block');
            $(".parcelUpdates").html('');
            $(".latest_update").text('');
            $.each(response, function(key, value) {
                $(".parcelUpdates").prepend(
                    '<li>'+
                        '<p class="text text-primary">'+ value.checkpoint_time +'</p>'+
                        '<label>'+ value.message +'</label><br>'+
                        '<label class="text-muted">'+ value.location +'</label>'+
                    '</li>'
                );
                $(".latest_update").text(value.message.toUpperCase());
            });

		},
		error: function(){
            $(".tracking-loading-div").css('display','none');
            $(".tracking-parce-updates").css('display','block');
			swal('Something went wrong');
		}
    });//AJAX TO GET SPONSOR ACCOUNT DETAILS
    

    $(".tracking_number").text(tracking_number);
    $(".courier_name").text(courier_name);
    $('#updateTimelineModal').modal('show');
   
});

$(document).on('click', ".showInvoice", function () {
    let created_at = $(this).attr('data-created_at');
    let reference_nos = $(this).attr('data-reference_nos');
    let invoice_nos = $(this).attr('data-invoice_nos');
    $('#invoiceModal').modal('show');
    
    $(".invdate").text(created_at);
    $(".reference_nos").text(reference_nos);
    $(".invoice_nos").text(invoice_nos);
});

