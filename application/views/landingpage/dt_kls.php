<!--  ======================= Awalan Area Utama ================================ -->
<main class="site-main">
    <section class="header">
        <div class="container mt-lg-5 mt-md-5 mt-sm-5 py-4">
            <?php foreach ($kelas as $row) { ?>
            <div class="row bg-warning rounded shadow">
                <div class="col-md-6 col-sm-12 mb-4 text-center" data-aos="fade-up">
                    <img src="<?= base_url('assets/dist/img/kelas/') . $row->GBR_KLS; ?>" width="400"
                        class="img-fluid mt-5" alt="gambar-kelas">
                </div>
                <div class="col-md-6 col-sm-12 mb-4" data-aos="fade-down">
                    <div class="p-4">
                        <div class="mb-3">
                            <span class="badge bg-primary mr-1 text-light"><?= $row->KTGKLS ?></span>
                        </div>
                        <h3 class="font-roboto"><?= $row->TITTLE; ?></h3>
                        <p class="lead">
                            <span class="mr-1">
                                <del>Rp. <?= number_format($row->PRICE, 0, ".", "."); ?></del>
                            </span>
                            <span class="btn btn-sm btn-info text-bold">
                                <i class="fas fa-wallet"></i>
                                Bayar Semampunya</span>
                        </p>

                        <label for="keterangan" class="btn btn-primary btn-sm">
                            Sesuai dengan kemampuan finansial Anda
                        </label>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-sm-12">
                                <a href="<?= base_url('class'); ?>" class="btn button bg-light text-center"><i
                                        class="fas fa-arrow-left"></i>
                                    Kembali</a>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <?php if ($this->session->userdata('role') == '2') :
        							?>
                                <a href="<?= base_url('peserta/kelas') ?>" class="btn button bg-light text-center"><i
                                        class="fas fa-shopping-cart"></i> Beli Kelas</a>
                                <?php elseif($this->session->userdata('role') == '1') : ?>
                                
                                <?php else : ?>
                                <a href="<?= base_url('register') ?>" class="btn button bg-light text-center"><i
                                        class="fas fa-shopping-cart"></i> Beli Kelas</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <hr>

    <!--  ========================= Awalan Deskripsi ==========================  -->
    <section id="faq" class="about-area faq faq-kls mb-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="about-title">
                        <h3 class="title-h1" data-aos="fade-up">Informasi Kelas</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="deskripsi">
            <div class="row justify-content-center mt-2 mb-2">
                <div class="card border-light shadow col-md-8 mr-1 ml-1" data-aos="fade-right">
                    <div class="card-header">
                        <h5>Deskripsi</h5>
                    </div>
                    <div class="card-body">
                        <p><?= $row->DESKRIPSI; ?>.</p>
                    </div>
                </div>
                <div class="card border-light shadow col-md-3 mr-1 ml-1" data-aos="fade-left">
                    <div class="card-header">
                        <h5>Detail Kelas</h5>
                    </div>
                    <div class="card-body border-light">
                        <h6 class="">Mulai</h6>
                        <p class="font-weight-bold"><?= tanggal_indo($row->TGL_MULAI, true); ?></p>
                        <h6 class="">Selesai</h6>
                        <p class="font-weight-bold"><?= tanggal_indo($row->TGL_SELESAI, true); ?></p>
                        <h6 class="">Harga Kelas + Sertifikat</h6>
                        <del class="font-weight-bold">Rp. <?= number_format($row->PRICE, 0, ".", "."); ?></del>
                        <p class="text-muted">
                            <small>* Bayar sesuai dengan finansial Anda</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ========================= Batas Deskripsi ==========================  -->
    <?php } ?>
    </div>


    <!--  ========================= Awalan FAQ ==========================  -->
    <section id="faq" class="about-area faq faq-kls mt-5 mb-5">
        <div class="container" data-aos="fade-up">
            <div class="row text-center">
                <div class="col-12">
                    <div class="about-title">
                        <h3 class="title-h1">FAQ</h3>
                        <p class="para text-dark">
                            Berikut beberapa list pertanyaan yang sering diajukan.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="faq-list">
            <ul>
                <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse"
                        href="#faq-list-1">Bagaimana cara membeli kelas ini? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                        <p>
                        <p>
                            - Pertama daftar ke akun baru jika belum punya akun atau langsung masuk dengan akun social
                            media anda.
                        </p>
                        <p>
                            - Selanjutnya login masuk akun, jika anda masuk menggunakan akun social media. maka anda
                            tidak perlu mendaftar akun.
                        </p>
                        <p>
                            - Selanjutnya lanjut ke Daftar Kelas dan pilih kelas yang anda inginkan. Pastikan anda
                            melihat kouta kelas tersebut telah penuh atau tidak.
                        </p>
                        <p>
                            - Selanjutnya selesaikan pembayaran yang tersedia.
                        </p>
                        <p>
                            - Jika sudah terverifikasi membayar, Anda bisa mengikuti kegiatan belajar dan mengajar.
                        </p>
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2"
                        class="collapsed">Bagaimana jika terjadi kesalahan pembelian? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                        <p>
                            Segera lakukan konfirmasi pembayaran jika terdapat kesalahan sistem.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="300">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3"
                        class="collapsed">Apakah saya bisa membeli kelas lebih dari satu? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                        <p>
                            Sistem kami mengharuskan anda untuk menyelesaikan satu kelas untuk bisa ke kelas lainnya.
                        </p>
                    </div>
                </li>
            </ul>
        </div>

        </div>
    </section>
    <!--  ========================= Batas FAQ ==========================  -->
</main>