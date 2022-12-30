<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['role']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/roleaccess/') . $r['role_id']; ?>" class="badge badge-warning"><i class="fas fa-door-open"></i></a>
                                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#editRoleModal<?= $r['role_id']; ?>"><i class="fas fa-pen-square" aria-hidden="true"></i></a>
                                <a href="" class="badge badge-danger btn" data-toggle="modal" data-target="#deleteRoleModal" onclick="$('#deleteRoleModal #formDelete').attr('action', '<?= base_url() ?>admin/deleterole/<?= $r['role_id']; ?>')"><i class="fas fa-trash" aria-hidden="true"></i></a>

                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/addrole'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            <?= form_close(); ?>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit Role -->
<?php $no = 1;
foreach ($role as $r) : $no++; ?>
    <div class="modal fade" id="editRoleModal<?= $r['role_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('admin/editrole'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="role_id" name="role_id" value="<?= $r['role_id']; ?>">
                        <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Edit Role -->

<!-- Modal Delete Role -->
<div class="modal fade" id="deleteRoleModal" tabindex="-1" role="dialog" aria-labelledby="deleteRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoleModalLabel">Delete Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDelete" action="" method="POST">
                <input type="hidden" name="role_id" value="<?= $r['role_id']; ?>">
                <div class="modal-body">
                    <p>Are you sure want to delete this role?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete Role -->