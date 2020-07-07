<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <!-- Content Row -->
    <div class="row col">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="text-center">
                    <img class="img-thumbnail image-link mb-4" title="Click here to zoom image." href="<?= base_url('assets/img/profile/') . $user['image']; ?>" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="200" height="200">
                </div>
                <h3 class="profile-username text-center"><?= $user['name']; ?></h3>
                <p class="text-muted text-center"><?= $user['email']; ?></p>
                <a href="#" class="btn btn-primary btn-block"><i class="fab fa-fw fa-facebook"></i><b> Follow</b></a>
                <a href="#" class="btn btn-info btn-block"><i class="fab fa-fw fa-twitter"></i><b> Follow</b></a>
                <a href="#" class="btn btn-danger btn-block"><i class="fab fa-fw fa-youtube"></i><b> Subscribe</b></a>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                    B.S. in Computer Science from the University of Gunadarma
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Jakarta, Indonesia</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                    <span class="tag tag-danger">UI Design,</span>
                    <span class="tag tag-success">Coding,</span>
                    <span class="tag tag-info">Javascript,</span>
                    <span class="tag tag-warning">PHP,</span>
                    <span class="tag tag-primary">Codeiigniter</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Learn by doing day by day.</p>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->
</div>