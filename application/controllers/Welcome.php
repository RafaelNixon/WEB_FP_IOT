<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	function __construct(){
		parent::__construct();		
		$this->load->model('m_account');
	}
 
	public function index()
	{
		$this->login();
	}

	public function login() {

		if($this->session->has_userdata('username')) {
			redirect(base_url('welcome/account'));
		}

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			
			$username = htmlspecialchars($this->input->post('username'));
			$password = md5($this->input->post('password'));

			$cek = $this->m_account->CheckData($username,$password)->num_rows();
			if($cek > 0){
				
				$this->session->set_userdata(['username' => $username]);
				
				redirect(base_url("welcome/account"));
	
			} else {
				echo "Invalid username or password!";
			}
		
		}
	}

	public function register() {
		
		if($this->session->has_userdata('username')) {
			redirect(base_url('welcome/account'));
		}

		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[24]');
		$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register');
		}
		else
		{
			
			$username = htmlspecialchars($this->input->post('username'));
			$password = md5($this->input->post('password'));

			$cek = $this->m_account->CheckUsername($username)->num_rows();
			if($cek < 1) {
	
				// $this->form_validation->set_message('register_success', 'Your new account has succesfuly created. You can login now');
				
				$this->m_account->InsertData($username, $password);

				redirect(base_url("welcome/login"));
	
			} else {
				echo "Invalid username or password!";
			}
		
		}
	}
	
	public function account() {

		if($this->session->has_userdata('username')) {
			$data['user'] = $this->m_account->CheckUsername($this->session->userdata('username'))->result();
			$this->load->view('account', $data);
		} else {
			redirect(base_url('welcome/login'));
		}

	}

	public function logout() {
		if(!$this->session->has_userdata('username')) {
			redirect(base_url('welcome/login'));
		}

		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('welcome/login');
	}
}

?>