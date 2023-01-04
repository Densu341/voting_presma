        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


          <div class="row">
            <div class="col-lg-6">
              <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
              <?= $this->session->flashdata('message'); ?>
              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($menu as $m) : ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $m['menu']; ?></td>
                      <td>
                        <a href="" class="badge badge-primary" data-toggle="modal" data-target="#editMenuModal<?= $m['menu_id']; ?>"><i class="fas fa-pen-square" aria-hidden="true"></i></a>
                        <a href="" class="badge badge-danger btn" data-toggle="modal" data-target="#deleteMenuModal" onclick="$('#deleteMenuModal #formDelete').attr('action', '<?= base_url() ?>menu/deletemenu/<?= $m['menu_id']; ?>')"><i class="fas fa-trash" aria-hidden="true"></i></a>
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
        <!-- End of Main Content -->

        <!-- Modal -->
        <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?= form_open_multipart('menu/addmenu'); ?>
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="menu" name="menu" placeholder="Add new menu">
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

        <!-- Modal edit -->
        <?php $no = 1;
        foreach ($menu as $m) : $no++; ?>
          <div class="modal fade" id="editMenuModal<?= $m['menu_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editMenuModalLabel">Update Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?= form_open_multipart('menu/editmenu'); ?>
                <div class="modal-body">
                  <div class="form-group">
                    <input type="hidden" name="menu_id" value="<?= $m['menu_id']; ?>">
                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu']; ?>">
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
        <div class="modal fade" id="deleteMenuModal" tabindex="-1" role="dialog" aria-labelledby="deleteMenuModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteMenuModalLabel">Delete Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="formDelete" action="" method="POST">
                <input type="hidden" name="role_id" value="<?= $m['menu_id']; ?>">
                <div class="modal-body">
                  <p>Are you sure want to delete this menu?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger">Delete</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Delete -->