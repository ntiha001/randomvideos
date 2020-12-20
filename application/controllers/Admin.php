<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
		$this->load->model('Video_model');
		$this->load->model('Kategori_model');
		$this->load->model('Rilis_model');
		$this->load->model('Streaming_model');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')])->row_array();
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "Home Dashboard Admin";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function show_allCategory()
	{
		$data['title'] = "Show All Category";
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('kategori/tampil_kategori', $data);
		$this->load->view('template/footer', $data);
	}

	public function show_allUser()
	{
		$data['title'] = "Show All Users";
		$data['userchange'] = $this->User_model->Get_user_na();
		$data['tb_user'] = $this->User_model->Get_user_na();
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/tampil_user', $data);
		$this->load->view('template/footer', $data);
	}

	public function newCategory()
	{
		$this->form_validation->set_rules('kd_kategori', 'Code Category', 'required|trim');
		$this->form_validation->set_rules('nama_kategori', 'Name Category', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['kategori'] = $this->Kategori_model->Get_all_category();
			$data['rilis'] = $this->Rilis_model->Get_all_release();
			$data['rand_string'] = random_string('alnum', 5);
			$data['title'] = "Insert New Category";
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('kategori/tambah_kategori', $data);
			$this->load->view('template/footer', $data);
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            gagal menambahkan kategori, karena trdapat kesalahan!!
		   </div>');
		} else {
			$this->Kategori_model->Category_insert_act();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menambahkan kategori!!
		   </div>');
			redirect('admin/show_allCategory');
		}
	}

	public function show_allRelease()
	{
		$data['title'] = "Show All Release";
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rilis/tampil_rilis', $data);
		$this->load->view('template/footer', $data);
	}

	public function newRelease()
	{
		$this->form_validation->set_rules('kd_rilis', 'Code Release', 'required|trim');
		$this->form_validation->set_rules('waktu_rilis', 'Release Time', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['kategori'] = $this->Kategori_model->Get_all_category();
			$data['rilis'] = $this->Rilis_model->Get_all_release();
			$data['rand_string'] = random_string('alnum', 5);
			$data['title'] = "Insert New Release";
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('rilis/tambah_rilis', $data);
			$this->load->view('template/footer', $data);
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            gagal menambahkan perilisan, karena terdapat kesalahan!!
		   </div>');
		} else {
			$this->Rilis_model->Release_insert_act();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menambahkan perilisan!!
		   </div>');
			redirect('admin/show_allRelease');
		}
	}

	public function editcategory($kd_kategori)
	{
		$data['kategorichange'] = $this->Kategori_model->Set_change_category($kd_kategori);
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "Change Category";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('kategori/ganti_kategori', $data);
		$this->load->view('template/footer', $data);
	}

	public function editrelease($kd_rilis)
	{
		$data['rilischange'] = $this->Rilis_model->Set_change_release($kd_rilis);
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "Change Release";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rilis/ganti_rilis', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit_categoryAct()
	{
		$this->form_validation->set_rules('kd_kategori', 'Code Category', 'required|trim');
		$this->form_validation->set_rules('nama_kategori', 'Name Category', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
           Gagal mengganti nama kategori!!
		   </div>');
			redirect('admin/show_allCategory');
		} else {
			$this->Kategori_model->Save_change_Category();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses mengganti nama kategori!!
		   </div>');
			redirect('admin/show_allCategory');
		}
	}

	public function edit_releaseAct()
	{
		$this->form_validation->set_rules('kd_rilis', 'Code Release', 'required|trim');
		$this->form_validation->set_rules('waktu_rilis', 'Time Release', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
           Gagal mengganti waktu rilis!!
		   </div>');
			redirect('admin/show_allRelease');
		} else {
			$this->Rilis_model->Save_change_Release();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses mengganti waktu rilis!!
		   </div>');
			redirect('admin/show_allRelease');
		}
	}

	public function deletecategory()
	{
		$this->form_validation->set_rules('kd_kategori', 'Code Category', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menghapus kategori!!
		   </div>');
			redirect('admin/show_allCategory');
		} else {
			$kode_kategori = $this->input->post('kd_kategori');
			$this->Kategori_model->Deleted_Category($kode_kategori);
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menghapus kategori!!
		   </div>');
			redirect('admin/show_allCategory');
		}
	}

	public function deleterelease()
	{
		$this->form_validation->set_rules('kd_rilis', 'Code Release', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menghapus waktu rilis!!
		   </div>');
			redirect('admin/show_allRelease');
		} else {
			$kode_rilis = $this->input->post('kd_rilis');
			$this->Rilis_model->Deleted_Release($kode_rilis);
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menghapus waktu rilis!!
		   </div>');
			redirect('admin/show_allRelease');
		}
	}

	public function edituser($id_user)
	{
		$data['userchange'] = $this->User_model->Set_change_user($id_user);
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "Change Release";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/ganti_user', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit_userAct()
	{
		$this->form_validation->set_rules('id_user', 'Id User', 'required|trim');
		$this->form_validation->set_rules('nama_user', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('no_tlp', 'No Tlp', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
           Gagal mengganti data user!!
		   </div>');
			redirect('admin/show_allUser');
		} else {
			$this->User_model->Save_change_User();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses mengganti data user!!
		   </div>');
			redirect('admin/show_allUser');
		}
	}

	public function deleteuser()
	{
		$this->form_validation->set_rules('id_user', 'Id User', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Gagal menghapus data user!!
		   </div>');
			redirect('admin/show_allUser');
		} else {
			$kode_rilis = $this->input->post('kd_rilis');
			$this->Rilis_model->Deleted_Release($kode_rilis);
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses menghapus data user!!
		   </div>');
			redirect('admin/show_allUser');
		}
	}

	public function privacy_admin()
	{
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "Privacy Policy RV Tv";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/privacy', $data);
		$this->load->view('template/footer', $data);
	}

	public function aboutus_admin()
	{
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "About Us";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/aboutus', $data);
		$this->load->view('template/footer', $data);
	}

	public function faq_admin()
	{
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "FAQ";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/faq', $data);
		$this->load->view('template/footer', $data);
	}

	public function iklan_admin()
	{
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['title'] = "Ads Term";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/Iklan', $data);
		$this->load->view('template/footer', $data);
	}

	public function show_release_selectedAdmin($rilis)
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

	public function show_category_selectedAdmin($kategori)
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

	public function settingAdmin()
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

	public function settingAdmin_act()
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
			redirect('admin');
		} else {
			$this->User_model->Save_change_User();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Sukses mengganti data user!!
		   </div>');
			redirect('admin');
		}
	}
}
