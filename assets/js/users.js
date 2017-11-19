function fetch_users () {
    $.ajax({
        url: 'users/fetch_users',
        type: "POST",
        success: function(data){
            $("#users_data").html(data);
            $("#exptbl").DataTable();
        }
    })
}


$(document).ready(function() {
    $("#register-form").on('submit',function(e){
        $.ajax({
            url: 'users/auth',
            type: "POST",
            data: $("#register-form").serialize(),
            success: function(data){
                var result = JSON.parse(data);
                if(result === 'success') {
                    $("input").val("");
                    $("#validation").hide();
                    $("#add-users-modal").modal('hide');
                    fetch_users();
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




fetch_users();