<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $tittle ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $tittle ?></li>
                    </ol>
                </div>
            </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title pt-2">Manajemen Kunci API</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                        <i class="fas fa-plus-circle"></i> Data</button>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-info-circle"></i> Fitur ini masih dalam proses develop untuk lebih dinamis, dan
                    sementara API yang berjalan masih
                    secara statis
                </div>
                <div class="row">
                    <?php if ($data == null) : ?>
                    <!-- Jika Belum Terdapat data -->
                    <div class="col-md">
                        <div class="card-body text-center mt-4">
                            <img src="<?= base_url('assets/icon/noList.svg'); ?>" alt="noData"
                                class="img-rounded img-responsive img-fluid" width="100">
                        </div>
                        <div class="card-body pt-0 mt-4">
                            <h3 class="text-center text-bold text-muted">Belum terdapat data</h3>
                        </div>
                    </div>
                    <?php else : ?>
                    <?php foreach ($data as $row) :
                            $id = $row['ID_KEY'];
                            $nama = $row['NM_KEY'];
                            $key1 = $row['KEY_1'];
                            $key2 = $row['KEY_2'];
                            $status = $row['STATUS'];
                        ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-indigo">
                                <h3 class="card-title pt-2"><?= $nama; ?></h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#modalEdit<?= $id; ?>">
                                        <i class="fas fa-edit"></i> Edit</button>
                                    <button type="button" class="btn btn-success" id="btn-simpan" hidden>
                                        <i class="fas fa-edit"></i> Simpan</button>
                                    <button type="button" class="btn btn-success" id="btn-batal" hidden>
                                        <i class="fas fa-edit"></i> Batal</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modalDelete<?= $id; ?>">
                                        <i class="fas fa-trash"></i> Hapus</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form role="form">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="namaKey">Nama Key</label>
                                            <input type="email" class="form-control" name="nama" id="nama"
                                                value="<?= $nama; ?>" readonly placeholder="Masukkan Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="key1">Key 1</label>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" name="key1"
                                                    value="<?= $key1; ?>" readonly placeholder="Key 1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="key2">Key 2</label>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" name="key2"
                                                    value="<?= $key2; ?>" readonly placeholder="Key 2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="status" name="status"
                                                    value="<?= $status; ?>" readonly placeholder="Status">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<form action="<?php echo base_url() . 'admin/key/insert' ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalAdd" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Tambah Key</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaKey">Nama Key</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Menu">
                        <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="key1">Kode Key 1</label>
                        <input type="text" name="key1" class="form-control" placeholder="Nama Menu">
                        <?= form_error('key1', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="key2">Kode Key 2</label>
                        <input type="text" name="key2" class="form-control" placeholder="Nama Menu">
                        <?= form_error('key2', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php foreach ($data as $row) :
    $id = $row['ID_KEY'];
    $nama = $row['NM_KEY'];
    $key1 = $row['KEY_1'];
    $key2 = $row['KEY_2'];
?>

<form action="<?php echo base_url() . 'admin/key/update' ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalEdit<?= $id; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Edit API</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaKey">Nama Key</label>
                        <input type="text" name="nama" value="<?= $nama; ?>" class="form-control"
                            placeholder="Nama Menu">
                        <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="key1">Kode Key 1</label>
                        <input type="text" class="form-control" name="key1" id="key1" value="<?= $key1; ?>"
                            placeholder="Key 1">
                        <?= form_error('key1', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="key2">Kode Key 2</label>
                        <input type="text" class="form-control" name="key2" id="key2" value="<?= $key2; ?>"
                            placeholder="Key 2">
                        <?= form_error('key2', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Aktif" <?= $row['STATUS'] == "Aktif" ? "selected" : "" ?>>Aktif</option>
                            <option value="Tidak Aktif" <?= $row['STATUS'] == "Tidak Aktif" ? "selected" : "" ?>>Tidak
                                Aktif</option>
                        </select>
                        <?= form_error('status', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" name="id_key" value="<?= $id; ?>" required>
                    <button type="submit" class="btn btn-warning"><i class="far fa-save"></i> Update</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>

<form action="<?php echo base_url() . 'admin/key/delete' ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalDelete<?= $id; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Hapus Key</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="text-center">
                        <img class="mt-2 mb-2" src="<?= base_url(); ?>assets/dist/img/hapus.svg" width=80%
                            alt="delete-img">
                        <h4 class="mb-4">Apakah anda yakin untuk menghapus key ini?</h4>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" name="id_delete" value="<?= $id; ?>" required>
                    <button type="submit" class="btn btn-danger"><i class="far fa-save"></i> Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php endforeach; ?>