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
</div>
<!-- /.container-fluid -->

<!-- Modal Delete-->

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
                            <?php if ($n['status'] == 1) : ?>
                                <td>Active</td>
                            <?php else : ?>
                                <td>Non-active</td>
                            <?php endif; ?>
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

<!-- Modal -->
<div class="modal fade" id="addNewsModal" tabindex="-1" role="dialog" aria-labelledby="addNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewsModalLabel">Add News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('news/add'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea name="content" id="editor1" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->
</div>