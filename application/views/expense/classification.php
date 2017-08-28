
		<div class="container">
        <h3>Classification</h3>
        <div class="table-responsive">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_modal">Add Classification</button>
            <table class="table table-bordered" id="classification-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Classification</th>
                        <th>Allowance</th>
                        <th>Remaining Allowance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="classification-data">
                
                </tbody>
            </table>
        </div>
    </div>

    <?php $this->load->view('expense/partials/add_classification_modal') ?>
    <?php $this->load->view('expense/partials/edit_classification_modal') ?>