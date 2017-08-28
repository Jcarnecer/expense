<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->classification = $this->Crud_model->fetch('classification','','','','classification asc');
        
    }
    
    public function index() {
        parent::mainpage('expense/index',
            [
                'title' => 'List',
            ]
        );
    }

    public function request() {
        parent::mainpage('expense/request',
        [
            'title' => 'Classification',
        ]
    );
    }

    public function classification() {
        parent::mainpage('expense/classification',
            [
                'title' => 'Classification',
            ]
        );
    }

    public function reimbursement() {
        parent::mainpage('expense/reimbursement',
            [
                'title' => 'Reimbursement',
            ]
        );
    }

    function fetch_classification() {
        $x = 1;
        if(!$this->classification == NULL){
            foreach($this->classification as $row): ?>
            <tr>
                <td><?= $x ?></td>
                <td><?= $row->classification ?></td>
                <td><?= $row->allowance ?></td>
                <td><?= $row->remaining_allowance ?></td>
                <td> 
                <button type="button" class="btn btn-primary edit_classification" data-toggle="modal" data-remaining="<?= $row->remaining_allowance ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" data-classification="<?= $row->classification ?>" data-allowance="<?= $row->allowance ?>"  data-target="#edit_modal">Edit</button>
                </td>
            </tr>
            
            <?php $x+=1; endforeach;
        }else{
            echo "no data";
        }
    }

    function fetch_request() {
        $request = $this->Crud_model->fetch('reimbursement');
        $x = 1;
        if(!$request == NULL){
            foreach($request as $row): 
            $reimbursement_where = ['user_id' => 2];
            $classify_reimbursement = $this->Crud_model->join_reimburse_row($row->classification_id);
            $users = $this->Crud_model->join_user_reimbursement($reimbursement_where);
            ?>
            <tr>
                <td><?= $x ?></td>
                <td><?= $users->firstname.' '.$users->lastname  ?></td>
                <td><?= $classify_reimbursement->classification ?></td>
                <td><?= $row->amount ?></td>
                <?php if($row->status == '0'){ ?>
                    <td>Rejected</td>
                <?php }elseif($row->status == '1'){ ?>
                    <td>Approved</td>
                <?php }else{ ?>
                    <td>Pending</td>
                <?php } ?>  
                
                <td> 
                <!-- <button type="button" class="btn btn-primary edit_classification" data-toggle="modal" data-remaining="<?= $row->remaining_allowance ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" data-classification="<?= $row->classification ?>" data-allowance="<?= $row->allowance ?>"  data-target="#edit_modal">Edit</button> -->
                </td>
            </tr>
            
            <?php $x+=1; endforeach;
        }else{
            echo "no data";
        }
    }
    
    function fetch_reimbursement() {
        $request = $this->Crud_model->join_user_reimbursement_result();
        // $request = $this->Crud_model->fetch('reimbursement');
        $x = 1;
        if(!$request == NULL){
            foreach($request as $row): 
            $classify_reimbursement = $this->Crud_model->join_reimburse_row($row->classification_id);
           
            ?>
            <tr>
                <td><?= $x ?></td>
                <td><?= $row->firstname.' '.$row->lastname ?></td>
                <td><?= $classify_reimbursement->classification ?></td>
                <td><?= $row->amount ?></td>
                <?php if($row->rstatus == '0'){ ?>
                    <td>Rejected</td>
                <?php }elseif($row->rstatus == '1'){ ?>
                    <td>Approved</td>
                <?php }else{ ?>
                    <td>Pending</td>
                <?php } ?>
                <td> 
                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <?php if($row->rstatus == 0){ ?>
                    <a class="dropdown-item" href="#">View</a>
                  <?php }elseif($row->rstatus == 2){ ?>
                    <a class="dropdown-item" href="#">View</a>
                    <a class="dropdown-item" href="expense/approve/<?= secret_url('encrypt',$row->rid) ?>">Approve</a>
                    <a class="dropdown-item" href="expense/reject/<?= secret_url('encrypt',$row->rid) ?>">Reject</a>
                  <?php }else{ ?>
                    <a class="dropdown-item" href="#">View</a>
                  <?php } ?>
                  <!--  //0 = rejected 1 = approve 2 = pending, -->
                </div>
              </div>
                </td>
            </tr>
            
            <?php $x+=1; endforeach;
        }else{
            echo "no data";
        }
    }
    

    public function insert_classification() {
        $insert = [
            'classification' => clean_data(ucwords($this->input->post('classification'))),
            'allowance' => clean_data($this->input->post('allowance')),
            'remaining_allowance' => clean_data($this->input->post('allowance'))
        ];
        $this->Crud_model->insert('classification',$insert);
        echo json_encode("success");
    }
    
    public function edit_classification() {
        $decrypt_id = secret_url('decrypt',$this->input->post('id'));
        $where = ['id' => $decrypt_id];
        $edit = [
            'classification' => clean_data(ucwords($this->input->post('classification'))),
            'allowance' => clean_data($this->input->post('allowance')),
            'remaining_allowance' => clean_data($this->input->post('r_allowance'))
        ];
        $this->Crud_model->update('classification',$edit,$where);
        echo json_encode("success");
    }

    public function insert_request() {
        $config = array(
            'upload_path'   => 'assets/uploads',
            'allowed_types' => 'jpg|gif|png|jpeg|pdf',
            'max_size'		=> '2048',
            'encrypt_name' 	=> TRUE //encrypt filename
        );

        $this->load->library('upload', $config);
        $this->form_validation->set_rules('receipt_image','Receipt image','callback_handleimage');
        $this->form_validation->set_rules('classification','Classification','required');
        $this->form_validation->set_rules('amount','Amount','required');
        $this->form_validation->set_rules('receipt','Receipt image','receipt');
        
        $where = ['id' => $this->input->post('classification')];
        $classification = $this->Crud_model->fetch_tag_row('*','classification',$where);
        $amount = $this->input->post('amount');
        if($this->form_validation->run() == FALSE){
            echo json_encode(validation_errors());
        }else{
            if($classification->remaining_allowance < $amount){
                echo json_encode('Insuffient Allowance for '. $classification->classification);
            }else{
                $insert = [
                    'user_id'   => 1,
                    'status'    => 2, //0 = rejected 1 = approve 2 = pending,
                    'classification_id' => clean_data($this->input->post('classification')),
                    'receipt'   => $this->input->post('receipt'),
                    'amount'    => $amount,
                    'receipt_img'   => $this->upload->data('file_name')
                ];
    
                $this->Crud_model->insert('reimbursement',$insert);
                echo json_encode('success');
            }
        }
        
        
    }

    function handleimage(){
        if (isset($_FILES['receipt_image']) && !empty($_FILES['receipt_image']['name'])){
            if ($this->upload->do_upload('receipt_image')){
                return true;
            }else{
              $this->form_validation->set_message('handleimage', $this->upload->display_errors());
                return false;
            }
        }
    }

    public function reject($id) {
		$decrypt_id = secret_url('decrypt',$id);
		$where = array('id' => $decrypt_id);
		$update_status = [
			'status'	=> 0
		];
		$this->Crud_model->update('reimbursement',$update_status,$where);
		redirect('expense/reimbursement');
    }
    
    public function approve($id) {
		$decrypt_id = secret_url('decrypt',$id);
		$where = array('id' => $decrypt_id);
		$update_status = [
			'status'	=> 1
		];
		$this->Crud_model->update('reimbursement',$update_status,$where);
		redirect('expense/reimbursement');
	}
}