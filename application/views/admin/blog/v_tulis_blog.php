<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $tittle; ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('admin/blog'); ?>">Blog</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- <div class="card-header">

					</div> -->
					<!-- /.card-header -->
					<form action="<?= base_url('admin/blog/tulis_artikel'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="card-body">
							<input type="hidden" name="ID_POST" value="<?= $ID_POST; ?>">
							<input type="hidden" name="ID_ADM" value="<?= $ID_ADM; ?>">
							<!-- Judul -->
							<label for="JUDUL_POST">Judul</label>
							<input class="form-control" type="text" autocomplete="off" name="JUDUL_POST" placeholder="Tambahkan Judul" autofocus required>
							<?= form_error('JUDUL_POST', '<small class="text-danger">', '</small>'); ?>
							<br>
							<!-- Kategori -->
							<i class="fa fa-folder"></i>
							<label for="ID_CT">Kategori</label>
							<select name="ID_CT" id="ID_CT" class="form-control" data-placeholder="Pilih kategori" required>
								<option selected disabled>Pilih Kategori</option>
								<?php foreach ($category as $ct) { ?>
									<option value="<?= $ct->ID_CT; ?>"><?= $ct->NM_CT; ?></option>
								<?php } ?>
							</select>
							<button type="button" id="tambah_kategori" class="btn btn-primary btn-xs btn-round" data-toggle="modal" data-target="#modal_tambah_kategori">Tambah kategori baru</button>
							<br>
							<br>
							<!-- Tags -->
							<i class="fa fa-tag"></i>
							<label for="ID_TAGS">Tags</label><br>
							<select name="ID_TAGS[]" id="ID_TAGS[]" class="select2bs4" required multiple="multiple" data-placeholder="Pilih tag" style="width: 100%;">
								<?php foreach ($tags as $tg) { ?>
									<option value="<?= $tg->ID_TAGS; ?>"><?= $tg->NM_TAGS; ?></option>
								<?php } ?>
							</select>
							<button type="button" id="buat_tags" class="btn btn-primary btn-xs btn-round" data-toggle="modal" data-target="#modal_buat_tags">Buat tags baru</button>
							<br> <br>
							<div class="form-group">
								<label for="icon">Foto</label>
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="preview-zone hidden">
													<div class="box box-solid">
														<div class="box-header with-border">
															<div><b>Preview</b></div>
															<div class="box-tools pull-right">
																<button type="button" class="btn btn-danger btn-xs remove-preview">
																	<i class="fa fa-times"></i> Reset
																</button>
															</div>
														</div>
														<div class="box-body"></div>
													</div>
												</div>
												<div class="dropzone-wrapper">
													<div class="dropzone-desc">
														<i class="glyphicon glyphicon-download-alt"></i>
														<div>Pilih file gambar atau seret gambar kesini .</div>
													</div>
													<input type="file" name="FOTO_POST" class="dropzone" accept="image/jpeg">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br>
							<hr>
							<textarea class="textarea" class="form-control" name="KONTEN_POST" id="KONTEN_POST" placeholder="Isi artikel disini..." required></textarea>
							<br>
							<a href="<?= base_url('admin/blog'); ?>" class="btn btn-primary btn-round">Batal</a>
							<button type="submit" class="btn btn-success btn-round">Simpan</button>
						</div>
					</form>
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

<!-- Modal tambah kategori -->
<div class="modal fade" id="modal_tambah_kategori" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title title-1" id="myModalLabel">Tambah Kategori Blog</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/blog/pr_tmbh_kategori'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" class="form-control" name="ID_CT" value="<?= $ID_CT; ?>">
						<input type="text" class="form-control" name="NM_CT" autocomplete="off" autofocus required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="save-btn" class="btn btn-success">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal buat tags -->
<div class="modal fade" id="modal_buat_tags" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title title-1" id="myModalLabel">Tambah Tags Blog</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/blog/pr_tmbh_tags'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" class="form-control" name="ID_TAGS" value="<?= $ID_TAGS; ?>">
						<input type="text" class="form-control" name="NM_TAGS" autocomplete="off" autofocus required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="save-btn" class="btn btn-success">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>