<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    // ================= LOGIN USERS =================
    public function cek_login_users($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {

            return $query->row();

        } else {

            return false;
        }
    }

    // ================= LOGIN SAKSI =================
    public function cek_login_saksi($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get('saksi');

        if ($query->num_rows() > 0) {

            return $query->row();

        } else {

            return false;
        }
    }
   
}