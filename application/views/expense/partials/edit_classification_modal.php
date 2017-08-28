<div id="edit_modal"  data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    <!-- Modal content-->
    	<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="classification-title"></h4>
			</div>
			<div class="modal-body">
				<form id="e-c-form" method="post">
					<div class="form-group">
                        <input type="hidden" name="id" id="id">
						<label>Classification</label>
						<input class="form-control" type="text" id="classification"  name="classification">
						<label>Allowance</label>
						<input class="form-control" type="text" id="allowance" name="allowance">
                        <label>Remaining Allowance</label>
						<input class="form-control" type="text" id="r_allowance" name="r_allowance">
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Save</button>
			</form>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
  </div>
</div>