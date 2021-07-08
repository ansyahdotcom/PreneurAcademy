<footer class="footer-area bg-warning">
	<div class="container">
		<div class="">
			<div class="site-logo text-center py-4">
				<a href="<?= base_url('peserta/auth'); ?>"><img src="<?= base_url(); ?>assets/dist/img/logo.png"
						width="150" alt="logo"></a>
			</div>
			<div class="container-fluid text-center text-md-left">
				<div class="row">
					<div class="col-md-4 mt-md-0 mt-3">
						<h5 class="text-uppercase font-weight-bold">Alamat</h5>
						<p>Green Tegal Gede Residence Blok AD No. 17 <br>Tegal Gede, Sumbersari<br> Jember 68121</p>
					</div>
					<hr class="clearfix w-100 d-md-none pb-3">
					<div class="social col-md-4 text-center">
						<h6 class="text-uppercase font-weight-bold">Ikuti akun sosial media kami</h6>
                            <?php 
                            foreach ($footer as $f) :
                                $icon = $f['IC_MS'];
                                $link = $f['LINK_MS'];
                                ?>
                            <a href="<?= $link; ?>" target="_blank"><i class="<?= $icon; ?>"></i></a>
                            <?php endforeach; ?>
					</div>
					<div class="col-md-4 mb-md-0 mb-3">
						<img src="<?= base_url(); ?>assets/dist/img/contact.svg" alt="banner-img" class="img-fluid">
					</div>
				</div>
			</div>
            
			<div class="copyrights text-center">
				<?php foreach ($kebijakan as $k) :
                    $name = $k['NM_KB'];
                    $link = $k['LINK_KB'];
                ?>
				<a class="mt-4 mb-4 mr-2 ml-2" href="<?= base_url('legal/p/' . $link); ?>"
					target="_blank"><?= $name; ?></a>
				<?php endforeach; ?>
				<p class="para mt-4">
					Copyright ©<?= date('Y') ?> All rights reserved by
					<a href="<?= base_url(); ?>"><span style="color: var(--primary-color);">Preneur Academy</span></a>
				</p>
			</div>
		</div>
	</div>
</footer>

<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row justify-content-center">
					<div class="col-md-12">
						<form method="GET" action="<?= base_url('search'); ?>">
							<div class="input-group mb-3">
								<input class="form-control" type="text" name="keyword" placeholder="Cari postingan..."
									autocomplete="off">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit">
										<i class="fas fa-search"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- GetButton.io widget -->
<script type="text/javascript">
	(function () {
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
		s.onload = function () {
			WhWidgetSendButton.init(host, proto, options);
		};
		var x = document.getElementsByTagName('script')[0];
		x.parentNode.insertBefore(s, x);
	})();

</script>
<!-- /GetButton.io widget -->

<!-- Disqus -->
<script id="dsq-count-scr" src="//preneur-academy.disqus.com/count.js" async></script>

<!--  AOS file  -->
<script src="<?= base_url(); ?>assets/dist/js/aos.js"></script>
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
	$(function () {
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
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>
</div>
</body>

</html>
