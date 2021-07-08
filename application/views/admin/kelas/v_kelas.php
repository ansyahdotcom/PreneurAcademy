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
					<div class="card-header bg-dark">
						<h3 class="card-title text-bold float-left">Tabel <?= $tittle; ?></h3>
						<a href="<?= base_url('admin/kelas/tambahkls'); ?>"
							class="btn btn-primary text-bold float-right"><i class="fas fa-plus-circle"></i>
							<?= $tittle; ?></a>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th>Nama Kelas</th>
									<th>Tanggal Pelaksanaan</th>
									<th>Harga</th>
									<th>Donasi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($kelas as $k) :
									$id = $k['ID_KLS'];
									$namakls = $k['TITTLE'];
									$tgl_mulai = $k['TGL_MULAI'];
									$tgl_selesai = $k['TGL_SELESAI'];
									$harga = $k['PRICE'];
									$kategori = $k['KTGKLS'];
									$status = $k['STAT'];
									$jmldis = $k['DISKON'];
								?>
								<tr>
									<td class="text-center"><?= $no; ?></td>
									<td width="250px"><?= $namakls; ?></td>
									<td>
										<?php
											if ($tgl_mulai == "" || $tgl_mulai == "1970-01-01") :
												$mulai1 = "Tanggal belum diset !";
											else :
												$mulai1 = tanggal_indo($tgl_mulai, TRUE);
											endif;

											if ($tgl_selesai == "" || $tgl_selesai == "1970-01-01") :
												$selesai1 = "Tanggal belum diset !";
											else :
												$selesai1 = tanggal_indo($tgl_selesai, TRUE);
											endif;
											?>
										<p><?= $mulai1 . ' s.d ';?></p>
										<p><?= $selesai1; ?></p>
									</td>
									<td>Rp. <?= number_format($harga, 0, ".", "."); ?></td>
									<?php 
									$donasi = $this->db->query("SELECT SUM(AMOUNT) AS AMOUNT FROM transaksi
														WHERE ID_KLS='$id'")->result();
									foreach($donasi as $dn) {
									?>
									<td>Rp. <?= number_format($dn->AMOUNT, 0, ".", "."); ?></td>
									<?php } ?>
									<td class="text-center">
										<div class="row">
											<div class="col-md-6 pt-2">
												<a href="<?= base_url('admin/kelas/detailkls/' . $id); ?>"
													class="btn btn-sm btn-primary btn-block text-bold"><i
														class="fas fa-edit"></i> Detail</a>
											</div>
											<div class="col-md-6 pt-2">
												<a class="btn btn-sm btn-warning btn-block text-bold" type="button"
													href="<?= base_url('admin/materi/materikelas/' . $id); ?>"><i
														class="fas fa-edit"></i> Materi</a>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 pt-2">
												<?php if ($status == 1) { ?>
												<button class="btn btn-sm btn-dark btn-block text-bold"
													data-toggle="modal" data-target="#modal-blok<?= $id; ?>"><i
														class="fas fa-save"></i> Draft</button>
												<?php } elseif ($status == 0) { ?>
												<button class="btn btn-sm btn-success btn-block text-bold"
													data-toggle="modal" data-target="#modal-unblok<?= $id; ?>"><i
														class="fas fa-arrow-circle-up"></i> Publish</button>
												<?php } ?>
											</div>
											<div class="col-md-6 pt-2">
												<button class="btn btn-sm btn-danger btn-block text-bold"
													data-toggle="modal" data-target="#modal-hapus<?= $id; ?>"><i
														class="fas fa-trash"></i> Hapus</button>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 pt-2">
												<a href="<?= base_url('admin/kelas/peserta/' . $id); ?>"
													class="btn btn-sm btn-secondary btn-block text-bold"><i
														class="fas fa-users"></i> List Peserta</a>
											</div>
										</div>
									</td>
								</tr>
								<?php $no++; ?>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr class="text-center">
									<th>No</th>
									<th>Nama Kelas</th>
									<th>Tanggal Pelaksanaan</th>
									<th>Harga</th>
									<th>Donasi</th>
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


<?php foreach ($kelas as $k) :
	$id = $k['ID_KLS'];
	$namakls = $k['TITTLE'];
?>
<!-- Modal Hapus Data -->
<div class="modal fade" id="modal-hapus<?= $id; ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus <?= $tittle; ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/kelas/hapuskls'); ?>" method="POST">
				<div class="modal-body">
					<p>Apakah anda yakin ingin menghapus data dari <b><?= $namakls; ?></b>?</p>
					<input type="hidden" name="id" value="<?= $id; ?>">
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-danger">Ya</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Draft Data -->
<div class="modal fade" id="modal-blok<?= $id; ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Draft <?= $tittle; ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/kelas/draftkls'); ?>" method="POST">
				<div class="modal-body">
					<p>Apakah anda yakin ingin mendraft data kelas <b><?= $namakls; ?></b>?</p>
					<input type="hidden" name="id" value="<?= $id; ?>">
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-primary">Ya</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Unblok Data -->
<div class="modal fade" id="modal-unblok<?= $id; ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Publish <?= $tittle; ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/kelas/publishkls'); ?>" method="POST">
				<div class="modal-body">
					<p>Apakah anda yakin ingin mempublish data <b><?= $namakls; ?></b>?</p>
					<input type="hidden" name="id" value="<?= $id; ?>">
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-primary">Ya</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach; ?>
