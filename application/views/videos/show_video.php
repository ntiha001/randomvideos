<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<?php
		// $this->load->helper('video');
		// $youtube_url = 'http://www.youtube.com/watch?v=SLk4Ia0otko';

		// $id = youtube_id($youtube_url);
		foreach ($video as $vd) {
		?>
			<li class="breadcrumb-item"><a href="<?= base_url() ?>"> Home</a></li>
			<li class="breadcrumb-item" aria-current="page"> <?= $vd['nama_video'] ?></li>
	</ol>
</nav>

<br>
<h1 class="h3 mb-4 text-gray-800 ml-2"> <?= $vd['nama_video']; ?></h1>

<div class="embed-responsive embed-responsive-16by9">
	<iframe class="embed-responsive-item" src="<?= $vd['link_video'] ?>" allowfullscreen></iframe>
</div>

<div class="col-sm-8 mt-3">
	<div class="row mb-3">

		<h2>Watching <?= $vd['nama_video'] ?> Subtitle Indonesia</h2><br>
		<p>Deskripsi : <?= $vd['deskripsi'] ?></p>
	</div>

	<div class="media">
		<img src="<?= base_url() ?>assets/images/poster/<?= $vd['poster'] ?>" width="200" height="200" class="mr-3" alt="...">
		<div class="media-body">
			<!-- <h5 class="mt-0">Media heading</h5> -->
			<form action="">
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Genre :</label>
					<div class="col-sm-10">
						<label for="staticEmail" class="col-sm-2 col-form-label"><?= $vd['nama_kategori'] ?></label>
					</div>
				</div>

				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Casts :</label>
					<div class="col-sm-10">
						<label for="staticEmail" class="col-sm-4 col-form-label"><?= $vd['pemeran'] ?>
						</label>
					</div>
				</div>

				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Duration :</label>
					<div class="col-sm-10">
						<label for="staticEmail" class="col-sm-4 col-form-label"><?= $vd['durasi_waktu'] ?>
						</label>
					</div>
				</div>

				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">IMDb :</label>
					<div class="col-sm-10">
						<label for="staticEmail" class="col-sm-4 col-form-label"><?= $vd['skor'] ?>
						</label>
					</div>
				</div>

				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Release :</label>
					<div class="col-sm-10">
						<label for="staticEmail" class="col-sm-4 col-form-label"><?= $vd['waktu_rilis'] ?>
						</label>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>

<?php  ?>
<div class="container-fluid md-2 mt-4 ">
	<div class="row justify-content-md-center">
		<a href="<?= base_url() ?>">Kembali</a>
	</div>
<?php } ?>

</div>
