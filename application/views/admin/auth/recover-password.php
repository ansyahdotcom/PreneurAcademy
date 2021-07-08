<div class="card">
  <div class="card-body login-card-body">
    <div class="login-logo">
      <a href="<?= base_url('authadm') ?>">
        <img src="<?= base_url(); ?>assets/dist/img/PA-white.svg" alt="PA Logo" class="brand-image" width="150px" style="opacity: .8">
      </a>
    </div>
    <!-- /.login-logo -->
    <p class="login-box-msg"><b>Masukkan</b> Password Baru Anda!</p>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h6 class="tex-center"><b>Email Anda: </b><?= $this->session->userdata('reset_email'); ?></h6>
    </div>


    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <form action="<?= base_url('admin/auth/recoverpsw'); ?>" method="post">
      <div class="input-group mb-3">
        <div class="input-group">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password baru">
          <div class="input-group-append">
            <button type="button" class="input-group-text" id="show-hide">
              <span class="fas fa-eye logos" id="icon"></span>
            </button>
          </div>
        </div>
        <div>
          <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>

      <div class="input-group mb-3">
        <div class="input-group">
          <input type="password" class="form-control" name="newpassword" id="password2" placeholder="Konfirmasi password baru">
          <div class="input-group-append">
            <button type="button" class="input-group-text" id="show-hide2">
              <span class="fas fa-eye logos" id="icon2"></span>
            </button>
          </div>
        </div>
        <div>
          <?= form_error('newpassword', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>

      <div class="row">
        <div class="col-12 btn-login">
          <button type="submit" class="btn btn-light btn-block">Ubah password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <p class="mb-1">
      <a href="<?= base_url('authadm'); ?>">Batal ubah password?</a>
    </p>
  </div>
  <!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->