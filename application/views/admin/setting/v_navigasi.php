<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1><?= $tittle; ?></h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= $tittle; ?></li>
            </ol>
            </div>
        </div>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title pt-2"><?=$tittle?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                <i class="fas fa-plus-circle"></i> Menu</button>
            </div>
            </div>
            <div class="card-body">
            <?php if ($data == null) : ?>
                        <!-- Jika Belum Terdapat data -->
                            <div class="col-md">
                                <div class="card-body text-center mt-4">
                                    <img src="<?= base_url('assets/icon/noList.svg'); ?>" alt="noData" class="img-rounded img-responsive img-fluid" width="100">
                                </div>
                                <div class="card-body pt-0 mt-4">
                                    <h3 class="text-center text-bold text-muted">Belum terdapat data</h3>
                                </div>
                            </div>
                    <?php else : ?>
                <?php foreach($data as $row):
                    $id = $row['ID_NV'];
                    $nama = $row['NM_NV'];
                    $slug = $row['LINK_NV'];
                    ?>
                <div class="card-body">
                    <div class="card-header bg-dark">
                    <h3 class="card-title pt-2"><?= $nama;?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit<?= $id;?>">
                        <i class="fas fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?= $id;?>">
                        <i class="fas fa-trash"></i> Hapus</button>
                    </div>
                    </div>
                </div>
                <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
    </section>
</div>

    <form action="<?php echo base_url().'admin/navigasi/insert'?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalAdd" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Tambah Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Menu</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Menu">
                        <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo site_url();?></span>
                    </div>
                    <input type="text" name="link" class="form-control" placeholder="Link">
                    <?= form_error('link', '<small class="text-danger col-md">', '</small>'); ?>
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

<?php foreach ($data as $p) :
    $id = $p['ID_NV'];
    $nama = $p['NM_NV'];
    $slug = $p['LINK_NV'];
    ?>

    <form action="<?php echo base_url().'admin/navigasi/update'?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalEdit<?=$id;?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Edit Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Label Menu</label>
                        <input type="text" name="nama" value="<?=$nama;?>" class="form-control" placeholder="Nama Menu">
                    </div>
                    <div class="form-group input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo site_url();?></span>
                    </div>
                    <input type="text" name="link" value="<?=$slug;?>" class="form-control" placeholder="Link">
                </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="hidden" name="id_navbar" value="<?=$id;?>" required>
                <button type="submit" class="btn btn-warning"><i class="far fa-save"></i> Update</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form action="<?php echo base_url().'admin/navigasi/delete'?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modalDelete<?=$id;?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                <h4 class="modal-title">Hapus Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="text-center">
                        <img class="mt-2 mb-2" src="<?= base_url();?>assets/dist/img/hapus.svg" width=80% alt="delete-img">
                        <h4 class="mb-4">Apakah anda yakin untuk menghapus menu ini?</h4>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="hidden" name="id_delete" value="<?=$id;?>" required>
                <button type="submit" class="btn btn-danger"><i class="far fa-save"></i> Hapus</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <?php endforeach; ?>