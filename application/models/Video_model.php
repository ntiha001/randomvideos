<?php

class Video_model extends CI_Model
{
	public function Video_insert_act()
	{
		//$data = array('upload_data' => $this->upload->data());
		$posternya = $_FILES['poster']['name'];
		$data = [
			"id_video" => $this->input->post('id_video'),
			"id_user" => $this->input->post('id_user'),
			"nama_video" => $this->input->post('nama_video'),
			"link_video" => $this->input->post('link_video'),
			"poster" => $posternya,
			"kd_kategori" => $this->input->post('kd_kategori'),
			"pemeran" => $this->input->post('pemeran'),
			"deskripsi" => $this->input->post('deskripsi'),
			"durasi_waktu" => $this->input->post('durasi_waktu'),
			"skor" => $this->input->post('skor'),
			"kd_rilis" => $this->input->post('kd_rilis')
		];
		$posternya = $this->upload->data('file_name');
		$this->db->insert('video', $data);
	}

	public function Get_all_videos()
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.kd_kategori = video.kd_kategori');
		$this->db->join('rilis', 'rilis.kd_rilis = video.kd_rilis');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Get_all_videosByUser($id_user)
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.kd_kategori = video.kd_kategori');
		$this->db->join('rilis', 'rilis.kd_rilis = video.kd_rilis');
		$this->db->join('user', 'user.id_user = video.id_user');
		$this->db->where('video.id_user', $id_user);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Get_all_videosByIdVideo($id_video)
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.kd_kategori = video.kd_kategori');
		$this->db->join('rilis', 'rilis.kd_rilis = video.kd_rilis');
		$this->db->join('user', 'user.id_user = video.id_user');
		$this->db->where('id_video ', $id_video);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Searching_all_videos()
	{
		$keyword = $this->input->post('cari');
		$this->db->select('*');
		$this->db->from('video');
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

	public function Show_video($nama_video)
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->join('kategori', 'kategori.kd_kategori = video.kd_kategori');
		$this->db->join('rilis', 'rilis.kd_rilis = video.kd_rilis');
		$this->db->join('user', 'user.id_user = video.id_user');
		$this->db->where('video.nama_video', $nama_video);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Delete_video($id_video)
	{
		$this->db->where('id_video', $id_video);
		$this->db->delete('video');
	}

	public function Save_Change_video()
	{
		$posternya = $_FILES['poster']['name'];
		$idvideo = $this->input->post('id_video');
		$data = [
			"id_user" => $this->input->post('id_user'),
			"nama_video" => $this->input->post('nama_video'),
			"link_video" => $this->input->post('link_video'),
			"poster" => $posternya,
			"kd_kategori" => $this->input->post('kd_kategori'),
			"pemeran" => $this->input->post('pemeran'),
			"deskripsi" => $this->input->post('deskripsi'),
			"durasi_waktu" => $this->input->post('durasi_waktu'),
			"skor" => $this->input->post('skor'),
			"kd_rilis" => $this->input->post('kd_rilis')
		];
		$posternya = $this->upload->data('file_name');
		$this->db->where('id_video', $idvideo);
		$this->db->update('video', $data);
	}
}
