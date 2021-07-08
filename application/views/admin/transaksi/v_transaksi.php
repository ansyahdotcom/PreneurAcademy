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
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="card-title float-left text-bold">Transaksi Pending</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Order ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Item Pembelian</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pending as $t) :
                                    $id = $t['ID_TRN'];
                                    $eID = $t['eID'];
                                    $nama = $t['NM_PS'];
                                    $tgl = strtotime($t['EXP_TIME']);
                                    $item = $t['TITTLE'];
                                    $harga = $t['AMOUNT'];
                                    $status = $t['STATUS'];
                                ?>
                                    <tr class="text-center">
                                        <td><?= $no; ?></td>
                                        <td><?= $id; ?></td>
                                        <td><?= $nama; ?></td>
                                        <!-- <td><span class="badge-pill bg-danger text-bold"><?= date("d/F/Y -- H:i", $tgl); ?></span></td> -->
                                        <td><?= $item; ?></td>
                                        <td>Rp. <?= number_format($harga, 0, ".", "."); ?></td>
                                        <td>
                                            <?php if ($status == 201) : ?>
                                                <span class="badge-pill bg-secondary"><b>Pending...</b></span>
                                            <?php elseif ($status == 200) : ?>
                                                <span class="badge-pill bg-success"><b>Success</b></span>
                                            <?php else : ?>
                                                <span class="badge-pill bg-danger"><b>Cancel</b></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/transaksi/detpending/' . $eID); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> <b>Detail</b></a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Order ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Item Pembelian</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status Pembayaran</th>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <h3 class="card-title float-left text-bold">Transaksi Sukses</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Order ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Item Pembelian</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($success as $t) :
                                    $id = $t['ID_TRN'];
                                    $eID = $t['eID'];
                                    $nama = $t['NM_PS'];
                                    $tgl = strtotime($t['EXP_TIME']);
                                    $item = $t['TITTLE'];
                                    $harga = $t['AMOUNT'];
                                    $status = $t['STATUS'];
                                ?>
                                    <tr class="text-center">
                                        <td><?= $no; ?></td>
                                        <td><?= $id; ?></td>
                                        <td><?= $nama; ?></td>
                                        <!-- <td><span class="badge-pill bg-danger text-bold"><?= date("d/F/Y -- H:i", $tgl); ?></span></td> -->
                                        <td><?= $item; ?></td>
                                        <td>Rp. <?= number_format($harga, 0, ".", "."); ?></td>
                                        <td>
                                            <?php if ($status == 201) : ?>
                                                <span class="badge-pill bg-secondary"><b>Pending...</b></span>
                                            <?php elseif ($status == 200) : ?>
                                                <span class="badge-pill bg-success"><b>Success</b></span>
                                            <?php else : ?>
                                                <span class="badge-pill bg-danger"><b>Dibatalkan</b></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/transaksi/detsuccess/' . $eID); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> <b>Detail</b></a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Order ID</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Item Pembelian</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status Pembayaran</th>
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

        <div class="col-12">
            <div class="card">
                <div class="card-header bg-danger">
                    <h3 class="card-title float-left text-bold">Transaksi Dibatalkan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Order ID</th>
                                <th>Nama Pelanggan</th>
                                <th>Item Pembelian</th>
                                <th>Total Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($cancel as $t) :
                                $id = $t['ID_TRN'];
                                $eID = $t['eID'];
                                $nama = $t['NM_PS'];
                                $tgl = strtotime($t['EXP_TIME']);
                                $item = $t['TITTLE'];
                                $harga = $t['AMOUNT'];
                                $status = $t['STATUS'];
                            ?>
                                <tr class="text-center">
                                    <td><?= $no; ?></td>
                                    <td><?= $id; ?></td>
                                    <td><?= $nama; ?></td>
                                    <!-- <td><span class="badge-pill bg-danger text-bold"><?= date("d/F/Y -- H:i", $tgl); ?></span></td> -->
                                    <td><?= $item; ?></td>
                                    <td>Rp. <?= number_format($harga, 0, ".", "."); ?></td>
                                    <td>
                                        <?php if ($status == 201) : ?>
                                            <span class="badge-pill bg-secondary"><b>Pending...</b></span>
                                        <?php elseif ($status == 200) : ?>
                                            <span class="badge-pill bg-success"><b>Success</b></span>
                                        <?php elseif ($status == 202) : ?>
                                            <span class="badge-pill bg-danger"><b>Cancel</b></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/transaksi/detcancel/' . $eID); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> <b>Detail</b></a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Order ID</th>
                                <th>Nama Pelanggan</th>
                                <th>Item Pembelian</th>
                                <th>Total Pembayaran</th>
                                <th>Status Pembayaran</th>
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