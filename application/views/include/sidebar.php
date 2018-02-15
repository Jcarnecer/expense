<div id="sidebar">
	<!-- sidebar menu start-->
	<div id="nav-icon-close" class="custom-toggle">
		<span></span>
		<span></span>
	</div>

	<ul class="sidebar-menu">
		<?php
		 $position = $this->user->info('role');
		 $where = array('role_id' => $position);
		 $permission=$this->Crud_model->fetch('roles_permissions',$where,array('EXP_ADMIN,EXP_EMP')); 
		
		if($permission[0]->permission_id=="EXP_ADMIN"){ //human resource (tentative way)?>
			<!-- <li class="sub-menu">
				<a data-toggle="collapse" href="#expense-sub" aria-expanded="false" aria-controls="expense-sub" >
					<i class="fa fa-desktop"></i>
					<span>Expense</span>
				</a>
				<ul class="sub collapse" id="expense-sub">
						<li><a  href="reimbursement">Reimbursement</a></li>
						<li><a  href="classification">Classification</a></li>
					
				</ul>
			</li> -->
			<li><a  href="reimbursement">Reimbursement</a></li>
			<li><a  href="classification">Classification</a></li>
		<?php } ?>
			<?php if($permission[0]->permission_id=="EXP_ADMIN" || $permission[0]->permission_id=="EXP_ADMIN"){  //tentative ?>
				<!-- <li class="sub-menu">
					<a href="users" >
						<!-- <i class="fa fa-users"></i> -->
						<!-- <span>User Management</span>
					</a>
				</li> -->
			<?php } ?> 
		<li><a  href="request">File Reimbursement</a></li>
		
		<!-- <li><a href="allowance">My Allowances</a></li> -->

	</ul>
	<!-- sidebar menu end-->
</div>
