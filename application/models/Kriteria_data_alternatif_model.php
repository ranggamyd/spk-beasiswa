<?php

class Kriteria_data_alternatif_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->join('kriteria', 'kriteria_data_alternatif.id_kriteria = kriteria.id_kriteria')
						->join('subkriteria', 'kriteria_data_alternatif.id_subkriteria = subkriteria.id_subkriteria')
						->get('kriteria_data_alternatif')
						->result();
	}

	public function get_one()
	{
		return $this->db->order_by('id_kriteria_data_alternatif', 'asc')
						->get('kriteria_data_alternatif')
						->row();
	}

	public function get_by_id($id)
	{
		return $this->db->where('id_kriteria_data_alternatif', $id)
						->get('kriteria_data_alternatif')
						->row();
	}

	public function insert($data)
	{
		$this->db->insert('kriteria_data_alternatif', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where('id_kriteria_data_alternatif', $id)
				 ->update('kriteria_data_alternatif', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_kriteria_data_alternatif', $id)
				 ->delete('kriteria_data_alternatif');
	}

	public function delete_by_where($where)
	{
		$this->db->where($where)
				 ->delete('kriteria_data_alternatif');
	}

	public function get_by_where($where)
	{
		return $this->db->where($where)
						->get('kriteria_data_alternatif')
						->result();
	}

	public function get_one_by_where($where)
	{
		return $this->db->where($where)
						->get('kriteria_data_alternatif')
						->row();
	}
}