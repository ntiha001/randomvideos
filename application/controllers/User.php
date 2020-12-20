<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Rilis_model');
		$this->load->model('Kategori_model');
		$this->load->model('Video_model');
		$this->load->model('Streaming_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "Home Dashboard User";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function newvideos()
	{
		$data['user'] = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
		$data['rand_string'] = random_string('alnum', 7);
		$this->form_validation->set_rules('id_video', 'Id Video', 'required|trim');
		$this->form_validation->set_rules('id_user', 'Id Username', 'required|trim');
		$this->form_validation->set_rules('kd_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('pemeran', 'Pemeran', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('durasi_waktu', 'Durasi', 'required|trim');
		$this->form_validation->set_rules('skor', 'Skor', 'required|trim');
		$this->form_validation->set_rules('kd_rilis', 'Rilis', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['rilis'] = $this->Rilis_model->Get_all_release();
			$data['kategori'] = $this->Kategori_model->Get_all_category();
			$data['title'] = "Upload a New Videos";
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('videos/new_video', $data);
			$this->load->view('template/footer', $data);
		} else {
			$config['upload_path'] 	 = './assets/images/poster';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = '2048';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('poster')) {
				$this->Video_model->Video_insert_act();
				$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menambah video baru!!
		   </div>');
				redirect('user');
			} else {
				$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menambah video baru, karena terdapat kesalahan!!
		   </div>');
				redirect('user');
			}
		}
	}

	public function show_allvideos($id_user)
	{
		$data['user'] = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "My Videos";
		$data['video'] = $this->Video_model->Get_all_videosByUser($id_user);
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/home', $data);
		$this->load->view('template/footer', $data);
	}

	public function deletevideo()
	{
		$this->form_validation->set_rules('id_video', 'Id Video', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
           Gagal menghapus video!!
		   </div>');
			redirect('user');
		} else {
			$idvideo = $this->input->post('id_video');
			$this->Video_model->Delete_video($idvideo);
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
           Sukses menghapus video!!
		   </div>');
			redirect('user');
		}
	}

	public function editedvideo($id_video)
	{
		$data['user'] = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
		$data['video'] = $this->Video_model->Get_all_videosByIdVideo($id_video);
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "Change Release";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('videos/ganti_video', $data);
		$this->load->view('template/footer', $data);
	}

	public function editVideo_act()
	{
		$this->form_validation->set_rules('id_video', 'Id Video', 'required|trim');
		$this->form_validation->set_rules('id_user', 'Id Username', 'required|trim');
		$this->form_validation->set_rules('kd_kategori', 'Kategori', 'required|trim');
		$this->form_validation->set_rules('pemeran', 'Pemeran', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('durasi_waktu', 'Durasi', 'required|trim');
		$this->form_validation->set_rules('skor', 'Skor', 'required|trim');
		$this->form_validation->set_rules('kd_rilis', 'Rilis', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
           Gagal mengganti video!!
		   </div>');
			redirect('user');
		} else {
			$this->Video_model->Save_Change_video();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
          Sukses mengganti video!!
		   </div>');
			redirect('user');
		}
	}

	public function privacy_user()
	{
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "Privacy Policy RV Tv";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/privacy');
		$this->load->view('template/footer', $data);
	}

	public function aboutus_user()
	{
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "About Us";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/aboutus');
		$this->load->view('template/footer', $data);
	}

	public function faq_user()
	{
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "FAQ";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/faq');
		$this->load->view('template/footer', $data);
	}

	public function iklan_user()
	{
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "Ads Term";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/Iklan');
		$this->load->view('template/footer', $data);
	}

	public function show_release_selectedUser($rilis)
	{
		$data['title'] = "RV Tv " . $rilis;
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['video'] = $this->Rilis_model->Show_video_byRelease($rilis);
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/home', $data);
		$this->load->view('template/footer', $data);
	}

	public function show_category_selectedUser($kategori)
	{
		$data['title'] = "RV Tv " . $kategori;
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['video'] = $this->Kategori_model->Show_video_byCategori($kategori);
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/home', $data);
		$this->load->view('template/footer', $data);
	}

	public function settingUser()
	{
		$data['user'] = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
		$data['title'] = "Setting Account";
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		//$data['video'] = $this->Kategori_model->Show_video_byCategori();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/setting', $data);
		$this->load->view('template/footer', $data);
	}

	public function settingUser_act()
	{
		$this->form_validation->set_rules('id_user', 'Id User', 'required|trim');
		$this->form_validation->set_rules('nama_user', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('no_tlp', 'No Tlp', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
           Gagal mengganti data user!!
		   </div>');
			redirect('user');
		} else {
			$this->User_model->Save_change_User();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses mengganti data user!!
		   </div>');
			redirect('user');
		}
	}

	public function setPublish($id_user)
	{
		$data['rand_string'] = random_string('alnum', 7);
		$data['user'] = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
		$data['title'] = "Publish My Video";
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['video'] = $this->Video_model->Get_all_videosByUser($id_user);
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/publish', $data);
		$this->load->view('template/footer', $data);
	}

	public function setPublish_act()
	{
		$this->form_validation->set_rules('id_user', 'Id User', 'required|trim');
		$this->form_validation->set_rules('id_streaming', 'Id Sream', 'required|trim');
		$this->form_validation->set_rules('id_video', 'Id Video', 'required|trim|is_unique[streaming.id_video]', [
			'is_unique' => 'This video has been publish!'
		]);
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
			Gagal mempublish video !!
			</div>');
			redirect('user');
		} else {
			$this->Streaming_model->Insert_New_Streaming();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses mempublish video!!
		   </div>');
			redirect('user');
		}
	}

	public function show_allstreamByUser($iduser)
	{
		$data['user'] = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
		$data['title'] = "Publish My Video";
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		//$data['video'] = $this->Video_model->Get_all_videosByUser();
		$data['streaming'] = $this->Streaming_model->Show_Streaming_byUserId($iduser);
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/streaming_list', $data);
		$this->load->view('template/footer', $data);
	}

	public function deletefromstream()
	{
		$this->form_validation->set_rules('id_streaming', 'Id Streaming', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
           Gagal menghapus video dari stream public!!
		   </div>');
			redirect('user');
		} else {
			$idstreaming = $this->input->post('id_streaming');
			$this->Streaming_model->Deleted_VideosFromStream($idstreaming);
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
			Sukses menghapus video dari stream public!!
		   </div>');
			redirect('user');
		}
	}
}
