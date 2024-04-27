<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Program_studi_model');
		$this->load->model('Kelompok_model');
		$this->load->model('Mahasiswa_model');
		if(empty($this->session->userdata('id_user'))) {
			redirect('login');
			exit;
		}
		$this->load->model('User_model');
		$this->session->set_userdata([
			'user'		=> $this->User_model->get_by_id($this->session->userdata('id_user')),
		]);
	}

	public function index()
	{
		$this->load->view('template', [
			'content'	=> 'dashboard'
		]);
	}

	
}
