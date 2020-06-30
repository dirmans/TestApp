<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Archives</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
    <!-- <div class="row mt-4">
        <div class="col-lg-2 mb-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>
        </div>
    </div> -->
    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List User </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Tumbnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <?php foreach ($news as $u) : ?>
                        <tbody>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $u->judul; ?></td>
                                <td><?= $u->tanggal; ?></td>
                                <td><img src="<?= base_url('assets/img/news/') . $u->tumbnail; ?>" class="img-thumbnail" width="80" height="80" style="border: 1px solid;"></td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="" title="Edit" data-toggle="modal" data-target="#editModal<?= $u->id; ?>"><i class="fas fa-fw fa-edit"></i> </a>
                                    <a class="btn btn-danger btn-sm" href="" title="Delete" data-toggle="modal" data-target="#deleteModal<?= $u->id; ?>"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Delete-->
<?php foreach ($news as $u) : ?>
    <div class="modal fade" id="deleteModal<?= $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('news/delete_news/') . $u->id; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Are you sure to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="image" value="<?= $u->tumbnail; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>
<!-- End of Main Content -->
</div>