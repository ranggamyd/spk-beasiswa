<?php

class Kriteria_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('kriteria')->result();
	}

	public function get_one()
	{
		return $this->db->order_by('id_kriteria', 'asc')
						->get('kriteria')
						->row();
	}

	public function get_by_id($id)
	{
		return $this->db->where('id_kriteria', $id)
						->get('kriteria')
						->row();
	}

	public function get_by_nama_kriteria($nama)
	{
		return $this->db->where('nama_kriteria', $nama)
						->get('kriteria')
						->row();
	}

	public function get_by_kode_kriteria($kode)
	{
		return $this->db->where('kode_kriteria', $kode)
						->get('kriteria')
						->row();
	}

	public function insert($data)
	{
		$this->db->insert('kriteria', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where('id_kriteria', $id)
				 ->update('kriteria', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_kriteria', $id)
				 ->delete('kriteria');
	}
}