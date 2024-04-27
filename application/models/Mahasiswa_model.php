<?php

class Mahasiswa_model extends CI_Model
{
	public function get_all()
	{
		if($this->session->userdata('user')->role == 'Sekretaris Prodi') {
			$this->db->where('id_program_studi', $this->session->userdata('user')->id_program_studi);
		}
		return $this->db->join('program_studi', 'mahasiswa.id_program_studi = program_studi.id_program_studi')
						->join('kelompok', 'mahasiswa.id_kelompok = kelompok.id_kelompok')
						->get('mahasiswa')
						->result();
	}

	public function get_one()
	{
		return $this->db->order_by('id_mahasiswa', 'asc')
						->get('mahasiswa')
						->row();
	}

	public function get_by_id($id)
	{
		return $this->db->where('id_mahasiswa', $id)
						->get('mahasiswa')
						->row();
	}

	public function get_by_nrp($nrp)
	{
		return $this->db->where('nrp', $nrp)
						->get('mahasiswa')
						->row();
	}

	public function insert($data)
	{
		$this->db->insert('mahasiswa', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where('id_mahasiswa', $id)
				 ->update('mahasiswa', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_mahasiswa', $id)
				 ->delete('mahasiswa');
	}

	public function get_by_where($where)
	{
		if($this->session->userdata('user')->role == 'Sekretaris Prodi') {
			$this->db->where('mahasiswa.id_program_studi', $this->session->userdata('user')->id_program_studi);
		}
		return $this->db->join('program_studi', 'mahasiswa.id_program_studi = program_studi.id_program_studi')
						->join('kelompok', 'mahasiswa.id_kelompok = kelompok.id_kelompok')
						->where($where)
						->get('mahasiswa')
						->result();
	}
}