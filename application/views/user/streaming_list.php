<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>user">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">My Random Videos</li>
		<li class="breadcrumb-item active" aria-current="page">Publish</li>
	</ol>
</nav>

<div class="container md-2 mt-4 ">
	<?= $this->session->flashdata('notify'); ?>
	<div class="row">
		<div class="col mb-2">
		</div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Number</th>
					<th scope="col">Id Stream</th>
					<th scope="col">Nama Video</th>
					<th scope="col">Id Video</th>
					<th scope="col">Act</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$numberic = 1;
				foreach ($streaming as $str) {
				?>
					<tr>
						<td><?= $numberic++ ?></td>
						<td><?= $str['id_streaming']; ?></td>
						<td><?= $str['nama_video']; ?></td>
						<td><?= $str['id_video']; ?></td>
						<td>
							<a href="" data-toggle="modal" data-codekategori="" data-target="#DeleteStreamingModal<?= $str['id_streaming'] ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>

</div>

<?php foreach ($streaming as $str) { ?>
	<div class="modal fade" id="DeleteStreamingModal<?= $str['id_streaming'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Videos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url(); ?>user/deletefromstream" method="POST">
					<div class="modal-body">
						<input type="text" class="form-control" name="id_streaming" value="<?= $str['id_streaming'] ?>" hidden>
						Are you sure want delete this video from public?
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
