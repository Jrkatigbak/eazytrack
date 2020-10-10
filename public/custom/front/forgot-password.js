// $(".removeCart").click(function(){
    $(document).on('click', ".retriveButton", function () {
        let email = $("#forgot_email").val();
      
        $('.text-danger').html('');
        $('.input').css("border-color", "#138615");

        if(email == ''){
            swal('Please enter your email address','','error');return;
        }

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: base_url + 'registration/forgotPassword',
            data: {
                email: email
            },
            async: false,
            dataType: 'text',
            success: function(response){ 
                if(response == 'true'){
                    swal('We sent a temporary password in your email inbox','','success');
                    $("#myModalForgot").modal('hide');
                }else if(response == 'false'){
                    swal('There is no any account associated with your email','','error');
                }else{
                    swal('Something went wrong!','Please contact our support for further assistance','error');
                }

                
            },
            error: function(){
                swal('Something went wrong!','Please contact our support for further assistance','error');
            }
        });
    
    })