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
                                      <th>Gambar</th>
                                      <th>Link</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $no = 1; ?>
                                  <?php foreach ($data as $p) :
                                        $id = $p['ID_KB'];
                                        $nama = $p['NM_KB'];
                                        $img = $p['IMG_KB'];
                                        $link = $p['LINK_KB'];
                                        $isi = $p['ISI_KB'];
                                    ?>
                                  <tr>
                                      <td class="text-center" width="100px"><?= $no; ?></td>
                                      <td><?= $nama; ?></td>
                                      <td><img src="<?= base_url(); ?>assets/dist/img/kebijakan/<?= $img; ?>"
                                              width="50"></td>
                                      <td><?= $link; ?></td>
                                      <td class="text-center" width="270px">
                                          <a class="btn btn-sm btn-primary" target="_blank"
                                              href="<?= base_url('legal/p/' . $link); ?>"><i class="fas fa-eye"></i>
                                              Pratinjau</a>
                                          <button class="btn btn-sm btn-warning" data-toggle="modal"
                                              data-target="#modalEdit<?= $id; ?>"><i class="fas fa-edit"></i>
                                              <b>Edit</b></button>
                                          <button class="btn btn-sm btn-danger" data-toggle="modal"
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
                                      <th>Gambar</th>
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
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header bg-primary">
                  <h5 class="modal-title">Tambah Kebijakan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?php echo base_url() . 'admin/kebijakan/insert' ?>" method="post"
                  enctype="multipart/form-data">
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="nama">Judul</label>
                          <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Menu">
                          <small class="form-text text-success">Contoh: Kebijakan Pribadi(Privacy Policy)</small>
                          <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <label for="icon">Gambar</label>
                          <div class="container">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="control-label">Upload File</label>
                                          <div class="preview-zone hidden">
                                              <div class="box box-solid">
                                                  <div class="box-header with-border">
                                                      <div><b>Preview</b></div>
                                                      <div class="box-tools pull-right">
                                                          <button type="button"
                                                              class="btn btn-danger btn-xs remove-preview">
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
                                              <input type="file" name="image" class="dropzone" />
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <?= form_error('image', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <label for="link">Link</label>
                          <input type="text" id="link" name="link" class="form-control" placeholder="Link Pintasan"
                              style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;">
                          <small class="form-text text-success">Contoh: <?= base_url(); ?>terms-and-conditions</small>
                          <?= form_error('link', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <label for="isi">Isi Konten</label>
                          <textarea class="textarea" name="isi" placeholder="Isi Konten"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                          <small class="form-text text-success">Berisi keterangan kebijakan</small>
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
        $id = $p['ID_KB'];
        $nama = $p['NM_KB'];
        $img = $p['IMG_KB'];
        $link = $p['LINK_KB'];
        $isi = $p['ISI_KB'];
    ?>

  <div class="modal fade" id="modalEdit<?= $id; ?>" tabindex="-1">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header bg-primary">
                  <h5 class="modal-title">Ubah Kebijakan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?php echo base_url() . 'admin/kebijakan/update' ?>" method="post"
                  enctype="multipart/form-data">
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="nama">Judul</label>
                          <input type="text" id="edit-nm" name="nama" value="<?= $nama; ?>" class="form-control"
                              placeholder="Nama Menu">
                          <small class="form-text text-success">Contoh: Kebijakan Pribadi(Privacy Policy)</small>
                          <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <label for="icon">Gambar</label>
                          <div class="container">
                              <div class="row">
                                  <div class="col-md-5">
                                      <div class="card">
                                          <img src="<?= base_url(); ?>assets/dist/img/kebijakan/<?= $img; ?>"
                                              class="card-img-top" alt="gambar-foto">
                                          <div class="card-body">
                                              <h6 class="card-title"><?= $img; ?></h6>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-7">
                                      <div class="form-group">
                                          <label class="control-label">Upload File</label>
                                          <div class="preview-zone hidden">
                                              <div class="box box-solid">
                                                  <div class="box-header with-border">
                                                      <div><b>Preview</b></div>
                                                      <div class="box-tools pull-right">
                                                          <button type="button"
                                                              class="btn btn-danger btn-xs remove-preview">
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
                                              <input type="file" name="image" value="<?= $img; ?>" class="dropzone" />
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <?= form_error('image', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <label for="link">Link</label>
                          <input type="text" id="edit-link" name="link" value="<?= $link; ?>" class="form-control"
                              placeholder="Link Pintasan"
                              style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;">
                          <small class="form-text text-success">Contoh:
                              <?= base_url(); ?><b>terms-and-conditions</b></small>
                          <?= form_error('link', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                      <div class="form-group">
                          <label for="isi">Isi Konten</label>
                          <textarea class="textarea" name="isi" placeholder="Isi Konten"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $isi; ?></textarea>
                          <small class="form-text text-success">Berisi keterangan kebijakan</small>
                          <?= form_error('isi', '<small class="text-danger col-md">', '</small>'); ?>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="hidden" name="id_kb" value="<?= $id; ?>" required>
                      <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
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
              <form action="<?= base_url('admin/kebijakan/delete'); ?>" method="POST">
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