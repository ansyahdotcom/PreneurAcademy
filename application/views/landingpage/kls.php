<!--  ======================= Awalan Area Utama ================================ -->
<main class="site-main">
    <section class="bg-warning" id="hero">
        <div class="container mt-lg-5 mt-md-5 mt-sm-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-12 mt-5 site-title" data-aos="fade-right">
                    <div class="kelas">
                        <h1 class="display-4 title-text font-weight-bold mt-2">
                            Kelas Entrepreneur (Online)
                        </h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-center banner-image mb-2" data-aos="fade-left">
                    <img src="<?= base_url(); ?>assets/dist/img/program/study.svg" width="200" alt="gambar kelas"
                        class="img-fluid" id="animated">
                </div>
            </div>
        </div>
    </section>
    <!--  ======================= Batas Banner =======================  -->

    <!-- Page Content -->
    <div class="container p-5 mt-5 mb-5">
        <div class="row">
            <?php if ($kelas == null) : ?>
            <!-- Jika Belum Terdapat data -->
            <div class="col-md">
                <div class="card-body text-center mt-4">
                    <img src="<?= base_url('assets/icon/noList.svg'); ?>" alt="noData"
                        class="img-rounded img-responsive img-fluid" width="100">
                </div>
                <div class="card-body pt-0 mt-4">
                    <h3 class="text-center text-bold text-muted">Belum terdapat postingan.</h3>
                </div>
            </div>
            <?php else : ?>
            <?php foreach ($kelas as $k) : ?>
            <div class="col-md-4 col-sm-12 mb-5">
                <div class="card h-100 border-light shadow" data-aos="fade-down">
                    <img class="rounded" src="<?= base_url('assets/dist/img/kelas/') . $k->GBR_KLS; ?>"
                        alt="gambar-kelas">
                    <!--<div class="gambar card-img-overlay align-items-center">-->
                    <!--    <span-->
                    <!--        class="float-left badge bg-light-->
                    <!--        ml-0 font-weight-bold text-light"><?= $k->KTGKLS ?></span>-->
                    <!--    <span class="float-right badge bg-warning font-weight-bold">Rp.-->
                    <!--        <del><?= number_format($k->PRICE, 0, ".", "."); ?></del>-->
                    <!--    </span>-->
                    <!--</div>-->
                    <div class="card-body">
                        <a style="text-decoration : none;" href="<?= base_url('class-detail/' . $k->PERMALINK); ?>">
                            <h4 class="font-weight-bold"><?= $k->TITTLE; ?></h4></a>
                        <p class="mt-4">
                            <?php 
                            $aa = 90;
                            $konten = htmlspecialchars_decode($k->DESKRIPSI);
                            $em = str_replace('<em>', '', $konten);
                            $strong = str_replace('<strong>', '', $em);
                            $count = strlen($strong);
                            if ($count > $aa) {
                                $char = $strong[$aa - 1];
                                while ($char != ' ') {
                                    $char = $strong[--$aa];
                                }
                                echo substr($strong, 0, $aa) . ' ...';
                            } else {
                                echo $strong;
                            }
                            
                            ?>
                            <a style="text-decoration : none;" href="<?= base_url('class-detail/' . $k->PERMALINK); ?>"
                                class=" font-weight-bold m-2">selengkapnya</a>
                        </p>
                    </div>
                    <!--<div class="card-footer align-items-center">-->
                    <!--    <div class="row d-flex">-->
                            <!--<div class="col-md-3 text-center col-sm-1">-->
                            <!--    <img class="rounded-circle" width="50"-->
                            <!--        src="<?= base_url('assets/dist/img/admin/') . $k->FTO_ADM; ?>" alt="foto penyusun">-->
                            <!--</div>-->
                            <!--<div class="col-md-9 text-center col-sm-10">-->
                            <!--    <p class="para text-dark mt-2 text-center"><?= $k->NM_ADM ?></p>-->
                            <!--</div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <hr>

    <!--  ========================= Awalan About ==========================  -->

    <section class="about-area p-5 mt-5 mb-5" id="about-area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6 col-md-12" data-aos="fade-up">
                    <div class="about-image">
                        <img src="<?= base_url(); ?>assets/dist/img/celebration.svg" alt="About us" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 about-title" data-aos="fade-down">
                    <h3 class="text-uppercase font-weight-bold pt-5">
                        <span>Apa Itu</span>
                        <span>Preneur Academy?</span>
                    </h3>
                    <div class="paragraph py-4 w-100">
                        <p class="para">
                            Merupakan ruang edukasi, ekosistem, dan komunitas wirausaha (E2KWU) yang mendorong
                            pemberdayaan potensi diri untuk memberi manfaat pada lingkungannya melalui kegiatan
                            kewirausahaan yang berkelanjutan.
                        </p>
                        <p class="para">
                            Preneur Academy dirancang dengan pendekatan <b>training</b>, <b>mentoring</b>,
                            <b>consulting</b>, dan <b>coaching (TM2C)</b>
                            dalam proses pembelajaran.
                        </p>
                    </div>
                    <button type="button" class="btn button primary-button text-uppercase">Tentang Kami</button>
                </div>
            </div>
        </div>
    </section>

    <!--  ========================= Batas About ==========================  -->

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
                        href="#faq-list-1">Apa itu Kelas Online? <i class="bx bx-chevron-down icon-show"></i><i
                            class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                        <p>
                            Kursus online atau belajar online adalah serangkaian pengalaman instruksional dengan
                            menggunakan jaringan digital untuk berinteraksi, belajar dan berdiskusi. Kursus online tidak
                            memerlukan pertemuan tatap muka di lokasi fisik.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2"
                        class="collapsed">Bagaimana cara mendaftar kelas online di Preneur Academy? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-2" class="collapse" data-parent=".faq-list">
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
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="300">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3"
                        class="collapsed">Bagaimana dengan sistem pembayaran yang tersedia? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                        <p>
                            Untuk media pembayaran di Preneur Academy menggunakan payment gateway, atau via virtual
                            account bank yang tersedia.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="400">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4"
                        class="collapsed">Apa perbedaan kelas online di Preneur Academy dengan kelas online lain? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                        <p>
                            Kelas online di Preneur Academy lebih berfokus kepada kegiatan berwirausaha.
                        </p>
                    </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="500">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5"
                        class="collapsed">Apa yang saya dapat jika saya mendaftar kelas online di Preneur Academy? <i
                            class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                        <p>
                            Anda mendapatkan ilmu baru dalam berwirausaha serta sertifikat dari kegiatan webinar dan
                            kelas online.
                        </p>
                    </div>
                </li>

            </ul>
        </div>

        </div>
    </section>
    <!--  ========================= Batas FAQ ==========================  -->
</main>