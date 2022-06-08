<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Iyoti extends CI_Model {

    public function CheckData($rfid) {
        $check = $this->db->get_where('user', ['rfid' => $rfid]);

        return $check;
    }

    public function GetAllData() {
        $check = $this->db->get('user');

        return $check;
    }

    public function InsertData($username, $rfid) {
        if(CheckData($rfid)->num_rows <= 0) {
            $this->db->insert('user', ['username' => $username, 'rfid' => $rfid]);
            return true;
        } else {
            return false;
        }
    }

}
?>