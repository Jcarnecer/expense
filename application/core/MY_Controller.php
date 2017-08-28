<?php
class MY_Controller	extends CI_Controller
{


	function __construct() {

		parent::__construct();
		$this->load->helper('encryption_helper');
		$this->load->model('Crud_model');
		
    }

	function mainpage($location,$data=array()) {
		$this->load->view('include/header',$data);
		$this->load->view('include/sidebar');
		$this->load->view('include/topbar');
		$this->load->view($location);
		$this->load->view('include/footer');
	}

}