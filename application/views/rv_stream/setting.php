<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<?php
		$role_akses = $this->session->userdata('role');
		if ($role_akses == "user") {
		?>
			<li class="breadcrumb-item"><a href="<?= base_url() ?>user">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Setting Account</li>
		<?php
		} else {
		?>
			<li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Setting Account</li>
		<?php
		}
		?>
	</ol>
</nav>

<div class="container-fluid md-2 mt-4 ">
	<div class="row justify-content-md-center">


		<div class="card" style="width: 18rem;">
			<div class="card-header ">
				Form Mengganti Data Pengguna
			</div>
			<?= $this->session->flashdata('notify'); ?>

			<form id="form_regist" name="form_regist" <?php
														if ($role_akses == "user") {
														?> action="<?= base_url() ?>user/settingUser_act" <?php
																										} else { ?> action="<?= base_url() ?>admin/settingAdmin_act" <?php	}
																																										?> method="POST" enctype="multipart/form-data">
				<?php
				//foreach ($userchange as $usr) {
				?>
				<div class="form-group ml-2 mr-2">
					<label for="iduser">Id User</label>
					<input type="text" class="form-control" id="kdrilis" name="id_user" value="<?= $user['id_user']; ?>" readonly>
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="namauser" name="nama_user" value="<?= $user['nama_user']; ?>">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="email">Password</label>
					<input type="password" class="form-control" id="email" name="password" value="<?= $user['password']; ?>">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="notlp">Phone Number</label>
					<input type="text" class="form-control" id="notlp" name="no_tlp" value="<?= $user['no_tlp']; ?>">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="role">Role</label>
					<input type="text" class="form-control" id="role" name="role" value="<?= $user['role']; ?>" readonly>
				</div>
				<?php
				//} 
				?>
				<div class="form-group ml-2 mr-2">
					<button type="submit" name="tambah" class="btn btn-primary">Submit</button>
				</div>

				<div class="form-group ml-2 mr-2">
					<?php
					if ($role_akses == "user") {
					?>
						<a href="<?= base_url() ?>user">Kembali ke Dashboard</a>
					<?php
					} else {
					?>
						<a href="<?= base_url() ?>admin">Kembali ke Dashboard</a>
					<?php
					}
					?>

				</div>

			</form>

		</div>

	</div>

</div>
