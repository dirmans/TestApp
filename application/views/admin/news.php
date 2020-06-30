<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data News</h1>
    <div class="row mt-4">
        <div class="col-lg-2 mb-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModel">
                <i class="fas fa-fw fa-plus-circle"></i> Add News
            </button>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>

    <!-- DataTales News -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List News </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Create Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($news as $n) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $n['title']; ?></td>
                                <td><?= $n['content']; ?></td>
                                <td><img src="<?= base_url('assets/img/news/') . $n['image']; ?>" class="img-thumbnail" width="80" height="80" style="border: 1px solid;"></td>
                                <td><?= $n['create_by']; ?></td>
                                <td><?= $n['create_date']; ?></td>
                                <td><?= $n['status']; ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="" title="Edit" data-toggle="modal" data-target="#editModal<?= $n['id_news']; ?>"><i class="fas fa-fw fa-edit"></i> </a>
                                    <a class="btn btn-danger btn-sm" href="" title="Delete" data-toggle="modal" data-target="#deleteModal<?= $n['id_news']; ?>"><i class="fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
</div>