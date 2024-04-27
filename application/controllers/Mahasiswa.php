<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		$this->load->model('Program_studi_model');
		$this->load->model('Kelompok_model');
		$this->load->model('Kriteria_model');
		$this->load->model('Subkriteria_model');
		if (empty($this->session->userdata('id_user'))) {
			redirect('login');
			exit;
		}
		$this->load->model('User_model');
		$this->session->set_userdata([
			'user'		=> $this->User_model->get_by_id($this->session->userdata('id_user')),
		]);

		if ($this->session->userdata('user')->role != 'Admin' && $this->session->userdata('user')->role != 'Sekprodi') {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->load->view('template', [
			'content'	=> 'mahasiswa/index',
			'mahasiswa'	=> $this->Mahasiswa_model->get_all(),
		]);
	}

	public function tambah()
	{
		$this->load->view('template', [
			'content'		=> 'mahasiswa/tambah',
			'program_studi' => $this->Program_studi_model->get_all(),
			'kelompok'		=> $this->Kelompok_model->get_all(),
		]);
	}

	public function proses_tambah()
	{
		$this->form_validation->set_rules('nrp', 'NRP Mahasiswa', 'required|is_unique[mahasiswa.nrp]');

		if ($this->form_validation->run() === FALSE) {
			$this->tambah();
		} else {
			$id_data_alternatif = $this->Mahasiswa_model->insert([
				'nama_mahasiswa'	=> $this->input->post('nama_mahasiswa'),
				'id_program_studi'	=> $this->input->post('id_program_studi'),
				'nrp'				=> $this->input->post('nrp'),
				'id_kelompok'		=> $this->input->post('id_kelompok'),
				'c1'				=> $this->input->post('c1'),
				'c2'				=> $this->input->post('c2'),
				'c3'				=> $this->input->post('c3'),
			]);

			redirect('mahasiswa');
		}
	}

	public function edit($id)
	{
		$mahasiswa = $this->Mahasiswa_model->get_by_id($id);
		$this->load->view('template', [
			'content'		=> 'mahasiswa/edit',
			'mahasiswa'		=> $mahasiswa,
			'program_studi'	=> $this->Program_studi_model->get_all(),
			'kelompok'		=> $this->Kelompok_model->get_all(),
		]);
	}

	public function proses_edit($id)
	{
		$mahasiswa = $this->Mahasiswa_model->get_by_id($id);

		$this->form_validation->set_rules('nrp', 'NRP Mahasiswa', 'required');
		if ($mahasiswa->nrp != $this->input->post('nrp')) {
			$this->form_validation->set_rules('nrp', 'NRP Mahasiswa', 'required|is_unique[mahasiswa.nrp]');
		}

		if ($this->form_validation->run() === FALSE) {
			$this->edit($id);
		} else {
			$this->Mahasiswa_model->update($id, [
				'nama_mahasiswa'	=> $this->input->post('nama_mahasiswa'),
				'id_program_studi'	=> $this->input->post('id_program_studi'),
				'nrp'				=> $this->input->post('nrp'),
				'id_kelompok'		=> $this->input->post('id_kelompok'),
				'c1'				=> $this->input->post('c1'),
				'c2'				=> $this->input->post('c2'),
				'c3'				=> $this->input->post('c3'),
			]);

			redirect('mahasiswa');
		}
	}

	public function hapus($id)
	{
		$this->Mahasiswa_model->delete($id);

		redirect('mahasiswa');
	}

	public function import()
	{
		$this->load->view('template', [
			'content'	=> 'mahasiswa/import',
			'kelompok'	=> $this->Kelompok_model->get_all(),
		]);
	}

	public function proses_import()
	{
		$config['upload_path']		= './uploads/';
		$config['allowed_types']	= 'xlsx';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_excel')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_upload', $error);
		} else {
			require_once APPPATH . 'third_party/simplexls/src/SimpleXLSX.php';
			$path = $this->upload->data('full_path');
			$xlsx = SimpleXLSX::parse($path);
			$i = 0;
			$kelompok = $this->input->post('id_kelompok');
			foreach ($xlsx->rows() as $row) {
				if ($i > 0) {
					$program_studi = $this->Program_studi_model->get_by_nama_program_studi($row[2]);
					$id_program_studi = null;
					if ($program_studi) {
						$id_program_studi = $program_studi->id_program_studi;
					} else {
						$id_program_studi = $this->Program_studi_model->insert([
							'nama_program_studi' => $row[2]
						]);
					}

					$c1 = trim($row[3]);
					$c2 = trim($row[4]);
					$c3 = trim($row[5]);

					$mahasiswa = $this->Mahasiswa_model->get_by_nrp($row[0]);
					if ($mahasiswa) {
						$id_mahasiswa = $mahasiswa->id_mahasiswa;
						$this->Mahasiswa_model->update($id_mahasiswa, [
							'nama_mahasiswa'	=> trim($row[1]),
							'id_program_studi'	=> $id_program_studi,
							'id_kelompok'		=> $kelompok,
							'c1'				=> $c1,
							'c2'				=> $c2,
							'c3'				=> $c3,
						]);
					} else {
						$id_mahasiswa = $this->Mahasiswa_model->insert([
							'nama_mahasiswa'	=> trim($row[1]),
							'id_program_studi'	=> $id_program_studi,
							'id_kelompok'		=> $kelompok,
							'nrp'				=> trim($row[0]),
							'c1'				=> $c1,
							'c2'				=> $c2,
							'c3'				=> $c3,
						]);
					}
				}
				$i++;
			}

			redirect('mahasiswa');
		}
	}
}
