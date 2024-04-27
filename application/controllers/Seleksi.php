<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seleksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hasil_seleksi_model');
		$this->load->model('Detail_hasil_seleksi_model');
		$this->load->model('Kelompok_model');
		$this->load->model('Kriteria_model');
		$this->load->model('Subkriteria_model');
		$this->load->model('Mahasiswa_model');
		$this->load->model('Setting_model');
		if (empty($this->session->userdata('id_user'))) {
			redirect('login');
			exit;
		}
		$this->load->model('User_model');
		$this->session->set_userdata([
			'user'		=> $this->User_model->get_by_id($this->session->userdata('id_user')),
		]);
		$this->load->library('pdf');
	}

	public function index()
	{
		$this->load->view('template', [
			'content'		=> 'seleksi/index',
			'hasil_seleksi'	=> $this->Hasil_seleksi_model->get_all(),
		]);
	}

	public function tambah()
	{
		$this->load->view('template', [
			'content'	=> 'seleksi/tambah',
			'kelompok'	=> $this->Kelompok_model->get_all(),
		]);
	}

	public function hasil()
	{
		$id_kelompok = $_GET['id_kelompok'];
		$kelompok = $this->Kelompok_model->get_by_id($id_kelompok);
		$mahasiswa = $this->Mahasiswa_model->get_by_where([
			'mahasiswa.id_kelompok' => $id_kelompok
		]);

		$kriteria_c1 = $this->Kriteria_model->get_by_kode_kriteria('C1');
		$kriteria_c2 = $this->Kriteria_model->get_by_kode_kriteria('C2');
		$kriteria_c3 = $this->Kriteria_model->get_by_kode_kriteria('C3');
		$c1 = [];
		$c2 = [];
		$c3 = [];

		$results = [
			'matriks_keputusan' => [],
			'matriks_ternormalisasi' => [],
			'hasil' => [],
			'bobot_preferensi' => (object) [
				'c1' => $kriteria_c1 ? $kriteria_c1->bobot : 0,
				'c2' => $kriteria_c2 ? $kriteria_c2->bobot : 0,
				'c3' => $kriteria_c3 ? $kriteria_c3->bobot : 0,
			]
		];

		foreach ($mahasiswa as $mhs) {
			$matriks_keputusan = (object) [
				'nama_mahasiswa' => $mhs->nama_mahasiswa,
				'nrp'			=> $mhs->nrp,
				'c1'			=> 0,
				'c2'			=> 0,
				'c3'			=> 0,
			];

			if ($kriteria_c1) {
				$id_subkriteria = null;
				$subkriteria = $this->Subkriteria_model->get_by_id_kriteria($kriteria_c1->id_kriteria);
				$nilai = 0;
				foreach ($subkriteria as $sub) {
					if ($mhs->c1 >= $sub->range_awal && $mhs->c1 <= $sub->range_akhir) {
						$id_subkriteria = $sub->id_subkriteria;
						$nilai = $sub->nilai;
					}
				}
				$c1[] = $nilai;
				$matriks_keputusan->c1 = $nilai;
			}

			if ($kriteria_c2) {
				$id_subkriteria = null;
				$subkriteria = $this->Subkriteria_model->get_by_id_kriteria($kriteria_c2->id_kriteria);
				$nilai = 0;
				foreach ($subkriteria as $sub) {
					if ($mhs->c2 >= $sub->range_awal && $mhs->c2 <= $sub->range_akhir) {
						$id_subkriteria = $sub->id_subkriteria;
						$nilai = $sub->nilai;
					}
				}
				$c2[] = $nilai;
				$matriks_keputusan->c2 = $nilai;
			}

			if ($kriteria_c3) {
				$id_subkriteria = null;
				$subkriteria = $this->Subkriteria_model->get_by_id_kriteria($kriteria_c3->id_kriteria);
				$nilai = 0;
				foreach ($subkriteria as $sub) {
					if ($mhs->c3 >= $sub->range_awal && $mhs->c3 <= $sub->range_akhir) {
						$id_subkriteria = $sub->id_subkriteria;
						$nilai = $sub->nilai;
					}
				}
				$c3[] = $nilai;
				$matriks_keputusan->c3 = $nilai;
			}

			$results['matriks_keputusan'][] = $matriks_keputusan;
		}

		$iteratorAlternatif = 0;

		foreach ($mahasiswa as $mhs) {
			$hasil = 0;
			$matriks_ternormalisasi = (object) [
				'nama_mahasiswa' => $mhs->nama_mahasiswa,
				'nrp'			=> $mhs->nrp,
				'c1'			=> 0,
				'c2'			=> 0,
				'c3'			=> 0,
			];

			$results['hasil'][$iteratorAlternatif] = $mhs;

			if ($kriteria_c1) {
				if ($kriteria_c1->penggolongan == 'Cost') {
					$matriks_ternormalisasi->c1 = min($c1) / $c1[$iteratorAlternatif];
				} else {
					$matriks_ternormalisasi->c1 = $c1[$iteratorAlternatif] / max($c1);
				}
				$hasil += $matriks_ternormalisasi->c1 * $kriteria_c1->bobot / 100;
			}

			if ($kriteria_c2) {
				if ($kriteria_c2->penggolongan == 'Cost') {
					$matriks_ternormalisasi->c2 = min($c2) / $c2[$iteratorAlternatif];
				} else {
					$matriks_ternormalisasi->c2 = $c2[$iteratorAlternatif] / max($c2);
				}
				$hasil += $matriks_ternormalisasi->c2 * $kriteria_c2->bobot / 100;
			}

			if ($kriteria_c3) {
				if ($kriteria_c2->penggolongan == 'Cost') {
					$matriks_ternormalisasi->c3 = min($c3) / $c3[$iteratorAlternatif];
				} else {
					$matriks_ternormalisasi->c3 = $c3[$iteratorAlternatif] / max($c3);
				}
				$hasil += $matriks_ternormalisasi->c3 * $kriteria_c3->bobot / 100;
			}

			$matriks_ternormalisasi->c1 = round($matriks_ternormalisasi->c1, 2);
			$matriks_ternormalisasi->c2 = round($matriks_ternormalisasi->c2, 2);
			$matriks_ternormalisasi->c3 = round($matriks_ternormalisasi->c3, 2);

			$results['hasil'][$iteratorAlternatif]->hasil = round($hasil, 2);
			$results['hasil'][$iteratorAlternatif]->c1 = $matriks_ternormalisasi->c1;
			$results['hasil'][$iteratorAlternatif]->c2 = $matriks_ternormalisasi->c2;
			$results['hasil'][$iteratorAlternatif]->c3 = $matriks_ternormalisasi->c3;
			$iteratorAlternatif++;
			$results['matriks_ternormalisasi'][] = $matriks_ternormalisasi;
		}

		$hasil = $results['hasil'];

		if (count($hasil) > 0) {
			usort($hasil, function ($a, $b) {
				return $a->hasil <=> $b->hasil;
			});
		}
		$hasil = array_reverse($hasil);
		$diterima = [];
		$cadangan = [];
		$i = 0;

		$settingJumlahPenerimaan = $this->Setting_model->get_by_nama('jumlah_penerimaan');
		if (!$settingJumlahPenerimaan) {
			$this->Setting_model->insert([
				'nama'	=> 'jumlah_penerimaan',
				'nilai'	=> 12
			]);
			$settingJumlahPenerimaan = $this->Setting_model->get_by_nama('jumlah_penerimaan');
		}
		$jumlah_penerimaan = $settingJumlahPenerimaan->nilai;

		$settingJumlahPenerimaCadangan = $this->Setting_model->get_by_nama('jumlah_penerima_cadangan');
		if (!$settingJumlahPenerimaCadangan) {
			$this->Setting_model->insert([
				'nama'	=> 'jumlah_penerima_cadangan',
				'nilai'	=> 12
			]);
			$settingJumlahPenerimaCadangan = $this->Setting_model->get_by_nama('jumlah_penerima_cadangan');
		}
		$jumlah_penerima_cadangan = $settingJumlahPenerimaCadangan->nilai;

		foreach ($hasil as $h) {
			if ($i < $jumlah_penerimaan) {
				$diterima[] = $h->id_mahasiswa;
			}
			if (($i > $jumlah_penerimaan) && ($i <= $jumlah_penerimaan + $jumlah_penerima_cadangan)) {
				$cadangan[] = $h->id_mahasiswa;
			}
			$i++;
		}

		$i = 0;
		foreach ($results['hasil'] as $hsl) {
			$results['hasil'][$i]->status = 'Ditolak';
			if (in_array($hsl->id_mahasiswa, $diterima)) {
				$results['hasil'][$i]->status = 'Diterima';
			}
			if (in_array($hsl->id_mahasiswa, $cadangan)) {
				$results['hasil'][$i]->status = 'Cadangan';
			}
			$i++;
		}

		$this->load->view('template', [
			'content'	=> 'seleksi/hasil',
			'hasil'		=> $results,
		]);
	}


	public function simpan_hasil()
	{
		$id_kelompok = $_GET['id_kelompok'];
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$nrp = $this->input->post('nrp');
		$id_program_studi = $this->input->post('id_program_studi');
		$c1 = $this->input->post('c1');
		$c2 = $this->input->post('c2');
		$c3 = $this->input->post('c3');
		$hasil = $this->input->post('hasil');
		$status = $this->input->post('status');

		$id_hasil_seleksi = $this->Hasil_seleksi_model->insert([
			'id_kelompok'	=> $id_kelompok,
			'tgl_dibuat'	=> date('Y-m-d H:i:s')
		]);

		$i = 0;
		foreach ($nama_mahasiswa as $nama) {
			$this->Detail_hasil_seleksi_model->insert([
				'id_hasil_seleksi'	=> $id_hasil_seleksi,
				'nama_mahasiswa'	=> $nama,
				'nrp'				=> $nrp[$i],
				'id_program_studi'	=> $id_program_studi[$i],
				'c1'				=> $c1[$i],
				'c2'				=> $c2[$i],
				'c3'				=> $c3[$i],
				'hasil'				=> $hasil[$i],
				'status'			=> $status[$i],
			]);
			$i++;
		}

		redirect('seleksi/detail/' . $id_hasil_seleksi);
	}


	public function detail($id_hasil_seleksi)
	{
		$hasil_seleksi = $this->Hasil_seleksi_model->get_by_id($id_hasil_seleksi);
		$detail = $this->Detail_hasil_seleksi_model->get_by_where([
			'id_hasil_seleksi'	=> $id_hasil_seleksi
		]);

		$this->load->view('template', [
			'content'		=> 'seleksi/detail',
			'hasil_seleksi'	=> $hasil_seleksi,
			'detail'		=> $detail,
		]);
	}

	public function export_pdf($id_hasil_seleksi)
	{
		$hasil_seleksi = $this->Hasil_seleksi_model->get_by_id($id_hasil_seleksi);
		$detail = $this->Detail_hasil_seleksi_model->get_by_where_ordered([
			'id_hasil_seleksi'	=> $id_hasil_seleksi,
			'status'			=> 'Diterima',
		]);
		$cadangan = $this->Detail_hasil_seleksi_model->get_by_where_ordered([
			'id_hasil_seleksi'	=> $id_hasil_seleksi,
			'status'			=> 'Cadangan',
		]);
		$html = $this->load->view('seleksi/export_pdf', [
			'hasil_seleksi'	=> $hasil_seleksi,
			'detail'		=> $detail,
			'cadangan'	=> $cadangan
		], true);
		$this->pdf->createPDF($html, 'Laporan_Hasil_' . $hasil_seleksi->nama_kelompok, false, 'A4', 'portrait');
	}

	public function hapus($id)
	{
		$this->Detail_hasil_seleksi_model->delete_by_where([
			'id_hasil_seleksi' => $id,
		]);
		$this->Hasil_seleksi_model->delete($id);

		redirect('seleksi');
	}
}
