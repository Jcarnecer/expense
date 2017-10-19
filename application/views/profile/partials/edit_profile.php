<!-- Modal -->
<div id="edit-profile-modal" data-backdrop="static" data-keyboard="false" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Profile</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="success-message"></div>


        <form id="change-profile-form" method="post">
            <div class="form-group">
            <label>First Name</label>
            <!-- <input type="text" name="fname" value="<?= $this->user->info('firsttname') ?>" class="form-control"> -->
            <input type="text" name="fname" id="firstname" class="form-control">
            <div class="text-danger" id="fname_err"></div>
            </div>
            <div class="form-group">
            <label>Last Name</label>
            <!-- <input type="text" name="lname" value="<?= $this->user->info('lastname') ?>" class="form-control"> -->
            <input type="text" name="lname" id="lastname" class="form-control">
            <div class="text-danger" id="lname_err"></div>
            </div>
            <div class="form-group">
            <label>Email</label>
            <!-- <input type="text" name="email" value="<?= $this->user->info('email') ?>" class="form-control"> -->
            <input type="text" name="email" id="email" class="form-control">
            <div class="text-danger" id="email_err"></div>
            </div>
            <button type="Submit" class="btn custom-button float-right">Apply Changes</button>
        </form>
        
        <h5 class="top-margin-title">Account Security</h5>
        <hr>
        <form id="change-pass-form" method="post">
            <div class="form-group">
            <label>Old Password</label>
            <input type="password" name="opassword" class="form-control">
            <div class="text-danger" id="old_err"></div>
            </div>
            <div class="form-group">
            <label>New Password</label>
            <input type="password" name="npassword" class="form-control">
            <div class="text-danger" id="new_err"></div>
            </div>
            <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="cpassword" class="form-control">
            <div class="text-danger" id="confirm_err"></div>
            </div>
            <div class="form-group">
            <button type="Submit" class="btn custom-button float-right">Apply Changes</button>
            </div>
        </form>
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>