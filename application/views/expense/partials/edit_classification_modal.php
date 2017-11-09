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
						<h5 class="text-danger" id="edit-c-error"></h5>
						<label>Allowance</label>
						<input class="form-control" type="text" id="allowance" name="allowance">
						<h5 class="text-danger" id="edit-a-error"></h5>
                        <label>Budget</label>
						<input class="form-control" type="text" id="budget" name="budget">
						<h5 class="text-danger" id="edit-b-error"></h5>
					</div>
			</div>
			<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary custom-button float-right">Save</button>
				</form>
			</div>
		</div>
  </div>
</div>
