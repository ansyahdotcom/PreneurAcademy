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
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <img src="<?= base_url(); ?>assets/dist/img/logo.png" width="130" alt="logo">
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="blog.html">Preneur Webinar</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted" href="#" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                    </a>
                    <a class="btn btn-sm btn-primary" href="#">Masuk</a>
                </div>
            </div>
        </header>

        <!--  ======================= Awalan Navbar ============================== -->
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex">
                <a class="p-2 text-muted" href="index.html">Beranda</a>
                <a class="p-2 text-muted" href="#">Kelas</a>
                <a class="p-2 text-muted" href="#">Tips & Trick</a>
                <a class="p-2 text-muted" href="#">Inspirasi</a>
                <a class="p-2 text-muted" href="#">Komunitas</a>
            </nav>
        </div>
        <!--  ======================= Batas Navbar ============================== -->