<?php
class Kategori_model extends CI_Model
{
	public function Category_insert_act()
	{
		$data = [
			'kd_kategori' => $this->input->post('kd_kategori'),
			'nama_kategori' => $this->input->post('nama_kategori')
		];
		$this->db->insert('kategori', $data);
	}

	public function Get_all_category()
	{
		return $this->db->get('kategori')->result_array();
	}

	public function Show_video_byCategori($kategori)
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.kd_kategori = video.kd_kategori');
		$this->db->join('rilis', 'rilis.kd_rilis = video.kd_rilis');
		$this->db->join('user', 'user.id_user = video.id_user');
		$this->db->where(array('kategori.nama_kategori' => $kategori));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Set_change_category($kd_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('kd_kategori', $kd_kategori);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Save_change_Category()
	{
		$kdkategori = $this->input->post('kd_kategori');
		$data = [
			'nama_kategori' => $this->input->post('nama_kategori')
		];
		$this->db->where('kd_kategori', $kdkategori);
		$this->db->update('kategori', $data);
	}

	public function Deleted_Category($kode_kategori)
	{
		$this->db->where('kd_kategori', $kode_kategori);
		$this->db->delete('kategori');
	}
}
