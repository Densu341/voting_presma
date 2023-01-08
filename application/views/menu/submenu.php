        <!-- Begin Page Content -->
        <div class="container-fluid" style="background-color: #eaeaea;">

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
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add Submenu</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($submenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td><?= $sm['is_active']; ?></td>
                                        <td>
                                            <a href="" class="badge badge-primary" data-toggle="modal" data-target="#editSubmenuModal<?= $sm['sub_id']; ?>"><i class="fas fa-pen-square" aria-hidden="true"></i></a>
                                            <a href="" class="badge badge-danger " data-toggle="modal" data-target="#deleteSubmenuModal" onclick="$('#deleteSubmenuModal #formDelete').attr('action', '<?= base_url() ?>menu/deletesubmenu/<?= $sm['sub_id']; ?>')"><i class="fas fa-trash" aria-hidden="true"></i></a>
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
        <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newSubMenuModalLabel">Add Submenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('menu/addsubmenu'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['menu_id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active" checked>
                                <label for="is_active" class="form-check-label">
                                    Active?
                                </label>
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
        <!-- End of Modal -->

        <!-- Modal Edit -->
        <?php $no = 1;
        foreach ($submenu as $sm) : $no++ ?>
            <div class="modal fade" id="editSubmenuModal<?= $sm['sub_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubmenuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editSubmenuModalLabel">Update Submenu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?= form_open_multipart('menu/editsubmenu'); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="sub_id" name="sub_id" value="<?= $sm['sub_id']; ?>">
                                <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>">
                            </div>
                            <div class="form-group">
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <?php foreach ($menu as $m) {
                                        if ($m['menu_id'] == $sm['menu_id']) { ?>
                                            <option value="<?php echo $m['menu_id']; ?>" selected><?php echo $m['menu']; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $m['menu_id']; ?>"><?php echo $m['menu']; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <!--aktif dan nonaktif-->
                                    <?php if ($sm['is_active'] == 1) { ?>
                                        <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active" checked>
                                    <?php } else { ?>
                                        <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active">
                                    <?php } ?>
                                    <label for="is_active" class="form-check-label">
                                        Active?
                                    </label>
                                </div>
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
        <!-- End of Modal edit -->

        <!-- Modal Delete -->
        <div class="modal fade" id="deleteSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="deleteSubmenuModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteSubmenuModalLabel">Delete Submenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formDelete" action="" method="POST">
                        <input type="hidden" name="sub_id" value="<?= $sm['sub_id']; ?>">
                        <div class="modal-body">
                            <p>Are you sure want to delete this submenu?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Modal Delete -->