<?php
class User_model extends CI_Model
{

	public function Registration_act()
	{
		$data = [
			'id_user' => $this->input->post("id_user"),
			'nama_user' => $this->input->post("nama_user"),
			"password" => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
			'email' => $this->input->post("email"),
			'no_tlp' => $this->input->post("no_tlp"),
			'role' => "user"
		];
		$this->db->insert('user', $data);
	}

	public function Get_all_user()
	{
		return $this->db->get('user')->result_array();
	}

	public function Get_user_na()
	{
		$role_usernya = "user";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('role', $role_usernya);
		return $this->db->get()->result_array();
	}

	public function Set_change_user($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Save_change_User()
	{
		$kduser = $this->input->post('id_user');
		$data = [
			'nama_user' => $this->input->post('nama_user'),
			'email' => $this->input->post('email'),
			'no_tlp' => $this->input->post('no_tlp'),
			'password' => $this->input->post('password')
		];
		$this->db->where('id_user', $kduser);
		$this->db->update('user', $data);
	}
}
