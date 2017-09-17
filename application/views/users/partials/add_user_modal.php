<style>
#validation{
    display:none;
}
</style>
<?php 
$position = $this->Crud_model->fetch('positions');

?>

        <div id="add-users-modal" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  	<div class="modal-dialog">

    <!-- Modal content-->
    	<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Users</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" id="register-form">
            <h2>Create User</h2>
                    <div class="alert alert-danger text-center " id="validation">
                    </div>
                    <hr>
                <div class="form-group has-danger">
                    <label class="sr-only" for="email">E-Mail Address</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-envelope-open-o"></i></div>
                        <input type="text" name="email" class="form-control" id="email"
                                placeholder="you@example.com"  autofocus>
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="sr-only" for="firstname">First Name</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user-o"></i></div>
                        <input type="text" name="firstname" class="form-control" id="firstname"
                                placeholder="First Name" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="lastname">Last Name</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user-o"></i></div>
                        <input type="text" name="lastname" class="form-control" id="lastname"
                                placeholder="Last Name" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only">Position</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-suitcase"></i></div>
                        <select name="position" class="form-control" id="">
                            <?php foreach($position as $row){ ?>
                                <option value="<?= $row->id ?>"><?= $row->pos_name ?></option>
                            <?php } ?>
                        </select>
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