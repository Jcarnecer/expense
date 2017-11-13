<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">	
					<?php if($this->user->info('pos_id')==3): ?>
					<h4 class="card-title">Pending Request</h4>
					<h6 class="card-subtitle mb-2 text-muted">Reimbursement Request</h6>
					<p class="card-text"><?= $this->db->where('status',2)->from('expense_reimbursement')->count_all_results(); ?></p>
					<a href="reimbursement" class="card-link">Click here</a>
					<?php else: ?>
					<h4 class="card-title">My Pending Request</h4>
					<h6 class="card-subtitle mb-2 text-muted">Reimbursement Request</h6>
					<p class="card-text"><?= $this->db->where('status',2)->from('expense_reimbursement')->count_all_results(); ?></p>
					<a href="request" class="card-link">Click here</a>

					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
