<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $tittle; ?> Kelas <?= str_replace('-', ' ', $nmkelas['TITTLE']); ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('admin/kelas'); ?>">Data Kelas</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	</div>
	<!-- /.content-header -->
	<?php 
	$nm_kl = $nmkelas['TITTLE'];
	$count_id = $this->db->query("SELECT COUNT(detail_kelas.ID_KLS) AS ID_KLS FROM kelas, detail_kelas WHERE kelas.ID_KLS = detail_kelas.ID_KLS AND kelas.TITTLE = '$nm_kl'");
	foreach ($count_id->result() as $count) {
		$ID_KL = $count->ID_KLS;
	} 
	// foreach ($list_ps2 as $list2) {
	// 	$KUOTA_WEB = $list2->KUOTA_WEB;
	// }
	?>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-6">
								<h6 class="text-muted">
									<i class="fas fa-users"></i>
									<span class="text-bold">Pendaftar = <?= $ID_KL; ?></span>
								</h6>
								<!-- <?php if ($KUOTA_WEB != 0) { ?>
								<h6 class="text-muted">
									<i class="fas fa-users"></i>
									<span class="text-bold">Kuota = <?= $KUOTA_WEB; ?></span>
								</h6>
								<?php } ?> -->
							</div>
							<div class="col-6">
								<a href="<?= base_url('admin/kelas'); ?>" class="btn btn-default float-right">
									<span class="text-dark"><i class="fas fa-arrow-circle-left"></i> Kembali</span></a>
							</div>
						</div>	
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th>Nama</th>
									<th>Pekerjaan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($listpeserta as $l) : ?>
									<tr class="justify-content-md-center">
										<td class="text-center" width="100px"><?= $i++ ?></td>
										<td><?= $l['NM_PS']; ?></td>
										<td width="150px"><?= $l['PEKERJAAN']; ?></td>
										<td class="text-center" width="150px">
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-sm btn-primary text-bold btn-block"><i class="fas fa-edit"></i>
														Detail
													</button>
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr class="text-center">
									<th>No</th>
									<th>Nama</th>
									<th>Pekerjaan</th>
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

<?php foreach ($listpeserta as $l) : ?>
	<!-- Modal upload sertifikat -->
	<div class="modal fade" id="modal_hapus<?= $l['ID_PS']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h3 class="modal-title" id="myModalLabel">Upload Sertifikat</h3>
				</div>
				<?php echo form_open_multipart('admin/kelas/sertifikat/' . $l['ID_KLS']); ?>
				<input type="hidden" name="idps" value="<?= $l['ID_PS']; ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama">Nama Peserta</label>
						<input type="nama" class="form-control" name="nama" value="<?= $l['NM_PS']; ?>" disabled>
						<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="email">Sertifikat</label>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="sertif">
								<label class="custom-file-label" for="sertif">Pilih file...</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-primary">Simpan</button>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
<?php endforeach; ?>
