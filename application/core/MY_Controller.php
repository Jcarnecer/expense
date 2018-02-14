<?php
class MY_Controller	extends CI_Controller
{
	function __construct() {

		parent::__construct();
		$this->load->helper('encryption_helper');
		$this->load->library('user');
		$this->load->model('Crud_model');
		$this->load->dbforge();
		// $this->Crud_model->set_update();
	}
	
	public function no_session() {
        if(!$this->session->userdata('user')) {
            redirect('login');
        }
    }

    public function with_session() {
    	if($this->session->has_userdata('user')) {
           return redirect('dashboard');
        }
    }

	function mainpage($location,$data=array()) {
		$this->no_session();
		$this->load->view('include/header',$data);
		$this->load->view('include/sidebar');
		$this->load->view('include/topbar');
		$this->load->view($location);
		$this->load->view('include/footer');
	}

	function loginpage($location,$data=array()) {
		$this->with_session();
		// $this->load->view('include/header',$data);
		// $this->load->view('include/sidebar');
		// $this->load->view('include/topbar');
		$this->load->view($location,$data);
		// $this->load->view('include/footer');
	}

}