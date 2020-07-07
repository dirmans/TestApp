<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row ml-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-gradient-primary">
                <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>" class="text-light">Home</a></li>
                <li class="breadcrumb-item active text-light" aria-current="page">Data News</li>
            </ol>
        </nav>
    </div>
    <?= $this->session->flashdata('message'); ?>

    <!-- DataTales News -->
    <div class="card border-primary shadow mb-4">
        <div class="card-header border-primary py-3">
            <h6 class="m-0 font-weight-bold text-primary">List News </h6>
        </div>
        <div class="card-body">
            <div class="row ml-1 mb-3">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addNewsModal">
                    <i class="fas fa-fw fa-plus-circle"></i> Add News
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
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
                                <td style="word-wrap: break-word;min-width: 200px;max-width: 800px;"><?= htmlspecialchars($n['content']); ?></td>
                                <td><img src="<?= base_url('assets/img/news/') . $n['image']; ?>" class="img-thumbnail image-link" href="<?= base_url('assets/img/news/') . $n['image']; ?>" title="Click here to zoom image." width="80" height="80" style="border: 1px solid;"></td>
                                <td><?= $n['create_by']; ?></td>
                                <?php if ($n['status'] == 1) : ?>
                                    <td>Active</td>
                                <?php else : ?>
                                    <td>Non-active</td>
                                <?php endif; ?>
                                <td>
                                    <a class="btn btn-success btn-sm" href="" title="Edit" data-toggle="modal" data-target="#editNewsModal<?= $n['id_news']; ?>"><i class="fas fa-fw fa-edit"></i> </a>
                                    <a class="btn btn-danger btn-sm" href="" title="Delete" data-toggle="modal" data-target="#deleteNewsModal<?= $n['id_news']; ?>"><i class="fas fa-fw fa-trash"></i></a>
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

<!-- Modal Add News -->
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
                            <input type="text" class="form-control" id="title" name="title" required>
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
                            <textarea name="content" id="editor1" cols="30" rows="10" required></textarea>
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
<!-- Modal End News -->

<!-- Modal Edit News -->
<?php foreach ($news as $n) : ?>
    <div class="modal fade" id="editNewsModal<?= $n['id_news']; ?>" tabindex="-1" role="dialog" aria-labelledby="editNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNewsModalLabel">Edit News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('news/edit'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="id_news" name="id_news" value="<?= $n['id_news']; ?>">
                                <input type="text" class="form-control" id="title" name="title" value="<?= $n['title']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="hidden" id="old_image" name="old_image" value="<?= $n['image']; ?>">
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea name="content" id="editor2" cols="30" rows="10"><?= $n['content']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <?php if ($n['status']  == 1) : ?>
                                        <option value="<?= $n['status']; ?>">Active</option>
                                    <?php else : ?>
                                        <option value="<?= $n['status']; ?>">Non-active</option>
                                    <?php endif; ?>
                                    <option value="1">Active</option>
                                    <option value="0">Non-active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal End Edit News -->


<!-- Modal Delete News -->
<?php foreach ($news as $n) : ?>
    <div class="modal fade" id="deleteNewsModal<?= $n['id_news']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('news/delete/') . $n['id_news']; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header modal-primary">
                        <h5 class="modal-title" id="deleteNewsModalLabel">Are you sure to delete this user ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="image" value="<?= $n['image']; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Delete News -->

<!-- End of Main Content -->
</div>