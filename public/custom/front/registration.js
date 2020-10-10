// $(".removeCart").click(function(){
    $(document).on('click', ".regi_btn", function () {
        let first_name = $("#regfirst_name").val();
        let username = $("#regusername").val();
        let password = $("#regpassword").val();
        let email = $("#regemail").val();
        let cpassword = $("#regcpassword").val();
        $('.text-danger').html('');
        $('.input').css("border-color", "#138615");

        if(cpassword != password){
            swal('Please check your passwords','','error');return;
        }

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: base_url + 'registration/register_account',
            data: {
                first_name: first_name,
                username: username,
                password: password,
                email: email,
                cpassword: cpassword
            },
            async: false,
            dataType: 'text',
            success: function(response){ 
                let status = 'true';
                if(response == 'false'){
                    swal('Something went wrong in creating your account','','error');return;
                }
                if(response == 'true'){
                    $("#myModalLogin").modal('show');
                    $("#myModalRegistration").modal('hide');
                    swal('New Account was created successfully','','success');return;


                }
                $.each(JSON.parse(response), function(key, value) {
                    $('#reg' + key).css("border", "3px solid #red");
                    $('.errorreg' + key).css('display','block');
                    $('.errorreg' + key).html(value);
                    status = 'false';
                });
                
            },
            error: function(){
                swal('Could not edit data');
            }
        });
    
    })