<!-- isi konten dimulai -->
<div class="container-fluid">
	<?php
	$role_akses = $this->session->userdata('role');
	if (empty($video)) {
	?>
		<div class="alert alert-danger" role="alert">
			Video yang dicari tidak ditemukan!!
		</div>
	<?php } ?>
	<div class="row">
		<?php

		//if (isset($_GET['pencarian'])) {
		//set show hasil pencarian
		?>
		<!-- <div class="col-sm mt-3">
			<div class="card" style="width: 18rem;">
				<img src="" width="100" height="250" class="card-img-top" alt="">
				<div class="card-body">
					<h5 class="card-title" hidden></h5>
					<p class="card-text">

					</p>
				</div>
			</div>
		</div> -->
		<?php
		//} else {

		//show all video
		//while ($baris = mysqli_fetch_assoc($query)) {
		foreach ($video as $vd) {
		?>

			<div class="col-sm mt-3">
				<div class="card" style="width: 18rem;">
					<img src="<?= base_url() ?>assets/images/poster/<?= $vd['poster'] ?>" width="100" height="250" class="card-img-top" alt="">
					<div class="card-body">
						<?php foreach ($rilis as $rls) {
							if ($vd['kd_rilis'] == $rls['kd_rilis']) {
								$set_thnrilis = $rls['waktu_rilis'];
							}
						}

						?>
						<h5 class="card-title"><?= $vd['nama_video'] ?> (<?= $set_thnrilis; ?>)</h5>
						<p class="card-text">
							<?= $vd['pemeran'] ?>
						</p>
						<a href="<?= base_url() ?>home/show_selected_video/<?= $vd['nama_video'] ?>" class="btn btn-success">Play</a>
						<?php
						if ($role_akses == "user") { ?>
							<a href="<?= base_url() ?>user/editedvideo/<?= $vd['id_video'] ?>" class="btn btn-info">Change</a>
							<a href="" id="deleteVideo" data-toggle="modal" data-codekategori="" data-target="#DeleteVideobyUserModal<?= $vd['id_video'] ?>" class="btn btn-danger">Delete</a>
						<?php	}
						?>
					</div>
				</div>
			</div>
		<?php
		}
		//}
		//} 
		?>

	</div>
</div>
<!-- isi terakhir konten -->

<?php foreach ($video as $vd) { ?>
	<div class="modal fade" id="DeleteVideobyUserModal<?= $vd['id_video'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Videos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url(); ?>user/deletevideo" method="POST">
					<div class="modal-body">
						<!-- <p><span id="kodekategoridelete"></span></p> -->
						<input type="text" class="form-control" name="id_video" value="<?= $vd['id_video'] ?>" hidden>
						Are you sure want delete this video?
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Yes</button>
						<a href="#" class="btn btn-secondary" data-dismiss="modal">No</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php } ?>
