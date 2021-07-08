<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Dropzone -->
<script src="<?= base_url(); ?>assets/plugins/dropzone-5.7.0/min/dropzone.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Showing Sweet Alert -->
<script src="<?= base_url(); ?>assets/dist/js/myscript.js"></script>

<!-- Show hide password -->
<script type="text/javascript">
	$(document).ready(function() {
		$("#show-hide").click(function() {
			$("#icon").toggleClass('fa-eye-slash');

			var input = $("#password");

			if (input.attr("type") === "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	});

	$(document).ready(function() {
		$("#show-hide2").click(function() {
			$("#icon2").toggleClass('fa-eye-slash');

			var input = $("#password2");

			if (input.attr("type") === "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	});
</script>

</body>

</html>