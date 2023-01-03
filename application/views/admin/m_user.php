<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Mengaktifkan dan nonaktifkan user -->

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <!-- <th scope="col">No</th> -->
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">email</th>
                        <!-- <th scope="col">Last Active</th> -->
                        <th scope="col">Status</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($m_user as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['name']; ?></td>
                            <td><?= $m['email']; ?></td>
                            <!-- <td><?= date('d F Y', $m['last_active']); ?></td> -->
                            <td><?= $m['is_active']; ?></td>
                            <td>
                                <?php if ($m['is_active'] == 1) : ?>
                                    <a href="<?= base_url() ?>admin/nonaktifkan/<?= $m['id_user']; ?>" class="badge badge-danger">Nonaktifkan</a>
                                <?php else : ?>
                                    <a href="<?= base_url() ?>admin/aktifkan/<?= $m['id_user']; ?>" class="badge badge-success">Aktifkan</a>
                                <?php endif; ?>

                                <a href="" class="badge badge-danger " data-toggle="modal" data-target="#deleteUserModal" onclick="$('#deleteUserModal #formDelete').attr('action', '<?= base_url() ?>admin/deleteuser/<?= $m['id_user']; ?>')"><i class="fas fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
            </table>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal delete -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDelete" action="" method="POST">
                <input type="hidden" name="id_user" value="<?= $m['id_user']; ?>">
                <div class="modal-body">
                    <p>Are you sure want to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal -->