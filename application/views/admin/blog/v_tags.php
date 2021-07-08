<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $tittle; ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="card-header">
			<div class="text-right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus-circle"></i> <?= $tittle; ?></button>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th>Nama Tags</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($tags as $tg) {
								?>
									<tr>
										<td class="text-center" width="100px"><?= $no++ ?></td>
										<td><?= $tg->NM_TAGS; ?></td>
										<td class="text-center" width="150px">
											<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $tg->ID_TAGS; ?>"><b><i class="fas fa-edit"></i>
													Edit</b></button>
											<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $tg->ID_TAGS; ?>"><i class="fas fa-trash"></i>
												<b>Hapus</b></button>
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
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
foreach ($tags as $tg) {
	$ID_TAGS = $tg->ID_TAGS;
	$NM_TAGS = $tg->NM_TAGS;
?>
	<!-- modal hapus data pendaftaran -->
	<div class="modal fade" id="modal_hapus<?= $tg->ID_TAGS; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
				</div>
				<form action="<?= base_url('admin/Tags/hapus'); ?>" method="post" class="form-horizontal">
					<div class="modal-body">
						<p>Apakah Anda yakin ingin menghapus data ini?</p>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="ID_TAGS" value="<?= $tg->ID_TAGS; ?>">
						<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
						<button class="btn btn-danger">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal edit Tags -->
	<div class="modal fade" id="modal-edit<?= $tg->ID_TAGS; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title title-1" id="myModalLabel">Edit Tags</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('admin/Tags/update_Tags'); ?>">
					<div class="modal-body">
						<input type="hidden" readonly name="ID_TAGS" value="<?php echo $tg->ID_TAGS ?>" class="form-control">
						<div class="form-group">
							<input type="text" name="NM_TAGS" id="NM_TAGS" class="form-control" autocomplete="off" value="<?= $tg->NM_TAGS; ?>">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="save-btn" class="btn btn-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<!-- Modal tambah Tags -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title title-1" id="myModalLabel">Tambah Tags</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/Tags/tambah_Tags'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" class="form-control" id="ID_TAGS" name="ID_TAGS" value="<?= $ID_TAGSS; ?>">

						<input required type="text" name="NM_TAGS" id="NM_TAGS" class="form-control" placeholder="Masukkan Nama Tags . ." aria-describedby="namakatags" maxlength="100" autocomplete="off">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="save-btn" class="btn btn-success">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>