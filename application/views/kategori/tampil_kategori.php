<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Show All Category</li>
	</ol>
</nav>

<div class="container md-2 mt-4 ">
	<?= $this->session->flashdata('notify'); ?>
	<div class="row">
		<div class="col mb-2">
			<a href="<?= base_url() ?>admin/newCategory" class="btn btn-primary">Add New Category</a>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">Number</th>
					<th scope="col">Code Category</th>
					<th scope="col">Category Name</th>
					<th scope="col">Act</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$numberic = 1;
				foreach ($kategori as $kat) {
				?>
					<tr>
						<td><?= $numberic++ ?></td>
						<td><?= $kat['kd_kategori']; ?></td>
						<td><?= $kat['nama_kategori']; ?></td>
						<td><a href="<?= base_url() ?>admin/editcategory/<?= $kat['kd_kategori'] ?>" class="btn btn-info">Change</a>
							<a id="deleteCategory" data-toggle="modal" data-codekategori="" data-target="#DeleteCategoryModal<?= $kat['kd_kategori'] ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>

</div>
