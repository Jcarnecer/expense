$(document).ready(function() {
    $("#register-form").on('submit',function(e){
        $.ajax({
            url: base_url + 'users/auth',
            type: "POST",
            data: $("#register-form").serialize(),
            success: function(data){
                var result = JSON.parse(data);
                if(result === 'success') {
                    $("input").val("");
                    $("#validation").hide();
                }else{
                    $("#validation").show();
                    $("#validation").html(result);
                }
                
            },
            error: function(){
                alert('ops error');
            }
        })

        e.preventDefault();
    })
})