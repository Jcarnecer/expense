<div id="add_modal" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    	<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Classification</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form id="a-c-form" method="post">
					<div class="form-group">
						<label>Classification</label>
						<input class="form-control" id="a-c" type="text" name="classification">
						<h5 class="text-danger" id="c-error"></h5>
						<label>Allowance</label>
						<input class="form-control" id="a-a" type="text" name="allowance">
						<h5 class="text-danger" id="a-error"></h5>
						<label>Budget</label>
						<input class="form-control" id="a-b" type="text" name="budget">
						<h5 class="text-danger" id="b-error"></h5>
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