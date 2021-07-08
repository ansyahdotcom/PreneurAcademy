
    <footer class="footer-area bg-warning">
        <div class="container">
            <div class="">
                <div class="site-logo text-center py-4">
                    <a href="<?= base_url('peserta/auth'); ?>"><img src="<?= base_url(); ?>assets/dist/img/logo.png" width="150" alt="logo"></a>
                </div>
                    <div class="container-fluid text-center text-md-left">
                    <div class="row">
                        <div class="col-md-6 mt-md-0 mt-3">
                        <h5 class="text-uppercase">Alamat</h5>
                        <p>Bengawan Solo Regency Kav 3-4,<br> Jl. Bengawan Solo, Kota Jember<br> 66122</p>
                        </div>
                        <hr class="clearfix w-100 d-md-none pb-3">
                        <div class="col-md-3 mb-md-0 mb-3">
                        <h5 class="text-uppercase">Menu</h5>
                        <ul class="list-unstyled">
                            <?php foreach ($header as $h) :
                            $name = $h['NM_NV'];
                            $link = $h['LINK_NV'];
                            ?>
                            <li>
                            <a href="<?= $link;?>"><?= $name;?></a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        </div>
                        <div class="col-md-3 mb-md-0 mb-3">
                            <img src="<?= base_url(); ?>assets/dist/img/contact.svg" alt="banner-img" class="img-fluid">
                        </div>
                    </div>
                    </div>

                <div class="social text-center">
                    <h6 class="text-uppercase">Ikuti akun sosial media kami</h6>
                    <?php foreach ($footer as $f) :
                        $icon = $f['IC_MS'];
                        $link = $f['LINK_MS'];
                    ?>
                    <a href="<?= $link;?>" target="_blank"><i class="<?= $icon;?>"></i></a>
                    <?php endforeach;?>
                </div>
                <div class="copyrights text-center">
                <?php foreach ($kebijakan as $k) :
                                $name = $k['NM_KB'];
                                $link = $k['LINK_KB'];
                                ?>
                                <a class="mt-4 mb-4 mr-2 ml-2" href="<?= $link;?>" target="_blank"><?= $name;?></a>
                            <?php endforeach;?>
                    <p class="para mt-4">
                        Copyright ©<?= date('Y')?> All rights reserved by
                        <a href="<?= base_url(); ?>"><span style="color: var(--primary-color);">Preneur Academy</span></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!--  Jquery js file  -->
    <script src="<?= base_url(); ?>assets/dist/js/jquery.3.4.1.js"></script>

    <!--  Bootstrap js file  -->
    <script src="<?= base_url(); ?>assets/dist/js/bootstrap.min.js"></script>

    <!--  isotope js library  -->
    <script src="<?= base_url(); ?>assets/dist/js/plugin/isotope/isotope.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Showing Sweet Alert -->
    <script src="<?= base_url(); ?>assets/dist/js/myscript.js"></script>

    <!--  Magnific popup script file  -->
    <script src="<?= base_url(); ?>assets/dist/js/plugin/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>

    <!--  Owl-carousel js file  -->
    <script src="<?= base_url(); ?>assets/dist/js/plugin/owl-carousel/js/owl.carousel.min.js"></script>

    <!--  custom js file  -->
    <script src="<?= base_url(); ?>assets/dist/js/main.js"></script>

    <script>
        jQuery('.owl-carousel').owlCarousel({

            loop:true,

            margin:10,

            dots: true,

            autoplay: 3000, // time for slides changes

            smartSpeed: 1000, // duration of change of 1 slide

            responsiveClass:true,

            responsive:{

                0:{

                    items:1

                },

                600:{

                    items:2

                },

                1000:{

                    items:3,

                    loop:true

                }

            }

            });
    </script>

    <!--===============================================================================================-->

    </div>
</body>

</html>