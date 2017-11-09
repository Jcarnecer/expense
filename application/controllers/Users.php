<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    public function index() {
        parent::mainpage('users/index',
            [
                'title' => 'Dashboard',
            ]
        );
    }
    
    public function info($name,$id) {
        $decrypt_id = secret_url('decrypt',$id);
        $where = ['id'  => $decrypt_id];
        $user = $this->Crud_model->fetch_tag_row('*','users',$where);
        $pos_where = ['id' => $user->pos_id];
        $position = $this->Crud_model->fetch_tag_row('*','positions',$pos_where);
        parent::mainpage('users/info',
            [
                'title' => $user->firstname .' '.$user->lastname,
                'user' => $user,
                'position'  => $position->pos_name
            ]
        );
    }

    public function fetch_users() {
        $order_by = 'lastname asc';
        $users = $this->Crud_model->fetch('users','','','',$order_by);
        $classification = $this->Crud_model->fetch('classification');

        ?>
            <tr>
                <?php 
                $x = 1;
                foreach($users as $row): ?>
                <td><?= $x ?></td>
                <td><?= $row->firstname.' '.$row->lastname ?></td>
                <td><?= $row->email ?></td>
                <?php if($row->status == 1){ ?>
                        <td>Active</td>
                <?php }else{ ?>
                        <td>Inactive</td>
                <?php }
                
                foreach($classification as $c_row){ 
                    $allowance = $c_row->allowance_per_user;
                    $classify = strtolower($c_row->classification);
                    $user_classify = $row->$classify;
                    // print_r($allowance);die;
                    ?>
                    <td>
                        <?= $user_classify ?>
                    </td>
          <?php }
                ?>
                
                <td>
                    <div class="dropdown">
                        <button class="btn custom-button dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if($row->status == 1){ ?>
                            <a class="dropdown-item" href="users/deactivate/<?= secret_url('encrypt',$row->id) ?>">Deactivate</a>
                            <a class="dropdown-item user_details"
                            
                            href="user/<?= strtolower($row->lastname.''.$row->firstname).'/'.secret_url('encrypt',$row->id) ?> ">Details</a>
                        <?php }else{ ?>
                            <a class="dropdown-item" href="users/activate/<?= secret_url('encrypt',$row->id) ?>">Activate</a>
                            <a class="dropdown-item user_details" 
                            href="user/<?= strtolower($row->lastname.''.$row->firstname).'/'.secret_url('encrypt',$row->id) ?> ">Details</a>
                        <?php } ?>
                        <!--  //0 = inactive 1 = active -->
                        </div>
                    </div>
              </td>
            </tr>
        <?php
                $x +=1;
                endforeach;
    }


    public function activate($id){
        $decrypt_id = secret_url('decrypt',$id);
        $where = ['id' => $decrypt_id];

        $update_status = [
            'status'    => 1
        ];
        $this->Crud_model->update('users',$update_status,$where);
        redirect('users');
    }

    public function deactivate($id){
        $decrypt_id = secret_url('decrypt',$id);
        $where = ['id' => $decrypt_id];

        $update_status = [
            'status'    => 0
        ];
        $this->Crud_model->update('users',$update_status,$where);
        redirect('users');
    }

    public function auth() {
        if($this->form_validation->run('reg_validate') == FALSE){
            echo json_encode(validation_errors());
        }else{
            
            $generate_password 	= 	"expense";
            
            $insert_user = [
                'firstname'    		=>    clean_data(ucwords($this->input->post('firstname'))),
				'lastname'    		=>    clean_data(ucwords($this->input->post('lastname'))),
                'middlename'    	=>    clean_data(ucwords($this->input->post('middlename'))),
                'email'    	=>    clean_data($this->input->post('email')),
                'pos_id'  => $this->input->post('position'),
                'password'  => hash_password($generate_password),
                'profile_picture'   => 'no_image.jpg'
            ];
            $last_inserted_user = $this->Crud_model->last_inserted_row('users',$insert_user);
            $last_id = $last_inserted_user->id;
            $classification = $this->Crud_model->fetch('classification');
            foreach($classification as $row){
                $classification = $row->classification;
                $allowance = $row->allowance_per_user;
                $classify_lowercase = strtolower($classification);
                $data = [
                    $classify_lowercase => $allowance
                ];
                $where = ['id' => $last_id];
                $this->Crud_model->update('users',$data,$where);
            }

            echo json_encode('success');
        }
    }
}

