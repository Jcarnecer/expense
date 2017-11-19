

$(document).ready(function(){
    $("#login-form").on('submit',function(e) {
        $.ajax({
            url: 'auth/login',
            data:$("#login-form").serialize(),
            type: "POST",
            success: function(data) {
                var result = JSON.parse(data);
                if(result === 'success'){
                    $("#signin-icon").removeClass('fa fa-sign-in');
                    $("#signin-icon").addClass('fa fa-spinner fa-pulse fa-fw');
                    $("#validation").html("");
                    $("#forgot-password").hide();
                    window.location.href="dashboard";

                }else{
                    $("#validation").html(result);
                    $("#validation").show();
                }
            }
        })

        e.preventDefault();
    })

})