<div id="reset-allowance-modal" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    	<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Reset Allowance For Active Users</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
                <h6> Are you sure you want to reset allowance for active users? </h6>
                <br>
                <h5 id="r-allowance"></h5>
			</div>
			<div class="modal-footer">
                <form id="r-a-form" method="post">
                    <input type="hidden" id="r-id" name="id">
                    <input type="hidden" id="r-allowance" name="allowance">
                    <input type="hidden" id="r-classification" name="classification">
				</form>
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				<button type="submit" class="btn custom-button">Yes</button>
			</div>
		</div>
  </div>
</div>