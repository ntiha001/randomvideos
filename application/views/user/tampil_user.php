<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Show All Users</li>
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
					<th scope="col">Id User</th>
					<th scope="col">Username</th>
					<th scope="col">Email</th>
					<th scope="col">No Tlp</th>
					<th scope="col">Role</th>
					<th scope="col">Act</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$numberic = 1;
				foreach ($tb_user as $usr) {
				?>
					<tr>
						<td><?= $numberic++ ?></td>
						<td><?= $usr['id_user']; ?></td>
						<td><?= $usr['nama_user']; ?></td>
						<td><?= $usr['email']; ?></td>
						<td><?= $usr['no_tlp']; ?></td>
						<td><?= $usr['role']; ?></td>
						<td><a href="<?= base_url() ?>admin/edituser/<?= $usr['id_user']; ?>" class="btn btn-info">Change</a>
							<a href="" id="deleteUser" data-toggle="modal" data-codekategori="" data-target="#DeleteUserModal<?= $usr['id_user'] ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>

</div>

<?php
foreach ($userchange as $usr) {
?>
	<div class="modal fade" id="DeleteUserModal<?= $usr['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url(); ?>admin/deleteuser" method="POST">
					<div class="modal-body">
						<input type="text" class="form-control" id="iduserdelete" name="id_user" value="<?= $usr['id_user'] ?>" hidden>
						Are you sure want delete this User?
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
