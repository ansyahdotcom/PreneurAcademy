<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url(); ?>" target="_blank" class="nav-link"><i class="fas fa-external-link-alt"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge jml-not text-bold"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header jml-not1"></span>
                <div class="dropdown-divider"></div>
                    <p class="text-center text-sm text-muted kosong"></p>
                    <div class="msg-not">

                    </div>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('peserta/notifikasi'); ?>" class="dropdown-item dropdown-footer">Lihat semua pemberitahuan</a>
            </div>
        </li>

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url(); ?>assets/dist/img/peserta/<?= $peserta['FTO_PS']; ?>" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline"><?= $peserta['NM_PS']; ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="<?= base_url(); ?>assets/dist/img/peserta/<?= $peserta['FTO_PS']; ?>" class="img-circle elevation-2" alt="User Image">
                    <?php
                    if ($peserta['ID_ROLE'] == 2) {
                        $level = "<span title='peserta' class='badge badge-warning'>PESERTA</span>";
                    }
                    ?>
                    <p>
                        <small><?= $level; ?></small>
                        <?= $peserta['NM_PS']; ?> 
                    </p>
                    <!-- <small>
                        <?php if ($peserta['DATE_CREATE'] != 0) { ?>
                            Terdaftar <?= date('d F Y', $peserta['DATE_CREATE']); ?>
                        <?php } else { ?>
                            Terdaftar <span title='caption' class='badge badge-secondary'></span>
                        <?php } ?>
                    </small> -->
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="<?= base_url('peserta/profil'); ?>" class="btn btn-outline-primary">Profil</a>
                    <button type="button" class="btn btn-outline-danger float-right" data-toggle="modal" data-target="#modal-sm">Logout</button>
                </li>
            </ul>
        </li>
    </ul>
    <!-- <ul class="navbar-nav ml-auto">
        
    </ul> -->
</nav>
<!-- /.navbar -->

<!-- Modal Logout -->
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Logout</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin logout?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('peserta/auth/logout'); ?>" type="button" class="btn btn-danger">Ya</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->