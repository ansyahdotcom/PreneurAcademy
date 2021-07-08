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
                        <li class="breadcrumb-item active"><?= $tittle; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title text-bold">Tabel <?= $tittle; ?></h3>
                        <button class="btn btn-primary text-bold float-right" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus-circle"></i> <?= $tittle; ?></button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kategori Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($ktgkelas as $kk) :
                                    $id = $kk['ID_KTGKLS'];
                                    $kategori = $kk['KTGKLS'];
                                    $date = $kk['DATE_KTGKLS'];
                                    $last = $kk['UPDATE_KTGKLS'];
                                ?>
                                    <tr>
                                        <td class="text-center" width="100px"><?= $no; ?></td>
                                        <td><?= $kategori; ?></td>
                                        <td class="text-center" width="150px">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-detail<?= $id; ?>"><i class="fas fa-edit"></i> <b>Detail</b></button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?= $id; ?>"><i class="fas fa-trash"></i> <b>Hapus</b></button>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kategori Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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

<!-- Modal tambah Data -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah <?= $tittle; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('admin/ktgkelas/saveall'); ?>" class="form-saveall" enctype="multipart/form-data">
                <!-- <?= form_open_multipart('admin/kelas/saveall', ['class' => 'form-saveall valid']); ?> -->
                <div class="card-body">
                    <table id="example1" class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Kategori Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="form-ktgkelas">
                            <tr class="text-center">
                                <td>
                                    <input type="text" class="form-control" name="nama[]" required>
                                    <?= form_error('nama[]', '<small class="text-danger">', '</small>'); ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm plus-ktgkelas text-bold"><i class="fas fa-plus"></i> Form</button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th>Kategori Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer justify-content-right">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary btn-saveall"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
            <!-- <?= form_close(); ?> -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($ktgkelas as $kk) :
    $id = $kk['ID_KTGKLS'];
    $kategori = $kk['KTGKLS'];
    $date = $kk['DATE_KTGKLS'];
    $last = $kk['UPDATE_KTGKLS'];
?>

    <!-- Modal Detail Data -->
    <div class="modal fade" id="modal-detail<?= $id; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title tittlektg">Detail <?= $tittle; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('admin/ktgkelas/editktg'); ?>">
                    <div class="card-body">
                        <input type="text" name="id" value="<?= $id; ?>" hidden>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id">Kategori Kelas</label>
                                    <input type="text" class="form-control text-bold" id="inktg" name="nama" plasceholder="Nama diskon" value="<?= $kategori; ?>" disabled required>
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php if ($date == 0) : ?>
                                    <b>Dibuat pada tanggal:</b> <span class="badge-pill bg-secondary text-bold btn-block">--</span>
                                <?php else : ?>
                                    <b>Dibuat pada tanggal:</b> <span class="badge-pill bg-primary text-bold btn-block"><?= date('d F Y', $date); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <?php if ($last == 0) : ?>
                                    <b>Terakhir diupdate tanggal:</b> <span class="badge-pill bg-secondary text-bold btn-block">--</span>
                                <?php else : ?>
                                    <b>Terakhir diupdate tanggal:</b> <span class="badge-pill bg-warning text-bold btn-block"><?= date('d F Y', $last); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-right">
                        <button type="button" class="btn btn-danger" id="cancel-ktg" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i> Tutup</button>
                        <button type="button" class="btn btn-primary" id="edit-ktg"><i class="fas fa-edit"></i> Edit</button>
                        <button type="submit" class="btn btn-primary" id="save-ktg" hidden><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Hapus Data -->
    <div class="modal fade" id="modal-hapus<?= $id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/ktgkelas/hapusktg'); ?>" method="POST">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data <b><?= $kategori; ?></b>?</p>
                        <input type="hidden" name="id" value="<?= $id; ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>