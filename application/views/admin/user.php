<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $u) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $u['name']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td><img src="<?= base_url('assets/img/profile/') . $u['image']; ?>" href="<?= base_url('assets/img/profile/') . $u['image']; ?>" class="img-thumbnail image-link" width="80" height="80" style="border: 1px solid;"></td>
                                <?php if ($u['role_id'] == 1) : ?>
                                    <td>Admin</td>
                                <?php else : ?>
                                    <td>Member</td>
                                <?php endif; ?>
                                <?php if ($u['user_active'] == 1) : ?>
                                    <td>Active</td>
                                <?php else : ?>
                                    <td>Non-active</td>
                                <?php endif; ?>
                                <td>
                                    <a class="btn btn-success btn-sm" href="" title="Edit" data-toggle="modal" data-target="#editModal<?= $u['id_user']; ?>"><i class="fas fa-fw fa-edit"></i> </a>
                                    <a class="btn btn-danger btn-sm" href="" title="Delete" data-toggle="modal" data-target="#deleteModal<?= $u['id_user']; ?>"><i class="fas fa-fw fa-trash"></i></a>
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
<!-- Modal Edit-->
<?php foreach ($data as $u) : ?>
    <div class="modal fade" id="editModal<?= $u['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/edit'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Fungsi Edit -->
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= $u['email']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $u['name']; ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">Picture</div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/profile/') . $u['image']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <input type="hidden" id="old_image" name="old_image" value="<?= $u['image']; ?>">
                                                    <input type="file" class="form-control-file" id="image" name="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="user_active" id="user_active" class="form-control">
                                            <?php if ($u['user_active']  == 1) : ?>
                                                <option value="<?= $u['user_active']; ?>">Active</option>
                                            <?php else : ?>
                                                <option value="<?= $u['user_active']; ?>">Non-active</option>
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
<!-- Modal Delete-->
<?php foreach ($data as $u) : ?>
    <div class="modal fade" id="deleteModal<?= $u['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('user/delete/') . $u['id_user']; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Are you sure to delete this user ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="image" value="<?= $u['image']; ?>">
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