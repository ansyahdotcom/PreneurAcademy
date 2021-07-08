<!--  ======================= Awalan Area Utama ================================ -->
<main class="site-main">
    <section class="header">
        <div class="container mt-lg-5 mt-md-5 mt-sm-5 py-4">
            <?php foreach ($webinar as $row) { ?>
            <div class="row bg-warning rounded shadow">
                <div class="col-md-6 col-sm-12 mb-4 text-center" data-aos="fade-up">
                    <img src="<?= base_url('assets/fotowebinar/') . $row->FOTO_WEBINAR; ?>" width="400"
                        class="img-fluid mt-5" alt="gambar-kelas">
                </div>
                <div class="col-md-6 col-sm-12 mb-4" data-aos="fade-down">
                    <div class="p-4">
                        <!-- <div class="mb-2">
                            <span class="badge badge-primary text-light"><?= $row->PLATFORM ?></span>
                        </div> -->
                        <h5 class="font-roboto font-weight-bold mt-4"><?= str_replace('-', ' ', $row->JUDUL_WEBINAR); ?></h5>
                        <p class="lead">
                            <span class="btn btn-sm btn-light text-bold">
                                <?= $row->HARGA; ?>
                            </span>
                        </p>
                        <hr>
                        <a href="<?= base_url('admin/webinar'); ?>" class="btn button secondary-button float-left"><i
                                class="fas fa-arrow-left"></i>
                            Kembali</a>

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
                        <h3 class="title-h1" data-aos="fade-up">Informasi Webinar</h3>
                        <!-- <p class="para text-dark">
                            Deskripsi kelas beserta tanggal kelas.
                        </p> -->
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
                        <p><?= htmlspecialchars_decode($row->KONTEN_WEB); ?>.</p>
                    </div>
                </div>
                <div class="card border-light shadow col-md-2 mr-1 ml-1" data-aos="fade-left">
                    <div class="card-header">
                        <h5>Pembicara</h5>
                    </div>
                    <div class="card-body h-100 border-light text-center">
                        <img class="rounded text-center" width="150"
                            src="<?= base_url('assets/dist/img/admin/') . $row->FTO_ADM; ?>" alt="gambar-kelas">
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold"><?= $row->NM_ADM ?></h5>
                        </div>
                        <h6 class="text-center">Coach HP</h6>
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
                        href="#faq-list-1">Bagaimana cara mengikuti webinar ini? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                        <p>
                            - Pertama daftar ke akun baru jika belum punya akun atau langsung masuk dengan akun social
                            media anda.
                        </p>
                        <p>
                            - Selanjutnya login masuk akun, jika anda masuk menggunakan akun social media. maka anda
                            tidak perlu mendaftar akun.
                        </p>
                        <p>
                            - Selanjutnya lanjut ke Daftar Webinar dan pilih webinar yang anda inginkan.
                        </p>
                        <p>
                            - Selanjutnya isi data diri yang dibutuhkan untuk mengikuti webinar.
                        </p>
                        <p>
                            - Jika sudah terdaftar, anda dapat mengakses webinar di Webinar Saya.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2"
                        class="collapsed">Bagaimana cara mengambil sertifikat webinar ini? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                        <p>
                            Untuk sertifikat hasil webinar akan di posting setelah webinar selesai, bagi siapa pun yang
                            terdaftar akan mendapat sertifikat.
                        </p>
                    </div>
                </li>
            </ul>
        </div>

        </div>
    </section>
    <!--  ========================= Batas FAQ ==========================  -->
</main>