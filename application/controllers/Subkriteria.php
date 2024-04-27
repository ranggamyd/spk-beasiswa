<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kriteria_model');
		$this->load->model('Subkriteria_model');
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
		$kriteria_aktif = $this->Kriteria_model->get_one();
		$id_kriteria = null;

		if(isset($_GET['id_kriteria'])) {
			$kriteria = $this->Kriteria_model->get_by_id($_GET['id_kriteria']);
			if($kriteria) {
				$id_kriteria = $_GET['id_kriteria'];
				$kriteria_aktif = $kriteria;
			}
		} else {
			if($kriteria_aktif) {
				$id_kriteria = $kriteria_aktif->id_kriteria;
			}
		}

		$this->load->view('template', [
			'content'		=> 'subkriteria/index',
			'kriteria'		=> $this->Kriteria_model->get_all(),
			'kriteria_aktif'=> $kriteria_aktif,
			'subkriteria'	=> $this->Subkriteria_model->get_all($id_kriteria),
		]);
	}

	public function tambah()
	{
		$this->load->view('template', [
			'content'	=> 'subkriteria/tambah',
			'kriteria'		=> $this->Kriteria_model->get_all(),
		]);
	}

	public function proses_tambah()
	{
		$this->Subkriteria_model->insert([
			'id_kriteria'	=> $this->input->post('id_kriteria'),
			'range_awal'	=> $this->input->post('range_awal'),
			'range_akhir'	=> $this->input->post('range_akhir'),
			'kategori'		=> $this->input->post('kategori'),
			'nilai'			=> $this->input->post('nilai'),
		]);

		redirect('subkriteria?id_kriteria='.$this->input->post('id_kriteria'));
	}

	public function edit($id)
	{
		$subkriteria = $this->Subkriteria_model->get_by_id($id);
		$this->load->view('template', [
			'content'		=> 'subkriteria/edit',
			'kriteria'		=> $this->Kriteria_model->get_all(),
			'subkriteria'	=> $subkriteria,
		]);
	}

	public function proses_edit($id)
	{
		$this->Subkriteria_model->update($id, [
			'id_kriteria'	=> $this->input->post('id_kriteria'),
			'range_awal'	=> $this->input->post('range_awal'),
			'range_akhir'	=> $this->input->post('range_akhir'),
			'kategori'		=> $this->input->post('kategori'),
			'nilai'			=> $this->input->post('nilai'),
		]);

		redirect('subkriteria?id_kriteria='.$this->input->post('id_kriteria'));
	}

	public function hapus($id)
	{
		$subkriteria = $this->Subkriteria_model->get_by_id($id);
		$id_kriteria = $subkriteria->id_kriteria;
		$this->Subkriteria_model->delete($id);

		redirect('subkriteria?id_kriteria='.$id_kriteria);
	}

	
}
