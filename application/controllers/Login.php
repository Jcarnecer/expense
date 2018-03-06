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
        
                  
            if(parent::with_session()){
                
                return redirect('/');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
                $login_details    = [
                    "email_address" => $_POST["email_address"],
                    "password"      => $_POST["user_password"]
                ];

                $user = $this->Crud_model->fetch('users',$login_details);
                
                if($user != null) {
                    
                    $this->session->set_userdata('user', $user);
                    redirect('');
                }
            }

                return $this->load->view('dashboard');
    
            }
        
            public function logout() {
                $this->session->sess_destroy();
                return redirect('http://localhost/main');
            }
}
