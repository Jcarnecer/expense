function fetch_classify() {
    $.ajax({
        url: base_url + "expense/fetch_classification",
        method: "POST",
        success: function(data) {
            $("#classification-data").html(data);
            
        }
    })
}

$(document).on('click','.edit_classification',function(){
    var classification =  $(this).data('classification');
    var allowance = $(this).data('allowance');
    var remaining = $(this).data('remaining');
    var id = $(this).data('id');
    
    $("#classification-title").html("Edit "+classification );
    $("#allowance").val(allowance);
    $("#r_allowance").val(remaining);
    $("#classification").val(classification);
    $("#id").val(id);
})

    

$(document).ready(function(){
    $("#a-c-form").on('submit',function(e){
        $.ajax({
            url: base_url + 'expense/insert_classification',
            method: "POST",
            data: $("#a-c-form").serialize(),
            success: function(data){
                var result = JSON.parse(data);
                if(result === 'success'){
                    $('#add_modal').modal('hide');
                    $("#a-c, #a-a").val("");
                    
                    fetch_classify();
                }
            },
            error: function() {
                alert('error');
            }
        })
        e.preventDefault();
    })
})

$(document).ready(function(){
    $("#e-c-form").on('submit',function(e){
        $.ajax({
            url: base_url + 'expense/edit_classification',
            method: "POST",
            data: $("#e-c-form").serialize(),
            success: function(data){
                var result = JSON.parse(data);
                if(result === 'success'){
                    $('#edit_modal').modal('hide');
                    fetch_classify();
                }
            },
            error: function() {
                alert('error');
            }
        })
        e.preventDefault();
    })
})