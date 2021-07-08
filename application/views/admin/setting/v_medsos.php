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
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                      <div class="card-header">
                          <h3 class="card-title">Tabel <?= $tittle; ?></h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                                  <i class="fas fa-plus-circle"></i> Pintasan</button>
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr class="text-center">
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>Icon</th>
                                      <th>Link</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $no = 1; ?>
                                  <?php foreach ($data as $p) :
                    $id = $p['ID_MS'];
                    $nama = $p['NM_MS'];
                    $icon = $p['IC_MS'];
                    $link = $p['LINK_MS'];
                  ?>
                                  <tr>
                                      <td class="text-center"><?= $no; ?></td>
                                      <td><?= $nama; ?></td>
                                      <td class="text-center"><i class="<?= $icon; ?>"></i></td>
                                      <td><?= $link; ?></td>
                                      <td class="text-center">
                                          <button class="btn btn-sm btn-primary m-2" data-toggle="modal"
                                              data-target="#modalDetail<?= $id; ?>"><i class="fas fa-eye"></i>
                                              <b>Detail</b></button>
                                          <button class="btn btn-sm btn-warning m-2" data-toggle="modal"
                                              data-target="#modalEdit<?= $id; ?>"><i class="fas fa-edit"></i>
                                              <b>Edit</b></button>
                                          <button class="btn btn-sm btn-danger m-2" data-toggle="modal"
                                              data-target="#modalDelete<?= $id; ?>"><i class="fas fa-trash"></i>
                                              <b>Hapus</b></button>
                                      </td>
                                  </tr>
                                  <?php $no++; ?>
                                  <?php endforeach; ?>
                              </tbody>
                              <tfoot>
                                  <tr class="text-center">
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>Icon</th>
                                      <th>Link</th>
                                      <th>Aksi</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>

  <!-- Modal Tambah -->
  <div class="modal fade" id="modalAdd" tabindex="-1">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-primary">
                  <h5 class="modal-title">Tambah Pintasan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?php echo base_url() . 'admin/medsos/insert' ?>" method="post"
                  enctype="multipart/form-data">
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="nama">Menu</label>
                          <input type="text" name="nama" class="form-control" placeholder="Nama Menu">
                          <small class="form-text text-success">Contoh: Facebook, Google, Youtube</small>
                          <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <label for="icon">Icon</label>
                          <input type="text" name="icon" class="form-control" placeholder="Label Icon">
                          <small class="form-text text-success">Label font-awesome, Contoh: fas fa-envelope</small>
                          <?= form_error('icon', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <label for="link">Link</label>
                          <input type="text" name="link" class="form-control" placeholder="Link Pintasan">
                          <small class="form-text text-success">Contoh: https://youtube.com</small>
                          <?= form_error('link', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                  </div>
              </form>
          </div>
      </div>
  </div>


  <?php foreach ($data as $p) :
    $id = $p['ID_MS'];
    $nama = $p['NM_MS'];
    $icon = $p['IC_MS'];
    $link = $p['LINK_MS'];
  ?>

  <!-- Modal Edit -->
  <div class="modal fade" id="modalEdit<?= $id; ?>" tabindex="-1">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-primary">
                  <h5 class="modal-title">Tambah Pintasan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?php echo base_url() . 'admin/medsos/update' ?>" method="post"
                  enctype="multipart/form-data">
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="nama">Menu</label>
                          <input type="text" name="nama" class="form-control" value="<?= $nama; ?>"
                              placeholder="Nama Menu">
                          <small class="form-text text-success">Contoh: Facebook, Google, Youtube</small>
                          <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <label for="icon">Icon</label>
                          <input type="text" name="icon" class="form-control" value="<?= $icon; ?>"
                              placeholder="Label Icon">
                          <small class="form-text text-success">Label font-awesome, Contoh: fas fa-envelope</small>
                          <?= form_error('icon', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <label for="link">Link</label>
                          <input type="text" name="link" class="form-control" value="<?= $link; ?>"
                              placeholder="Link Pintasan">
                          <small class="form-text text-success">Contoh: https://youtube.com</small>
                          <?= form_error('link', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="hidden" name="id_ms" value="<?= $id; ?>" required>
                      <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal Detail Data -->
  <div class="modal fade" id="modalDetail<?= $id; ?>">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-primary">
                  <h4 class="modal-title">Detail Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form role="form">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="nama">Nama</label>
                                  <input type="text" class="form-control text-bold" id="nama" placeholder="Nama"
                                      value="<?= $nama; ?>" disabled>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <label for="icon">Icon</label>
                              <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="<?= $icon; ?>"></i></span>
                                  </div>
                                  <input type="text" class="form-control text-bold" id="icon" value="<?= $icon; ?>"
                                      disabled>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="hp">Link Pintasan</label>
                                  <input type="text" class="form-control text-bold" id="hp" placeholder="No hp"
                                      value="<?= $link; ?>" disabled>
                                  <a class="btn btn-primary mt-2" target="_blank" href="<?= $link; ?>">Cek link</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer justify-content-right">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- Modal Hapus Data -->
  <div class="modal fade" id="modalDelete<?= $id; ?>">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-primary">
                  <h4 class="modal-title">Hapus Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?= base_url('admin/medsos/delete'); ?>" method="POST">
                  <div class="modal-body">
                      <div class="text-center">
                          <img class="mt-2 mb-2" src="<?= base_url(); ?>assets/dist/img/hapus.svg" width=80%
                              alt="delete-img">
                          <h4 class="mb-4">Apakah anda yakin untuk menghapus data <b><?= $nama; ?></b> ini?</h4>
                      </div>
                      <input type="hidden" name="id_delete" value="<?= $id; ?>">
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                      <button type="submit" class="btn btn-danger">Ya</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  <?php endforeach; ?>