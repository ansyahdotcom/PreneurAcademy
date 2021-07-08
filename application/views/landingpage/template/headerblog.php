<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $judul ?></title>


    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/blog.css">

    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/icofont.min.css">

    <!-- Google Recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-32x32.png"
        sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-16x16.png"
        sizes="16x16" />
    <!-- Box Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/boxicons/css/boxicons.min.css">

    <!-- AOS Accordion -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/aos.css">

    <!-- CSS Accordion -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/accordion.css">

    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.css">

    <!--  font awesome icons  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/login.css">

    <!--  Magnific Popup css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/js/plugin/Magnific-Popup/dist/magnific-popup.css">

    <!--  Owl-carousel css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/js/plugin/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/js/plugin/owl-carousel/css/owl.theme.default.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <!--  custom css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/style.css">

    <!--  Responsive css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/responsive.css">
</head>

<body>
    <div class="container-fluid bg-light">
        <!--  ======================= Awalan Header ============================== -->
        <header class="blog-header p-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a href="<?= base_url() ?>"><img src="<?= base_url(); ?>assets/dist/img/logo.png" width="130"
                            alt="logo"></a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="<?= base_url('blog'); ?>">
                        <h3>Preneur Academy Blog</h3>
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted" href="#" data-toggle="modal" data-target="#search" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                            viewBox="0 0 24 24" focusable="false">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                    </a>
                    <?php if (!$this->session->userdata('role') == '1') : ?>
                    <a class="button primary-button btn-md" href="<?= base_url('auth') ?>">Masuk <i
                            class="fas fa-sign-in-alt"></i></a>
                    <?php else : ?>
                    <a class="button secondary-button btn-md" href="<?= base_url('admin/blog') ?>"><i
                            class="fas fa-arrow-left"></i> KEMBALI</a>
                    <?php endif; ?>
                </div>
            </div>
        </header>