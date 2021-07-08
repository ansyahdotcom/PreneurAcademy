    <!--  ======================= Awalan Area Utama ================================ -->
    <main class="site-main">
        <!--  ======================= Awalan Banner=======================  -->
        <section class="bg-warning site-banner" id="hero">
            <div class="container mt-lg-2 mt-md-2 mt-sm-2">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-12 mt-5 site-title" data-aos="fade-right">
                        <div class="kelas">
                            <h2 id="text" class="text-uppercase mt-2 mb-5 text-center">Social Enterprise
                                Based Academy
                            </h2>
                            <!-- <h4 class="para font-weight-bold mt-2 mb-5">Kembangkan karirmu sebagai wirausahawan-->
                            <!--profesional.</h4>-->
                        </div>
                        <div class="site-buttons">
                            <div class="d-flex flex-row flex-wrap justify-content-center">
                                <a href="<?= base_url('register'); ?>"
                                    class="btn button primary-button ml-2 mr-2 text-uppercase">Daftar
                                    Sekarang</a>
                                <a href="#about-area"
                                    class="btn button secondary-button mr-2 ml-2 text-uppercase">Pelajari Lebih
                                    Lanjut</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 banner-image" data-aos="fade-left">
                        <img src="<?= base_url(); ?>assets/dist/img/banner/instruktur.svg" width="100"
                            alt="gambar kelas" class="img-fluid" id="animated">
                    </div>
                </div>
            </div>
        </section>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#FFC107" fill-opacity="1"
                d="M0,288L60,256C120,224,240,160,360,160C480,160,600,224,720,213.3C840,203,960,117,1080,106.7C1200,96,1320,160,1380,192L1440,224L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
            </path>
        </svg>
        <!--  ======================= Batas Banner =======================  -->

        <!--  ========================= Awalan About ==========================  -->

        <section class="about-area p-5 mt-5 mb-5" id="about-area">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-6 col-md-12" data-aos="fade-up">
                        <div class="about-image">
                            <img src="<?= base_url(); ?>assets/dist/img/celebration.svg" alt="About us"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 about-title" data-aos="fade-down">
                        <h3 class="text-uppercase text-center font-weight-bold pt-5">
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
                        <a href="<?= base_url('about'); ?>" class="btn button primary-button text-uppercase">Tentang
                            Kami</a>
                    </div>
                </div>
            </div>
        </section>

        <!--  ========================= Batas About ==========================  -->

        <!--  ========================= Awalan Program ==========================  -->

        <section class="about-area p-5 mt-5 mb-5" id="about-area">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-6 col-md-12 about-title" data-aos="fade-up">
                        <h3 class="text-uppercase text-center font-weight-bold pt-5">
                            <span>Program kami di</span>
                            <span>Preneur Academy?</span>
                        </h3>
                        <div class="about-image">
                            <img src="<?= base_url(); ?>assets/dist/img/setup.svg" alt="About us"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mt-5" data-aos="fade-down">
                        <div class="paragraph py-4 w-100">
                            <div class="card mb-3 bg-warning shadow border-light" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="<?= base_url(); ?>assets/dist/img/program/study.svg"
                                            class="card-img p-3" alt="gambar kelas">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body text-center">
                                            <h5 class="card-title font-weight-bold">Kelas Enterpreneur</h5>
                                            <p class="card-text">Kelas belajar untuk berwirausaha.</p>
                                            <a class="btn button primary-button" href="<?= base_url('class') ?>">Lihat
                                                Kelas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 bg-warning shadow border-light" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="<?= base_url(); ?>assets/dist/img/program/team.svg"
                                            class="card-img p-3" alt="gambar komunitas">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body text-center">
                                            <h5 class="card-title font-weight-bold">Gabung Komunitas</h5>
                                            <p class="card-text">Ikut berperan dalam perubahan.</p>
                                            <a class="btn button primary-button"
                                                href="<?= base_url('community') ?>">Bergabung Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--  ========================= Batas Program ==========================  -->


        <!--  ====================== Awalan Fitur =============================  -->

        <section class="services-area">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-12 text-center services-title">
                        <h3 class="text-uppercase font-weight-bold">Mengapa harus Preneur Academy ?</h3>
                        <p class="para">
                            Berikut merupakan fasilitas yang akan kamu dapat di Preneur Academy
                        </p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box shadow p-2">
                            <div class="icon">
                                <img src="<?= base_url(); ?>assets/dist/img/services/business.svg" width="220"
                                    class="img-fluid p-5" alt="Services-1">
                            </div>
                            <h4>Program 1.001 Wirausaha Baru</h4>
                            <!-- <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box shadow p-2">
                            <div class="icon">
                                <img src="<?= base_url(); ?>assets/dist/img/services/book.svg" class="img-fluid p-5"
                                    alt="Services-2">
                            </div>
                            <h4>Kurikulum pengajaran 6 bulan</h4>
                            <!-- <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p> -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box shadow p-2">
                            <div class="icon">
                                <img src="<?= base_url(); ?>assets/dist/img/services/realtime.svg" width="220"
                                    class="img-fluid p-5" alt="Services-3">
                            </div>
                            <h4>Pendampingan Seumur Hidup</h4>
                            <!-- <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p> -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box shadow p-2">
                            <div class="icon">
                                <img src="<?= base_url(); ?>assets/dist/img/services/graduate.svg" width="230"
                                    class="img-fluid p-5" alt="Services-4">
                            </div>
                            <h4>E-Sertifikat Webinar dan Kelas Enterpreneur</h4>
                            <!-- <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p> -->
                        </div>
                    </div>
                </div>
        </section>

        <!--  ====================== Batas Fitur =============================  -->

        <!--  ====================== Awalan FAQ =============================  -->
        <section id="faq" class="about-area faq bg-warning mt-5 mb-5">
            <div class="container" data-aos="fade-up">
                <div class="row text-center">
                    <div class="col-12">
                        <div class="about-title">
                            <h3 class="title-h1">FAQ <br>(Frequently Asked Questions)</h3>
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
                            href="#faq-list-1">Siapa founder dari Preneur Academy? <i
                                class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                            <p>
                                Agus Hadi Prayitno, S.Pt., M.Sc., CPC. atau yang akrab disapa dengan Coach HP selaku founder dari Preneur Academy. Beliau juga dosen di Program Studi Manajemen Bisnis Unggas, Jurusan Peternakan, Politeknik Negeri Jember.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2"
                            class="collapsed">Apa visi dan misi Preneur Academy? <i
                                class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                            <p class="mb-1">- Menciptakan sebanyak mungkin wirausaha baru</p>
                            <p class="mb-1">- Edukasi dan ekosistem bagi setiap orang yang ingin mengembangkan potensi
                                dirinya
                                menjadi wirausaha</p>
                            <p>- Komunitas yang dapat memberi manfaat dan dampak luar biasa untuk negeri</p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3"
                            class="collapsed">Apa perbedaan Preneur Academy dengan yang lainnya? <i
                                class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                            <p>
                                Tempat paling menyenangkan untuk setiap orang yang ingin menumbuhkan jiwa kewirausahaan
                                dan memberdayakan potensi dirinya untuk memulai dan mengembangkan usahanya sampai
                                berkelanjutan.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="400">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4"
                            class="collapsed">Apa yang saya dapatkan di preneur academy? <i
                                class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                            <p>
                                Anda medapatkan ilmu dalam berwirausaha, serta sertifikat dari kegiatan kelas dan
                                webinar.
                            </p>
                        </div>
                    </li>

                </ul>
            </div>

            </div>
        </section>
        <!--  ====================== Batas FAQ =============================  -->

        <!--  ======================== Awalan Blog ==============================  -->
        <section class="about-area mt-5">
            <div class="container" data-aos="fade-up">
                <div class="row text-center">
                    <div class="col-12">
                        <div class="about-title" id="Blog">
                            <a class="text-uppercase text-dark title-h1" style="text-decoration:none"
                                href="<?= base_url('blog'); ?>">Blog</a>
                            <p class="para">
                                Berikut beberapa artikel terkini.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container carousel py-lg-5">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($blog as $blg) { ?>
                    <div class="client row bg-light" data-aos="zoom-in">
                        <div class="mb-3" style="max-width: 540px;">
                            <div class="row no-gutters mr-2 ml-2">
                                <div class="col-md-12">
                                    <img src="<?= base_url('assets/fotoblog/' . $blg->FOTO_POST); ?>" class="card-img"
                                        alt="foto-post">
                                </div>
                                <div class="col-md-12">
                                    <div class="card-body">
                                    <a style="text-decoration : none;" href="<?= base_url('blog/detail/' . strtolower($blg->JUDUL_POST)); ?>">
                                        <h4 class="card-title font-weight-bold">
                                            <?= str_replace('-', ' ', $blg->JUDUL_POST); ?>
                                        </h4>
                                    </a>
                                        <p>
                                            <?php
                                                $aa = 100;
                                                $konten = htmlspecialchars_decode($blg->KONTEN_POST);
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
                                        <a class="font-weight-bold" style="text-decoration : none;"
                                            href="<?= base_url('blog/detail/' . strtolower($blg->JUDUL_POST)); ?>">read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="blog text-center" data-aos="fade-down">
                    <a href="<?= base_url('blog') ?>" class="btn button primary-button"><i
                            class="fas fa-chevron-right"></i> Lihat
                        Lebih Banyak</a>
                </div>
            </div>
        </section>

        <!--  ======================== Batas Blog ==============================  -->

        <!--  ========================== Subscribe me Area ============================  -->
        <section class="newsletter mt-5">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-md-10 text-center jumbotron bg-primary shadow">
                        <img src="<?= base_url(); ?>assets/dist/img/subscribe.svg" width="200" alt="gambar-envelope">
                        <div class="content text-center">
                            <h2 class="text-white">SUBSCRIBE</h2>
                            <p class="text-white">Dengan meng-klik subscribe artinya anda menyetujui layanan langganan
                                ke website ini.</p>
                            <form method="POST" action="<?= base_url('subscribe');?>">
                            <div class="input-group justify-content-center p-5">
                            <div><?php echo $this->session->flashdata('message'); ?></div>
                                <div class="row">
                                    <input type="hidden" name="url" value="<?= base_url(); ?>"required>
                                    <div class="col-sm-12">
                                        <input type="email" name="email" class="form-control mr-2 ml-1 mb-2" placeholder="Enter your email" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="btn btn-warning ml-2 mr-1 mb-2" type="submit">Subscribe Now</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#FFC107" fill-opacity="1"
                    d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </section>
        <!--  ========================== Batas Subscribe Area ============================  -->

    </main>
    <!--  ======================= End Main Area ================================ -->