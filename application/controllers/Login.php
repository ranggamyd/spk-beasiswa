<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->check_login();
		$this->load->view('login');
	}

	public function proses_login()
	{
		$this->check_login();

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->User_model->get_by_username($username);

		if($user) {
			if(password_verify($password, $user->password)) {
				$this->session->set_userdata([
					'id_user'	=> $user->id_user,
					'user'		=> $user,
				]);

				redirect('dashboard');
				exit;
			}
		}

		$this->session->set_flashdata('message', 'Username/password salah');
		redirect('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function check_login()
	{
		if($this->session->userdata('id_user')) {
			redirect('dashboard');
			exit;
		}
	}
}
