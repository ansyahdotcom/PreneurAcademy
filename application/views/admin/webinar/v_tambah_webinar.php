<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $tittle ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/webinar'); ?>">Webinar</a></li>
                        <li class="breadcrumb-item active"><?= $tittle ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header">

					</div> -->
                    <!-- /.card-header -->
                    <form action="<?= base_url('admin/webinar/tambah_webinar'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-body">
                            <input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
                            <input type="hidden" name="ID_ADM" value="<?= $ID_ADM; ?>">
                            <!-- JUDUL_WEBINAR -->
                            <label for="JUDUL_WEBINAR">Judul</label>
                            <input class="form-control" type="text" autocomplete="off" name="JUDUL_WEBINAR" placeholder="Tambahkan judul webinar" autofocus required>
                            <?= form_error('JUDUL_WEBINAR', '<small class="text-danger">', '</small>'); ?>
                            <br>
                            <div class="form-group">
                                <label for="icon">Poster Webinar</label>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="preview-zone hidden">
                                                    <div class="box box-solid">
                                                        <div class="box-header with-border">
                                                            <div><b>Preview</b></div>
                                                            <div class="box-tools pull-right">
                                                                <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                                    <i class="fa fa-times"></i> Reset
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="box-body"></div>
                                                    </div>
                                                </div>
                                                <div class="dropzone-wrapper">
                                                    <div class="dropzone-desc">
                                                        <i class="glyphicon glyphicon-download-alt"></i>
                                                        <div>Pilih file gambar atau seret gambar kesini .</div>
                                                    </div>
                                                    <input type="file" name="FOTO_WEBINAR" accept="image/x-png,image/gif,image/jpeg" class="dropzone" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Harga -->
                            <label for="HARGA">Harga</label>
                            <input class="form-control" type="text" autocomplete="off" list="HARGA" name="HARGA" placeholder="Tambahkan Harga" required>
                            <datalist id="HARGA" class="form-control" name="HARGA" hidden>
                                <option value="GRATIS">GRATIS</option>
                            </datalist>
                            <?= form_error('HARGA', '<small class="text-danger">', '</small>'); ?>
                            <br>
                            <!-- Platform -->
                            <label for="PLATFORM">Platform</label>
                            <select name="PLATFORM" id="PLATFORM" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <?php 
                                foreach ($platform as $plt) { ?>
                                <option value="<?= $plt->NM_PLT; ?>"><?= $plt->NM_PLT; ?></option>
                                <?php } ?>
                            </select>
                            <br>
                            <label for="KUOTA_WEB">Kuota Peserta</label>
                            <input type="number" name="KUOTA_WEB" class="form-control" placeholder=" Contoh : 100 ">
                            <br>
                            <label for="LINK_ZOOM">Link Meeting</label>
                            <textarea name="LINK_ZOOM" id="LINK_ZOOM" class="textarea" class="form-control" cols="30" rows="5" placeholder="Isikan link meeting disini" required autocomplete="off"></textarea>
                            <?= form_error('PLATFORM', '<small class="text-danger">', '</small>'); ?>
                            <br>
                            <!-- Tanggal mulai webinar -->
                            <label for="TGL_WEB">Tanggal Webinar</label>
                            <div class="input-group">
                                <input type="text" data-toggle="datetimepicker" data-target=".mulai2" class="form-control mulai2" name="TGL_WEB" id="TGL_WEB" autocomplete="off" placeholder="dd/mm/yyyy 00:00" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <label for="KONTEN_WEB">Deskripsi Webinar</label>
                            <textarea class="textarea" class="form-control" name="KONTEN_WEB" id="KONTEN_WEB" placeholder="Isi deskripsi disini..." required></textarea>
                            <br>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
                            <a href="<?= base_url('admin/webinar'); ?>" class="btn btn-default float-right"><i class="fas fa-arrow-circle-left"></i> Batal</a>
                        </div>
                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->