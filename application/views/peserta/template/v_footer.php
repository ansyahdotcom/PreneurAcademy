<footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="<?= base_url('peserta/dashboard') ?>">Preneur Academy</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <!-- <b>Version</b> 1.0.0 -->
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
<!-- Midtrans -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-wB2hRL6nwYrfmF6b"></script>

<!-- Jumlah pembayaran -->
<script>
    function checklength(el) {
        if(el.value < 10000) {
            document.getElementById("notif").innerHTML = "Donasi minimal Rp. 10.000 !";
            $("#pay-button").prop("disabled", true);
        } else {
            document.getElementById("notif").innerHTML = "";
            $("#pay-button").prop("disabled", false);
        }
    }
</script>

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
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
<!-- widget -->

<!-- Get jumlah notif -->
<script>
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('peserta/notifikasi/jml'); ?>',
                dataType: 'json',
                success: function(data) {
                    data.length
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
        }, 1000);
    });

    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                type: 'POST',
                url: '<?= base_url('peserta/notifikasi/msg'); ?>',
                dataType: 'json',
                success: function(data) {
                    var notif = '';
                    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    for (var i = 0; i < data.length; i++) {
                        var icon = '';
                        var d = new Date(data[i].DATE_NOT);
                        if (data[i].TITTLE_NOT == "Transaksi berhasil" || data[i].TITTLE_NOT == "Transaksi sukses dibayar" || data[i].TITTLE_NOT == "Transaksi dibatalkan") {
                            icon = "fas fa-money-check";
                        } else if (data[i].TITTLE_NOT == "Selamat datang!") {
                            icon = "fas fa-users";
                        } else {
                            icon = "fas fa-users";
                        }

                        notif += `  <a href="<?= base_url('peserta/notifikasi/read_msg/'); ?>` + data[i].ID_NOT + `" class="dropdown-item">
                                    <i class="` + icon + ` mr-2"></i>` + data[i].TITTLE_NOT + `
                                    <span class="float-right text-muted text-sm">` + d.getDate() + `-` + months[d.getMonth()] + `-` + d.getFullYear() + `</br>` + d.getHours() + `:` + d.getMinutes() + `</span>
                                    <p class="text-muted text-bold">` + data[i].MSG_NOT + `</p>
                                    <input type="hidden" name="nID" value="` + data[i].ID_NOT + `">
                                </a>
                                <div class="dropdown-divider"></div>`
                    }
                    $(".msg-not").html(notif);
                }
            });
        }, 1000);
    });
</script>

<!-- Mengambil data kelas -->
<script>
    $(document).ready(function() {
        $('.beli').click(function() {
            var eID = $(this).attr('id');
            $.ajax({
                url: '<?= site_url(); ?>/peserta/kelas/getkelas',
                method: 'POST',
                data: {
                    eID: eID
                },
                dataType: 'json',
                success: function(data) {
                    var i;
                    for (i in data) {
                        $('#id').val(data[i].ID_KLS);
                        $('#kelas').val(data[i].TITTLE);
                        $('#harga').val(data[i].PRICE);
                    }
                }
            });
        });
    });
</script>

<!-- Menampilkan Checkout -->
<script type="text/javascript">
    $('#pay-button').click(function(event) {
        event.preventDefault();
        var idkls = $('#idkls').val();
        var kelas = $('#kelas').val();
        var harga = $('#hrg').val();
        var idps = $('#idps').val();
        var namaps = $('#namaps').val();
        var hp = $('#hp').val();
        var email = $('#email').val();

        // var id = $('input#id').val()
        // var kelas = $('input#kelas').val();
        // var harga = $('input#harga').val();
        // var id_ps = $('input#id_ps').val();
        // var nama = $('input#nama').val();
        // var hp = $('input#hp').val();
        // var email = $('input#email').val();

        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>/peserta/transaksi/token',
            data: {
                idkls: idkls,
                kelas: kelas,
                harga: harga,
                idps: idps,
                namaps: namaps,
                hp: hp,
                email: email
            },

            // data: {
            //     id: id,
            //     kelas: kelas,
            //     harga: harga,
            //     id_ps: id_ps,
            //     nama: nama,
            //     hp: hp,
            //     email: email
            // },
            
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
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
        if (flashData == 'draft') {
            Toast.fire({
                icon: 'info',
                title: 'Data telah didraftkan!',
            });
        } else if (flashData == 'publish') {
            Toast.fire({
                icon: 'info',
                title: 'Data telah dipublish!',
            });
        } else if (flashData == 'save') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan',
            });
        } else if (flashData == 'formempty') {
            Toast.fire({
                icon: 'error',
                title: 'Kesalahan saat menyimpan data, mohon inputkan data yang sesuai!',
            });
        } else if (flashData == 'edit') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil diubah!',
            });
        } else if (flashData == 'hapus') {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil dihapus!',
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
        } else if (flashData == 'success_trn') {
            Toast.fire({
                icon: 'success',
                title: 'Transaksi berhasil, silahkan selesaikan pembayaran!',
            });
        } else if (flashData == 'hapus_msg') {
            Toast.fire({
                icon: 'success',
                title: 'Pemberitahuan dihapus!',
            });
        } else if (flashData == 'berhasil_daftar') {
            Toast.fire({
                icon: 'success',
                title: 'Berhasil Mendaftar webinar!',
            });
        }
    });
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
                ktgklss += '<option value="" selected>--Kategori kelas--</option>'
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
                    diskon += '<option value=' + data[i].ID_DISKON + '>' + data[i].NM_DISKON + ' (' + data[i].DISKON * 100 + '%)</option>'
                }
                $(".slct-diskon").html(diskon);
            }
        });
    }
</script>

<!-- Add Multiple Form Kelas-->
<script>
    $(document).ready(function() {
        $(".btn-plusfrm").click(function(e) {
            e.preventDefault();
            ambilData();
            ambilDiskon();
            $(".add-form").append(`
            <tr class="text-center">
                <td>
                <input type="text" class="form-control" name="nama[]" required>
                </td>
                <td>
                <input type="text" class="form-control" name="link[]" required>
                </td>
                <td>
                    <select name="ktg[]" id="ktg" class="custom-select slct-ktg">
                    
                    </select>
                </td>
                <td>
                <input type="text" class="form-control" name="hrg[]" required>
                </td>
                <td>
                    <select name="disc[]" id="disc" class="custom-select slct-diskon">

                    </select>
                </td>
                <td>
                <textarea class="form-control" name="deskripsi[]" required></textarea>
                </td>
                <td>
                <button type="button" class="btn btn-danger btn-sm btn-dellfrm text-bold"><i class="fas fa-trash"></i> Form</button>
                </td>
            </tr>
            `);
        });
    });

    /** to delete form */
    $(document).on('click', '.btn-dellfrm', function(e) {
        e.preventDefault();

        $(this).parents('tr').remove();
    });
</script>

<!-- Add Multiple Form Diskon-->
<script>
    $(document).ready(function() {
        $(".plus-diskon").click(function(e) {
            e.preventDefault();
            ambilData();
            ambilDiskon();
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
            $("#jk").prop('disabled', false);
            $("#pekerjaan").prop('disabled', false);
            $("#agama").prop('disabled', false);
            $("#kota").prop('disabled', false);
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
            $("#jk").prop('disabled', true);
            $("#pekerjaan").prop('disabled', true);
            $("#agama").prop('disabled', true);
            $("#kota").prop('disabled', true);
        });
    });
</script>

<!-- Enable Disable form edit kelas -->
<script>
    $(document).ready(function() {
        $("button#edit-kls").click(function() {
            $("h4.tittlekls").html("Edit Data Kelas");
            $("div.row-idkls").prop('hidden', true);
            $("div.row-ktgkls").prop('hidden', false);
            $("button#save-kls").prop('hidden', false);
            $("button#edit-kls").prop('hidden', true);
            $("input#inkls").prop('disabled', false);
            $("textarea#inkls").prop('disabled', false);
            $("select#inkls").prop('disabled', false);
            $("div.edit-gbrkls").prop('hidden', false);
            $("div.row-diskon").prop('hidden', false);
            $("div.row-hrgdiskon").prop('hidden', true);
        });

        $("button#cancel-kls").click(function() {
            $("h4.tittlekls").html("Detail Data Kelas");
            $("div.row-idkls").prop('hidden', false);
            $("div.row-ktgkls").prop('hidden', true);
            $("button#save-kls").prop('hidden', true);
            $("button#edit-kls").prop('hidden', false);
            $("input#inkls").prop('disabled', true);
            $("textarea#inkls").prop('disabled', true);
            $("select#inkls").prop('disabled', true);
            $("div.edit-gbrkls").prop('hidden', true);
            $("div.row-diskon").prop('hidden', true);
            $("div.row-hrgdiskon").prop('hidden', false);
        });

        $("button.close").click(function() {
            $("h4.tittlekls").html("Detail Data Kelas");
            $("div.row-idkls").prop('hidden', false);
            $("div.row-ktgkls").prop('hidden', true);
            $("button#save-kls").prop('hidden', true);
            $("button#edit-kls").prop('hidden', false);
            $("input#inkls").prop('disabled', true);
            $("textarea#inkls").prop('disabled', true);
            $("select#inkls").prop('disabled', true);
            $("div.edit-gbrkls").prop('hidden', true);
            $("div.row-diskon").prop('hidden', true);
            $("div.row-hrgdiskon").prop('hidden', false);
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
        // $('#example2').DataTable({
        //     "paging": true,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        //     "responsive": true,
        // });
    });
</script>

</body>

</html>