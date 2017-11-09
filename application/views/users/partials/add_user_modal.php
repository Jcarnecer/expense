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
                <div class="alert alert-danger text-center " id="validation">
                </div>
                <div class="form-group has-danger">
                    <label for="email">E-mail Address</label>
                    <input type="text" name="email" class="form-control" id="email"
                                placeholder="you@example.com"  autofocus>
                </div>
            
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="firstname"
                                placeholder="First Name" >
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="lastname"
                                placeholder="Last Name" >
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <select name="position" class="form-control" id="">
                        <?php foreach($position as $row){ ?>
                            <option value="<?= $row->id ?>"><?= $row->pos_name ?></option>
                        <?php } ?>
                    </select>
                </div>
		    </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary custom-button float-right">Save</button>
                </form>
			</div>
        </div>
</div>