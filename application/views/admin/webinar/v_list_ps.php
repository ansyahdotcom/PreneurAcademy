<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $tittle; ?> Webinar <?= str_replace('-', ' ', $JUDUL_WEBINAR); ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('admin/webinar'); ?>">Webinar</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	</div>
	<!-- /.content-header -->

	<?php 
	$count_id = $this->db->query("SELECT COUNT(peserta_wbnr.ID_WEBINAR) AS ID_WEBINAR FROM webinar, peserta_wbnr WHERE webinar.ID_WEBINAR = peserta_wbnr.ID_WEBINAR AND webinar.JUDUL_WEBINAR = '$JUDUL_WEBINAR'");
	foreach ($count_id->result() as $count) {
		$ID_WEB = $count->ID_WEBINAR;
	} 
	foreach ($list_ps2 as $list2) {
		$KUOTA_WEB = $list2->KUOTA_WEB;
	}
	?>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-header">
						<div class="row">
							<div class="col-6">
								<h6 class="text-muted">
									<i class="fas fa-users"></i>
									<span class="text-bold">Pendaftar = <?= $ID_WEB; ?></span>
								</h6>
								<?php if ($KUOTA_WEB != 0) { ?>
								<h6 class="text-muted">
									<i class="fas fa-users"></i>
									<span class="text-bold">Kuota = <?= $KUOTA_WEB; ?></span>
								</h6>
								<?php } ?>
							</div>
							<div class="col-6">
								<a href="<?= base_url('admin/webinar'); ?>" class="btn btn-default float-right">
									<span class="text-dark"><i class="fas fa-arrow-circle-left"></i> Kembali</span></a>
							</div>
						</div>
					</div>
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
								<?php $no = 1; ?>
								<?php foreach ($list_ps as $list) {
									?>
								<tr>
									<td class="text-center" width="50px"><?= $no++ ?></td>
									<td><?= $list->NM_PS; ?></td>
									<td><?= $list->PEKERJAAN; ?></td>
									<td width="100px">
										<button type="button" id="detail" class="btn btn-danger btn-circle btn-sm"
											data-toggle="modal" data-target="#modal_hapus<?= $list->ID_PS; ?>"
											style="color : white"><i class="fas fa-trash"></i> Hapus</button>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 
foreach ($list_ps as $list) {
	$ID_PS = $list->ID_PS;
	$ID_WEBINAR = $list->ID_WEBINAR;
?>
<!-- modal hapus -->
<div class="modal fade" id="modal_hapus<?= $ID_PS; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
			</div>
			<form action="<?= base_url('admin/webinar/hapus_peserta'); ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda yakin ingin menghapus data ini?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ID_PS" value="<?= $ID_PS; ?>">
					<input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
					<input type="hidden" name="JUDUL_WEBINAR" value="<?= $JUDUL_WEBINAR; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
