<div id="request-modal" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    	<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Filing of Reimbursement</h4>
			</div>
			<div class="modal-body">
				<h5 class="text-danger" id="error-message"></h5>
				<form id="request-form" method="post">
					<div class="form-group">
						<label>Classification</label>
						<select name="classification" class="form-control">
							<option value="" disabled selected> -- Select Classification --</option>
							<?php foreach($this->classification as $row): ?>
								<option value="<?= $row->id ?>"><?= $row->classification ?></option>
							<?php endforeach ?>
						</select>
						<label>Amount</label>
						<input class="form-control" id="amount" type="text" name="amount">
						<label>Receipt</label>
						<select name="receipt" id="with_receipt" class="form-control">
							<option value="" disabled selected>-- With Receipt ? -- </option>
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
					</div>
					<div class="form-group" id="receipt-image">
						<label for="">Receipt Image</label>
						<input class="form-control" type="file" name="receipt_image" />
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