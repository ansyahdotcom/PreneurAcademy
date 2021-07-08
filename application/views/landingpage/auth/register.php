<!--  ======================= Awalan Area Utama ================================ -->
<main class="site-main mt-lg-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-9 mx-auto">
				<div class="col-sm-12 text-center">
					<a class="navbar-brand" href="<?= base_url(); ?>">
						<img src="<?= base_url(); ?>assets/dist/img/logo.png" width="100" alt="logo"></a>
				</div>
				<div class="card row card-signin flex-row">
					<div class="col-md-6 d-none d-md-flex">
						<img src="<?= base_url('assets/dist/img/combi.svg'); ?>" class="card-img" width="50" alt="gambar">
					</div>
					<div class="card-body col-md-6">
						<h5 class="card-title text-center">Daftar Akun</h5>
						<form class="form-signin" method="POST" action="<?= base_url('peserta/auth/register'); ?>">
							<div>
								<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>">
								</div>
							</div>
							<div class="form-label-group">
								<input type="text" id="nama" name="nama" class="form-control" placeholder="Username" value="<?= set_value('nama'); ?>" required autofocus>
								<label for="nama">Nama Lengkap</label>
								<?= form_error('nama', '<small class="text-danger p-3">', '</small>'); ?>
							</div>
							<div class="form-label-group">
								<input type="email" id="email" name="email" class="form-control" value="<?= set_value('email'); ?>" placeholder="Email address" autocomplete="off" required autofocus>
								<label for="email">Alamat Email</label>
								<?= form_error('email', '<small class="text-danger p-3">', '</small>'); ?>
							</div>
							<div class="form-label-group">
								<input type="number" id="nomorwa" name="nomorwa" class="form-control" placeholder="Email address" value="<?= set_value('nomorwa'); ?>" autocomplete="off" required>
								<label for="nomorwa">Nomer WhatsApp</label>
								<?= form_error('nomorwa', '<small class="text-danger p-3">', '</small>'); ?>
							</div>
							<div class="form-label-group">
								<input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>" autocomplete="off" required>
								<label for="password">Kata Sandi</label>
								<?= form_error('password', '<small class="text-danger p-3">', '</small>'); ?>
							</div>
							<div class="form-label-group">
								<input type="password" id="password1" name="password1" class="form-control" placeholder="Password" value="<?= set_value('password1'); ?>" autocomplete="off" required>
								<label for="password1">Konfirmasi Kata Sandi</label>
								<?= form_error('password1', '<small class="text-danger p-3">', '</small>'); ?>
							</div>
							<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Daftar</button>
							<a class="d-block text-center mt-2 small" href="<?= base_url('auth'); ?>">Sudah punya
								akun?</a>
							<a class="d-block text-center mt-2 small" href="<?= base_url('forgot'); ?>">Lupa kata
								sandi?</a>
							<!-- <hr class="my-2"> -->
							<!-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Daftar dengan Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Daftar dengan Facebook</button> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>