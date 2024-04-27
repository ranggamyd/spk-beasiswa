<?php

class Setting_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('setting')->result();
	}

	public function get_by_nama($nama)
	{
		$this->db->where('nama', $nama);
		$setting = $this->db->get('setting')->row();
		return $setting;
	}

	public function insert($data)
	{
		$this->db->insert('setting', $data);
		return $this->db->insert_id();
	}

	public function update($nama, $data)
	{
		$this->db->where('nama', $nama)
				 ->update('setting', $data);
	}

	public function delete($nama)
	{
		$this->db->where('nama', $nama)
				 ->delete('setting');
	}
}