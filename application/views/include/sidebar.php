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
		 $permission=$this->Crud_model->fetch('roles_permissions',$where); 
		 $privileges=[];
		 $permission_id=null;
		 foreach($permission as $row){
			 $privileges[]=$row->permission_id;
			 
		 }
		 if(in_array('EXP_ADMIN',$privileges)){
			$permission_id='EXP_ADMIN';
		 }
		 elseif(in_array('EXP_EMPLOYEE',$privileges)){
		   $permission_id='EXP_EMP';
		 }
		if($permission_id=="EXP_ADMIN"){ //human resource (tentative way)?>
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
			<li>
			  <a  href="reimbursement">
			     <i class="fa fa-folder-open"></i>
				 <span>Reimbursements</span>
			  </a>
			</li>

			<li>
				<a  href="classification">
				<i class="fa fa-table"></i>
				 <span>Classification</span>
				</a>
			</li>
		<?php } ?>
			
		<li>
			<a  href="request">
				<i class="fa fa-edit"></i>
				 <span>File Reimbursement</span>
			</a>	
		</li>
		
		<!-- <li><a href="allowance">My Allowances</a></li> -->

	</ul>
	<!-- sidebar menu end-->
</div>
