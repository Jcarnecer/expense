

$(document).ready(function(){
    $("#login-form").on('submit',function(e) {
        $.ajax({
            url: base_url + 'auth/login',
            data:$("#login-form").serialize(),
            type: "POST",
            success: function(data) {
                var result = JSON.parse(data);
                if(result === 'success'){
                    $("#signin-icon").removeClass('fa fa-sign-in');
                    $("#signin-icon").addClass('fa fa-spinner fa-pulse fa-fw');
                    $("#validation").hide();
                    $("#forgot-password").hide();
                    window.location.href=base_url+"dashboard";

                }else{
                    $("#validation").html(result);
                    $("#validation").show();
                }
            }
        })

        e.preventDefault();
    })

})