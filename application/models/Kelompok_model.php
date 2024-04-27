<?php

class Kelompok_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('kelompok')->result();
	}

	public function get_one()
	{
		return $this->db->order_by('id_kelompok', 'asc')
						->get('kelompok')
						->row();
	}

	public function get_by_id($id)
	{
		return $this->db->where('id_kelompok', $id)
						->get('kelompok')
						->row();
	}

	public function insert($data)
	{
		$this->db->insert('kelompok', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where('id_kelompok', $id)
				 ->update('kelompok', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_kelompok', $id)
				 ->delete('kelompok');
	}
}