
		<div class="container">
        <h3>Reimbursement</h3>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered exp-tbl" id="exptbl">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Classification</th>
                        <th>Date Requested</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="reimburse_data">
                    
                </tbody>
            </table>
        </div>
    </div>

    <?php $this->load->view('expense/partials/view_reimburse_modal') ?>