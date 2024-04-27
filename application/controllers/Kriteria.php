<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kriteria_model');
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
			'content'	=> 'kriteria/index',
			'kriteria'	=> $this->Kriteria_model->get_all(),
		]);
	}

	public function tambah()
	{
		$this->load->view('template', [
			'content'	=> 'kriteria/tambah'
		]);
	}

	public function proses_tambah()
	{
		$this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required|is_unique[kriteria.kode_kriteria]');
		$this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|is_unique[kriteria.nama_kriteria]');

		if ($this->form_validation->run() === FALSE) {
			$this->tambah();
		} else {
			$this->Kriteria_model->insert([
				'kode_kriteria'	=> $this->input->post('kode_kriteria'),
				'nama_kriteria'	=> $this->input->post('nama_kriteria'),
				'penggolongan'	=> $this->input->post('penggolongan'),
				'bobot'			=> $this->input->post('bobot'),
			]);
	
			redirect('kriteria');
		}
		
	}

	public function edit($id)
	{
		$kriteria = $this->Kriteria_model->get_by_id($id);
		$this->load->view('template', [
			'content'	=> 'kriteria/edit',
			'kriteria'	=> $kriteria,
		]);
	}

	public function proses_edit($id)
	{
		$kriteria = $this->Kriteria_model->get_by_id($id);

		$this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required');
		$this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required');
		if ($kriteria->kode_kriteria != $this->input->post('kode_kriteria')) {
			$this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required|is_unique[kriteria.kode_kriteria]');
		}
		if ($kriteria->nama_kriteria != $this->input->post('nama_kriteria')) {
			$this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|is_unique[kriteria.nama_kriteria]');
		}

		if ($this->form_validation->run() === FALSE) {
			$this->edit($id);
		} else {
			$this->Kriteria_model->update($id, [
				'kode_kriteria'	=> $this->input->post('kode_kriteria'),
				'nama_kriteria'	=> $this->input->post('nama_kriteria'),
				'penggolongan'	=> $this->input->post('penggolongan'),
				'bobot'			=> $this->input->post('bobot'),
			]);
	
			redirect('kriteria');
		}
		
	}

	public function hapus($id)
	{
		$this->Kriteria_model->delete($id);

		redirect('kriteria');
	}

	
}
