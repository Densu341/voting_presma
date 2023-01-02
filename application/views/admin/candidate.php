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
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newCandidateModal">Add Candidate</a>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Visi</th>
                            <th scope="col">Misi</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($candidate as $c) : ?>
                            <tr>
                                <td><?= $c['nim']; ?></td>
                                <td><?= $c['nama_candidate']; ?></td>
                                <td><?= $c['nama_prodi']; ?></td>
                                <td><?= $c['visi']; ?></td>
                                <td><?= $c['misi']; ?></td>
                                <td><img src="<?= base_url() ?>assets/img/candidate/<?= $c['foto']; ?>" class="img-thumbnail" width="50px"></td>
                                <td>
                                    <a href="" class="badge badge-primary " data-toggle="modal" data-target="#editCandidateModal<?= $c['id_candidate']; ?>"><i class="fas fa-pen-square" aria-hidden="true"></i></a>
                                    <a href="" class="badge badge-danger " data-toggle="modal" data-target="#deleteCandidateModal" onclick="$('#deleteCandidateModal #formDelete').attr('action', '<?= base_url() ?>admin/deletecandidate/<?= $c['id_candidate']; ?>')"><i class="fas fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add Candidate -->
<div class="modal fade" id="newCandidateModal" tabindex="-1" role="dialog" aria-labelledby="newCandidateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCandidateModalLabel">Add Candidate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/addcandidate'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nama_candidate" name="nama_candidate" placeholder="Nama">
                </div>
                <div class="form-group">
                    <select name="id_prodi" id="id_prodi" class="form-control">
                        <option value="">Select Prodi</option>
                        <?php foreach ($prodi as $p) : ?>
                            <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto">Add Image</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <textarea class="form-control" id="visi" name="visi" rows="3" placeholder="Visi"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <textarea class="form-control" id="misi" name="misi" rows="3" placeholder="Misi"></textarea>
                    </div>
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
<!-- End Modal Add Candidate -->

<!-- Modal Edit Candidate -->
<?php foreach ($candidate as $c) : ?>
    <div class="modal fade" id="editCandidateModal<?= $c['id_candidate']; ?>" tabindex="-1" role="dialog" aria-labelledby="editCandidateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCandidateModalLabel">Edit Candidate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('admin/editcandidate/' . $c['id_candidate']); ?>
                <input type="hidden" name="id_candidate" value="<?= $c['id_candidate']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?= $c['nim']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_candidate" name="nama_candidate" placeholder="Nama Candidate" value="<?= $c['nama_candidate']; ?>">
                    </div>
                    <div class="form-group">
                        <select name="id_prodi" id="id_prodi" class="form-control">
                            <option value="">Select Prodi</option>
                            <?php foreach ($prodi as $p) : ?>
                                <?php if ($p['id_prodi'] == $c['id_prodi']) : ?>
                                    <option value="<?= $p['id_prodi']; ?>" selected><?= $p['nama_prodi']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $p['id_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Foto</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/candidate/') . $c['foto']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <textarea class="form-control" id="visi" name="visi" rows="3"><?= $c['visi']; ?></textarea>
                        </div>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="misi" name="misi" rows="3"><?= $c['misi']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Edit Candidate -->

<!-- Modal delete -->
<div class="modal fade" id="deleteCandidateModal" tabindex="-1" role="dialog" aria-labelledby="deleteCandidateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCandidateModalLabel">Delete Candidate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDelete" action="" method="POST">
                <input type="hidden" name="id_voters" value="<?= $c['id_candidate']; ?>">
                <div class="modal-body">
                    <p>Are you sure want to delete this candidare?</p>
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