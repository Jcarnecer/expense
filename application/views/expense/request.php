
            <div class="container">
            <h3>File Reimbursement</h3>
            <div class="table-responsive">
            <button type="button" class="btn btn-info custom-button float-right" data-toggle="modal" data-target="#request-modal">File Reimbursement</button>
                <table class="table table-bordered exp-tbl" id="exptbl">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Classification</th>
                            <th>Amount</th>
                            <th>Date Request</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="request_data">

                    </tbody>
                </table>
            </div>
        </div>

        <?php $this->load->view('expense/partials/request_modal') ?>