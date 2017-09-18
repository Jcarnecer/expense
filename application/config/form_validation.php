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
        ],
    'edit_info_validate'
    =>	[
            [
                    'field'		=> 	'email',
                    'label'   	=> 	'Email address',
                    'rules'   	=> 	'required|valid_email',
                    'errors'  	=>	[
                                        'valid'   		=>	'You have entered invalid format for %s',
                                    ],
            ],

            [
                    'field'   	=>	'fname',
                    'label'   	=> 	'First Name',
                    'rules'   	=> 	'required|regex_match[/^([A-z-]|\s)+$/]',
                    'errors'	=> 	[
                                        'regex_match' 	=>	'Remove special characters in %s'
                                    ],
                
            ],

            [
                    'field'   	=>	'lname',
                    'label'   	=> 	'Last Name',
                    'rules'   	=> 	'required|regex_match[/^([A-z-]|\s)+$/]',
                    'errors'	=> 	[
                                        'regex_match' 	=> 	'Remove special characters in %s'
                                    ],
                
            ],
        ],
];