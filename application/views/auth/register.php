<div class="container">

  <div class="row justify-content-center">
    <div class="col">
      <div class="text-center">
        <h2 class="font-weight-bold text-light">SISTEM INFORMASI VOTING</h2>
      </div>
    </div>
  </div>

  <div class="col-lg-5 mx-auto">
    <div class="card o-hidden border-0 shadow-lg my-4">
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
                <h1 class="h5 text-gray-700 mb-3">Create an Account!</h1>
              </div>
              <form class="user" method="POST" action="<?= base_url() ?>auth/register">

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Username" value="<?= set_value('name'); ?>">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url() ?>auth">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>