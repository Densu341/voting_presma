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
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newVotersModal">Add Voters</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">No</th> -->
                                    <th scope="col">#</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Prodi</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($voters as $v) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $v['nim']; ?></td>
                                        <td><?= $v['nama_voters']; ?></td>
                                        <td>
                                            <?= $v['nama_prodi']; ?>
                                        </td>
                                        <td>
                                            <a href="" class="badge badge-primary" data-toggle="modal" data-target="#editVotersModal<?= $v['id_voters']; ?>"><i class="fas fa-pen-square" aria-hidden="true"></i></a>
                                            <a href="" class="badge badge-danger " data-toggle="modal" data-target="#deleteVotersModal" onclick="$('#deleteVotersModal #formDelete').attr('action', '<?= base_url() ?>committee/deletevoters/<?= $v['id_voters']; ?>')"><i class="fas fa-trash" aria-hidden="true"></i></a>
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

        <!-- Modal -->
        <div class="modal fade" id="newVotersModal" tabindex="-1" role="dialog" aria-labelledby="newVotersModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newVotersModalLabel">Add Voters</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('committee/addvoters'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_voters" name="nama_voters" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <select name="id_prodi" id="id_prodi" class="form-control">
                                <option value="">Select Prodi</option>
                                <?php foreach ($prodi as $p) : ?>
                                    <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                                <?php endforeach; ?>
                            </select>
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
        <!-- End of Modal -->

        <!-- Modal Edit -->
        <?php $no = 0;
        foreach ($voters as $v) : $no++ ?>
            <div class="modal fade" id="editVotersModal<?= $v['id_voters']; ?>" tabindex="-1" role="dialog" aria-labelledby="editVotersModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editVotersModalLabel">Edit Voters</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?= form_open_multipart('committee/editvoters'); ?>
                        <input type="hidden" name="id_voters" value="<?= $v['id_voters']; ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?= $v['nim']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_voters" name="nama_voters" placeholder="Nama" value="<?= $v['nama_voters']; ?>">
                            </div>
                            <div class="form-group">
                                <select name="id_prodi" id="id_prodi" class="form-control">
                                    <option value="">Select Prodi</option>
                                    <?php foreach ($prodi as $p) {
                                        if ($p['id_prodi'] == $v['id_prodi']) { ?>
                                            <option value="<?php echo $p['id_prodi']; ?>" selected><?php echo $p['nama_prodi']; ?></option>
                                        <?php } else {
                                        ?>
                                            <option value="<?php echo $p['id_prodi']; ?>"><?php echo $p['nama_prodi']; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
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
        <!-- End of Edit -->

        <!-- Modal delete -->
        <div class="modal fade" id="deleteVotersModal" tabindex="-1" role="dialog" aria-labelledby="deleteVotersModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteVotersModalLabel">Delete Voters</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formDelete" action="" method="POST">
                        <input type="hidden" name="id_voters" value="<?= $v['id_voters']; ?>">
                        <div class="modal-body">
                            <p>Are you sure want to delete this voters?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Modal -->