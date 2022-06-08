<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Account extends CI_Model {

    public function CheckData($username, $password) {
        $check = $this->db->get_where('user', ['username' => $username, 'password' => $password]);

        return $check;
    }

    public function CheckUsername($username) {
        $check = $this->db->get_where('user', ['username' => $username]);

        return $check;
    }

    public function InsertData($username, $password) {
        $this->db->insert('user', ['username' => $username, 'password' => $password]);
    }

}
?>