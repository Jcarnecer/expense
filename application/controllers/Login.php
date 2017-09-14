<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function index() {
        parent::loginpage('login/index',
            [
                'title' => 'Login',
            ]
        );
    }

    public function auth() {
        
                if($this->form_validation->run('login_validate') == FALSE) {
                    echo json_encode(validation_errors());
                } else {
                    $email = clean_data($this->input->post('email'));
                    $password = clean_data($this->input->post('password'));
                    $where = array('email'=>$email);
                    $get_user = $this->Crud_model->fetch_tag_row('*','users',$where);
        
                    if($get_user) {
                        $check_password = $get_user->password;
                        if(password_verify($password,$check_password)) {
        
                            if($get_user->status == 1) {
                                $user_session = [
                                    'id'        => $get_user->id,
                                    'email'     => $get_user->email,
                                    'firstname' => $get_user->firstname,
                                    'lastname'  => $get_user->lastname,
                                    'profile_picture'   => $get_user->profile_picture,
                                ];
                                $this->session->set_userdata('user_logged_in',$user_session);
                                echo json_encode("success");
                            }elseif($get_user->status == 0){
                                echo json_encode("Your account is inactive. Contact our human resource department regarding this problem.");
                            }
                            
                        }else {
                            
                            echo json_encode("Invalid Credentials");
                        }
                        
                    }else{
                        echo json_encode("Invalid Credentials");
                    } 
                }
            }
        
            public function logout() {
                $this->session->sess_destroy();
                redirect('');
            }
}
