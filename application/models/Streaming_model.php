<?php

class Streaming_model extends CI_Model
{
	public function Insert_New_Streaming()
	{
		$data = [
			'id_streaming' => $this->input->post('id_streaming'),
			'id_user' => $this->input->post('id_user'),
			'id_video' => $this->input->post('id_video')
		];
		$this->db->insert('streaming', $data);
	}

	public function Show_All_Streaming()
	{
		return $this->db->get('streaming')->result_array();
	}

	public function Get_all_videos()
	{
		$this->db->select('*');
		$this->db->from('streaming');
		$this->db->join('video', 'video.id_video = streaming.id_video');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Show_Streaming_byUserId($id_user)
	{
		$this->db->select('*');
		$this->db->from('streaming');
		$this->db->join('video', 'video.id_video = streaming.id_video');
		$this->db->join('user', 'user.id_user = streaming.id_user');
		$this->db->where('streaming.id_user', $id_user);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Searching_all_streaming()
	{
		$keyword = $this->input->post('cari');
		$this->db->select('*');
		$this->db->from('streaming');
		$this->db->join('kategori', 'kategori.kd_kategori = video.kd_kategori');
		$this->db->join('rilis', 'rilis.kd_rilis = video.kd_rilis');
		$this->db->join('user', 'user.id_user = video.id_user');
		$this->db->where(array('video.id_video' => $keyword));
		$this->db->or_like('video.nama_video', $keyword);
		$this->db->or_like('kategori.nama_kategori', $keyword);
		$this->db->or_like('rilis.waktu_rilis', $keyword);
		$this->db->or_like('video.pemeran', $keyword);
		$this->db->or_like('video.durasi_waktu', $keyword);
		$this->db->or_like('video.skor', $keyword);
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function Show_Streaming_byUserIdStream($id_stream)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('streaming');
	// 	$this->db->join('video', 'video.id_video = streaming.id_video');
	// 	$this->db->join('user', 'user.id_user = streaming.id_user');
	// 	$this->db->where('streaming.id_user', $id_user);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	public function Show_Streaming_byCategories($category)
	{
		$this->db->select('*');
		$this->db->from('streaming');
		$this->db->join('video', 'video.id_video = streaming.id_video');
		$this->db->join('user', 'user.id_user = streaming.id_user');
		$this->db->where('streaming.id_user', $category);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Deleted_VideosFromStream($id_streaming)
	{
		$this->db->where('id_streaming', $id_streaming);
		$this->db->delete('streaming');
	}
}
