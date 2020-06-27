<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

	</div>
	<div class="card mb-3 col-lg-8 my-auto" style="max-width: 560px;">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img mx-5" style="width:60%; margin-top: 6px">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title"><?= $user['name']; ?></h5>
					<p class="card-text"><?= $user['email']; ?></p>
					<p class="card-text">What is Lorem Ipsum?
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>