<div class="container">
  <div class="row justify-content-center">
    <div class="col">
      <div class="text-center">
        <img src="<?= base_url('assets/img/logo_si.png') ?>" alt="logo" width="70px" height="70px" class="img-fluid">
        <h1 class="font-weight-bold text-light">SISTEM INFORMASI VOTING</h1>
      </div>
    </div>
  </div>


  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <div class="card o-hidden border-0 shadow-lg mb-5">
        <div class="row mb-0">
          <div class="col">
            <div class="text-center">
              <!-- logo -->
              <img src="<?= base_url('assets/img/logo.png') ?>" alt="logo" width="100px" height="100px" class="img-fluid">
            </div>
          </div>
        </div>

        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->

          <div class="row">
            <div class="col-lg">
              <div class="p-4">
                <div class="text-center">
                  <h1 class="h4 text-gray-700 mb-4">Login</h1>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="name" placeholder="Enter Username...." value="<?= set_value('name'); ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <button href="index.html" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>