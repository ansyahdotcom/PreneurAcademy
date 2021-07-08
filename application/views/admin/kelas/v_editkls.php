<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="tittlekls"><?= $tittle; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/kelas'); ?>">Data Kelas</a></li>
                        <li class="breadcrumb-item tittlekls active"><?= $tittle; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <?php
    $id = $kelas['ID_KLS'];
    $namakls = $kelas['TITTLE'];
    // $tgl_daftar = $kelas['TGL_PENDAFTARAN'];
    // $tgl_penutupan = $kelas['TGL_PENUTUPAN'];
    $link = $kelas['PERMALINK'];
    $tgl_mulai = $kelas['TGL_MULAI'];
    $tgl_selesai = $kelas['TGL_SELESAI'];
    // $lok_kls = $kelas['LOK_KLS'];
    // $hari = $kelas['HARI'];
    $harga = $kelas['PRICE'];
    $kuota_kls = $kelas['KUOTA_KLS'];
    $kategori = $kelas['KTGKLS'];
    $status = $kelas['STAT'];
    $deskripsi = $kelas['DESKRIPSI'];
    $diskon = $kelas['NM_DISKON'];
    $date = $kelas['DATE_KLS'];
    $last = $kelas['UPDATE_KLS'];
    $gambar = $kelas['GBR_KLS'];
    $jmldis = $kelas['DISKON'];
    $iddis = $kelas['ID_DISKON'];
    $id_adm = $kelas['NM_ADM'];
    ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="card-title text-bold">Form <span
                                    class="tittlekls text-bold"><?= $tittle; ?></span></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="<?= base_url('admin/kelas/detailkls/' . $id); ?>"
                            class="form-editkls" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-center img-kls">
                                            <img class="img-fluid img-responsive img-rounded shadow"
                                                src="<?= base_url(); ?>assets/dist/img/kelas/<?= $kelas['GBR_KLS']; ?>"
                                                alt="User profile picture" width="300px">
                                        </div>
                                        <div class="form-group img-edit" hidden id="imgedit">
                                            <div class="form-group text-center" style="position: relative;">
                                                <span class="img-div">
                                                    <div class="text-center img-placeholder" onClick="triggerClick()">
                                                        <h3 class="profile-username text-center text-bold">Edit Gambar
                                                            Kelas</h3>
                                                        <label class="sm-0 text-primary"><small>(Klik gambar di bawah
                                                                untuk mengganti)</small></label>
                                                    </div>
                                                    <div>
                                                        <img class="img-fluid img-responsive img-rounded shadow"
                                                            src="<?= base_url(); ?>assets/dist/img/kelas/<?= $kelas['GBR_KLS']; ?>"
                                                            onClick="triggerClick()" id="daftarDisplay" width="250px">
                                                    </div>
                                                </span>
                                                <input type="file" name="gbrkls" value="<?= $kelas['GBR_KLS']; ?>"
                                                    onChange="displayImage(this)" id="daftarImage" class="form-control"
                                                    style="display: none;" accept="image/x-png,image/gif,image/jpeg">
                                                <input type="text" value="<?= $gambar; ?>" name="old" hidden>
                                                <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                                <label class="text-bold text-gray">Gambar Kelas</label>
                                                <div>
                                                    <small class="text-danger text-bold">(Ukuran file gambar max 2
                                                        mb.)</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="harga">Status Kelas: </label>
                                            <?php if ($status == 0) : ?>
                                            <span class="badge-pill bg-dark text-bold btn-block text-center">
                                                Drafted</span>
                                            <?php else : ?>
                                            <span class="badge-pill bg-success text-bold btn-block text-center">
                                                Published</span>
                                            <?php endif; ?>

                                            <label for="harga">Kategori Kelas: </label>
                                            <span
                                                class="badge-pill bg-warning text-bold btn-block text-center"><?= $kategori; ?></span>

                                            <label for="harga">Disusun oleh: </label>
                                            <span
                                                class="badge-pill bg-gray text-bold btn-block text-center"><?= $id_adm; ?></span>

                                            <label for="harga">Link Kelas: </label>
                                            <a href="<?= base_url('admin/materi/materikelas/' . $id); ?>"
                                                class="btn btn-primary btn-block text-bold">Akses Kelas</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <input type="text" class="form-control text-bold" id="idkls" name="id"
                                        value="<?= $id; ?>" hidden>
                                    <div class="col-md-6 row-idkls">
                                        <div class="form-group">
                                            <label for="id">ID Kelas</label>
                                            <input type="text" class="form-control" id="id" value="<?= $id; ?>"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="namakls">Nama Kelas</label>
                                            <input type="text" class="form-control" id="inkls" name="namakls"
                                                placeholder="Nama Kelas" value="<?= $namakls; ?>" disabled required>
                                            <?= form_error('namakls', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row-ktgkls" hidden>
                                        <div class="form-group">
                                            <label for="ktg">Kategori Kelas</label>
                                            <select name="ktg" class="form-control" required>
                                            <?php foreach ($kategori_kls as $ktg) { ?>
										        <option value="<?= $ktg['ID_KTGKLS']; ?>" <?= $ktg['ID_KTGKLS'] == $ktg['ID_KTGKLS'] ? "selected" : null ?>>
											    <?= $ktg['KTGKLS']; ?></option>
									            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($tgl_mulai == "" || $tgl_mulai == "1970-01-01") :
                                    $mulai = "Tanggal belum diset !";
                                else :
                                    $mulai = tanggal_indo($tgl_mulai, TRUE);
                                endif;

                                if ($tgl_selesai == "" || $tgl_selesai == "1970-01-01") :
                                    $selesai = "Tanggal belum diset !";
                                else :
                                    $selesai = tanggal_indo($tgl_selesai, TRUE);
                                endif;
                                ?>
                                <div class="row">
                                    <div class="col-md-6 tgl_mulai">
                                        <div class="form-group">
                                            <label for="tgl_mulai">Tanggal Mulai Kelas</label>
                                            <div class="input-group">
                                                <input type="text" data-toggle="datetimepicker" data-target=".editMulai"
                                                    class="form-control editMulai" id="inkls" name="tgl_mulai"
                                                    value="<?= $mulai; ?>" autocomplete="off" placeholder="dd/mm/yyyy"
                                                    disabled>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 tgl_selesai">
                                        <div class="form-group">
                                            <label for="tgl_selesai">Tanggal Selesai Kelas</label>
                                            <div class="input-group">
                                                <input type="text" data-toggle="datetimepicker" data-target=".editSelesai"
                                                    class="form-control editSelesai" id="inkls" name="tgl_selesai"
                                                    value="<?= $selesai; ?>" autocomplete="off" placeholder="dd/mm/yyyy"
                                                    disabled>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 edit1">
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control" id="inkls" name="harga"
                                                placeholder="harga"
                                                value="Rp. <?= number_format($harga, "0", ".", "."); ?>" disabled
                                                required>
                                            <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 edit" hidden>
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="number" class="form-control" id="inkls" name="harga"
                                                placeholder="harga" value="<?= $harga; ?>" disabled required>
                                            <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 edit1">
                                        <div class="form-group">
                                            <label for="kuota_kls">Kuota</label>
                                            <input type="number" class="form-control" id="inkls" name="kuota_kls"
                                            placeholder="Kuota kelas" value="<?= $kuota_kls; ?>" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 edit" hidden>
                                        <div class="form-group">
                                            <label for="kuota_kls">Kuota</label>
                                            <input type="number" class="form-control" id="inkls" name="kuota_kls"
                                            placeholder="Kuota kelas" value="<?= $kuota_kls; ?>" disabled required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Deskripsi</label>
                                            <textarea class="form-control inkls" id="inkls" name="deskripsi"
                                                style="weight: 300px" disabled required><?= $deskripsi; ?></textarea>
                                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Permalink</label>
                                            <input type="text" id="edit-link" name="link" class="form-control"
                                                value="<?= $link; ?>"
                                                style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php if ($date == 0) : ?>
                                        <b>Dibuat pada tanggal:</b> <span
                                            class="badge-pill bg-secondary text-bold">--</span>
                                        <?php else : ?>
                                        <b>Dibuat pada tanggal:</b> <span
                                            class="badge-pill bg-primary text-bold"><?= tanggal_indo(date('Y-m-d', $date), FALSE); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if ($last == 0) : ?>
                                        <b>Terakhir diupdate tanggal:</b> <span
                                            class="badge-pill bg-secondary text-bold">--</span>
                                        <?php else : ?>
                                        <b>Terakhir diupdate tanggal:</b> <span
                                            class="badge-pill bg-warning text-bold"><?= tanggal_indo(date('Y-m-d', $last), FALSE); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?= base_url('admin/kelas'); ?>" class="btn btn-default" id="back-kls"><i
                                        class="fas fa-arrow-circle-left"></i> Kembali</a>
                                <button type="button" class="btn btn-danger" id="cancel-kls" data-dismiss="modal"
                                    hidden><i class="fas fa-arrow-circle-left"></i> Batal</button>
                                <button type="button" class="btn btn-primary" id="edit-kls"><i class="fas fa-edit"></i>
                                    Edit</button>
                                <button type="submit" class="btn btn-primary" id="save-kls" hidden><i
                                        class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->