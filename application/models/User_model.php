<?php

class User_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('user')->result();
	}

	public function get_by_username($username)
	{
		$this->db->where('username', $username);
		$user = $this->db->get('user')->row();
		return $user;
	}

	public function get_by_id($id)
	{
		$this->db->where('id_user', $id);
		$user = $this->db->get('user')->row();
		return $user;
	}

	public function insert($data)
	{
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where('id_user', $id)
				 ->update('user', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_user', $id)
				 ->delete('user');
	}
}