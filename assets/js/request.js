function fetch_request () {
    $.ajax({
        url: base_url + 'expense/fetch_request',
        type: "POST",
        success: function(data){
            $("#request_data").html(data);
        }
    })
}

$(document).ready(function() {
    $("#receipt-image").hide();
    $("#with_receipt").change(function(){
        if($("#with_receipt").val() == '1') {
            $("#receipt-image").show();
        }else{
            $("#receipt-image").hide();
        }
    });
})

$(document).ready(function() {
    $("#request-form").on('submit',function(e){
        var form = new FormData(document.getElementById("request-form"));
        $.ajax({
            url: base_url + 'expense/insert_request',
            type: "POST",
            data: form,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(data) {
                var result = JSON.parse(data);
                if(result === 'success'){
                    fetch_request();
                }else{
                    $("#error-message").html(result);
                }
            }
        })
        e.preventDefault();
    })
})