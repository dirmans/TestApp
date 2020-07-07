<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Product</h1>
    <div class="row mt-4">
        <div class="col-lg-2 mb-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModel">
                <i class="fas fa-fw fa-plus-circle"></i> Add Product
            </button>
        </div>
    </div>

    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Product -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Product </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Code Product</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $p) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $p['code_product']; ?></td>
                                <td><?= $p['name']; ?></td>
                                <td><?= $p['category']; ?></td>
                                <td><img src="<?= base_url('assets/img/product/') . $p['image']; ?>" href="<?= base_url('assets/img/product/') . $p['image']; ?>" title="Click here to zoom image." class="img-thumbnail image-link" width="80" height="80" style="border: 1px solid;"></td>
                                <?php if ($p['status'] == 1) : ?>
                                    <td>Active</td>
                                <?php else : ?>
                                    <td>Non-active</td>
                                <?php endif; ?>
                                <td>
                                    <a class="btn btn-success btn-sm" href="" title="Edit" data-toggle="modal" data-target="#editModal<?= $p['id_product']; ?>"><i class="fas fa-fw fa-edit"></i> </a>
                                    <a class="btn btn-danger btn-sm" href="" title="Delete" data-toggle="modal" data-target="#deleteModal<?= $p['id_product']; ?>"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="addProductModel" tabindex="-1" role="dialog" aria-labelledby="addProductModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= base_url('product/add'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModelLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="code_product" class="col-sm-2 col-form-label">Code Product</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="code_product" name="code_product">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="category" name="category">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control-file" id="image" name="image" required>
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
<?php foreach ($data as $p) : ?>
    <div class="modal fade" id="editModal<?= $p['id_product']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('product/edit'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Fungsi Edit -->
                                <div class="form-group row">
                                    <label for="code_product" class="col-sm-2 col-form-label">Code Product</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="code_product" name="code_product" value="<?= $p['code_product']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $p['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="category" name="category" value="<?= $p['category']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">Picture</div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/product/') . $p['image']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <input type="hidden" id="old_image" name="old_image" value="<?= $p['image']; ?>">
                                                    <input type="file" class="form-control-file" id="image" name="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" id="status" class="form-control">
                                            <?php if ($p['status']  == 1) : ?>
                                                <option value="<?= $p['status']; ?>">Active</option>
                                            <?php else : ?>
                                                <option value="<?= $p['status']; ?>">Non-active</option>
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
<?php foreach ($data as $p) : ?>
    <div class="modal fade" id="deleteModal<?= $p['id_product']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?= base_url('product/delete/') . $p['id_product']; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Are you sure to delete this user ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="image" value="<?= $p['image']; ?>">
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