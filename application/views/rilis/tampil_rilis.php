<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Show All Release</li>
	</ol>
</nav>

<div class="container md-2 mt-4 ">
	<?= $this->session->flashdata('notify'); ?>
	<div class="row">
		<div class="col mb-2">
			<a href="<?= base_url() ?>admin/newRelease" class="btn btn-primary">Add New Release</a>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">Number</th>
					<th scope="col">Code Release</th>
					<th scope="col">Year Release</th>
					<th scope="col">Act</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$numberic = 1;
				foreach ($rilis as $rls) {
				?>
					<tr>
						<td><?= $numberic++ ?></td>
						<td><?= $rls['kd_rilis']; ?></td>
						<td><?= $rls['waktu_rilis']; ?></td>
						<td><a href="<?= base_url() ?>admin/editrelease/<?= $rls['kd_rilis'] ?>" class="btn btn-info">Change</a>
							<a href="" data-toggle="modal" data-target="#DeleteReleaseModal<?= $rls['kd_rilis']; ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>

</div>
