<footer class="footer mt-4">
	<nav class="navbar navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="row mb-3">
				<div class="col-sm-4">
					<h3 class="text-white">Kategori</h3>
					<?php
					$role_akses = $this->session->userdata('role');
					if ($role_akses == "admin") {
						foreach ($kategori as $kat) {
					?>
							<li><a href="<?= base_url() ?>admin/show_category_selectedAdmin/<?= $kat['nama_kategori'] ?>" class="text-white"><?= $kat['nama_kategori'] ?></a></li>
						<?php }
					} elseif ($role_akses == "user") {
						foreach ($kategori as $kat) {
						?>
							<li><a href="<?= base_url() ?>user/show_category_selectedUser/<?= $kat['nama_kategori'] ?>" class="text-white"><?= $kat['nama_kategori'] ?></a></li>
						<?php }
					} else {
						foreach ($kategori as $kat) {
						?>
							<li><a href="<?= base_url() ?>home/show_categoryselected/<?= $kat['nama_kategori'] ?>" class="text-white"><?= $kat['nama_kategori'] ?></a></li>
					<?php }
					} ?>
				</div>

				<div class="col-sm-4 ml-5">
					<h3 class="text-white">Tahun</h3>
					<?php
					if ($role_akses == "admin") {
						foreach ($rilis as $rls) {
					?>
							<li><a href="<?= base_url() ?>admin/show_release_selectedAdmin/<?= $rls['waktu_rilis'] ?>" class="text-white"><?= $rls['waktu_rilis'] ?></a></li>
						<?php }
					} elseif ($role_akses == "user") {
						foreach ($rilis as $rls) {
						?>
							<li><a href="<?= base_url() ?>user/show_release_selectedUser/<?= $rls['waktu_rilis'] ?>" class="text-white"><?= $rls['waktu_rilis'] ?></a></li>
						<?php }
					} else {
						foreach ($rilis as $rls) {
						?>
							<li><a href="<?= base_url() ?>home/show_release_selected/<?= $rls['waktu_rilis'] ?>" class="text-white"><?= $rls['waktu_rilis'] ?></a></li>
					<?php
						}
					}
					?>
				</div>

				<div class="col-sm-2">
					<img src="<?= base_url() ?>assets/images/rvtv.jpg" width="400" height="200" alt="">
				</div>
			</div>

			<div class="col-sm-2 mb-5">
				<h3 class="text-white">Lain-Lain</h3>
				<?php

				if ($role_akses == "user") {

				?>
					<li><a href="<?= base_url() ?>user" class="text-white">Home</a></li>
					<li><a href="<?= base_url() ?>user/privacy_user" class="text-white">Privacy Policy RV Tv</a></li>
					<li><a href="<?= base_url() ?>user/aboutus_user" class="text-white">About Us</a></li>
					<li><a href="<?= base_url() ?>user/faq_user" class="text-white">FAQ</a></li>
					<li><a href="<?= base_url() ?>user/iklan_user" class="text-white">Iklan</a></li>
				<?php } elseif ($role_akses == "admin") {
				?>
					<li><a href="<?= base_url() ?>admin" class="text-white">Home</a></li>
					<li><a href="<?= base_url() ?>admin/privacy_admin" class="text-white">Privacy Policy RV Tv</a></li>
					<li><a href="<?= base_url() ?>admin/aboutus_admin" class="text-white">About Us</a></li>
					<li><a href="<?= base_url() ?>admin/faq_admin" class="text-white">FAQ</a></li>
					<li><a href="<?= base_url() ?>admin/iklan_admin" class="text-white">Iklan</a></li>
				<?php
				} else {
				?>
					<li><a href="<?= base_url() ?>home" class="text-white">Home</a></li>
					<li><a href="<?= base_url() ?>home/privacy_home" class="text-white">Privacy Policy RV Tv</a></li>
					<li><a href="<?= base_url() ?>home/aboutus_home" class="text-white">About Us</a></li>
					<li><a href="<?= base_url() ?>home/faq_home" class="text-white">FAQ</a></li>
					<li><a href="<?= base_url() ?>home/iklan_home" class="text-white">Iklan</a></li>
				<?php
				}
				?>
			</div>

			<div class="col-sm-12">
				<p class="text-center text-white">Copyright &copy; RandomVideos TV <?= date('Y'); ?></p>
			</div>

		</div>

	</nav>
</footer>
<!-- Modal -->
<div class="modal fade" id="LogOutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure want log out?
			</div>
			<div class="modal-footer">
				<a href="<?= base_url() ?>home/log_out" class="btn btn-danger">Yes</a>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<?php
foreach ($kategori as $kat) {
?>
	<div class="modal fade" id="DeleteCategoryModal<?= $kat['kd_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url(); ?>admin/deletecategory" method="POST">
					<div class="modal-body">
						<!-- <p><span id="kodekategoridelete"></span></p> -->
						<input type="text" class="form-control" id="kodekategoridelete" name="kd_kategori" value="<?= $kat['kd_kategori'] ?>" hidden>
						Are you sure want delete this category?
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Yes</button>
						<a href="#" class="btn btn-secondary" data-dismiss="modal">No</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php }
?>

<?php
foreach ($rilis as $rls) {
?>
	<div class="modal fade" id="DeleteReleaseModal<?= $rls['kd_rilis'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Release</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url(); ?>admin/deleterelease" method="POST">
					<div class="modal-body">
						<input type="text" class="form-control" id="koderilisdelete" name="kd_rilis" value="<?= $rls['kd_rilis'] ?>" hidden>
						Are you sure want delete this time release?
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-danger">Yes</button>
						<a href="#" class="btn btn-secondary" data-dismiss="modal">No</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php }
?>
</body>

<script>
	$(document).ready(function() {
		$(document).on('click', '#deleteCategory', function() {
			var kodekategori = $(this).data('codekategori');
			$('#kodekategoridelete').text(kodekategori);

			// var idbrgkeluar = $(this).data('idbrgklr');
			// var nmbrgkeluar = $(this).data('nmbrgklr');
			// var hrgbelikeluar = $(this).data('hrgbeliklr');
			// var hrgbrgkeluar = $(this).data('hrgjualklr');
			// var stokout = $(this).data('stockklr');
			// $('#id_brgk').val(idbrgkeluar);
			// $('#nm_brgk').val(nmbrgkeluar);
			// $('#hrg_belik').val(hrgbelikeluar);
			// $('#hrg_jualk').val(hrgbrgkeluar);
			// $('#stok_awalk').val(stokout);
			// $('#lihatbarangkeluarModal').modal('hide');
		});
	});
</script>



<script src="<?= base_url(); ?>assets/dist/js/jquery.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/bootstrap.bundle.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>
