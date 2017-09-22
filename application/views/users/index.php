<?php $classification = $this->Crud_model->fetch('classification') ?>
    <div class="container-fluid">
        <h3 class="title">Add Users</h3>
        <!-- <div class=""> -->
        <button type="button" class="btn btn-info custom-button float-right" data-toggle="modal" data-target="#add-users-modal">Add Users</button>
        <hr>
            
            <table class="table table-bordered exp-tbl" id="exptbl">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <?php foreach($classification as $row){ ?>
                            <th><?= $row->classification ?></th>
                        <?php } ?>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="users_data">

                </tbody>
            </table>
        <!-- </div> -->
    </div>

<?php $this->load->view('users/partials/add_user_modal') ?>