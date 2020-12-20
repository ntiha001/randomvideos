<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/show_allRelease">Show All Release</a></li>
		<li class="breadcrumb-item active" aria-current="page">Change Release</li>
	</ol>
</nav>

<div class="container-fluid md-2 mt-4 ">
	<div class="row justify-content-md-center">


		<div class="card" style="width: 18rem;">
			<div class="card-header ">
				Form Mengganti Waktu Rilis
			</div>
			<?= $this->session->flashdata('notify'); ?>
			<form id="form_regist" name="form_regist" action="<?= base_url(); ?>admin/edit_releaseAct" method="POST" enctype="multipart/form-data">
				<?php foreach ($rilischange as $rls) {
				?>
					<div class="form-group ml-2 mr-2">
						<label for="codecategory">Code Release</label>
						<input type="text" class="form-control" id="kdrilis" name="kd_rilis" value="<?= $rls['kd_rilis'] ?>">
					</div>

					<div class="form-group ml-2 mr-2">
						<label for="namecategory">Time Release</label>
						<input type="text" class="form-control" id="wkturealease" name="waktu_rilis" value="<?= $rls['waktu_rilis'] ?>">
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
