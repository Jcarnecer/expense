<div id="edit_modal"  data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    <!-- Modal content-->
    	<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="classification-title"></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form id="e-c-form" method="post">
					<div class="form-group">
                        <input type="hidden" name="id" id="id">
						<label>Classification</label>
						<input class="form-control" type="text" id="classification"  name="classification">
						<label>Allowance</label>
						<input class="form-control" type="text" id="allowance" name="allowance">
                        <label>Budget</label>
						<input class="form-control" type="text" id="budget" name="budget">
					</div>
				</form>
				<button type="submit" class="btn custom-button float-right">Save</button>
			</div>
		</div>
  </div>
</div>