<div id="sidebar">
	<!-- sidebar menu start-->
	<div id="nav-icon-close" class="custom-toggle">
		<span></span>
		<span></span>
	</div>

	<ul class="sidebar-menu">
			
		<!-- <li class="">
			<a class="reimbursement" href="#">
				<i class="fa fa-dashboard"></i>
				<span>Reimbursement</span>
			</a>
		</li>

		<li class="">
			<a class="request" href="#">
				<i class="fa fa-dashboard"></i>
				<span>Request</span>
			</a>
		</li> -->
		

		<li class="sub-menu">
			<a data-toggle="collapse" href="#expense-sub" aria-expanded="false" aria-controls="expense-sub" >
				<i class="fa fa-desktop"></i>
				<span>Expense</span>
			</a>
			<ul class="sub collapse" id="expense-sub">
				<li><a  href="reimbursement">Reimbursement</a></li>
				<li><a  href="request">Request</a></li>
				<li><a  href="classification">Classification</a></li>
			</ul>
		</li>
		

		<!-- <li class="">
			<a class="" href="<?= base_url('users/logout'); ?>">
				<i class="fa fa-dashboard"></i>
				<span>Logout</span>
			</a>
		</li> -->

	</ul>
	<!-- sidebar menu end-->
</div>