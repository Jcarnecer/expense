function fetch_classify() {
    $.ajax({
        url: "expense/fetch_classification",
        method: "POST",
        success: function(data) {
            $("#classification-data").html(data);
            $("#exptbl").DataTable();
        }
    })
}

$(document).on('click','.edit_classification',function(){
    var classification =  $(this).data('classification');
    var allowance = $(this).data('allowance');
    var budget = $(this).data('budget');
    var id = $(this).data('id');
    
    $("#classification-title").html("Edit "+classification );
    $("#allowance").val(allowance);
    $("#budget").val(budget);
    $("#classification").val(classification);
    $("#id").val(id);
})

$(document).on('click','.reset_allowance',function(){
    var classification =  $(this).data('classification');
    var allowance = $(this).data('allowance');
    var budget = $(this).data('budget');
    var id = $(this).data('id');
    
    $("#r-classification-title").html("Edit "+classification );
    $("#r-allowance").html("Users Allowance: "+allowance);
    $("#r-budget").val(budget);
    $("#r-classification").val(classification);
    $("#r-id").val(id);
})

//reset allowance
$(document).ready(function(){
    $("#r-a-form").on('submit',function(e){
        $.ajax({
            url: 'expense/approve_reset',
            method: "POST",
            data: $("#r-a-form").serialize(),
            success: function(data){
                $("#reset-allowance-modal").modal('hide');
                bs_notify("<strong>Successfully Reset Allowance</strong>","success","top","right");
            },
            error: function() {
                alert('error');
            }
        })
        e.preventDefault();
    })
})
    

$(document).ready(function(){
    $("#a-c-form").on('submit',function(e){
        $.ajax({
            url: 'expense/insert_classification',
            method: "POST",
            data: $("#a-c-form").serialize(),
            success: function(data){
                var result = JSON.parse(data);
                if(result === 'success'){
                    $('#add_modal').modal('hide');
					$("#a-c, #a-a, #a-b").val("");
					bs_notify("<strong>Successfully Inserted Classification</strong>","success","top","right");
                    fetch_classify();
                }else{
                    $("#a-error").html(result.a_error);
                    $("#b-error").html(result.b_error)
                    $("#c-error").html(result.c_error);
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
            url: 'expense/edit_classification',
            method: "POST",
            data: $("#e-c-form").serialize(),
            success: function(data){
                var result = JSON.parse(data);
                if(result === 'success'){
					$('#edit_modal').modal('hide');
					bs_notify("<strong>Successfully Edited Classification</strong>","success","top","right");
                    
                    fetch_classify();
                }else{
                    $("#edit-a-error").html(result.a_error);
                    $("#edit-b-error").html(result.b_error)
                    $("#edit-c-error").html(result.c_error);
                }
            },
            error: function() {
                alert('error');
            }
        })
        e.preventDefault();
    })
})
