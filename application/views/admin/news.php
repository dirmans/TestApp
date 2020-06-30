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
                    <br>
                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tumbnail</th>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $row) {
                $no = 1; ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><img src="<?= base_url() ?>assets/img/news/<?= $row->tumbnail; ?>" width="100px" alt="img"></td>
                    <td><?= $row->judul; ?></td>
                    <td><?= $row->tanggal; ?></td>
                    <td>
                        <button class="btn btn-danger">Delete</button>
                        <button class="btn btn-primary">Edit</button>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>