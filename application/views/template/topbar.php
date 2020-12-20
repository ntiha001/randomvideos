<nav class="navbar navbar-dark bg-dark">
	<!-- Navbar content -->
	<img src="<?= base_url() ?>assets/images/rv.jpg" alt="" style="width:200px; height:90px">
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<?php
	$role_akses = $this->session->userdata('role');
	if ($role_akses == "user") {
	?>
		<a class="navbar-brand" href="<?= base_url() ?>user">Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						My Random Videos
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= base_url() ?>user/show_allvideos/<?= $user['id_user']; ?>">Lihat Semua</a>
						<a class="dropdown-item" href="<?= base_url() ?>user/show_allstreamByUser/<?= $user['id_user']; ?>">Publish</a>
					</div>
				</li>
				<a class="nav-link active" href="<?= base_url() ?>user/setPublish/<?= $user['id_user']; ?>">Publish My Video</a>
				<a class="nav-link active" href="<?= base_url() ?>user/settingUser">Setting</a>
			</ul>
		</div>
	<?php
	} elseif ($role_akses == "admin") {
	?>
		<a class="navbar-brand" href="<?= base_url() ?>admin">Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Manage Genre
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= base_url() ?>admin/show_allCategory">Category</a>
						<a class="dropdown-item" href="<?= base_url() ?>admin/show_allRelease">Year Release</a>
					</div>
				</li>
				<a class="nav-link active" href="<?= base_url() ?>admin/show_allUser">Show all users</a>
				<a class="nav-link active" href="<?= base_url() ?>admin/settingAdmin">Setting</a>
			</ul>
		</div>
	<?php
	} else {
	?>
		<a class="navbar-brand" href="<?= base_url() ?>">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Kategori
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php
						foreach ($kategori as $kat) {
						?>
							<a class="dropdown-item" href="<?= base_url() ?>home/show_categoryselected/<?= $kat['nama_kategori']; ?>"><?= $kat['nama_kategori']; ?></a>
						<?php } ?>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tahun
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php
						foreach ($rilis as $rls) {
						?>
							<a class="dropdown-item" href="<?= base_url() ?>home/show_release_selected/<?= $rls['waktu_rilis']; ?>"><?= $rls['waktu_rilis']; ?></a>
						<?php } ?>
					</div>
				</li>
			</ul>
		<?php
	}
		?>
		<?php
		$role_akses = $this->session->userdata('role');
		if ($role_akses == "user" || $role_akses == "admin") {
		?>
			<a href="#" data-toggle="modal" data-target="#LogOutModal" class="btn btn-danger">Keluar</a>
		<?php
		} else {
		?>
			<form class="form-inline my-2 my-lg-0" method="POST">
				<a class="navbar-brand" href="<?= base_url() ?>home/login">Login</a>
				<input class="form-control mr-sm-2" type="search" name="cari" id="cari" placeholder="Search" aria-label="Search">
				<button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		<?php } ?>
		</div>
</nav>

<!-- dibawah adalah isi kontennya -->
