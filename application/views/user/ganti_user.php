<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/show_allUser">Show All Users</a></li>
		<li class="breadcrumb-item active" aria-current="page">Change User</li>
	</ol>
</nav>

<div class="container-fluid md-2 mt-4 ">
	<div class="row justify-content-md-center">


		<div class="card" style="width: 18rem;">
			<div class="card-header ">
				Form Mengganti Data Pengguna
			</div>
			<?= $this->session->flashdata('notify'); ?>
			<form id="form_regist" name="form_regist" action="<?= base_url(); ?>admin/edit_userAct" method="POST" enctype="multipart/form-data">
				<?php foreach ($userchange as $usr) {
				?>
					<div class="form-group ml-2 mr-2">
						<label for="iduser">Id User</label>
						<input type="text" class="form-control" id="kdrilis" name="id_user" value="<?= $usr['id_user'] ?>">
					</div>

					<div class="form-group ml-2 mr-2">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="namauser" name="nama_user" value="<?= $usr['nama_user'] ?>">
					</div>

					<div class="form-group ml-2 mr-2">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email" value="<?= $usr['email'] ?>">
					</div>

					<div class="form-group ml-2 mr-2">
						<label for="notlp">Phone Number</label>
						<input type="text" class="form-control" id="notlp" name="no_tlp" value="<?= $usr['no_tlp'] ?>">
					</div>
				<?php } ?>
				<div class="form-group ml-2 mr-2">
					<button type="submit" name="tambah" class="btn btn-primary">Submit</button>
				</div>

				<div class="form-group ml-2 mr-2">
					<a href="<?= base_url() ?>admin">Kembali ke Dashboard</a>
				</div>

			</form>

		</div>

	</div>

</div>
