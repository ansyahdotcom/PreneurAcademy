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
						<li class="breadcrumb-item"><a href="<?= base_url('admin/transaksi'); ?>">Histori Transaksi</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card card-secondary">
						<div class="card-header">
							<h3 class="card-title">Informasi Pembayaran</h3>
						</div>
						<div class="card-body">
							<!-- /.card-header -->
							<!-- Main content -->
							<div class="row">
								<div class="col-md-3 col-sm-6 col-12">
									<div class="info-box">
										<span class="info-box-icon bg-secondary shadow"><i class="fas fa-cart-plus"></i></span>

										<div class="info-box-content">
											<span class="info-box-text">Order ID</span>
											<span class="info-box-number"><?= $dettrn['ID_TRN']; ?></span>
										</div>
										<!-- /.info-box-content -->
									</div>
									<!-- /.info-box -->
								</div>
								<!-- /.col -->
								<div class="col-md-3 col-sm-6 col-12">
									<div class="info-box">
										<span class="info-box-icon bg-secondary shadow"><i class="fas fa-wallet"></i></span>

										<div class="info-box-content">
											<span class="info-box-text">Total Pembayaran</span>
											<span class="info-box-number">Rp. <?= number_format($dettrn['AMOUNT'], 0, ".", "."); ?></span>
										</div>
										<!-- /.info-box-content -->
									</div>
									<!-- /.info-box -->
								</div>
								<!-- /.col -->
								<div class="col-md-3 col-sm-6 col-12">
									<div class="info-box">
										<span class="info-box-icon bg-secondary shadow"><i class="fas fa-money-check"></i></span>

										<?php
										if ($dettrn['PAYMENT'] == "bank_transfer") :
											$payment = "Transfer Bank";
										endif;
										?>
										<div class="info-box-content">
											<span class="info-box-text">Metode Pembayaran</span>
											<span class="info-box-number"><?= $payment; ?></span>
										</div>
										<!-- /.info-box-content -->
									</div>
									<!-- /.info-box -->
								</div>
								<!-- /.col -->
								<div class="col-md-3 col-sm-6 col-12">
									<div class="info-box">
										<span class="info-box-icon bg-secondary shadow"><i class="fas fa-question"></i></span>

										<?php
										if ($dettrn['STATUS'] == 201) :
											$status = "Pending...";
											$bg = "bg-secondary";
										elseif ($dettrn['STATUS'] == 200) :
											$status = "Success";
											$bg = "bg-success";
										elseif ($dettrn['STATUS'] == 202) :
											$status = "Cancel";
											$bg = "bg-danger";
										endif;
										?>
										<div class="info-box-content">
											<span class="info-box-text">Status Pembayaran</span>
											<span class="info-box-number">
												<span class="badge-pill <?= $bg; ?> bg-sm"><?= $status; ?></span>
											</span>
										</div>
										<!-- /.info-box-content -->
									</div>
									<!-- /.info-box -->
								</div>
								<!-- /.col -->
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!--/.col (right) -->

				<div class="col-md-6">
					<!-- general form elements -->
					<div class="card card-secondary">
						<div class="card-header">
							<h3 class="card-title">Detail Order</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<div class="card-body p-0">
							<table class="table table-striped">
								<tbody>
									<tr>
										<td class="text-bold">Order ID</td>
										<td><?= $dettrn['ID_TRN']; ?></td>
									</tr>
									<tr>
										<td class="text-bold">Tipe Pembayaran</td>
										<td><?= $payment; ?> <span class="text-uppercase"><?= $dettrn['BANK']; ?></span></td>
									</tr>
									<tr>
										<td class="text-bold">Virtual Account</td>
										<td><?= $dettrn['VA_NUMBER']; ?></td>
									</tr>
									<tr>
										<td class="text-bold">Item Pembelian</td>
										<td><?= $dettrn['TITTLE']; ?></td>
									</tr>
									<tr>
										<td class="text-bold">Total Pembayaran</td>
										<td>Rp. <?= number_format($dettrn['AMOUNT'], 0, ".", "."); ?></td>
									</tr>
									<?php
									$time = strtotime($dettrn['TIME']);
									$exp = strtotime($dettrn['EXP_TIME']);
									$order_time = date("d/F/Y -- H:i", $time);
									$exp_time = date("d/F/Y -- H:i", $exp);
									?>
									<tr>
										<td class="text-bold">Waktu Order</td>
										<td><?= $order_time; ?></td>
									</tr>
									<tr>
										<td class="text-bold">Batas Pembayaran</td>
										<td class="text-bold text-danger"><?= $exp_time; ?></td>
									</tr>
									<?php if ($dettrn['STATUS'] == 200) : ?>
										<tr>
											<td class="text-bold">Tanggal Pembayaran</td>
											<td></td>
										</tr>
									<?php else : ?>
									<?php endif; ?>
									<tr>
										<td class="text-bold">Status Pembayaran</td>

										<td>
											<span class="badge-pill <?= $bg; ?> bg-sm text-bold"><?= $status; ?></span>
										</td>
									</tr>
									<!-- <tr>
                                <td class="text-bold">Panduan Pembayaran</td>
                                <td>
                                    <a href="<?= $dettrn['PDF_GUIDE']; ?>" target="_blank" class="btn btn-primary btn-sm btn-block  text-bold"><i class="fas fa-download"></i> Download</a>
                                </td>
                            </tr> -->
								</tbody>
							</table>
							<div class="card-footer">
								<small class="text-bold text-danger">(<i>Transaksi pelanggan secara otomatis akan dibatalkan jika melebihi batas waktu pembayaran</i>)*</small>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</div>

				<div class="col-md-6">
					<!-- general form elements -->
					<div class="card card-secondary">
						<div class="card-header">
							<h3 class="card-title">Detail Pelanggan</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<div class="card-body p-0">
							<table class="table table-striped">
								<tbody>
									<tr>
										<td class="text-bold">Nama</td>
										<td><?= $dettrn['NM_PS']; ?></td>
									</tr>
									<tr>
										<td class="text-bold">Telepon</td>
										<td><?= $dettrn['HP_PS']; ?></td>
									</tr>
									<tr>
										<td class="text-bold">Email</td>
										<td><?= $dettrn['EMAIL_PS']; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card -->
				</div>
			</div>
			<!-- /.row -->
			<div class="card-footer">
				<div class="float-right">
					<a href="<?= base_url('admin/transaksi'); ?>" class="btn btn-default text-bold"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
				</div>
			</div>
		</div><!-- /.container-fluid -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->