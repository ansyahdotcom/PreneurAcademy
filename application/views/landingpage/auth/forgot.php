<!--  ======================= Awalan Area Utama ================================ -->
<main class="site-main mt-lg-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="col-sm-12 text-center">
                    <a class="navbar-brand" href="<?= base_url(); ?>">
                        <img src="<?= base_url(); ?>assets/dist/img/logo.png" width="100" alt="logo"></a>
                </div>
                <div class="card card-signin flex-row">
                    <div class="col-md-6 d-none d-md-flex">
                        <img src="<?= base_url('assets/dist/img/combi.svg'); ?>" class="card-img" width="50"
                            alt="gambar">
                    </div>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <div class="card-body col-md-6">
                        <h5 class="card-title text-center">Lupa Kata Sandi</h5>
                        <form class="form-signin text-center" action="<?= base_url('peserta/auth/lupapsw'); ?>"
                            method="POST">
                            <img src="<?= base_url(); ?>assets/dist/img/forgot.svg" width="150" alt="lupasandi">
                            <small class="text-success">
                                <p>Masukkan Email Anda, Kami akan mengirimkan link untuk mengganti password</p>
                            </small>
                            <div class="form-label-group text-left">
                                <input type="email" id="email" class="form-control" name="email"
                                    placeholder="Email address" required>
                                <label for="email">Alamat Email</label>
                                <?= form_error('email', '<small class="text-danger p-3">', '</small>'); ?>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Kirim</button>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('auth'); ?>">Sudah punya
                                akun?</a>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('register'); ?>">Belum punya
                                akun?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>