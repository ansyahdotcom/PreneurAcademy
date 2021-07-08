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
                        <li class="breadcrumb-item"><a href="<?= base_url('peserta/dashboard'); ?>">Home</a></li>
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
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <a href="<?= base_url('peserta/notifikasi'); ?>" class="btn btn-default btn-sm text-bold float-right"><i class="fas fa-sync-alt"></i> Refresh</a>
                        <h3 class="card-title"><?= $tittle; ?> masuk</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="table-responsive mailbox-messages p-3">

                        <?php if ($notkosong == 0) : ?>
                            <h4 class="text-bold text-center text-muted notif-kosong">Belum ada pemberitahuan masuk</h4>
                            <div class="col-md-12 p-5 text-center">
                                <img src="<?= base_url("assets/icon/notify.svg"); ?>" width="500" alt="">
                            </div>
                        <?php else : ?>
                            <table class="table table-striped" id="example2">
                                <thead hidden>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>#</th>
                                        <th>#</th>
                                        <th>#</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($notif as $n) : ?>
                                        <?php
                                        if ($n['TITTLE_NOT'] == "Transaksi berhasil" || $n['TITTLE_NOT'] == "Transaksi sukses dibayar" || $n['TITTLE_NOT'] == "Transaksi dibatalkan") :
                                            $icon = "fas fa-money-check";
                                        elseif ($n['TITTLE_NOT'] == "Aktivasi akun") :
                                            $icon = "fas fa-user-check";
                                        else :
                                            $icon = "fas fa-users";
                                        endif;

                                        if ($n['IS_READ'] == 0) :
                                            $text = "text-bold text-primary";
                                            $text1 = "text-bold";
                                            $not_read = '<span class="badge badge-danger text-bold">Baru</span>';
                                        else :
                                            $text = "text-muted";
                                            $text1 = "text-muted";
                                            $not_read = '';
                                        endif;
                                        ?>
                                        <tr>
                                            <td class="mailbox-attachment"><i class="<?= $icon; ?>"></i></td>
                                            <td class="mailbox-name">
                                                <p class="<?= $text; ?>"><a href="<?= base_url('peserta/notifikasi/read_msg/' . $n['ID_NOT']); ?>"><?= $n['TITTLE_NOT']; ?> <?= $not_read; ?></a></p>
                                            </td>
                                            <td class="mailbox-subject">
                                                <p class="<?= $text1; ?>"><?= $n['MSG_NOT']; ?></p>
                                            </td>
                                            <td class="mailbox-date"><?= time_since(strtotime($n['DATE_NOT'])); ?></td>
                                            <td>
                                                <a href="<?= base_url('peserta/notifikasi/del_msg/' . $n['ID_NOT']); ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.table -->
                        <?php endif; ?>
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer p-0">
                    <div class="mailbox-controls">

                    </div>
                </div> -->
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