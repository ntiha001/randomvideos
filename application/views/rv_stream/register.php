<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
		<li class="breadcrumb-item"><a href="<?= base_url() ?>home/login">Login</a></li>
		<li class="breadcrumb-item active" aria-current="page">Register</li>
	</ol>
</nav>

<div class="container-fluid md-2 mt-4 ">
	<div class="row justify-content-md-center">


		<div class="card" style="width: 18rem;">
			<div class="card-header ">
				Form Membuat Akun
			</div>
			<?= $this->session->flashdata('notify'); ?>
			<form id="form_regist" name="form_regist" action="<?= base_url(); ?>home/regist_act" method="POST" enctype="multipart/form-data">

				<div class="form-group ml-2 mr-2">
					<input type="text" class="form-control" id="id_user" name="id_user" value="<?= $rand_string ?>" hidden>
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Username</label>
					<input type="text" class="form-control" id="nama_user" name="nama_user">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Password</label>
					<input type="password" class="form-control" id="password1" name="password1">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Ulangi Password</label>
					<input type="password" class="form-control" id="password2" name="password2">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Email</label>
					<input type="text" class="form-control" id="email" name="email">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Nomer Telepon</label>
					<input type="text" class="form-control" id="no_tlp" name="no_tlp">
				</div>

				<div class="form-group ml-2 mr-2">
					<button type="submit" name="tambah" class="btn btn-primary">Submit</button>
				</div>

				<div class="form-group ml-2 mr-2">
					<a href="<?= base_url() ?>">Kembali ke Home</a>
				</div>

			</form>

		</div>

	</div>

</div>
