<div class="container">
    <h3 class="title">Classification</h3>
    <button type="button" class="btn btn-info custom-button float-right" data-toggle="modal" data-target="#add_modal">Add Classification</button>
    <hr>
    <!-- <div class="table-responsive"> -->
        <table class="table table-bordered exp-tbl table-responsive" id="exptbl">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Classification</th>
                    <th>Allowance</th>
                    <!-- <th>Budget</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="classification-data">
            
            </tbody>
        </table>
    <!-- </div> -->
</div>

<?php $this->load->view('expense/partials/add_classification_modal') ?>
<?php $this->load->view('expense/partials/edit_classification_modal') ?>
<?php $this->load->view('expense/partials/reset_allowance') ?>