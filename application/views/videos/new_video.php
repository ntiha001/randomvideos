<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>user">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Upload a New Video</li>
	</ol>
</nav>

<div class="container-fluid md-2 mt-4 ">
	<div class="row justify-content-md-center">


		<div class="card" style="width: 18rem;">
			<div class="card-header ">
				Add new video
			</div>
			<?= $this->session->flashdata('notify'); ?>
			<form id="form_regist" name="form_regist" action="<?= base_url(); ?>user/newvideos" method="POST" enctype="multipart/form-data">

				<div class="form-group ml-2 mr-2">
					<input type="text" class="form-control" id="id_video" name="id_video" value="<?= $rand_string ?>" hidden>
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="iduser">Id User</label>
					<input type="text" class="form-control" id="id_user" name="id_user" value="<?= $user['id_user'] ?>" readonly>
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Name Video</label>
					<input type="text" class="form-control" id="nama_video" name="nama_video">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Link Video</label>
					<input type="text" class="form-control" id="link_video" name="link_video">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Poster</label>
					<input type="file" class="form-control-file" id="poster" name="poster">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="kategori">Category</label>
					<select class="custom-select" id="kdkategori" name="kd_kategori">
						<option selected>Select Category</option>
						<?php foreach ($kategori as $kat) { ?>
							<option value="<?= $kat['kd_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Actress</label>
					<input type="text" class="form-control" id="pemeran" name="pemeran">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="exampleInputEmail1">Description</label>
					<textarea class="form-control" name="deskripsi" id="text" cols="30" rows=4></textarea>
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="durasiwaktu">Duration Time</label>
					<input type="text" class="form-control" id="durasiwaktu" name="durasi_waktu">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="hasilskor">Score</label>
					<input type="text" class="form-control" id="skor" name="skor">
				</div>

				<div class="form-group ml-2 mr-2">
					<label for="rilis">Release</label>
					<select class="custom-select" id="kdrilis" name="kd_rilis">
						<option selected>Select Time Release</option>
						<?php foreach ($rilis as $rls) { ?>
							<option value="<?= $rls['kd_rilis'] ?>"><?= $rls['waktu_rilis'] ?></option>
						<?php } ?>
					</select>
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
