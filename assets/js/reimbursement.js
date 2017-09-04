function fetch_reimbursement () {
    $.ajax({
        url: base_url + 'expense/fetch_reimbursement',
        type: "POST",
        success: function(data){
            $("#reimburse_data").html(data);
            $("#exptbl").DataTable();
        }
    })
}

$(document).on('click','#reimbursement-details',function() {
    var classify = $(this).data('classify');
    var name = $(this).data('name');
    var receipt_img = $(this).data('receipt-img');
    var amount = $(this).data('amount');
    $("#name").html(name);
    $('#receipt-img').attr('src','assets/uploads/'+receipt_img);
    $("#amount").html("&#8369 "+amount);

});

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