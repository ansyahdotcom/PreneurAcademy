    <!-- GetButton.io widget -->
    <script type="text/javascript">
(function() {
    var options = {
        whatsapp: "+628978333856", // WhatsApp number
        email: "turtleninjaaa77@gmail.com", // Email
        call_to_action: "Ada pertanyaan?", // Call to action
        button_color: "#932C8B", // Color of button
        position: "right", // Position may be 'right' or 'left'
        order: "whatsapp,email", // Order of buttons
    };
    var proto = document.location.protocol,
        host = "getbutton.io",
        url = proto + "//static." + host;
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url + '/widget-send-button/js/init.js';
    s.onload = function() {
        WhWidgetSendButton.init(host, proto, options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
})();
    </script>
    <!-- /GetButton.io widget -->

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

    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Accordion -->
    <script src="<?= base_url(); ?>assets/dist/js/accordion.js"></script>

    <!-- Script -->
    <script>
$(function() {
    //Add text editor
    $('textarea#compose-textarea').summernote()
})
    </script>

    <script>
jQuery('.owl-carousel').owlCarousel({

    loop: true,

    margin: 10,

    dots: true,

    autoplay: 3000, // time for slides changes

    smartSpeed: 1000, // duration of change of 1 slide

    responsiveClass: true,

    responsive: {

        0: {

            items: 1

        },

        600: {

            items: 2

        },

        1000: {

            items: 3,

            loop: true

        }

    }

});
    </script>

    <!--===============================================================================================-->

    </div>
    </body>

    </html>