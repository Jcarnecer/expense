<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allowance extends MY_Controller {

    public function index() {
        $id = $this->user->info('id');
        $where = ['id'  => $id];
        $user = $this->Crud_model->fetch_tag_row('*','users',$where);
        parent::mainpage('allowance/index',
            [
                'title' => 'Allowance',
                'user'  => $user
            ]
        );
    }
}