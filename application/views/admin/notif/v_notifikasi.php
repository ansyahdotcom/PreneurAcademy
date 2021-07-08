<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Notifikasi</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item active">Notifikasi</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<?= $this->session->flashdata('message'); ?>
	</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Tabel <?= $tittle; ?></h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th>Nama</th>
									<th>Kelas</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($transaksi as $trs) {
								?>
									<tr>
										<td class="text-center" width="100px"><?= $no++ ?></td>
										<td><?= $ktg->NM_CT; ?></td>
										<td class="text-center" width="150px">
											<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $ktg->ID_CT; ?>"><b><i class="fas fa-edit"></i>
													Edit</b></button>
											<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_hapus<?= $ktg->ID_CT; ?>"><i class="fas fa-trash"></i>
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
	<!-- /.content -->
</div>