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
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="row">
							<?php if ($cekmyclass['STATUS_BELI'] == 0 || $cekmyclass['STATUS_BELI'] == 201) : ?>
							<!-- Kelas yang dipilih -->
							<div class="col-md">
								<div class="card-body text-center mt-4">
									<?php if ($cekmyclass['STATUS_BELI'] == 201) : ?>
									<img src="<?= base_url('assets/icon/payment.svg'); ?>" alt=""
										class="img-rounded img-responsive img-fluid" width="400">
								</div>
								<div class="card-body pt-0 mt-4">
									<h3 class="text-center text-bold text-muted">Selesaikan transaksi pembayaran anda,
										</br>agar bisa mengakses kelas ini</h3>
								</div>
								<div class="card-body text-center mb-4">
									<a href="<?= base_url('peserta/transaksi'); ?>" class="btn btn-outline-primary"><i
											class="fas fa-arrow-circle-left"></i> Selesaikan Pembayaran</a>
									<?php elseif ($cekmyclass['STATUS_BELI'] == 0) : ?>
									<img src="<?= base_url('assets/icon/noClass.svg'); ?>" alt=""
										class="img-rounded img-responsive img-fluid" width="400">
								</div>
								<div class="card-body pt-0 mt-4">
									<h3 class="text-center text-bold text-muted">Belum ada kelas yang di pilih...</h3>
								</div>
								<div class="card-body text-center mb-4">
									<a href="<?= base_url('peserta/kelas'); ?>" class="btn btn-outline-primary"><i
											class="fas fa-arrow-circle-left"></i> Pilih kelas anda</a>
									<?php endif; ?>
								</div>
							</div>
							<?php elseif ($cekmyclass['STATUS_BELI'] == 200) : ?>
							<!-- Kelas yang dipilih -->
							<?php 
							foreach ($myclass as $myc) { ?>
							<div class="col-md-12">
								<div class="card-body pt-0 mt-4">
									<div class="text-center mb-4">
										<img src="<?= base_url('assets/dist/img/kelas/' . $myc->GBR_KLS); ?>"
											alt="" class="img-rounded img-responsive img-fluid shadow-lg" width="400">
									</div>
									<h4 class="text-bold"><b><?= $myc->TITTLE; ?></b></h4>
									<?php 
											$id = $myc->ID_KLS;
										?>
									<a href="<?= base_url("peserta/mymateri/materi/" . $id) ?>"
										class="btn btn-primary text-bold">Masuk Kelas</a>
								</div>
							</div>
							<?php } ?>
							<?php endif; ?>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!--/.col (left) -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.container-fluid -->
