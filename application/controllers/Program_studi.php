<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_studi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Program_studi_model');
		if(empty($this->session->userdata('id_user'))) {
			redirect('login');
			exit;
		}
		$this->load->model('User_model');
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
			'content'		=> 'program_studi/index',
			'program_studi'	=> $this->Program_studi_model->get_all(),
		]);
	}

	public function tambah()
	{
		$this->load->view('template', [
			'content'	=> 'program_studi/tambah'
		]);
	}

	public function proses_tambah()
	{
		$this->form_validation->set_rules('nama_program_studi', 'Nama Program Studi', 'required|is_unique[program_studi.nama_program_studi]');

		if ($this->form_validation->run() === FALSE) {
			$this->tambah();
		} else {
			$this->Program_studi_model->insert([
				'nama_program_studi'	=> $this->input->post('nama_program_studi'),
			]);
	
			redirect('program_studi');
		}
	}

	public function edit($id)
	{
		$program_studi = $this->Program_studi_model->get_by_id($id);
		$this->load->view('template', [
			'content'		=> 'program_studi/edit',
			'program_studi'	=> $program_studi,
		]);
	}

	public function proses_edit($id)
	{
		$program_studi = $this->Program_studi_model->get_by_id($id);

		$this->form_validation->set_rules('nama_program_studi', 'Nama Program Studi', 'required');
		if ($program_studi->nama_program_studi != $this->input->post('nama_program_studi')) {
			$this->form_validation->set_rules('nama_program_studi', 'Nama Program Studi', 'required|is_unique[program_studi.nama_program_studi]');
		}

		if ($this->form_validation->run() === FALSE) {
			$this->edit($id);
		} else {
			$this->Program_studi_model->update($id, [
				'nama_program_studi'	=> $this->input->post('nama_program_studi'),
			]);
	
			redirect('program_studi');
		}
	}

	public function hapus($id)
	{
		$this->Program_studi_model->delete($id);

		redirect('program_studi');
	}

	
}
