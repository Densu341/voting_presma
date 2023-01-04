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
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newFacultyModal">Add Faculty</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">No</th> -->
                                    <th scope="col">#</th>
                                    <th scope="col">Fakultas</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($faculty as $f) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $f['nama_fakultas']; ?></td>
                                        <td>
                                            <a href="" class="badge badge-primary" data-toggle="modal" data-target="#editFacultyModal<?= $f['id_fakultas']; ?>"><i class="fas fa-pen-square" aria-hidden="true"></i></a>
                                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#deleteFacultyModal" onclick="$('#deleteFacultyModal #formDelete').attr('action', '<?= base_url() ?>committee/deletefaculty/<?= $f['id_fakultas']; ?>')"><i class="fas fa-trash" aria-hidden="true"></i></a>
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

        <!-- Add Faculty Modal -->
        <div class="modal fade" id="newFacultyModal" tabindex="-1" role="dialog" aria-labelledby="newFacultyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newFacultyModalLabel">Add Faculty</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('committee/addfaculty'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" placeholder="Faculty Name">
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
        <!-- End Add Faculty Modal -->

        <!-- Edit Faculty Modal -->
        <?php foreach ($faculty as $f) : ?>
            <div class="modal fade" id="editFacultyModal<?= $f['id_fakultas']; ?>" tabindex="-1" role="dialog" aria-labelledby="editFacultyModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editFacultyModalLabel">Update Faculty</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?= form_open_multipart('committee/editfaculty'); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_fakultas" name="id_fakultas" value="<?= $f['id_fakultas']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="<?= $f['nama_fakultas']; ?>">
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
        <!-- End Edit Faculty Modal -->

        <!-- Delete Faculty Modal -->
        <div class="modal fade" id="deleteFacultyModal" tabindex="-1" role="dialog" aria-labelledby="deleteFacultyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteFacultyModalLabel">Delete Faculty</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formDelete" action="" method="POST">
                        <input type="hidden" name="id_fakultas" value="<?= $f['id_fakultas']; ?>">
                        <div class="modal-body">
                            <p>Are you sure want to delete this faculty?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Delete Faculty Modal -->