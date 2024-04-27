<?php

class MY_Model extends CI_Model {

	protected $table;
	protected $softDeletes = false;


	public function __construct() {
		parent::__construct();
	}


	public function find($id)
	{
		$this->withoutTrashed();

		$this->db->where('id', $id);
		$query = $this->db->get($this->table);

		$row = $query->row();
		if(!empty($row)) {
			return $row;
		} else {
			return false;
		}
	}


	public function all()
	{
		$this->withoutTrashed();

		$query = $this->db->get($this->table);
		return $query->result();
	}


	public function update($id, $data)
	{
		$data['updated_at']	= $this->currentTimestamp();

		$this->withoutTrashed();
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
		return $this->find($id);
	}


	public function create($data)
	{
		$data['created_at']	= $this->currentTimestamp();

		$this->db->insert($this->table, $data);
		$id = $this->db->insert_id();
		return $this->find($id);
	}


	public function delete($id)
	{
		if($this->softDeletes) {
			$this->update($id, [
				'deleted_at'	=> $this->currentTimestamp(),
			]);
		} else {
			$this->db->where('id', $id);
			$this->db->delete($this->table);
		}

		return true;
	}


	public function destroy($id)
	{
		return $this->delete($id);
	}


	public function withoutTrashed()
	{
		if($this->softDeletes) {
			$this->db->where('deleted_at', null);
		}
	}


	public function truncate()
	{
		$this->db->truncate($this->table);
		return true;
	}


	public function getByWhere($where = [])
	{
		$this->db->where($where);
		$query = $this->db->get($this->table);
		return $query->result();
	}


	public function getRowByWhere($where = [])
	{
		$this->db->where($where);
		$query = $this->db->get($this->table);
		return $query->row();
	}


	public function count()
	{
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}


	public function first()
	{
		$this->db->order_by('id', 'asc');
		$query = $this->db->get($this->table);
		return $query->row();
	}


	public function currentTimestamp()
	{
		return date('Y-m-d H:i:s');
	}

	
}
