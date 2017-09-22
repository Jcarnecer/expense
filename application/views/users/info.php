<?php 
$classification = $this->Crud_model->fetch('classification');
?>
		<div class="container-fluid">
            <h3>User Information</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <img class="center-block" height="200px" src="uploads/<?= $user->profile_picture ?>" alt="">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                    <strong>Name: </strong><?= $user->firstname .' '.$user->middlename.' '.$user->lastname?><br>
                    <strong>Email Address: </strong><?= $user->email ?><br>
                    <strong>Position: </strong><?= $position ?><br>
                    <?php if($user->status == 1){ ?>
                    <strong>Status: </strong>Active<br>
                    <?php }else{ ?>
                        <strong>Status: </strong>Inactive<br>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <h3>Remaining Allowance </h3>

                    <table class="table table-responsive">
                        <tbody>
                        
                        <?php foreach($classification as $row): 
                        $classification = strtolower($row->classification); 
                        $allowance = $row->allowance_per_user;
                        ?>
                        <tr>
                            <th scope="row"><?= $row->classification?></th>
                            <h5></h5>
                            <td><?=$user->$classification?></td>
                        </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div> 
        </div>

        <!-- <div id="<?= secret_url('encrypt',$user->id) ?>-profile-modal" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  	<div class="modal-dialog">

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
</div> -->