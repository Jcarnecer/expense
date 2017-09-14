<?php
if (!defined('BASEPATH')) exit('No direct access allowed');

class User {

	protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('Crud_model');
    }

    public function info($col) {
        $sess = $this->CI->session->userdata('user_logged_in');
        $where = [ 'id' => $sess['id'] ];
        $userinfo = $this->CI->Crud_model->fetch_tag_row('*','users',$where);
        if(!$userinfo == NULL) {
            return $userinfo->$col; 
        }else{
            echo "Opps! Something went Wrong!";
        }
    }
}