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
		<!-- Default box -->
		<div class="card card-solid">
			<div class="card-body pb-0">
				<div class="row justify-content-center">
					<div class="col-md-6">
						<form method="POST" action="<?= base_url('peserta/kelas'); ?>">
							<div class="input-group mb-3">
								<input class="form-control" type="text" name="keyword"
									placeholder="Temukan kelas pilihan anda..." autocomplete="off">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit" name="btn-search">
										<i class="fas fa-search"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row justify-content-center">
					<?php if ($this->session->userdata('keyword') == null) : ?>

					<?php else : ?>
					<?php if ($rows == 0) : ?>
					<h5 class="text-bold text-secondary">Hasil pencarian tidak ditemukan</h5>
					<?php else : ?>
					<h5 class="text-bold text-secondary">Ditemukan Hasil Pencarian: <?= $rows; ?></h5>
					<?php endif; ?>
					<?php endif; ?>
				</div>

				<div class="row d-flex align-items-stretch">
					<?php foreach ($kls as $k) :
						$id = $k['ID_KLS'];
						$kelas = $k['TITTLE'];
						$harga = $k['PRICE'];
						$gambar = $k['GBR_KLS'];
						$deskripsi = $k['DESKRIPSI'];
						$ktg = $k['KTGKLS'];
						$kuota_kls = $k['KUOTA_KLS'];
						$tgl_daftar = $k['TGL_PENDAFTARAN'];
						$tgl_penutupan = $k['TGL_PENUTUPAN'];
						$tgl_mulai = $k['TGL_MULAI'];
						$tgl_selesai = $k['TGL_SELESAI'];
					?>

					<?php
						/** Untuk mengecek jumlah pendaftar */
						$jml_pendaftar = $this->db->get_where('transaksi', [
							'STATUS' => 200,
							'ID_KLS' => $id
						])->num_rows();
						?>
					<?php if ($id != NULL) { ?>
					<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
						<div class="card bg-light">
							<div class="card overflow-hidden position-relative" style="width:auto;height:150px;">
								<img src="<?= base_url('assets/dist/img/kelas/' . $gambar); ?>" alt=""
									class="img-responsive img-fluid position-absolute shadow"
									style="width:auto;top:-75px;bottom:-75px;">
							</div>
							<div class="position-relative card-body pt-1">
								<div class="row">
									<div class="col-6">
										<small class="text-muted">
											<i class="fas fa-user-tie"></i>
											<span class="text-bold">Pendaftar <?= $jml_pendaftar; ?></span>
										</small>
									</div>
									<div class="col-6 text-right">
										<small class="text-muted">
											<i class="fas fa-users"></i>
											<span class="text-bold">Kuota tersisa <?= $kuota_kls - $jml_pendaftar; ?></span>
										</small>
									</div>
								</div>
								<input type="hidden" name="idkls" value="<?= $id; ?>">
								<div class="">
									<a href="" class="lead text-dark text-bold"><?= $kelas; ?></a>
								</div>
							</div>
							<div class="card-footer">
								<small class="text-muted">
									<i class="far fa-edit pr-2"></i>
									Mulai kelas :
									<p>
										<?= tanggal_indo($tgl_mulai, false); ?>
										- <?= tanggal_indo($tgl_selesai, false); ?>
									</p>
								</small>
								<div class="text-center">
									<div class="row">
										<div class="col-md-6 pt-2">
											<span class="btn btn-sm btn-success btn-block text-bold">
												<i class="fas fa-money-check"></i>
												<strike title="Donasi">Rp. <?= number_format($harga, 0, ".", "."); ?></strike>
											</span>
										</div>
										<div class="col-md-6 pt-2">
											<a type="button" class="btn btn-sm btn-primary btn-block text-bold" title="Beli Kelas"
											 href="<?= base_url('peserta/transaksi/beli/' . $id); ?>">
												<i class="fas fa-cart-plus"></i> Beli Kelas
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-md">
						<div class="card-body text-center mt-4">
							<img src="<?= base_url('assets/icon/noClass.svg'); ?>" alt=""
								class="img-rounded img-responsive img-fluid" width="400">
						</div>
						<div class="card-body pt-0 mt-4">
							<h3 class="text-center text-bold text-muted">Event kelas belum ada...</h3>
						</div>
					</div>
					<?php } ?>

					<?php endforeach; ?>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<?= $this->pagination->create_links(); ?>
			</div>
			<!-- /.card-footer -->
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
