<!--  ======================= Awalan Area Utama ================================ -->
<main class="site-main mt-lg-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 mx-auto">
				<div class="col-sm-12 text-center mt-4 mb-4">
					<a class="navbar-brand" href="<?= base_url(); ?>">
						<img src="<?= base_url(); ?>assets/dist/img/logo.png" width="100" alt="logo"></a>
				</div>
				<div class="card row card-signin flex-row mt-4">
					<div class="col-md-6 d-none d-md-flex">
						<img src="<?= base_url('assets/dist/img/combi.svg'); ?>" class="card-img" width="50" alt="gambar">
					</div>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
					<div class="card-body col-md-6">
						<h5 class="card-title text-center">Masuk Akun</h5>
						<form class="form-signin" method="POST" action="<?= base_url('peserta/auth/login'); ?>">
							<div class="form-label-group">
								<input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email" autofocus required>
								<label for="email">Email</label>
								<?= form_error('email', '<small class="text-danger p-3">', '</small>'); ?>
							</div>
							<div class="form-label-group">
								<input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Kata sandi" required>
								<label for="password">Kata Sandi</label>
								<?= form_error('password', '<small class="text-danger p-3">', '</small>'); ?>
							</div>
							<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Masuk</button>
							<a class="d-block text-center mt-2 small" href="<?= base_url('register'); ?>">Belum punya
								akun?</a>
							<a class="d-block text-center mt-2 small" href="<?= base_url('forgot'); ?>">Lupa kata
								sandi?</a>
							<hr class="my-2">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>