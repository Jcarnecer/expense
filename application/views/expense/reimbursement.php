
		<div class="container">
        <h3>Reimbursement</h3>
        <div class="table-responsive">
            <table class="table table-bordered" id="request-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Classification</th>
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

    <?php $this->load->view('expense/partials/request_modal') ?>