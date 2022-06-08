<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iyoti extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_Iyoti');
	}
 
	public function index()
	{
		$this->home();
    }
    
    public function home() {
        $this->load->view("homepage");
    }

    public function GetAllData($token) {
        if($token == "a1b2c3d4f5d6e") {
            $res = $this->M_Iyoti->GetAllData()->row_array();
            $status = '200';
        } else {
            $res = null;
            $status = '404';
        }

        $return = ['data' => $res, 'status' => $status];
        header('Content-Type: application/json');
        echo json_encode($return);
    }

    public function CheckData($rfid) {
        $res = $this->M_Iyoti->GetAllData()->num_rows();
        if($res > 0) {
            $res = true;
            $status = '200';
        } else {
            $res = false;
            $status = '404';
        }

        $return = [array('data' => $res, 'status' => $status)];
        header('Content-Type: application/json');
        echo json_encode($return);
    }

    public function GetData($token, $rfid) {
        if($token == "a1b2c3d4f5d6e") {
            $res = $this->M_Iyoti->CheckData($rfid)->row_array();
            $status = '200';
        } else {
            $res = null;
            $status = '404';
        }

        $return = ['data' => $res, 'status' => $status];
        header('Content-Type: application/json');
        echo json_encode($return);
    }

    public function InsertData() {

        $token = $this->input->post('token');
        $name = $this->input->post('name');
        $rfid = $this->input->post('rfid');

        if($token == "a1b2c3d4f5d6e") {
            $res = $this->M_Iyoti->InsertData($name, $rfid);
            if($res) {
                $status = '200';
            } else {
                $status = '400';
            }
        } else {
            $status = '404';
        }

        $return = ['status' => $status];
        header('Content-Type: application/json');
        echo json_encode($return);
    }
}

?>