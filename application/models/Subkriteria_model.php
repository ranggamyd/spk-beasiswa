<?php

class Subkriteria_model extends CI_Model
{
	public function get_all($id_kriteria = null)
	{
		if(!empty($id_kriteria)) {
			$this->db->where('id_kriteria', $id_kriteria);
		}
		$this->db->order_by('nilai', 'asc');

		return $this->db->get('subkriteria')->result();
	}

	public function get_by_id($id)
	{
		return $this->db->where('id_subkriteria', $id)
						->get('subkriteria')
						->row();
	}

	public function get_by_id_kriteria($id)
	{
		return $this->db->where('id_kriteria', $id)
						->order_by('nilai', 'asc')
						->get('subkriteria')
						->result();
	}

	public function insert($data)
	{
		$this->db->insert('subkriteria', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where('id_subkriteria', $id)
				 ->update('subkriteria', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_subkriteria', $id)
				 ->delete('subkriteria');
	}
}