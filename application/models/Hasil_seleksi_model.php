<?php

class Hasil_seleksi_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->join('kelompok', 'hasil_seleksi.id_kelompok = kelompok.id_kelompok')
		->order_by('tgl_dibuat', 'desc')
						->get('hasil_seleksi')
						->result();
	}

	public function get_one()
	{
		return $this->db->order_by('tgl_dibuat', 'desc')
						->join('kelompok', 'hasil_seleksi.id_kelompok = kelompok.id_kelompok')
						->get('hasil_seleksi')
						->row();
	}

	public function get_by_id($id)
	{
		return $this->db->where('id_hasil_seleksi', $id)
						->join('kelompok', 'hasil_seleksi.id_kelompok = kelompok.id_kelompok')
						->get('hasil_seleksi')
						->row();
	}

	public function insert($data)
	{
		$this->db->insert('hasil_seleksi', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where('id_hasil_seleksi', $id)
				 ->update('hasil_seleksi', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_hasil_seleksi', $id)
				 ->delete('hasil_seleksi');
	}
}