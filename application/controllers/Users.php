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
                'password'  => hash_password($generate_password)
            ];
            $this->Crud_model->insert('users',$insert_user);

            echo json_encode('success');
        }
    }
}

