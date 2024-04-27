<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kelompok_model');
		if(empty($this->session->userdata('id_user'))) {
			redirect('login');
			exit;
		}

		if($this->session->userdata('user')->role != 'Admin') {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->load->view('template', [
			'content'	=> 'kelompok/index',
			'kelompok'	=> $this->Kelompok_model->get_all(),
		]);
	}

	public function tambah()
	{
		$this->load->view('template', [
			'content'	=> 'kelompok/tambah'
		]);
	}

	public function proses_tambah()
	{
		$this->form_validation->set_rules('nama_kelompok', 'Nama Beasiswa', 'required|is_unique[kelompok.nama_kelompok]');

		if ($this->form_validation->run() === FALSE) {
			$this->tambah();
		} else {
			$this->Kelompok_model->insert([
				'nama_kelompok'	=> $this->input->post('nama_kelompok'),
			]);
	
			redirect('kelompok');
		}
	}

	public function edit($id)
	{
		$kelompok = $this->Kelompok_model->get_by_id($id);
		$this->load->view('template', [
			'content'	=> 'kelompok/edit',
			'kelompok'	=> $kelompok,
		]);
	}

	public function proses_edit($id)
	{
		$kelompok = $this->Kelompok_model->get_by_id($id);

		$this->form_validation->set_rules('nama_kelompok', 'Nama Beasiswa', 'required');
		if ($kelompok->nama_kelompok != $this->input->post('nama_kelompok')) {
			$this->form_validation->set_rules('nama_kelompok', 'Nama Beasiswa', 'required|is_unique[kelompok.nama_kelompok]');
		}

		if ($this->form_validation->run() === FALSE) {
			$this->edit($id);
		} else {
			$this->Kelompok_model->update($id, [
				'nama_kelompok'	=> $this->input->post('nama_kelompok'),
			]);
	
			redirect('kelompok');
		}
	}

	public function hapus($id)
	{
		$this->Kelompok_model->delete($id);

		redirect('kelompok');
	}

	
}
