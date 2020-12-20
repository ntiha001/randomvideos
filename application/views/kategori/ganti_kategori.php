<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/show_allCategory">Show All Category</a></li>
		<li class="breadcrumb-item active" aria-current="page">Change Category</li>
	</ol>
</nav>

<div class="container-fluid md-2 mt-4 ">
	<div class="row justify-content-md-center">


		<div class="card" style="width: 18rem;">
			<div class="card-header ">
				Form Mengganti Kategori
			</div>
			<?= $this->session->flashdata('notify'); ?>
			<form id="form_regist" name="form_regist" action="<?= base_url(); ?>admin/edit_categoryAct" method="POST" enctype="multipart/form-data">
				<?php foreach ($kategorichange as $kat) {
				?>
					<div class="form-group ml-2 mr-2">
						<label for="codecategory">Code Category</label>
						<input type="text" class="form-control" id="kd_kategori" name="kd_kategori" value="<?= $kat['kd_kategori'] ?>">
					</div>

					<div class="form-group ml-2 mr-2">
						<label for="namecategory">Name Category</label>
						<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $kat['nama_kategori'] ?>">
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
