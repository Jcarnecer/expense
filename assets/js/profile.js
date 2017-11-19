
function fetch_profile() {
    $.ajax({
        url: "profile/get_user",
        type: "POST",
        success: function(data) {
            var result = JSON.parse(data);
            $("#firstname").val(result.firstname);
            $("#lastname").val(result.lastname);
            $("#email").val(result.email);
            $('#prof_pic').attr('src','uploads/'+result.profile_picture);
        }
    })
}

$(document).ready(function(){
    $("#change-pass-form").on('submit',function(e){
        $.ajax({
            url: 'profile/changepassword',
            data: $(this).serialize(),
            type: "POST",
            success: function(data)
            {
                var result = JSON.parse(data);
                if(result === "success"){
        
                    $("input[type='password']").val("");
                    bs_notify("<strong> Successfully Change Your Password.</strong>","success","top","right");
                    $(".text-danger").html("");
                }
                else{
                    $("#old_err").html(result.o_err);
                    $("#new_err").html(result.n_err);
                    $("#confirm_err").html(result.c_err);
                }
            },
            error: function(data)
            {
                alert('Opps! Something went wrong. please contact the administrator. ');
            },
        })
      e.preventDefault();
    });
  });
  $(document).ready(function(){
    $("#change-profile-form").on('submit',function(e){
        $.ajax({
            url: 'profile/changeinfo',
            data: $("#change-profile-form").serialize(),
            type: "POST",
            success: function(data)
            {
                var result = JSON.parse(data);
                if(result === "success"){
                    fetch_profile();
                    bs_notify("<strong> Successfully Change Your Profile.</strong>","success","top","right");
                    $(".text-danger").html("");
            
                }else{
                    $("#fname_err").html(result.f_error);
                    $("#lname_err").html(result.l_error);
                    $("#email_err").html(result.e_error);
                }
            },
            error: function(data)
            {
                alert('Opps! Something went wrong. please contact the administrator. ');
            },
        })
      e.preventDefault();
    });
});

$(document).ready(function(){
    $("#change-picture-form").on('submit',function(e){
        var form = new FormData(document.getElementById("change-picture-form"));
        $.ajax({
            url: 'profile/changepicture',
            data: form,
            type: "POST",
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(data)
            {
                var result = JSON.parse(data);
                if(result === "success"){
                    $("#profile-picture-modal").modal('hide');
                    $("#error-message-picture").hide();
                    $("#profile_pic").val("");
                    bs_notify("<strong> Successfully Change Your Profile Picture.</strong>","success","top","right");
                    fetch_profile();
                }
                else{
                    $("#error-message-picture").html(result);
                }
            },
            error: function(data)
            {
                alert('Opps! Something went wrong. please contact the administrator. ');
            },
        })
      e.preventDefault();
    });
});



fetch_profile();