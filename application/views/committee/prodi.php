        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="row">
                <div class="col-lg">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <?= $this->session->flashdata('message'); ?>
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newProdiModal">Add Prodi</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">No</th> -->
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Fakultas</th>
                                    <th scope="col">Prodi</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($prodi as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $p['nama_fakultas']; ?></td>
                                        <td><?= $p['nama_prodi']; ?></td>
                                        <td>
                                            <a href="" class="badge badge-primary" data-toggle="modal" data-target="#editProdiModal<?= $p['id_prodi']; ?>"><i class="fas fa-pen-square" aria-hidden="true"></i></a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteProdiModal" onclick="$('#deleteProdiModal #formDelete').attr('action', '<?= base_url() ?>committee/deleteprodi/<?= $p['id_prodi']; ?>')"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Add Prodi Modal -->
        <div class="modal fade" id="newProdiModal" tabindex="-1" role="dialog" aria-labelledby="newProdiModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newProdiModalLabel">Add New Prodi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('committee/addprodi'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="id_fakultas" id="id_fakultas" class="form-control">
                                <option value="">Select Faculty</option>
                                <?php foreach ($faculty as $f) : ?>
                                    <option value="<?= $f['id_fakultas']; ?>"><?= $f['nama_fakultas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" placeholder="Prodi Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
        <!-- End Add Prodi Modal -->

        <!-- Edit Prodi Modal -->
        <?php foreach ($prodi as $p) : ?>
            <div class="modal fade" id="editProdiModal<?= $p['id_prodi']; ?>" tabindex="-1" role="dialog" aria-labelledby="editProdiModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProdiModalLabel">Update Prodi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?= form_open_multipart('committee/editprodi'); ?>
                        <div class="modal-body">
                            <input type="hidden" name="id_prodi" value="<?= $p['id_prodi']; ?>">
                            <div class="form-group">
                                <select name="id_fakultas" id="id_fakultas" class="form-control">
                                    <option value="">Select Faculty</option>
                                    <?php foreach ($faculty as $f) {
                                        if ($f['id_fakultas'] == $p['id_fakultas']) { ?>
                                            <option value="<?php echo $f['id_fakultas']; ?>" selected><?php echo $f['nama_fakultas']; ?></option>
                                        <?php } else {
                                        ?>
                                            <option value="<?php echo $f['id_fakultas']; ?>"><?php echo $f['nama_fakultas']; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="<?= $p['nama_prodi']; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Edit Prodi Modal -->

        <!-- Delete Prodi Modal -->
        <div class="modal fade" id="deleteProdiModal" tabindex="-1" role="dialog" aria-labelledby="deleteProdiModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteProdiModalLabel">Delete Prodi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formDelete" action="" method="POST">
                        <input type="hidden" name="id_prodi" value="<?= $p['id_prodi']; ?>">
                        <div class="modal-body">
                            <p>Are you sure want to delete this prodi?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Delete Prodi Modal -->