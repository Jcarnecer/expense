<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function index() {
        $position = $this->user->info('role');
		 $where = array('role_id' => $position);
        parent::mainpage('dashboard/index',
            [
                'title' => 'Dashboard',
                'permission'=>$this->Crud_model->fetch('roles_permissions',$where,array('EXP_ADMIN,EXP_EMP')),
            ]
        );
    }
}