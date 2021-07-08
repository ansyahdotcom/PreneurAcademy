<!--  ======================= Awalan Area Utama ================================ -->
<main class="site-main mt-lg-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card row card-signin flex-row">
                    <div class="col-md-6 d-none d-md-flex">
                        <img src="<?= base_url('assets/dist/img/combi.svg'); ?>" class="card-img" width="50"
                            alt="gambar">
                    </div>
                    <div class="card-body col-md-6">
                        <h5 class="card-title text-center">Ubah Password</h5>
                        <?= $this->session->flashdata('message'); ?>
                        <h6 class="text-center"><b>Email Anda: </b><?= $this->session->userdata('reset_email'); ?></h6>
                        <form class="form-signin" method="POST" action="<?= base_url('peserta/auth/recoverpsw'); ?>">
                            <div class="form-label-group">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="Password Baru" required>
                                <label for="password">Password Baru</label>
                                <?= form_error('password', '<small class="text-danger p-3">', '</small>'); ?>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="password1" class="form-control" name="password1"
                                    placeholder="Konfirmasi Password" required>
                                <label for="password1">Konfirmasi Password</label>
                                <?= form_error('password1', '<small class="text-danger p-3">', '</small>'); ?>
                            </div>

                            <div class="mt-3">
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Ubah
                                    Password</button>
                            </div>
                            <a class="d-block text-center mt-2 small" href="<?= base_url('auth'); ?>">Batal ubah
                                password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>