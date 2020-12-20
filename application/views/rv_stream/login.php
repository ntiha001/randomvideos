<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Login</li>
	</ol>
</nav>

<div class="container-fluid md-2 mt-4 ">
	<div class="row justify-content-md-center">


		<div class="card" style="width: 18rem;">
			<div class="card-header ">
				Form Login
			</div>
			<?= $this->session->flashdata('notify'); ?>

			<form action="<?= base_url() ?>home/login" method="POST">
				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Username</label>
					<input type="text" class="form-control" name="nama_user" id="nama_user">
				</div>
				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Password</label>
					<input type="Password" class="form-control" name="password" id="password">
				</div>

				<div class="form-group ml-2 mr-2">
					<!-- <button type="submit" name="tambah" class="btn btn-primary">Login</button> -->
					<button class="btn btn-lg btn-danger btn-block" type="submit">Masuk</button>
					<br>
					<a href="<?= base_url() ?>home/register">Membuat Akun</a>
					<br>
					<!-- <a href="lupa_password.php">Lupa Password</a> -->
				</div>

			</form>

		</div>

	</div>

</div>
