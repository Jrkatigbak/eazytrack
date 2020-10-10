$(document).on('click', ".proceedPayment", function () {

    // Required Fields
    let name = $("#name").val();
    let address = $("#address").val();
    let email = $("#email1").val();
    let subject = $("#subject").val();
    let id_claim_type = $("#id_claim_type").text();
    let parcel_reference_number = $("#parcel_reference_number").val();
    // Required Fields

    if(name == '' || address == '' || email == '' || subject == '' || id_claim_type == '' || parcel_reference_number == ''){
        swal("Please input all the required fields","","error"); return;
    }


    $(".name").text(name);
    $(".address").text(address);
    $(".email").text(email);
    $(".subject").text(subject);
    $(".id_claim_type").text( $("select#id_claim_type option").filter(":selected").text() );
    $(".parcel_reference_number").text(parcel_reference_number);
    $(".company_name").text( $("#company_name").val() );
    $(".when_happen").text( $("#when_happen").val() );
    $(".raised_before").text( $("#raised_before").val() );
    $(".status").text( $("#status").val() );
    $(".evidence").text( $("#evidence").val() );
    $(".what_happened").text( $("#what_happened").val() );
    $(".affected").text( $("#affected").val() );
    $(".resolved").text( $("#resolved").val() );

    $(".claimDetails").css('display','none');
    $(".confirmAndPay").css('display','block');

})



// UPLOAD STUDENT PHOTO
$(document).on('change', '#evidence', function(){
    var temp_photo_arr = $("#evidence").val();
    var name = document.getElementById("evidence").files[0].name;
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("evidence").files[0]);
    var f = document.getElementById("evidence").files[0];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
    alert("Image File Size is very big");
    }
    else
    {
    form_data.append("evidence", document.getElementById('evidence').files[0]);
    $.ajax({
        url: base_url + "Claims/upload_evidence/" + temp_photo_arr,
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success:function(name){
            $("#evidence1").val(name);
        }
    });
    }
  });

  // UPLOAD STUDENT PHOTO
// $(document).on('change', '#file', function(){
//     var temp_photo_arr = $("#temp_photo_arr").val();
//     var name = document.getElementById("file").files[0].name;
//     var form_data = new FormData();
//     var ext = name.split('.').pop().toLowerCase();
//     if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
//     {
//     alert("Invalid Image File");
//     }
//     var oFReader = new FileReader();
//     oFReader.readAsDataURL(document.getElementById("file").files[0]);
//     var f = document.getElementById("file").files[0];
//     var fsize = f.size||f.fileSize;
//     if(fsize > 2000000)
//     {
//     alert("Image File Size is very big");
//     }
//     else
//     {
//     form_data.append("file", document.getElementById('file').files[0]);
//     $.ajax({
//         url: base_url + "welcome/upload_student_photo/" + temp_photo_arr,
//         method:"POST",
//         data: form_data,
//         contentType: false,
//         cache: false,
//         processData: false,
//         beforeSend:function(){
//             $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
//             $('#uploaded_image2').html("<label class='text-success'>Image Uploading...</label>");
//         },   
//         success:function(response){
//           var split_img = response.split(',');
//           $('#uploaded_image').html(split_img[0]);
//           $('#uploaded_image2').html('<img class="student-picture" src="'+ base_url +'uploads/student_images/'+ split_img[1] +'">');
//           $("#temp_photo_arr").val(split_img[1]);
//         }
//     });
//     }
//   });

function checkout(){
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + 'claims/add/',
        data: {
            name: $("#name").val(),
            address: $("#address").val(),
            email: $("#email").val(),
            subject: $("#subject").val(),
            id_claim_type: $("#id_claim_type").val(),
            parcel_reference_number: $("#parcel_reference_number").val(),
            company_name: $("#company_name").val(),
            when_happen: $("#when_happen").val(),
            raised_before: $("#raised_before").val(),
            status: $("#status").val(),
            evidence: $("#evidence1").val(),
            what_happened: $("#what_happened").val(),
            affected: $("#affected").val(),
            resolved: $("#resolved").val()
        },
        async: false,
        dataType: 'text',
        beforeSend: function() {
            $('#successModal').modal('show');
        },
        success: function(response){ 
            window.location.replace( base_url + 'transactions/index/3');
        },
        error: function(){
            swal('Could not edit data');
        }
    });
}