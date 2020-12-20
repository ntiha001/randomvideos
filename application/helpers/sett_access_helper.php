<?php
function check_login()
{
	$init_ci = get_instance();
	if (!$init_ci->session->userdata('username')) {
		redirect('home');
	} else {
		$jenisakses = $init_ci->session->userdata('role');
		$dashboard_index = $init_ci->uri->segment(1);
		$userakses = $init_ci->db->get_where('user', [
			'role' => $jenisakses
		])->row_array();
		if ($dashboard_index != $jenisakses) {
			redirect('home/block');
		}
		// if (!$userakses == "admin" || !$userakses == "pengguna") {
		//     redirect('auth/block');
		// }
		// if ($jenisakses == "admin") {
		//     redirect('admin');
		// } elseif ($jenisakses == "pengguna") {
		//     redirect('pengguna');
		// }
	}
}

function check_admin()
{
	$init_ci = get_instance();
	$dashboard_index = $init_ci->uri->segment('admin');
	// $admin = $init_ci->session->userdata('jenis_akses');
	if ($dashboard_index == false) {
		// redirect('admin');
		// $init_ci->load->view('template/sidebar_admin');
	}
	// else {
	//     redirect('auth/block');
	// }
}

function check_pengguna()
{
	$init_ci = get_instance();
	$dashboard_index = $init_ci->uri->segment(1);
	if ($dashboard_index == "pengguna") {
		// redirect('pengguna');
	} else {
		redirect('auth/block');
	}
}

function check_logout()
{
	$init_ci = get_instance();
	$cek_session = $init_ci->session->userdata('username');
	//$jenisakses = $init_ci->session->userdata('jenis_akses');
	if (!$cek_session) {
	}
}
