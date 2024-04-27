<?php

class Detail_hasil_seleksi_model extends CI_Model
{
	public function get_all()
	{
		return $this->db->join('program_studi', 'detail_hasil_seleksi.id_program_studi = program_studi.id_program_studi')
						->get('detail_hasil_seleksi')
						->result();
	}

	public function get_one()
	{
		return $this->db->order_by('id_detail_hasil_seleksi', 'asc')
						->join('program_studi', 'detail_hasil_seleksi.id_program_studi = program_studi.id_program_studi')
						->get('detail_hasil_seleksi')
						->row();
	}

	public function get_by_id($id)
	{
		return $this->db->where('id_detail_hasil_seleksi', $id)
						->join('program_studi', 'detail_hasil_seleksi.id_program_studi = program_studi.id_program_studi')
						->get('detail_hasil_seleksi')
						->row();
	}

	public function insert($data)
	{
		$this->db->insert('detail_hasil_seleksi', $data);
		return $this->db->insert_id();
	}

	public function update($id, $data)
	{
		$this->db->where('id_detail_hasil_seleksi', $id)
				 ->update('detail_hasil_seleksi', $data);
	}

	public function delete($id)
	{
		$this->db->where('id_detail_hasil_seleksi', $id)
				 ->delete('detail_hasil_seleksi');
	}

	public function delete_by_where($where)
	{
		$this->db->where($where)
				 ->delete('detail_hasil_seleksi');
	}

	public function get_by_where($where)
	{
		return $this->db->where($where)
						->join('program_studi', 'detail_hasil_seleksi.id_program_studi = program_studi.id_program_studi')
						->get('detail_hasil_seleksi')
						->result();
	}

	public function get_by_where_ordered($where)
	{
		return $this->db->where($where)
						->join('program_studi', 'detail_hasil_seleksi.id_program_studi = program_studi.id_program_studi')
						->order_by('hasil', 'desc')
						->get('detail_hasil_seleksi')
						->result();
	}
}