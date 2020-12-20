<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>user">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Publish My Video</li>

	</ol>
</nav>

<div class="container-fluid md-2 mt-4 ">
	<div class="row justify-content-md-center">


		<div class="card" style="width: 18rem;">
			<div class="card-header ">
				Form Mengganti Data Pengguna
			</div>
			<?= $this->session->flashdata('notify'); ?>

			<form id="form_regist" name="form_regist" action="<?= base_url() ?>user/setPublish_act" method="POST" enctype="multipart/form-data">

				<div class="form-group ml-2 mr-2">
					<label for="idstreaming">Id Streaming</label>
					<input type="text" class="form-control" id="idstreaming" name="id_streaming" value="<?= $rand_string ?>" readonly>
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="iduser">Id User</label>
					<input type="text" class="form-control" id="kdrilis" name="id_user" value="<?= $user['id_user']; ?>" readonly>
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="namauser" name="nama_user" value="<?= $user['nama_user']; ?>" readonly>
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="notlp">Pilih Video yang di Publish</label>
					<select class="form-control" id="id_video" name="id_video">
						<option>Pilih Video</option>
						<?php foreach ($video as $vd) {
						?>
							<option value="<?= $vd['id_video'] ?>"><?= $vd['nama_video'] ?></option>
						<?php } ?>
					</select>
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
					$role_akses = $this->session->userdata('role');
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
