<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $tittle; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/kelas'); ?>">Data Kelas</a></li>
                        <li class="breadcrumb-item active"><?= $tittle; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="card-title text-bold">Form <?= $tittle; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="<?= base_url('admin/kelas/tambahkls'); ?>"
                            enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="namakls">Nama Kelas</label>
                                            <input type="text" class="form-control huruf" id="nmkls" name="namakls"
                                                placeholder="Nama Kelas" value="<?= set_value('namakls'); ?>"
                                                autocomplete="off" autofocus required>
                                            <?= form_error('namakls', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="namakls">Kategori Kelas</label>
                                            <select name="ktg" class="custom-select slct-ktg" required>

                                            </select>
                                            <?= form_error('ktg', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_mulai">Tanggal Mulai Kelas</label>
                                            <div class="input-group">
                                                <input class="form-control tmbhMulai" data-toggle="datetimepicker"
                                                    data-target=".tmbhMulai" type="text" name="tgl_mulai"
                                                    value="<?= set_value('tgl_mulai'); ?>" placeholder="dd mm yyyy"
                                                    autocomplete="off">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tgl_selesai">Tanggal Selesai Kelas</label>
                                            <div class="input-group">
                                                <input class="form-control tmbhSelesai" data-toggle="datetimepicker"
                                                    data-target=".tmbhSelesai" type="text" name="tgl_selesai"
                                                    value="<?= set_value('tgl_selesai'); ?>" placeholder="dd mm yyyy"
                                                    autocomplete="off">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input onkeyup="price(this)" type="number" class="form-control" name="harga"
                                                id="harga" placeholder="harga" value="<?= set_value('harga'); ?>"
                                                autocomplete="off" required>
                                            <!-- <?= form_error('harga', '<small class="text-danger">', '</small>'); ?> -->
                                            <small class="text-danger text-bold" id="notif"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kuota_kls">Kuota</label>
                                            <input type="number" class="form-control" name="kuota_kls" id="kuota_kls"
                                                placeholder="Kuota kelas" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Gambar Kelas</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="gbrkls">
                                                    <label class="custom-file-label" for="gbrkls">Pilih file...</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" style="weight: 300px"
                                                required><?= set_value('deskripsi'); ?></textarea>
                                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Permalink</label>
                                            <input readonly class="form-control" type="text" id="permalink" name="permalink"
                                                style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?= base_url('admin/kelas'); ?>" class="btn btn-default"><i
                                        class="fas fa-arrow-circle-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary" id="save-btn"><i class="fas fa-save"></i>
                                    Simpan</button>
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