<div class="card">
	<div class="card-body login-card-body">
		<div class="login-logo">
			<a href="<?= base_url('authadm') ?>">
				<img src="<?= base_url(); ?>assets/dist/img/PA-white.svg" alt="PA Logo" class="brand-image"
					width="150px" style="opacity: .8">
			</a>
		</div>
		<!-- /.login-logo -->
		<p class="login-box-msg">Halaman <b>Log</b>-in</p>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

		<form action="<?= base_url('admin/auth'); ?>" method="post">
			<div class="mb-3">
				<div class="input-group">
					<input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>"
						placeholder="Email" required autofocus>
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

			<div class="mb-3">
				<div class="input-group">
					<input type="password" class="form-control" name="password" id="password" placeholder="Password"
						required>
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
			<div class="row">
				<!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
				<!-- /.col -->
				<div class="col-12 btn-login">
					<button type="submit" class="btn btn-light btn-block">Masuk</button>
				</div>
				<!-- /.col -->
			</div>
		</form>

		<!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
		<!-- /.social-auth-links -->

		<p class="mb-1">
			<a href="<?= base_url('forgotadm'); ?>">Lupa password?</a>
		</p>
	</div>
	<!-- /.login-card-body -->
</div>
</div>
<!-- /.login-box -->
