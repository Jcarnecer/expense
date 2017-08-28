<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function index() {
        parent::mainpage('dashboard/index',
            [
                'title' => 'Dashboard',
            ]
        );
    }
}