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
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <a data-toggle="modal" href="#profile-picture-modal"><img height="200" id="prof_pic"></a>
      <!-- <a class="btn btn-info waves-effect" href="<?= base_url().'employee/request_shift/'.$this->session->id?>">Shift</a> -->
      <!-- <a class="btn btn-info waves-effect" href="login/logout"><i class="fa fa-sign-out m-r-10"></i>Logout</a> -->
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
      <h2>User Information</h2>
      <?= $this->user->info('lastname') ?>,
      <?= $this->user->info('firstname') ?><br>
      <?= $this->user->info('email') ?>
      <br>
      <a data-toggle="modal" href="#edit-profile-modal">Edit Account Info</a>
    </div>

    <div class="col-md-12">
      <?php 
      $classification = $this->Crud_model->fetch('classification');
      ?>
      <h3>Remaining Allowance</h3><br>
      <?php foreach($classification as $row): 
          $c_name = strtolower($row->classification); 
          $allowance = $row->allowance_per_user;
          ?>
      <h5><?= $row->classification.': '. $user->$c_name ?></h5>
      <?php endforeach; ?>
    </div>

  </div><!-- row -->
</div><!-- container -->