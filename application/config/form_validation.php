<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config =
[
    'login_validate'
    =>	[
            [
                'field'		=> 	'email',
                'label'   	=> 	'Email address',
                'rules'   	=> 	'required|valid_email'
            ],

            [
                'field'		=> 	'password',
                'label'   	=> 	'Password',
                'rules'  	=> 	'required',
            ],
        ],

    'reg_validate'
    =>	[
            [
                'field'		=> 	'email',
                'label'   	=> 	'Email address',
                'rules'   	=> 	'required|valid_email|is_unique[users.email]',
                'errors'    => [
                                    'is_unique' => '%s already taken.'
                                ]
            ],

            [
                'field'		=> 	'firstname',
                'label'   	=> 	'First name',
                'rules'   	=> 	'required'
            ],

            [
                'field'		=> 	'lastname',
                'label'   	=> 	'Last name',
                'rules'  	=> 	'required',
            ],
        ],
    
    'classification_validate'
    =>  [
            [
                'field'		=> 	'classification',
                'label'   	=> 	'Classification',
                'rules'  	=> 	'required',
            ],
            [
                'field'		=> 	'allowance',
                'label'   	=> 	'Allowance',
                'rules'  	=> 	'required',
            ],
            [
                'field'		=> 	'budget',
                'label'   	=> 	'Budget',
                'rules'  	=> 	'required',
            ],
        ]
];