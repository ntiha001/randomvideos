<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>user">Dashboard</a></li>
	</ol>
</nav>

<div class="container-fluid md-2 mt-4 ">
	<?= $this->session->flashdata('notify'); ?>
	<div class="row justify-content-md-center">
		<div class="card" style="width: 18rem;">
			<div class="card-body">
				<h5 class="card-title">Your Information</h5>
				<h6 class="card-subtitle mb-2">Id User : <?= $user['id_user']; ?></h6>
				<h6 class="card-subtitle mb-2">Username : <?= $user['nama_user']; ?></h6>
				<h6 class="card-subtitle mb-3">Role : <?= $user['role']; ?></h6>
				<a href="<?= base_url() ?>user/newvideos" class="btn btn-primary"><i class="fa fa-upload">
					</i> Upload a New Videos</a>
			</div>
		</div>


	</div>

</div>
