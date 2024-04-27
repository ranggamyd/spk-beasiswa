<?php

class Program_studi_model extends CI_Model
{
	public function get_all()
	{
		if($this->session->userdata('user')->role == 'Sekretaris Prodi') {
			$this->db->where('id_program_studi', $this->session->userdata('user')->id_program_studi);
		}
		return $this->db->get('program_studi')->result();
	}

	public function get_one()
	{
		return $this->db->order_by('id_program_studi', 'asc')
						->get('program_studi')
						->row();
	}

	public function get_by_id($id)
	{
		return $this->db->where('id_program_studi', $id)
						->get('program_studi')
						->row();
	}

	public function get_by_nama_program_studi($nama)
	{
		return $this->db->where('nama_program_studi', $nama)
						->get('program_studi')
						->row();
	}

	public function insert($data)
	{
		$this->db->insert('program_studi', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where('id_program_studi', $id)
				 ->update('program_studi', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_program_studi', $id)
				 ->delete('program_studi');
	}
}