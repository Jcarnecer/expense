<?php 
$classification = $this->Crud_model->fetch('classification');
?>
		<div class="container">
                    <h3>User Information</h3><br>
            <div class="row">
                <div class="col-6">
                    <h5>Name: <?= $user->firstname .' '.$user->middlename.' '.$user->lastname?></h5>
                    <h5>Email Address: <?= $user->email ?></h5>
                    <h5>Position: <?= $position ?></h5>
                    <?php if($user->status == 1){ ?>
                    <h5>Status: Active</h5>
                    <?php }else{ ?>
                        <h5>Status: Inactive</h5>
                    <?php } ?>
                    <br>
                    <h5>Remaining Allowance </h5>
                    <?php foreach($classification as $row): 
                        $classification = strtolower($row->classification); 
                        $allowance = $row->allowance_per_user;
                        ?>
                    <h5><?= $row->classification.': '. $user->$classification ?></h5>
                    <?php endforeach; ?>
                </div>

                <div class="col-6 pull-right">
                    <a href="#<?= secret_url('encrypt',$user->id) ?>-profile-modal" data-toggle="modal"><img height="30%" src="uploads/<?= $user->profile_picture ?>" alt=""></a>
                </div>
            </div>
        </div>

        <div id="<?= secret_url('encrypt',$user->id) ?>-profile-modal" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    	<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Profile Picture</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form id="a-c-form" method="post">
                <input type="hidden" name="id" value="<?= secret_url('encrypt',$user->id) ?>">
                <input type="file" name="profile_picture" class="form-control">
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Save</button>
			</form>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
  </div>
</div>