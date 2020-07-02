<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Career</h1>
    <div class="row mt-4">
        <div class="col-lg-2 mb-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCareerModal">
                <i class="fas fa-fw fa-plus-circle"></i> Add Career
            </button>
        </div>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Career -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Career </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code Career</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($career as $c) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $c['code_career']; ?></td>
                                <td><?= $c['title']; ?></td>
                                <td style="word-wrap: break-word;min-width: 200px;max-width: 600px;"><?= htmlspecialchars($c['content']); ?></td>
                                <?php if ($c['status'] == 1) : ?>
                                    <td>Active</td>
                                <?php else : ?>
                                    <td>Non-active</td>
                                <?php endif; ?>
                                <td>
                                    <a class="btn btn-success btn-sm" href="" title="Edit" data-toggle="modal" data-target="#editModalCareer<?= $c['id_career']; ?>"><i class="fas fa-fw fa-edit"></i> </a>
                                    <a class="btn btn-danger btn-sm" href="" title="Delete" data-toggle="modal" data-target="#deleteModalCareer<?= $c['id_career']; ?>"><i class="fas fa-fw fa-trash"></i></a>
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

<!-- Modal Add -->
<div class="modal fade" id="addCareerModal" tabindex="-1" role="dialog" aria-labelledby="addCareerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form action="<?= base_url('career/add'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCareerModalLabel">Add Career</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="code_career" class="col-sm-2 col-form-label">Code Career</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="code_career" name="code_career">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea name="content" id="editor1" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit-->
<?php foreach ($career as $c) : ?>
    <div class="modal fade" id="editModalCareer<?= $c['id_career']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalCareerLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalCareerLabel">Edit Career</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('career/edit'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Fungsi Edit -->
                                <div class="form-group row">
                                    <label for="code_career" class="col-sm-2 col-form-label">Code Career</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" id="id_career" name="id_career" value="<?= $c['id_career']; ?>" readonly>
                                        <input type="text" class="form-control" id="code_career" name="code_career" value="<?= $c['code_career']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title" value="<?= $c['title']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="content" class="col-sm-2 col-form-label">Content</label>
                                    <div class="col-sm-10">
                                        <textarea name="content" id="editor2" cols="30" rows="10"><?= $c['content']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="form-control">
                                            <?php if ($c['status']  == 1) : ?>
                                                <option value="<?= $c['status']; ?>">Active</option>
                                            <?php else : ?>
                                                <option value="<?= $c['status']; ?>">Non-active</option>
                                            <?php endif; ?>
                                            <option value="1">Active</option>
                                            <option value="0">Non-active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.container-fluid -->
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
<!-- End Modal Edit -->

<!-- Modal Delete-->
<?php foreach ($career as $c) : ?>
    <div class="modal fade" id="deleteModalCareer<?= $c['id_career']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalCareerLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('career/delete/') . $c['id_career']; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalCareerLabel">Are you sure to delete this user ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Delete -->

<!-- End of Main Content -->
</div>