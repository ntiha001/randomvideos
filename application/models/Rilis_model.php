<?php
class Rilis_model extends CI_Model
{
	public function Release_insert_act()
	{
		$data = [
			'kd_rilis' => $this->input->post('kd_rilis'),
			'waktu_rilis' => $this->input->post('waktu_rilis')
		];
		$this->db->insert('rilis', $data);
	}

	public function Get_all_release()
	{
		return $this->db->get('rilis')->result_array();
	}

	public function Show_video_byRelease($rilis)
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.kd_kategori = video.kd_kategori');
		$this->db->join('rilis', 'rilis.kd_rilis = video.kd_rilis');
		$this->db->join('user', 'user.id_user = video.id_user');
		$this->db->where(array('rilis.waktu_rilis' => $rilis));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Set_change_release($kd_rilis)
	{
		$this->db->select('*');
		$this->db->from('rilis');
		$this->db->where('kd_rilis', $kd_rilis);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Deleted_Release($kode_rilis)
	{
		$this->db->where('kd_rilis', $kode_rilis);
		$this->db->delete('rilis');
	}

	public function Save_change_Release()
	{
		$kdrilis = $this->input->post('kd_rilis');
		$data = [
			'waktu_rilis' => $this->input->post('waktu_rilis')
		];
		$this->db->where('kd_rilis', $kdrilis);
		$this->db->update('rilis', $data);
	}
}
