<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->classification = $this->Crud_model->fetch('expense_classification',['company_id'=>$this->session->user->company_id],'','','classification asc');
        
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
                <td><?= $row->allowance_per_user ?></td>
                <!-- <td> 
                    <button type="button" class="btn btn-primary edit_classification custom-button" data-toggle="modal" data-budget="<?= $row->budget ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" data-classification="<?= $row->classification ?>" data-allowance="<?= $row->allowance_per_user ?>"  data-target="#edit_modal">Edit</button>
                    <button type="button" class="btn btn-danger reset_allowance" data-toggle="modal" data-budget="<?= $row->budget ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" data-classification="<?= $row->classification ?>" data-allowance="<?= $row->allowance_per_user ?>"  data-target="#reset-allowance-modal">Reset Allowance</button>
                </td> -->
                <td>
                <div class="dropdown">
                <button class="btn custom-button dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item edit_classification" data-toggle="modal" data-budget="<?= $row->budget ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" data-classification="<?= $row->classification ?>" data-allowance="<?= $row->allowance_per_user ?>"  data-target="#edit_modal">Edit</a>
                    <a class="dropdown-item reset_allowance" data-toggle="modal" data-budget="<?= $row->budget ?>" data-id="<?= secret_url('encrypt',$row->id) ?>" data-classification="<?= $row->classification ?>" data-allowance="<?= $row->allowance_per_user ?>"  data-target="#reset-allowance-modal">Reset Allowance</a>
                </div>
              </div>
                </td>
            </tr>
            <?php 
            $x+=1; 
            endforeach;
        }
    }

    function fetch_request() {
        $order_by = 'created_at desc';
        $where = ['user_id' => $this->user->info('id'),'company_id'=>$this->session->user->company_id];
        $request = $this->Crud_model->fetch('expense_reimbursement',$where,'','',$order_by);
        $x = 1;
        if(!$request == NULL){
            foreach($request as $row): 
            $reimbursement_where = ['user_id' => $this->user->info('id')];
            $classify_reimbursement = $this->Crud_model->join_reimburse_row($row->classification_id);
            $users = $this->Crud_model->join_user_reimbursement($reimbursement_where);
            ?>
            <tr>
                <td><?= $x ?></td>
                <td><?= ucwords($users->first_name).' '.ucwords($users->last_name)  ?></td>
                <td><?= $classify_reimbursement->classification ?></td>
                <td>&#8369 <?= $row->amount ?></td>
                <td><?= date('F j, Y',strtotime($row->created_at)) ?></td>
                <?php if($row->status == '0'){ ?>
                    <td>Rejected</td>
                <?php }elseif($row->status == '1'){ ?>
                    <td>Approved</td>
                <?php }else{ ?>
                    <td>Pending</td>
                <?php } ?>  
                
            </tr>
            
            <?php $x+=1; endforeach;
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
                <td><?= ucwords($row->first_name).' '.ucwords($row->last_name) ?></td>
                <td><?= $classify_reimbursement->classification ?></td>
                <td><?= date('F j, Y',strtotime($row->rcreated_at)) ?></td>
                <td>&#8369 <?= $row->amount ?></td>
                <?php if($row->rstatus == '0'){ ?>
                    <td>Rejected</td>
                <?php }elseif($row->rstatus == '1'){ ?>
                    <td>Approved</td>
                <?php }else{ ?>
                    <td>Pending</td>
                <?php } ?>
                <td> 
                <div class="dropdown">
                <button class="btn custom-button dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <?php if($row->rstatus == 0){ ?>
                    <a class="dropdown-item" id="reimbursement-details" data-toggle="modal" data-amount="<?= $row->amount ?>" data-name = "<?= ucwords($row->first_name).' '.ucwords($row->last_name) ?>" data-classify="<?= $classify_reimbursement->classification ?>" data-receipt-img="<?= $row->receipt_img ?>" href="#view-request-modal">View</a>
                    
                  <?php }elseif($row->rstatus == 2){ ?>
                    <a class="dropdown-item" id="reimbursement-details" data-toggle="modal" data-amount="<?= $row->amount ?>" data-name = "<?= ucwords($row->first_name).' '.ucwords($row->last_name) ?>" data-classify="<?= $classify_reimbursement->classification ?>" data-receipt-img="<?= $row->receipt_img ?>" href="#view-request-modal">View</a>
                    <a class="dropdown-item" href="expense/approve/<?= secret_url('encrypt',$row->rid) ?>">Approve</a>
                    <a class="dropdown-item" href="expense/reject/<?= secret_url('encrypt',$row->rid) ?>">Reject</a>
                  <?php }else{ ?>
                    <a class="dropdown-item" id="reimbursement-details" data-toggle="modal" data-amount="<?= $row->amount ?>" data-name = "<?= ucwords($row->first_name).' '.ucwords($row->last_name) ?>" data-classify="<?= $classify_reimbursement->classification ?>" data-receipt-img="<?= $row->receipt_img ?>" href="#view-request-modal">View</a>
                    
                  <?php } ?>
                  <!--  //0 = rejected 1 = approve 2 = pending, -->
                </div>
              </div>
                </td>
            </tr>
            
            <?php $x+=1; endforeach;
        }
    }
    

    public function insert_classification() {
        if($this->form_validation->run('classification_validate')==FALSE){
            $error = [
                'a_error'   => form_error('allowance'),
                'b_error'   => form_error('budget'),
                'c_error'   => form_error('classification')
            ];
            echo json_encode($error);
        }else{
			
            // $insert_column = [
            //     clean_data(strtolower($this->input->post('classification'))) 
            //     => 
            //     [
            //         'type'  => 'float(8,2)',
            //         'null'  => TRUE
            //     ],
            // ];
            
            // $this->dbforge->add_column('expense_users',$insert_column);

            $insert = [
                'classification' => clean_data(ucwords($this->input->post('classification'))),
                'allowance_per_user' =>  clean_data($this->input->post('allowance')),
                'budget' =>  clean_data($this->input->post('budget')),
                'company_id'=>$this->session->user->company_id
            ];
            $classification=$this->Crud_model->last_inserted_row('expense_classification',$insert);
            $users=$this->Crud_model->fetch('users',['company_id'=>$this->session->user->company_id]);
            foreach($users as $row){
                
                $insert_users_classification=[
                     'users_id'=>$row->id,
                      'classification_id' =>$classification->id,
                     'remaining_reimbursement'=>clean_data($this->input->post('allowance'))
                ];
                $this->Crud_model->insert('expense_users_classification',$insert_users_classification);
            // $insert_allowance = [
            //     clean_data(strtolower($this->input->post('classification')))
            //     =>  clean_data($this->input->post('allowance'))
            // ];
            // $this->Crud_model->update('expense_users',$insert_allowance);

               
             }
             echo json_encode('success');
         }
    }
    
    public function edit_classification() {
		if($this->form_validation->run('edit_classification_validate')==FALSE){
            $error = [
                'a_error'   => form_error('allowance'),
                'b_error'   => form_error('budget'),
                'c_error'   => form_error('classification')
            ];
            echo json_encode($error);
        }else{
			$decrypt_id = secret_url('decrypt',$this->input->post('id'));
			$where = ['id' => $decrypt_id,'company_id'=>$this->session->user->company_id];
			$edit = [
				'classification' => clean_data(ucwords($this->input->post('classification'))),
				'allowance_per_user' => clean_data($this->input->post('allowance')),
				'budget' => clean_data($this->input->post('budget'))
			];
      
            $classification=$this->Crud_model->update('expense_classification',$edit,$where);
            $users=$this->Crud_model->fetch('users',['company_id'=>$this->session->user->company_id]);
              

            foreach($users as $row){
                
                $edit_users_classification=[
                     'remaining_reimbursement'=>clean_data($this->input->post('allowance'))
                ];
                $this->Crud_model->update('expense_users_classification',$edit_users_classification,['users_id'=>$row->id,'classification_id'=>$decrypt_id,'company_id'=>$this->session->user->company_id]);
          

                
             }
             echo json_encode("success");
		}

        
    }

    public function insert_request() {
        $config = array(
            'upload_path'   => 'assets/uploads',
            'allowed_types' => 'jpg|gif|png|jpeg|pdf',
            'max_size'		=> '2048',
            'encrypt_name' 	=> TRUE //encrypt filename
        );

        $this->load->library('upload', $config);
        if($this->input->post('receipt') == 1){
            $this->form_validation->set_rules('classification','Classification','required');
            $this->form_validation->set_rules('amount','Amount','required');
            $this->form_validation->set_rules('receipt','Receipt','required');
            $this->form_validation->set_rules('receipt_image','Receipt image','callback_handleimage');
        }else{
            $this->form_validation->set_rules('classification','Classification','required');
            $this->form_validation->set_rules('amount','Amount','required');
            $this->form_validation->set_rules('receipt','Receipt','required');
        }
        
        $where = ['id' => $this->input->post('classification'),'company_id'=>$this->session->user->company_id];
        $classification = $this->Crud_model->fetch_tag_row('*','expense_classification',$where);

        $user_where = ['users_id' => $this->user->info('id'),'classification_id'=>$classification->id,'company_id'=>$this->session->user->company_id];
        // $user = $this->Crud_model->fetch_tag_row('*','users',$user_where);
     
        $remaining=$this->Crud_model->fetch_tag_row('*','expense_users_classification',$user_where);
        $user_classification_col = $remaining->remaining_reimbursement;
        $amount = $this->input->post('amount');
        
        if($this->form_validation->run() == FALSE){
            echo json_encode(validation_errors());
        }else{
            
            if($amount > $user_classification_col){
                echo json_encode('Insuffient Allowance for '. $classification->classification);
            }else{
                if($this->input->post('receipt') == 1) {
                    $r_img = $this->upload->data('file_name');
                }else{
                    $r_img = 'noimage.png';
                }
                $insert = [
                    'user_id'   => $this->user->info('id'),
                    'status'    => 2, //0 = rejected 1 = approve 2 = pending,
                    'classification_id' => clean_data($this->input->post('classification')),
                    'receipt'   => $this->input->post('receipt'),
                    'amount'    => $amount,
                    'receipt_img'   => $r_img,
                    'company_id'=>$this->session->user->company_id
                ];
    
                $this->Crud_model->insert('expense_reimbursement',$insert);
                
                $where = ['id' => $this->input->post('classification')];
                $get_classification = $this->Crud_model->fetch_tag_row('*','expense_classification',$where);

                echo json_encode('success');
            }
        }
        
        
    }

    public function handleimage(){
        if (isset($_FILES['receipt_image']) && !empty($_FILES['receipt_image']['name'])){
            if ($this->upload->do_upload('receipt_image')){
                return true;
            }else{
                $this->form_validation->set_message('handleimage', $this->upload->display_errors());
                return false;
            }
        }else{
            $this->form_validation->set_message('handleimage', "You must upload Image");
            return false;
        }
    }

    public function reject($id) {
		$decrypt_id = secret_url('decrypt',$id);
		$where = array('id' => $decrypt_id,'company_id'=>$this->session->user->company_id);
		$update_status = [
			'status'	=> 0
		];
		$this->Crud_model->update('expense_reimbursement',$update_status,$where);
		redirect('reimbursement');
    }
    
    public function approve($id) {
        
		$decrypt_id = secret_url('decrypt',$id);
        $where = array('id' => $decrypt_id,'company_id'=>$this->session->user->company_id);
        
        $reimbursement = $this->Crud_model->fetch_tag_row('*','expense_reimbursement',$where);
        $update_status = [
			'status'	=> 1
		];
		$this->Crud_model->update('expense_reimbursement',$update_status,$where);
        //classification table
        $where_classify = ['id' => $reimbursement->classification_id,'company_id'=>$this->session->user->company_id];
        $classification = $this->Crud_model->fetch_tag_row('*','expense_classification',$where_classify);
        $classification_name = strtolower($classification->classification);
        
        //user
        $where_user = ['users_id' => $reimbursement->user_id,'company_id'=>$this->session->user->company_id];
        $user = $this->Crud_model->fetch_tag_row('*','expense_users_classification',$where_user);
        $less_allowance = $user->remaining_reimbursement - $reimbursement->amount;
        $user_allowance = $user->remaining_reimbursement;
        if($less_allowance < $user_allowance){
            $where= ['classification_id'=>$classification->id,'users_id' => $reimbursement->user_id,'company_id'=>$this->session->user->company_id];
            $update_status = [
                'remaining_reimbursement'=> $less_allowance
            ];
            $this->Crud_model->update('expense_users_classification',$update_status,$where_user);
            redirect('reimbursement');
        }else{
            echo "
            <script>
            <alert>No available balance for this user.</alert>
            </script>";
            
        }
        
    }
    
    public function approve_reset() {
        $id = $this->input->post('id');
        $decrypt_id = secret_url('decrypt',$id);
        $where = ['id' => $decrypt_id,'company_id'=>$this->session->user->company_id];
        $classify = $this->Crud_model->fetch_tag_row('*','expense_classification',$where);
        $classify_name = strtolower($classify->classification);
        $classify_allowance = $classify->allowance_per_user;
        $update_user = [
            'remaining_reimbursement' => $classify_allowance
        ];

        $this->Crud_model->update('expense_users_classification',$update_user,['classification_id'=>$classify->id,'company_id'=>$this->session->user->company_id]);

        echo json_encode('success');
    }
}
