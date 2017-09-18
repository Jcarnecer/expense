<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo base_url();?>" />
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title><?= $title ?></title>
		<script src="assets/js/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/flavored-reset-and-normalize.css" >
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" >
		<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome.min.css" >
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
		<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css" >
		<script src="assets/js/bootstrap-notify.min.js"></script>
		<script src="assets/js/bs_notify.js"></script>
		<script>
			var base_url = window.location.origin+"/expense/";
		</script>
		<?php $segment = $this->uri->segment(1); 
			if($segment == 'classification') { ?>
				<script src="assets/js/classification.js">
				</script>
				<script>fetch_classify();</script>
			<?php }elseif($segment == 'request'){ ?>
				<script src="assets/js/request.js">
				</script>
			<?php }elseif($segment == 'reimbursement'){ ?>
				<script src="assets/js/reimbursement.js">
				</script>
			<?php }elseif($segment == 'users'){ ?>
				<script src="assets/js/users.js">
				</script>
			<?php }elseif($segment == 'profile'){ ?>
				<script src="assets/js/profile.js">
				</script>
			<?php } ?>
	</head>
	<body>
		