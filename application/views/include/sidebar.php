<div id="sidebar">
	<!-- sidebar menu start-->
	<div id="nav-icon-close" class="custom-toggle">
		<span></span>
		<span></span>
	</div>

	<ul class="sidebar-menu">

		<li class="sub-menu">
			<a data-toggle="collapse" href="#expense-sub" aria-expanded="false" aria-controls="expense-sub" >
				<i class="fa fa-desktop"></i>
				<span>Expense</span>
			</a>
			<ul class="sub collapse" id="expense-sub">
				<?php if($this->user->info('pos_id')==3){ //human resource (tentative way)?>
					<li><a  href="reimbursement">Reimbursement</a></li>
					<li><a  href="classification">Classification</a></li>
				<?php } ?>
				<li><a  href="request">File Reimburse</a></li>
			</ul>
		</li>
				<?php if($this->user->info('pos_id')==3){  //tentative ?>
		<li class="sub-menu">
			<a href="users" >
				<i class="fa fa-users"></i>
				<span>User Management</span>
			</a>
			
		</li>
		<?php } ?>

	</ul>
	<!-- sidebar menu end-->
</div>