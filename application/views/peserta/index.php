<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
          <!-- <input type="email" name="em" id="em" value="<?= $this->session->userdata('email'); ?>"> -->
        </div><!-- /.col -->
        <!-- <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div>/.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row justify-content-center">
        <div class="col-sm-12">
          <div class="alert alert-primary alert-sm" role="alert">
            <div class="row">
              <div class="col-lg-2 col-md-3 col-sm-4 text-center">
                <img src="<?= base_url(); ?>assets/dist/img/program/study.svg" width="150" alt="halo">
              </div>
              <div class="col-lg-10 col-md-9 col-sm-8 p-4">
                <h6 class="alert-heading">Selamat Datang!</h6>
                <p>Halo, <?= $peserta['NM_PS']; ?> anda login sebagai <?php if ($this->session->userdata('role') == 2) {
                                                                        echo "Peserta";
                                                                      } ?>. Untuk mengetahui mekanisme pembelajaran bisa menggunakan <a href="<?= base_url('peserta/faq') ?>">FAQ</a> , atau download panduan melaui <a href="https://drive.google.com/file/d/1kSp6LAJMyQmdC7hxtRFbSmUJiYR8M4nk/view?usp=sharing" target="_blank">link ini</a>.</p>
              </div>
            </div>
            <hr>
            <p class="mb-0 p-2 rounded alert alert-warning"><i class="fas fa-info-circle"></i> Jika kamu telah membayar dan terjadi kesalahan sistem, bisa hubungi CS dibawah.</p>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-light shadow">
            <div class="inner">
              <h3><?= $countmysertif; ?></h3>
              <p class="text-uppercase">
                <center>Sertifikat Saya</center>
              </p>
            </div>
            <div class="icon">
              <i class="fas fa-certificate"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-light shadow">
            <div class="inner">
              <h3><?= $countmytrn; ?></h3>
              <p>
                <center>Transaksi Saya</center>
              </p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="<?= base_url('peserta/transaksi'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-light shadow">
            <div class="inner">
              <h3><?= $countmyclass; ?></h3>
              <p>
                <center>Kelas Saya</center>
              </p>
            </div>
            <div class="icon">
              <i class="fab fa-leanpub"></i>
            </div>
            <a href="<?= base_url('peserta/myclass'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- ./col -->

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-5 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header text-center">
              <?php if ($cekmyclass['STATUS_BELI'] == 0) : ?>
                <a href="<?= base_url('peserta/dashboard'); ?>">
                <?php elseif ($cekmyclass['STATUS_BELI'] == 201) : ?>
                  <a href="<?= base_url('peserta/transaksi'); ?>">
                  <?php elseif ($cekmyclass['STATUS_BELI'] == 200) : ?>
                    <?php $id = $myclass['ID_KLS']; ?>
                    <a href="<?= base_url("peserta/mymateri/materi/" . $id) ?>">
                    <?php endif; ?>
                    <div class="kelas">
                      <?php if ($cekmyclass['STATUS_BELI'] == 0) : ?>
                        <img src="<?= base_url() ?>assets/icon/noClass.svg" width="350" alt="kelas">
                      <?php elseif ($cekmyclass['STATUS_BELI'] == 201) : ?>
                        <img class="mt-4 mb-4" src="<?= base_url() ?>assets/icon/payment.svg" width="350" alt="kelas">
                      <?php elseif ($cekmyclass['STATUS_BELI'] == 200) : ?>
                        <img src="<?= base_url('assets/dist/img/kelas/') . $myclass['GBR_KLS']; ?>" class="img-fluid img-responsive img-rounded shadow-lg" width="340" alt="kelas">
                      <?php endif; ?>
                    </div>
                    <?php if ($cekmyclass['STATUS_BELI'] == 0) : ?>
                      <h5 class="mt-3 mb-3">Belum ada kelas </h5>
                    <?php elseif ($cekmyclass['STATUS_BELI'] == 201) : ?>
                      <h5 class="mt-4 mb-4">Segera selesaikan pembayaran kelas anda</h5>
                    <?php elseif ($cekmyclass['STATUS_BELI'] == 200) : ?>
                      <h5 class="mt-3 mb-3">Kelas saya: <?= $myclass['TITTLE']; ?> </h5>
                    <?php endif; ?>
                    </a>
            </div>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-7 connectedSortable">
          <!-- Map card -->
          <div class="card">
            <div class="card-header text-center">
              <a href="<?= base_url() ?>peserta/dashboard">
                <div class="tugas">
                  <img src="<?= base_url() ?>assets/icon/noList.svg" width="260" alt="tugas">
                </div>
                <h5 class="mt-3 mb-3">Belum ada jadwal</h5>
              </a>
            </div>
          </div>
          <!-- /.card -->
        </section>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->