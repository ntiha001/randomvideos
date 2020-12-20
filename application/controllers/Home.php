<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
		$this->load->model('Kategori_model');
		$this->load->model('Rilis_model');
		$this->load->model('Video_model');
		$this->load->model('Streaming_model');
	}

	public function index()
	{
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		//$data['video'] = $this->Video_model->Get_all_videos();
		$data['video'] = $this->Streaming_model->Get_all_videos();
		$data['title'] = "RV Tv";
		if ($this->input->post('cari')) {
			$data['video'] = $this->Video_model->Searching_all_videos();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/home', $data);
		$this->load->view('template/footer');
	}

	public function register()
	{
		$data['title'] = "Create New Account";
		$data['rand_string'] = random_string('alpha', 10);
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar');
		$this->load->view('rv_stream/register');
		$this->load->view('template/footer');
	}

	public function login()
	{
		$this->GoDefaultPage();
		$this->form_validation->set_rules('nama_user', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$data['title'] = "RV Tv Login";
		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/topbar');
			$this->load->view('rv_stream/login');
			$this->load->view('template/footer');
		} else {
			$this->login_act();
		}
	}

	public function regist_act()
	{
		$this->form_validation->set_rules('id_user', 'Id pengguna', 'required|trim');
		$this->form_validation->set_rules('nama_user', 'Username', 'required|trim|is_unique[user.nama_user]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('no_tlp', 'No Tlp', 'required|trim');
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[4]',
			[
				'matches' => 'password tidak sama',
				'min_length' => 'password minimal diatas 3 karakter'
			]
		);
		$this->form_validation->set_rules(
			'password2',
			'Confirm Password',
			'required|trim|min_length[4]|matches[password1]',
			[
				'matches' => 'password tidak sama',
				'min_length' => 'password minimal diatas 3 karakter'
			]
		);
		//$this->form_validation->set_rules('role', 'Role', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
            Registrasi gagal, akun tidak bisa dibuat!!
		   </div>');
			redirect('home/register');
		} else {
			$this->User_model->Registration_act();
			$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
            Registrasi sukses, akun sudah selesai dibuat!!
		   </div>');
			redirect('home/login');
		}
	}

	private function login_act()
	{
		$username = $this->input->post('nama_user', true);
		$password = $this->input->post('password', true);
		$cek_userId = $this->db->get_where('user', ['nama_user' => $username])->row_array();
		if ($cek_userId) {
			if (password_verify($password, $cek_userId['password'])) {
				$data = [
					'nama_user' => $cek_userId['nama_user'],
					'role' => $cek_userId['role']
				];
				$this->session->set_userdata($data);
				if ($cek_userId['role'] == "user") {
					redirect('user');
				} else if ($cek_userId['role'] == "admin") {
					redirect('admin');
				}
			} else {
				$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
                Password akun anda salah!
              </div>');
				redirect('home/login');
			}
		} else {
			$this->session->set_flashdata('notify', '<div class="alert alert-danger" role="alert">
				  Nama pengguna akun anda salah!
				</div>');
			redirect('home/login');
		}
	}

	public function show_categoryselected($kategori)
	{
		$data['title'] = "RV Tv " . $kategori;
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['video'] = $this->Kategori_model->Show_video_byCategori($kategori);
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/home', $data);
		$this->load->view('template/footer');
	}

	public function show_release_selected($rilis)
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

	public function show_selected_video($nama_video)
	{
		$data['title'] = "RV Tv " . $nama_video;
		$data['kategori'] = $this->Kategori_model->Get_all_category();
		$data['rilis'] = $this->Rilis_model->Get_all_release();
		$data['video'] = $this->Video_model->Show_video($nama_video);
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('videos/show_video', $data);
		$this->load->view('template/footer');
	}

	public function log_out()
	{
		$this->session->unset_userdata('nama_user');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('notify', '<div class="alert alert-success" role="alert">
    Anda berhasil keluar!!
   </div>');
		redirect('home');
	}

	public function GoDefaultPage()
	{
		if ($this->session->userdata('role') == "admin") {
			redirect('admin');
		} else if ($this->session->userdata('role') == "user") {
			redirect('user');
		} else {
			// jika ada jenis akses yg lain maka tambahkan disini
		}
	}

	public function privacy_home()
	{
		$data['title'] = "Privacy Policy RV Tv";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/privacy');
		$this->load->view('template/footer');
	}

	public function aboutus_home()
	{
		$data['title'] = "About Us";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/aboutus');
		$this->load->view('template/footer');
	}

	public function faq_home()
	{
		$data['title'] = "FAQ";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/faq');
		$this->load->view('template/footer');
	}

	public function iklan_home()
	{
		$data['title'] = "Ads Term";
		$this->load->view('template/header', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('rv_stream/Iklan');
		$this->load->view('template/footer');
	}
}
