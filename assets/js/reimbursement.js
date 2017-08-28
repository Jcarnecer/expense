function fetch_reimbursement () {
    $.ajax({
        url: base_url + 'expense/fetch_reimbursement',
        type: "POST",
        success: function(data){
            $("#reimburse_data").html(data);
        }
    })
}

$(document).ready(function() {
    $("#request-form").on('submit',function(e){
        var form = new FormData(document.getElementById("request-form"));
        $.ajax({
            url: base_url + 'expense/insert_reimbursement',
            type: "POST",
            data: form,
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success: function(data) {
                var result = JSON.parse(data);
                if(result === 'success'){
                    fetch_reimbursement();
                }else{
                    $("#error-message").html(result);
                }
            }
        })
        e.preventDefault();
    })
})