<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?= base_url() ?>home/login">Show All Release</a></li>
		<li class="breadcrumb-item active" aria-current="page">Add New Time Release</li>
	</ol>
</nav>

<div class="container-fluid md-2 mt-4 ">
	<div class="row justify-content-md-center">


		<div class="card" style="width: 18rem;">
			<div class="card-header ">
				Form Menambah Perilisan
			</div>
			<?= $this->session->flashdata('notify'); ?>
			<form id="form_regist" name="form_regist" action="<?= base_url(); ?>admin/newRelease" method="POST" enctype="multipart/form-data">

				<div class="form-group ml-2 mr-2">
					<input type="text" class="form-control" id="kdrelease" name="kd_rilis" value="<?= $rand_string ?>" hidden>
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Time Release</label>
					<input type="text" class="form-control" id="waktukrilis" name="waktu_rilis">
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
