<footer class="main-footer">
	<strong>Copyright &copy; <?= date('Y'); ?> <a href="<?= base_url('admin/dashboard') ?>">Preneur
			Academy</a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 1.0.0
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Showing Sweet Alert -->
<script src="<?= base_url(); ?>assets/dist/js/myscript.js"></script>
<!-- Drop Image -->
<script src="<?= base_url(); ?>assets/dist/js/app.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- <script src="<?= base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script> -->
<!-- <script src="<?= base_url(); ?>assets/dist/js/jquery-3.4.1.min.js"></script> -->

<!-- Harga kelas -->
<script>
	function price(el) {
		if (el.value < 10000) {
			$('#notif').text('Masukkan harga minimal Rp. 10.000 !');
			$('#save-btn').prop('disabled', true);
		} else {
			$('#notif').text('');
			$('#save-btn').prop('disabled', false);
		}
	}
</script>

<!-- Time picker -->
<script>
	$(function() {
		$('.jam_mulai').datetimepicker({
			format: 'HH:mm',
			useCurrent: true,
		});

		$('.jam_selesai').datetimepicker({
			format: 'HH:mm',
			useCurrent: true,
		});
	});
</script>

<!-- Date picker -->
<script>
	$(function() {
		var today = new Date();
		var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
		// var time = today.getHours() + ":" + today.getMinutes();
		var dateTime = date;
		var dateMulai = new Date($('.editMulai').val());
		var dateSelesai = new Date($('.editSelesai').val());

		// tambah tanggal mulai dan selesai v.1.0
		$('.tmbhMulai').datetimepicker({
			format: 'DD MMMM YYYY',
			minDate: dateTime,
			buttons: {
				showToday: true,
				showClear: true,
				showClose: true
			},
			icons: {
				time: "fas fa-clock",
				date: "fas fa-calendar-alt",
				up: "fas fa-arrow-up",
				down: "fas fa-arrow-down",
				today: 'fas fa-calendar-check',
				clear: 'fas fa-trash',
				close: 'fas fa-times'
			}
			
		});

		// $('.editMulai').defaultDate(dateMulai);
		$('.editMulai').datetimepicker({
			format: 'DD MMMM YYYY',
			buttons: {
				showToday: true,
				showClear: true,
				showClose: true
			},
			icons: {
				time: "fas fa-clock",
				date: "fas fa-calendar-alt",
				up: "fas fa-arrow-up",
				down: "fas fa-arrow-down",
				today: 'fas fa-calendar-check',
				clear: 'fas fa-trash',
				close: 'fas fa-times'
			}

		});
		
		$('.tmbhSelesai').datetimepicker({
			format: 'DD MMMM YYYY',
			minDate: dateTime,
			buttons: {
				showToday: true,
				showClear: true,
				showClose: true
			},
			icons: {
				time: "fas fa-clock",
				date: "fas fa-calendar-alt",
				up: "fas fa-arrow-up",
				down: "fas fa-arrow-down",
				today: 'fas fa-calendar-check',
				clear: 'fas fa-trash',
				close: 'fas fa-times'
			}
		});

		$('.editSelesai').datetimepicker({
			format: 'DD MMMM YYYY',
			buttons: {
				showToday: true,
				showClear: true,
				showClose: true
			},
			icons: {
				time: "fas fa-clock",
				date: "fas fa-calendar-alt",
				up: "fas fa-arrow-up",
				down: "fas fa-arrow-down",
				today: 'fas fa-calendar-check',
				clear: 'fas fa-trash',
				close: 'fas fa-times'
			}
		});
		// End

		// Tanggal mulai v.2.0
		$('.mulai2').datetimepicker({
			format: 'DD MMMM YYYY HH:mm',
			// todayHighlight: false,
			minDate: dateTime,
			buttons: {
				showToday: true,
				showClear: true,
				showClose: true
			},
			icons: {
				time: "fas fa-clock",
				date: "fas fa-calendar-alt",
				up: "fas fa-arrow-up",
				down: "fas fa-arrow-down",
				today: 'fas fa-calendar-check',
				clear: 'fas fa-trash',
				close: 'fas fa-times'
			}
		});
		// End 
	});
</script>

<!-- Script input file -->
<script>
	$('input.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('label.custom-file-label').addClass("selected").html(fileName);
	});
</script>

<!-- Page Script -->
<script>
	$(function() {
		//Add text editor
		$('textarea#compose-textarea').summernote()
	})
</script>

<!-- Sweet Alert -->
<script>
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top',
			showConfirmButton: false,
			timer: 5000
		});

		const flashData = $('.flash-data').data('flashdata');
		if (flashData == 'formempty') {
			Toast.fire({
				icon: 'error',
				title: 'Kesalahan saat menyimpan data, mohon inputkan data yang sesuai!',
			});
		} else if (flashData == 'aktif') {
			Toast.fire({
				icon: 'success',
				title: 'Data berhasil diaktifkan!',
			});
		} else if (flashData == 'nonaktif') {
			Toast.fire({
				icon: 'info',
				title: 'Data dinonaktifkan!',
			});
		} else if (flashData == 'posting') {
			Toast.fire({
				icon: 'success',
				title: 'Artikel berhasil dipublikasikan!',
			});
		} else if (flashData == 'draf') {
			Toast.fire({
				icon: 'success',
				title: 'Artikel dikembalikan ke draf!',
			});
		} else if (flashData == 'w_posting') {
			Toast.fire({
				icon: 'success',
				title: 'Webinar berhasil dipublikasikan!',
			});
		} else if (flashData == 'w_draf') {
			Toast.fire({
				icon: 'success',
				title: 'Webinar dikembalikan ke draf!',
			});
		} else if (flashData == 'link_posting') {
			Toast.fire({
				icon: 'success',
				title: 'Link berhasil dipublikasikan!',
			});
		} else if (flashData == 'link_draf') {
			Toast.fire({
				icon: 'success',
				title: 'Link meeting dikembalikan ke draf!',
			});
		} else if (flashData == 'srt_posting') {
			Toast.fire({
				icon: 'success',
				title: 'Sertifikat berhasil dibagikan!',
			});
		} else if (flashData == 'srt_draf') {
			Toast.fire({
				icon: 'success',
				title: 'Sertifikat dikembalikan ke draf!',
			});
		} else if (flashData == 'hapus_msg') {
			Toast.fire({
				icon: 'success',
				title: 'Pemberitahuan dihapus!',
			});
		} else if (flashData == 'error_date') {
			Toast.fire({
				icon: 'error',
				title: 'Kesalahan dalam menginputkan tanggal',
			});
		}
	});
</script>

<!-- Get jumlah notif -->
<script>
	jmlNotif();
	dataNotif();

	function jmlNotif() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url('admin/notifikasi/jml'); ?>',
			dataType: 'json',
			success: function(data) {
				setInterval(function() {
					data.length
				}, 100);
				if (data.length > 99) {
					$(".jml-not").text(99 + ` +`);
					$(".jml-not1").text(`Ada 99 lebih pemberitahuan masuk`);
					$(".pemberitahuan").text(99 + ` +`);
				} else if (data.length == 0) {
					$(".jml-not").text(data.length);
					$(".jml-not1").text(data.length + ` pemberitahuan`);
					$(".kosong").text(`Belum ada pemberitahuan masuk`);
					$(".pemberitahuan").text(data.length);
				} else {
					$(".jml-not").text(data.length);
					$(".jml-not1").text(`Ada ` + data.length + ` pemberitahuan masuk`);
					$(".pemberitahuan").text(data.length);
				}
			}
		});
	}

	function dataNotif() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url('admin/notifikasi/msg'); ?>',
			dataType: 'json',
			success: function(data) {
				var notif = '';
				var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
					'Dec'
				];
				for (var i = 0; i < data.length; i++) {
					var icon = '';
					var d = new Date(data[i].DATE_NOT);
					if (data[i].TITTLE_NOT == "Transaksi baru" || data[i].TITTLE_NOT ==
						"Transaksi sukses dibayar" || data[i].TITTLE_NOT == "Transaksi dibatalkan") {
						icon = "fas fa-money-check";
					} else if (data[i].TITTLE_NOT == "Aktivasi akun") {
						icon = "fas fa-user-check";
					} else {
						icon = "fas fa-users";
					}

					notif += `  <a href="<?= base_url('admin/notifikasi/read_msg/'); ?>` + data[i].ID_NOT + `" class="dropdown-item">
                                    <i class="` + icon + ` mr-2"></i>` + data[i].TITTLE_NOT + `
                                    <span class="float-right text-muted text-sm">` + d.getDate() + `-` + months[d
							.getMonth()] + `-` + d.getFullYear() + `</br>` + d.getHours() + `:` + d
						.getMinutes() + `</span>
                                    <p class="text-muted text-bold">` + data[i].MSG_NOT + `</p>
                                    <input type="hidden" name="nID" value="` + data[i].ID_NOT + `">
                                </a>
                                <div class="dropdown-divider"></div>`
				}
				$(".msg-not").html(notif);
			}
		});
	}
</script>

<!-- Get Data Kategori Kelas -->
<script>
	ambilData();

	function ambilData() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url('admin/kelas/get_ktgkls'); ?>',
			dataType: 'json',
			success: function(data) {
				var ktgklss = '';
				ktgklss += '<option value="" selected>--Pilih--</option>'
				for (var i = 0; i < data.length; i++) {
					ktgklss += '<option value=' + data[i].ID_KTGKLS + '>' + data[i].KTGKLS + '</option>'
				}
				$(".slct-ktg").html(ktgklss);
			}
		});
	}
</script>

<!-- Get Data Diskon -->
<script>
	ambilDiskon();

	function ambilDiskon() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url('admin/kelas/get_diskon'); ?>',
			dataType: 'json',
			success: function(data) {
				var diskon = '';
				diskon += '<option value="0" selected>--Pilih diskon--</option>'
				for (var i = 0; i < data.length; i++) {
					diskon += '<option value=' + data[i].ID_DISKON + '>' + data[i].NM_DISKON + ' (' + data[i]
						.DISKON * 100 + '%)</option>'
				}
				$(".slct-diskon").html(diskon);
			}
		});
	}
</script>

<script>
	$(document).ready(function() {
		$(".plus-diskon").click(function(e) {
			e.preventDefault();
			$(".form-diskon").append(`
            <tr class="text-center">
            <td>
                <input type="number" class="form-control" name="diskon[]" required>
            </td>
            <td>
                <input type="text" class="form-control" name="nama[]" required>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm dell-diskon text-bold"><i class="fas fa-trash"></i> Form</button>
            </td>
            </tr>
            `);
		});
	});

	/** to delete form */
	$(document).on('click', '.dell-diskon', function(e) {
		e.preventDefault();

		$(this).parents('tr').remove();
	});
</script>

<!-- Add multiple form kategori kelas -->
<script>
	$(document).ready(function() {
		$(".plus-ktgkelas").click(function(e) {
			e.preventDefault();
			$(".form-ktgkelas").append(`
            <tr class="text-center">
            <td>
                <input type="text" class="form-control" name="nama[]" required>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm dell-ktgkelas text-bold"><i class="fas fa-trash"></i> Form</button>
            </td>
            </tr>
            `);
		});
	});

	/** to delete form */
	$(document).on('click', '.dell-ktgkelas', function(e) {
		e.preventDefault();

		$(this).parents('tr').remove();
	});
</script>

<!-- Enable/Disabled Form Edit profile -->
<script>
	$(document).ready(function() {
		$("#btn-edit").click(function() {
			$(".tittle").html("Edit Profil");
			$("#btn-edit").prop('hidden', true);
			$("#btn-save").prop('hidden', false);
			$("#btn-cancel").prop('hidden', false);
			$("#nm").prop('disabled', false);
			$("#hp").prop('disabled', false);
			$("#almt").prop('disabled', false);
			$("#imgedit").prop('hidden', false);
			$("#img").prop('hidden', true);
		});

		$("#btn-cancel").click(function() {
			$(".tittle").html("Profil");
			$("#btn-edit").prop('hidden', false);
			$("#btn-save").prop('hidden', true);
			$("#btn-cancel").prop('hidden', true);
			$("#nm").prop('disabled', true);
			$("#hp").prop('disabled', true);
			$("#almt").prop('disabled', true);
			$("#imgedit").prop('hidden', true);
			$("#img").prop('hidden', false);
		});
	});
</script>

<!-- Enable Disable form edit kelas -->
<script>
	$(document).ready(function() {
		$("button#edit-kls").click(function() {
			$(".tittlekls").html("Edit Data Kelas");
			$("div.img-kls").prop('hidden', true);
			$("div.img-edit").prop('hidden', false);
			$("div.row-idkls").prop('hidden', true);
			$("div.row-ktgkls").prop('hidden', false);
			$("a#back-kls").prop('hidden', true);
			$("button#cancel-kls").prop('hidden', false);
			$("button#save-kls").prop('hidden', false);
			$("button#edit-kls").prop('hidden', true);
			$("input#inkls").prop('disabled', false);
			$("textarea#inkls").prop('disabled', false);
			$("div.lok_kls1").prop('hidden', true);
			$("div.lok_kls").prop('hidden', false);
			$("div.hari1").prop('hidden', true);
			$("div.hari").prop('hidden', false);
			$("textarea.inkls").prop('disabled', false);
			$("select#inkls").prop('disabled', false);
			$("div.edit").prop('hidden', false);
			$("div.edit1").prop('hidden', true);
		});

		$("button#cancel-kls").click(function() {
			$(".tittlekls").html("Detail Kelas");
			$("div.img-kls").prop('hidden', false);
			$("div.img-edit").prop('hidden', true);
			$("div.row-idkls").prop('hidden', false);
			$("div.row-ktgkls").prop('hidden', true);
			$("a#back-kls").prop('hidden', false);
			$("button#cancel-kls").prop('hidden', true);
			$("button#save-kls").prop('hidden', true);
			$("button#edit-kls").prop('hidden', false);
			$("input#inkls").prop('disabled', true);
			$("textarea#inkls").prop('disabled', true);
			$("div.lok_kls1").prop('hidden', false);
			$("div.lok_kls").prop('hidden', true);
			$("div.hari1").prop('hidden', false);
			$("div.hari").prop('hidden', true);
			$("textarea.inkls").prop('disabled', true);
			$("select#inkls").prop('disabled', true);
			$("div.edit").prop('hidden', true);
			$("div.edit1").prop('hidden', false);
		});
	});
</script>

<!-- Enable disable edit kategori kelas -->
<script>
	$(document).ready(function() {
		$("button#edit-ktg").click(function() {
			$("h4.tittlektg").html("Edit Kategori Kelas");
			$("button#save-ktg").prop('hidden', false);
			$("button#edit-ktg").prop('hidden', true);
			$("input#inktg").prop('disabled', false);
		});

		$("button#cancel-ktg").click(function() {
			$("h4.tittlektg").html("Detail Kategori Kelas");
			$("button#save-ktg").prop('hidden', true);
			$("button#edit-ktg").prop('hidden', false);
			$("input#inktg").prop('disabled', true);
		});

		$("button.close").click(function() {
			$("h4.tittlektg").html("Detail Kategori Kelas");
			$("button#save-ktg").prop('hidden', true);
			$("button#edit-ktg").prop('hidden', false);
			$("input#inktg").prop('disabled', true);
		});
	});
</script>

<!-- Enable/disable form edit diskon -->
<script>
	$(document).ready(function() {
		$("button#edit-dis").click(function() {
			$("h4.tittledis").html("Edit Data Diskon");
			$("button#save-dis").prop('hidden', false);
			$("button#edit-dis").prop('hidden', true);
			$("input#indis").prop('disabled', false);
		});

		$("button#cancel-dis").click(function() {
			$("h4.tittledis").html("Detail Data Diskon");
			$("button#save-dis").prop('hidden', true);
			$("button#edit-dis").prop('hidden', false);
			$("input#indis").prop('disabled', true);
		});

		$("button.close").click(function() {
			$("h4.tittledis").html("Detail Data Diskon");
			$("button#save-dis").prop('hidden', true);
			$("button#edit-dis").prop('hidden', false);
			$("input#indis").prop('disabled', true);
		});
	});
</script>

<!-- UNknown -->
<script>
	$(document).ready(function() {
		$("#btn-edit").click(function() {
			$(".tittle").html("Edit Profil");
			$("#btn-edit").prop('hidden', true);
			$("#btn-save").prop('hidden', false);
			$("#btn-cancel").prop('hidden', false);
			$("#nm").prop('disabled', false);
			$("#hp").prop('disabled', false);
			$("#almt").prop('disabled', false);
			$("#imgedit").prop('hidden', false);
			$("#img").prop('hidden', true);
		});

		$("#btn-cancel").click(function() {
			$(".tittle").html("Profil");
			$("#btn-edit").prop('hidden', false);
			$("#btn-save").prop('hidden', true);
			$("#btn-cancel").prop('hidden', true);
			$("#nm").prop('disabled', true);
			$("#hp").prop('disabled', true);
			$("#almt").prop('disabled', true);
			$("#imgedit").prop('hidden', true);
			$("#img").prop('hidden', false);
		});
	});
</script>

<!-- Upload gambar -->
<script>
	function triggerClick(b) {
		document.querySelector('#profileImage').click();
	}

	function displayImage(b) {
		if (b.files[0]) {
			var reader = new FileReader();
			reader.onload = function(b) {
				document.querySelector('#profileDisplay').setAttribute('src', b.target.result);
			}
			reader.readAsDataURL(b.files[0]);
		}
	}
</script>

<!-- Upload gambar -->
<script>
    function triggerClick(b) {
        document.querySelector('#daftarImage').click();
    }

    function displayImage(b) {
        if (b.files[0]) {
            var reader = new FileReader();
            reader.onload = function(b) {
                document.querySelector('#daftarDisplay').setAttribute('src', b.target.result);
            }
            reader.readAsDataURL(b.files[0]);
        }
    }
</script>

<!-- Show Hide password -->
<script type="text/javascript">
	$(document).ready(function() {

		$("#key-click").click(function() {
			$("#icon").toggleClass('fa-eye-slash');

			var input = $("#key1");

			if (input.attr("type") === "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {

		$("#key-click1").click(function() {
			$("#icon1").toggleClass('fa-eye-slash');

			var input = $("#key2");

			if (input.attr("type") === "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}

		});

	});
</script>

<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});

		$("#example2").DataTable({
			"responsive": true,
			"autoWidth": false,
		});

		$("#example3").DataTable({
			"responsive": true,
			"autoWidth": false,
		});

		$("#example4").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
	});
</script>


<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	})
</script>

<script>
	$(document).ready(function() {
		$('#nmkls').keyup(function() {
			var title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g, '-');
			$('#permalink').val(title);
		});

		$('#inkls').keyup(function() {
			var title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g, '-');
			$('#edit-link').val(title);
		});

		$('#nama').keyup(function() {
			var title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g, '-');
			$('#link').val(title);
		});

		$('#edit-nm').keyup(function() {
			var title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g, '-');
			$('#edit-link').val(title);
		});
	});
</script>

</body>

</html>