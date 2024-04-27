<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Setting_model');
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
	{}

	public function ganti_password()
	{
		$this->load->view('template', [
			'content'	=> 'setting/ganti_password'
		]);
	}

	public function simpan_password()
	{
		$user = $this->User_model->get_by_id($this->session->userdata('id_user'));

		if($user) {
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password');
			if(password_verify($old_password, $user->password)) {
				$this->User_model->update($user->id_user, [
					'password' => password_hash($new_password, PASSWORD_DEFAULT)
				]);
				$this->session->set_flashdata('success', 'Password berhasil diganti');
				redirect('setting/ganti_password');
			} else {
				$this->session->set_flashdata('old_password_error', 'Password lama salah');
				redirect('setting/ganti_password');
				exit();
			}
		}

		redirect('setting/ganti_password');
	}

	public function jumlah_penerimaan()
	{
		$settingJumlahPenerimaan = $this->Setting_model->get_by_nama('jumlah_penerimaan');
		if(!$settingJumlahPenerimaan) {
			$this->Setting_model->insert([
				'nama'	=> 'jumlah_penerimaan',
				'nilai'	=> 12
			]);
			$settingJumlahPenerimaan = $this->Setting_model->get_by_nama('jumlah_penerimaan');
		}
		$jumlah_penerimaan = $settingJumlahPenerimaan->nilai;

		$settingJumlahPenerimaCadangan = $this->Setting_model->get_by_nama('jumlah_penerima_cadangan');
		if(!$settingJumlahPenerimaCadangan) {
			$this->Setting_model->insert([
				'nama'	=> 'jumlah_penerima_cadangan',
				'nilai'	=> 2
			]);
			$settingJumlahPenerimaCadangan = $this->Setting_model->get_by_nama('jumlah_penerima_cadangan');
		}
		$jumlah_penerima_cadangan = $settingJumlahPenerimaCadangan->nilai;

		$this->load->view('template', [
			'content'			=> 'setting/jumlah_penerimaan',
			'jumlah_penerimaan'	=> $jumlah_penerimaan,
			'jumlah_penerima_cadangan'	=> $jumlah_penerima_cadangan,
		]);
	}

	public function simpan_jumlah_penerimaan()
	{
		$jumlah_penerimaan = $this->input->post('jumlah_penerimaan');

		$this->Setting_model->update('jumlah_penerimaan', [
			'nilai'	=> $jumlah_penerimaan
		]);

		$jumlah_penerima_cadangan = $this->input->post('jumlah_penerima_cadangan');

		$this->Setting_model->update('jumlah_penerima_cadangan', [
			'nilai'	=> $jumlah_penerima_cadangan
		]);

		redirect('setting/jumlah_penerimaan');
	}	
}
