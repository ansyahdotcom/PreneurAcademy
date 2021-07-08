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
						<li class="breadcrumb-item"><a href="<?= base_url('admin/notifikasi'); ?>">Pemberitahuan</a></li>
						<li class="breadcrumb-item active">Detail pemberitahuan</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<?php
						if ($detnot['TITTLE_NOT'] == "Transaksi baru") :
							$icon = "fas fa-money-check";
							$text = "Ada " . $detnot['TITTLE_NOT'] . ': ' . $detnot['MSG_NOT'];
							$text_btn = "Lihat detail transaksi";
						elseif ($detnot['TITTLE_NOT'] == "Transaksi sukses dibayar") :
							$icon = "fas fa-money-check";
							$text = $detnot['TITTLE_NOT'] . ': ' . $detnot['MSG_NOT'] . ", dibayarkan pada tanggal <b class='text-success'>" . date('d-F-Y', strtotime($detnot['TRN_TIME'])) . "</b> jam <b class='text-success'>" . date('H:i', strtotime($detnot['TRN_TIME'])) . "</b> !.";
							$text_btn = "Lihat detail transaksi";
						elseif ($detnot['TITTLE_NOT'] == "Transaksi dibatalkan") :
							$icon = "fas fa-money-check";
							$text = $detnot['TITTLE_NOT'] . ': ' . $detnot['MSG_NOT'] . ", karena melebihi batas waktu pembayaran";
							$text_btn = "Lihat detail transaksi";
						else :
							$icon = "fas fa-users";
							$text = $detnot['MSG_NOT'];
							$text_btn = "Lihat data peserta";
						endif;
						?>
						<div class="row">
							<div class="col-md-12">
								<h5 class="float-left"><i class="<?= $icon; ?>"></i> <?= $detnot['TITTLE_NOT']; ?></h5>
								<p class="float-right"><span class="mailbox-read-time"><?= date('d-F-Y H:i', strtotime($detnot['DATE_NOT'])); ?></span></p>
							</div>
						</div>
					</div>
					<!-- /.card-header -->

					<div class="card-body p-0">
						<div class="mailbox-read-message">
							<div class="p-2">
								<h4 class="text-bold text-primary">Hallo admin, <?= $admin['NM_ADM']; ?></h4>
								<p><?= $text; ?></p>
								<a href="<?= base_url($detnot['LINK']); ?>" class="btn btn-default btn-sm text-bold"><i class="fas fa-eye"></i> <?= $text_btn; ?></a>
							</div>

							<?php if ($detnot['TITTLE_NOT'] == "Pendaftar baru") : ?>
								<div class="col-md-12">
									<!-- general form elements -->
									<div class="card card-dark">
										<div class="card-header">
											<h3 class="card-title">Detail Pendaftar</h3>
										</div>
										<!-- /.card-header -->
										<!-- form start -->
										<div class="card-body p-0">
											<table class="table table-striped">
												<tbody>
													<tr>
														<td class="text-bold">ID Pendaftaran</td>
														<td><?= $detnot['GLOBAL_ID']; ?></td>
													</tr>
													<tr>
														<td class="text-bold">Nama Lengkap</td>
														<td><?= $detnot['NM_PS']; ?></td>
													</tr>
													<tr>
														<td class="text-bold">Email</td>
														<td><?= $detnot['EMAIL_PS']; ?></td>
													</tr>
													<tr>
														<td class="text-bold">No HP</td>
														<td><?= $detnot['HP_PS']; ?></td>
													</tr>
													<tr>
														<td class="text-bold">Tanggal Daftar</td>
														<td><?= date('d-F-Y', $detnot['DATE_CREATE']); ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /.card -->
								</div>
							<?php elseif ($detnot['TITTLE_NOT'] == "Transaksi baru" || $detnot['TITTLE_NOT'] == "Transaksi sukses dibayar" || $detnot['TITTLE_NOT'] == "Transaksi dibatalkan") : ?>
								<div class="col-md-12">
									<!-- general form elements -->
									<div class="card card-dark">
										<div class="card-header">
											<h3 class="card-title">Transaksi</h3>
										</div>
										<!-- /.card-header -->
										<!-- form start -->
										<div class="card-body p-0">
											<table class="table table-striped">
												<tbody>
													<tr>
														<td class="text-bold">Order ID</td>
														<td><?= $detnot['ID_TRN']; ?></td>
													</tr>
													<tr>
														<td class="text-bold">Item Pembelian</td>
														<td><?= $detnot['TITTLE']; ?></td>
													</tr>
													<tr>
														<td class="text-bold">Total Pembayaran</td>
														<td>Rp. <?= number_format($detnot['AMOUNT'], "0", ".", "."); ?></td>
													</tr>
													<tr>
														<td class="text-bold">Waktu Order</td>
														<td><?= date('d/F/Y -- H:i', strtotime($detnot['TIME'])); ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /.card -->
								</div>
							<?php endif; ?>
						</div>
						<!-- /.read-message  -->

						<div class="card-footer">
							<div class="float-right">
								<a href="<?= base_url('admin/notifikasi'); ?>" class="btn btn-primary btn-sm float-right">
									<i class=" fas fa-arrow-circle-left"></i> Kembali
								</a>
							</div>
						</div>
						<!-- /.card-footer -->

					</div>
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
