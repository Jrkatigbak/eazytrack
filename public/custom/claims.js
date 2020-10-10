$(document).on('click', ".btnUpdate", function () {

    let id = $(this).attr('data-id');
    let reference_nos = $(this).attr('data-reference_nos');
    let email = $(this).attr('data-email');

    $("#id_claim").val(id);
    $("#email").val(email);
    $("#reference_nos").val(reference_nos);


    $.ajax({//AJAX 
		type: 'ajax',
		method: 'post',
		url: base_url + 'claims/getClaimsUpdate/' + id,
		data:{},
		// async: false,
		dataType: 'text',
		success: function(response){
            $(".parcelUpdates").html('');
            var data = JSON.parse(response);
            if(data.length == 0){
                $(".parcelUpdates").append(
                    '<li>'+
                       'No update available yet!'+
                    '</li>'
                );
                return;
            }
            $.each(data, function(key, value) {
                var html = (
                    '<li>'+
                        '<p class="text text-primary">'+ value.update_date +'</p>'+
                        '<label>'+ value.message +'</label><br>'
                );
                if(value.attachement != ''){
                    html += '<a href=" '+ base_url +'public/claim-response/'+ value.attachement +'" download >Attachement</a>';
                }
                html +=  '</li>';

                $(".parcelUpdates").append(html);
            });

		},
		error: function(){
			swal('Something went wrong');
		}
    });//AJAX 

    $('.modal-title').text('Transaction #: ' +reference_nos);
    $('#updateTimelineModal').modal('show');
   
});

$(document).on('click', ".showInvoice", function () {
    let created_at = $(this).attr('data-created_at');
    let reference_nos = $(this).attr('data-reference_nos');
    $('#invoiceModal').modal('show');
    
    $(".invdate").text(created_at);
    $(".reference_nos").text(reference_nos);
});


$(document).on('click', ".viewFUll", function () {
    var reference_nos = $(this).attr('data-reference_nos');
    $('#viewClaims_modal').modal('show');
    $.ajax({//AJAX 
		type: 'ajax',
		method: 'post',
		url: base_url + 'claims/getClaimsByRefNo/' + reference_nos,
		data:{
        },
		// async: false,
        dataType: 'text',
		success: function(response){
            var data = JSON.parse(response);
            $(".name").text( data[0].name );
            $(".address").text( data[0].address );
            $(".email").text(data[0].email );
            $(".subject").text( data[0].subject );
            $(".id_claim_type").text( data[0].type );
            $(".parcel_reference_number").text( data[0].parcel_reference_number );
            $(".company_name").text( data[0].company_name );
            $(".when_happen").text( data[0].when_happen );
            $(".raised_before").text( data[0].raised_before );
            $(".status").text( data[0].status);
            if(data[0].evidence != ''){
                $(".evidence").html(
                    '<a href=" '+ base_url +'public/claims-upload/'+ data[0].evidence +'" download >Download Evidence</a>'
                );
            }else{
                $(".evidence").text('Customer did not upload any evidence');
            }

            $(".what_happened").text( data[0].what_happened );
            $(".affected").text( data[0].affected );
            $(".resolved").text( data[0].resolved );
		},
		error: function(){
			swal('Something went wrong');
		}
    });//AJAX

});


// UPLOAD STUDENT PHOTO
$(document).on('change', '#file', function(){
    var temp_photo_arr = $("#file").val();
    var name = document.getElementById("file").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("file").files[0]);
    var f = document.getElementById("file").files[0];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
    alert("Image File Size is very big");
    }
    else
    {
    form_data.append("file", document.getElementById('file').files[0]);
    $.ajax({
        url: base_url + "Claims/attached_file_update/" + temp_photo_arr,
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success:function(name){
            $("#file1").val(name);
        }
    });
    }
  });


$(document).on('click', ".btnAdd", function () {
    $(this).prop('disabled',true)
    var update_date = $("#update_date").val();
    var message = $("#message").val();
    var id_claim = $("#id_claim").val();
    var email = $("#email").val();
    var reference_nos = $("#reference_nos").val();
    var attachement = $("#file1").val();

    $.ajax({//AJAX 
		type: 'ajax',
		method: 'post',
		url: base_url + 'claims/AddClaimsUpdate/',
		data:{
            id_claim: id_claim,
            message: message,
            update_date: update_date,
            attachement: attachement,
            email: email
        },
		// async: false,
        dataType: 'text',
        beforeSend: function(){
            $(".btnAdd").prop('disabled',true);
            $(".btnAdd").text('Loading...');
		},
		success: function(response){
            $(".btnAdd").prop('disabled',false);
            $(".btnAdd").text('Add Update');
            $(".parcelUpdates").html('');
            $.each(JSON.parse(response), function(key, value) {

                var html = (
                    '<li>'+
                        '<p class="text text-primary">'+ value.update_date +'</p>'+
                        '<label>'+ value.message +'</label><br>'
                );
                    alert(value.attachement);
                if(value.attachement != ''){
                    html += '<a href=" '+ base_url +'public/claim-response/'+ value.attachement +'" download >Attachement</a>';
                }
                html +=  '</li>';

                $(".parcelUpdates").append(html);
            });
            swal('New udpates added, will send also on customer email and dashboards.','','success');
		},
		error: function(){
			swal('Something went wrong');
		}
    });//AJAX

});