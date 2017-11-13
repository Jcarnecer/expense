<?php
  // $userwhere=['id'=>$this->user->info('id')];
  // $user=$this->Crud_model->fetch_tag_row('*','users','$userwhere');
  $id = $this->user->info('id');
  $where = ['id'  => $id];
  $user = $this->Crud_model->fetch_tag_row('*','users',$where);
?>

<?php $this->load->view('profile/partials/profile_pic') ?>
<?php $this->load->view('profile/partials/edit_profile') ?>

<div class="container-fluid">
  <h2>Profile</h2>
  <hr>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <a data-toggle="modal" href="#profile-picture-modal"><img id="prof_pic" class="center-block bottom-margin img-fluid"></a>
      <!-- <a class="btn btn-info waves-effect" href="<?= base_url().'employee/request_shift/'.$this->session->id?>">Shift</a> -->
      <!-- <a class="btn btn-info waves-effect" href="login/logout"><i class="fa fa-sign-out m-r-10"></i>Logout</a> -->
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
      <h2>User Information</h2>
      <?= $this->user->info('lastname') ?>,
      <?= $this->user->info('firstname') ?><br>
      <?= $this->user->info('email') ?>
      <button class="btn custom-button edit-button" data-toggle="modal" href="#edit-profile-modal">Edit Account Info</button>
    </div>
  </div><!-- row -->
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <?php 
        $classification = $this->Crud_model->fetch('expense_classification');
        ?>
        <h3>Total Reimbursement Claimed</h3>
        
        <table class="table table-responsive">
          <tbody>
        
            <?php foreach($classification as $row): 
            $c_name = strtolower($row->classification); 
            $allowance = $row->allowance_per_user;
            ?>
            <tr>
              <th scope="row"><?= $row->classification?></th>
              <h5></h5>
              <td><?=$user->$c_name?></td>
            </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->