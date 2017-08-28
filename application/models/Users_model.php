<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result();

    }

    function add_user($data)
    {
        $this->db->insert('users', $data);
    }

    function can_login($username)
    { $this->db->where('username', $username);

        $query = $this->db->get('users');
      $a = $query->result();
        foreach ($a as $row)
        {return $row->password;}
    }

    public function validate_password($password, $model_password) {
        if (password_verify($password, $model_password)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }




}