<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Edit Webinar</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('admin/Webinar'); ?>">Webinar</a></li>
						<li class="breadcrumb-item active">Edit Webinar</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<?= $this->session->flashdata('message'); ?>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header bg-dark">
						<h3 class="card-title text-bold">Form Edit Webinar</h3>
					</div>
					<!-- /.card-header -->
					<?php foreach ($webinar as $wbnr) { ?>
					<form action="<?= base_url() . 'admin/webinar/update'; ?>" method="POST"
						enctype="multipart/form-data" class="form-horizontal">
						<div class="card-body">
							<input type="hidden" name="ID_WEBINAR" value="<?= $wbnr->ID_WEBINAR; ?>">
							<input type="hidden" name="ID_ADM" value="<?= $wbnr->ID_ADM; ?>">
							<label for="JUDUL_WEBINAR">Judul</label>
							<input type="text" class="form-control" name="JUDUL_WEBINAR"
								value="<?= str_replace('-', ' ', $wbnr->JUDUL_WEBINAR); ?>" autocomplete="off" autofocus
								required>
							<br>
							<label for="FOTO_WEBINAR">Poster Webinar</label>
							<div class="col-md-4">
								<!-- Profile Image -->
								<div class="card card-primary card-outline">
									<div class="card-body box-profil" id="imgedit">
										<div class="form-group text-center">
											<div class="form-group text-center" style="position: relative;">
												<span class="img-div">
													<div class="text-center img-placeholder" onClick="triggerClick()">
														<label class="sm-0 text-primary"><small>(Klik gambar di bawah
																untuk
																mengganti)</small></label>
													</div>
													<div>
														<img src="<?= base_url(); ?>assets/fotowebinar/<?= $wbnr->FOTO_WEBINAR; ?>"
															onClick="triggerClick()" id="daftarDisplay" width="200px"
															alt="User profile picture">
													</div>
												</span>
												<input type="file" name="FOTO_WEBINAR" value="<?= $wbnr->FOTO_WEBINAR; ?>"
													id="daftarImage" class="form-control" style="display: none;"
													accept="image/x-png,image/jpeg" onChange="displayImage(this)">
												<input type="text" hidden name="HAPUS_FOTO"
													value="<?= $wbnr->FOTO_WEBINAR; ?>">
											</div>
										</div>
									</div>
									<!-- /.card-body -->
								</div>
								<!-- /.card -->
							</div>
							<!-- /.col -->
							<br>
							<label for="HARGA">Harga</label>
							<input type="text" class="form-control" name="HARGA" value="<?= $wbnr->HARGA; ?>"
								autocomplete="off" required>
							<datalist id="HARGA" class="form-control" name="HARGA" hidden>
								<option value="GRATIS">GRATIS</option>
							</datalist>
							<br>
							<label for="PLATFORM">Platform</label>
							<select name="PLATFORM" id="PLATFORM" class="form-control" required
								value="<?= $wbnr->PLATFORM; ?>">
								<option value="">--Pilih--</option>
								<?php foreach ($platform as $plt) { ?>
								<option value="<?= $plt->NM_PLT; ?>"
									<?= $plt->NM_PLT == $wbnr->PLATFORM ? "selected" : null ?>>
									<?= $plt->NM_PLT; ?></option>
								<?php } ?>
							</select>
							<br>
							<label for="KUOTA_WEB">Kuota Peserta</label>
							<input type="number" name="KUOTA_WEB" class="form-control" placeholder=" Contoh : 100 "
								value="<?= $wbnr->KUOTA_WEB; ?>">
							<br>
							<label for="LINK_ZOOM">Link Meeting</label>
							<textarea class="textarea" class="form-control"
								name="LINK_ZOOM"><?= $wbnr->LINK_ZOOM  ?></textarea>
							<br>
							<!-- Tanggal buka pendaftaran -->
							<!-- <label for="TGL_BUKA">Tanggal Pembukaan Pendaftaran</label>
								<div class="input-group">
									<input type="text" data-toggle="datetimepicker" data-target=".pendaftaran" class="form-control pendaftaran" name="TGL_BUKA" id="TGL_BUKA" value="<?= date('d F Y H:i', strtotime($wbnr->TGL_BUKA)); ?>" autocomplete="off" placeholder="dd/mm/yyyy 00:00" required>
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-calendar-alt"></i>
										</span>
									</div>
								</div>
								<br> -->
							<!-- Tanggal tutup pendaftaran -->
							<!-- <label for="TGL_TUTUP">Tanggal Penutupan Pendaftaran</label>
								<div class="input-group">
									<input type="text" data-toggle="datetimepicker" data-target=".penutupan" class="form-control penutupan" name="TGL_TUTUP" id="TGL_TUTUP" value="<?= date('d F Y H:i', strtotime($wbnr->TGL_TUTUP)); ?>" autocomplete="off" placeholder="dd/mm/yyyy 00:00" required>
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-calendar-alt"></i>
										</span>
									</div>
								</div>
								<br> -->
							<!-- Tanggal mulai webinar -->
							<label for="TGL_WEB">Tanggal Webinar</label>
							<div class="input-group">
								<input type="text" data-toggle="datetimepicker" data-target=".mulai2"
									class="form-control mulai2" name="TGL_WEB" id="TGL_WEB"
									value="<?= date('d F Y H:i', strtotime($wbnr->TGL_WEB)); ?>" autocomplete="off"
									placeholder="dd/mm/yyyy 00:00" required>
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="far fa-calendar-alt"></i>
									</span>
								</div>
							</div>
							<br>
							<label for="KONTEN_WEB">Deskripsi Webinar</label>
							<textarea class="textarea" class="form-control"
								name="KONTEN_WEB"><?= $wbnr->KONTEN_WEB  ?></textarea>
							<br>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>
								Simpan</button>
							<a href="<?= base_url('admin/webinar'); ?>" class="btn btn-default float-right"><i
									class="fas fa-arrow-circle-left"></i> Batal</a>
						</div>
					</form>
					<?php } ?>
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
