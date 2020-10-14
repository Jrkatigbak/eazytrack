// $(".removeCart").click(function(){
function login(){
    let email = $("#email").val();
    let password = $("#password").val();
    
    if(email == '' || password == ''){
        swal('Your login credentials are required','','error');return;
    }

    $.ajax({
        type: 'ajax',
        method: 'post',
        url: base_url + 'login/login',
        data: {
            email: email,
            password: password
        },
        async: false,
        dataType: 'text',
        success: function(response){ 
            if(response == 'false'){
                swal('Please check your credentials','','error');return;
            }
            if(response == 'false_email'){
                swal('Username or Email cannot be found','','error');return;
            }
            if(response == 'false_password'){
                swal('Please check your password','','error');return;
            }
            if(response == 'inactive'){
                swal('Your account is currently suspended in the system','Please contact system administrator','error');return;
            }
            if(response == 1){
                window.location.replace( base_url + 'back/admin/dashboard');
            }
            if(response == 2){
                swal('Welcome Staff','','error');return;
            }
            if(response == 3){
                window.location.replace( base_url + 'back/customer/dashboard');
            }
            
        },
        error: function(){
            swal('Could not edit data');
        }
    });

}

$('#email').keyup(function(e){
    if(e.keyCode == 13)
    {
        login();
    }
});

$('#password').keyup(function(e){
    if(e.keyCode == 13)
    {
        login();
    }
});