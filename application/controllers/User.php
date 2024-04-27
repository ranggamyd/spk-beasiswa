<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('id_user'))) {
			redirect('login');
			exit;
		}
		$this->load->model('User_model');
		$this->load->model('Program_studi_model');
		$this->session->set_userdata([
			'user'		=> $this->User_model->get_by_id($this->session->userdata('id_user')),
		]);

		if($this->session->userdata('user')->role != 'Admin') {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->load->view('template', [
			'content'	=> 'user/index',
			'user'		=> $this->User_model->get_all(),
		]);
	}

	public function tambah()
	{
		$this->load->view('template', [
			'content'	=> 'user/tambah',
			'program_studi' => $this->Program_studi_model->get_all(),
		]);
	}

	public function proses_tambah()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');

		if ($this->form_validation->run() === FALSE) {
			$this->tambah();
		} else {
			$this->User_model->insert([
				'nama_lengkap'	=> $this->input->post('nama_lengkap'),
				'username'		=> $this->input->post('username'),
				'password'		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role'			=> $this->input->post('role'),
				'id_program_studi' => $this->input->post('id_program_studi'),
			]);
	
			redirect('user');
		}
	}

	public function edit($id)
	{
		$user = $this->User_model->get_by_id($id);
		$this->load->view('template', [
			'content'	=> 'user/edit',
			'user'		=> $user,
			'program_studi' => $this->Program_studi_model->get_all(),
		]);
	}

	public function proses_edit($id)
	{
		$user = $this->User_model->get_by_id($id);

		$this->form_validation->set_rules('username', 'Username', 'required');
		if ($user->username != $this->input->post('username')) {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		}

		if ($this->form_validation->run() === FALSE) {
			$this->edit($id);
		} else {
			$this->User_model->update($id, [
				'nama_lengkap'	=> $this->input->post('nama_lengkap'),
				'username'		=> $this->input->post('username'),
			]);
	
			$password = $this->input->post('password');
			if(!empty($password)) {
				$this->User_model->update($id, [
					'password'	=> password_hash($password, PASSWORD_DEFAULT),
				]);
			}
	
			redirect('user');
		}
		
	}

	public function hapus($id)
	{
		$this->User_model->delete($id);

		redirect('user');
	}

	
}
