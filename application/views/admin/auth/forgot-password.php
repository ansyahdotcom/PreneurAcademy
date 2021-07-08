  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo">
        <a href="<?= base_url('authadm') ?>">
          <img src="<?= base_url(); ?>assets/dist/img/PA-white.svg" alt="PA Logo" class="brand-image" width="150px" style="opacity: .8">
        </a>
      </div>
      <!-- /.login-logo -->
      <p class="login-box-msg"><b>Lupa</b> Password</p>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
      <form action="<?= base_url('admin/auth/forgotpsw'); ?>" method="post">
        <div class="input-group mb-3">
          <div class="input-group">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope logos"></span>
              </div>
            </div>
          </div>
          <div>
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>

        <div class="row">
          <div class="col-12 btn-login">
            <button type="submit" class="btn btn-light btn-block">Minta password baru</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="<?= base_url('authadm'); ?>">Kembali ke halaman login?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
  </div>
  <!-- /.login-box -->