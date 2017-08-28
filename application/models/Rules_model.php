<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rules_model extends CI_Model
{

    public $add_rules = array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|min_length[5]alpha|max_length[30]|trim|is_unique[users.username]',
            'errors' => array(
                'is_unique' => 'This username is busy.',
            ),

        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|max_length[100]|trim|valid_email|is_unique[users.email]',
            'errors' => array(
                'is_unique' => 'This email is busy.',
            ),

        ), array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[5]|max_length[30]|trim'

        ),
        array(
            'field' => 'repeat_pass',
            'label' => 'Repeat Password',
            'rules' => 'required|matches[password]'

        ),

    );

}