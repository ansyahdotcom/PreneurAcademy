<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $tittle ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item active"><?= $tittle ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="card">
			<div class="card-header bg-dark">
				<div class="text-right">
					<!-- dilihat tampilan webinarnya sebelum diposting -->
					<h3 class="card-title text-bold float-left">List Data Webinar</h3>
					<a class="btn btn-primary" href="<?= base_url('admin/webinar/tambah_webinar'); ?>"><i
							class="fas fa-plus-circle"></i> <?= $tittle ?></a>
				</div>
			</div>
			<?php foreach ($webinar as $wbnr) {
				$ID_WEBINAR = $wbnr->ID_WEBINAR;
				$TGL_BUKA = $wbnr->TGL_BUKA;
				$TGL_TUTUP = $wbnr->TGL_TUTUP;
				$TGL_WEB = $wbnr->TGL_WEB;
			?>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="user-block">
								<span class="username m-0 text-lg">
									<a class=""
										href="<?= base_url('admin/webinar/edit/' . $wbnr->JUDUL_WEBINAR . '/'); ?>"><?= str_replace('-', ' ', $wbnr->JUDUL_WEBINAR); ?></a>
								</span>
							</div>
							<div class="text-right">
								<a class="btn btn-secondary"
									href="<?= base_url('admin/webinar/listpeserta/' . $wbnr->JUDUL_WEBINAR); ?>"><i
										class="fas fa-users"></i> List Peserta</a>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-4">
									<img class="card-img-top"
										src="<?= base_url('assets/fotowebinar/' . $wbnr->FOTO_WEBINAR); ?>">
								</div>
								<div class="col-sm-8">
									<table>
										<tr>
											<td><b>Platform</b> &nbsp;</td>
											<td for="PLATFORM">:&nbsp; <?= $wbnr->PLATFORM; ?></td>
										</tr>
										<tr>
											<td><b>Harga</b> &nbsp;</td>
											<td for="HARGA">:&nbsp; <?= $wbnr->HARGA; ?></td>
										</tr>
										<tr>
											<td><b>Tanggal Webinar</b> &nbsp;</td>
											<td for="TGL_WEB">:&nbsp;
												<?= tanggal_indo($TGL_WEB, true) . ' pukul ' . jam_indo($TGL_WEB); ?>
											</td>
										</tr>
										<tr>
											<td>
												<?php 
												if ($TGL_BUKA > $TGL_TUTUP) {
													echo '<small class="form-text text-danger">Format input tanggal salah!</small>';
												}
												?>
											</td>
										</tr>
										<!-- <tr>
											<td>
												<small class="form-text text-success">
												<?php 
												if ($TGL_TUTUP > date("Y-m-d H:i:s", +1)) {
													echo "akan segera dilaksanakan";
												} else {
													echo "sudah dilaksanakan";
												}?>
												</small>
											</td>
										</tr> -->
									</table>
								</div>
								<br>
								<div class="col-md-6 mt-5">
									<div class="card">
										<div class="card-header">
											<label for="LINK_MEETING">Link Meeting</label>
										</div>
										<div class="card-body">
											<?= htmlspecialchars_decode($wbnr->LINK_ZOOM); ?>
										</div>
										<div class="card-footer">
											<?php
												if ($wbnr->ST_POSTWEB == 1) {
													if ($wbnr->ST_LINK == 0) { ?>
											<button type="button" id="detail" class="btn btn-warning btn-sm btn-round"
												style="color: white" data-toggle="modal"
												data-target="#modal_link<?= $ID_WEBINAR; ?>">
												<i class="fas fa-arrow-circle-right"></i> Posting Link</button>
											<?php
													} else { ?>
											<button type="button" id="detail" class="btn btn-success btn-sm btn-round"
												style="color: white" data-toggle="modal"
												data-target="#modal_link<?= $ID_WEBINAR; ?>">
												<i class="fas fa-arrow-circle-left"></i> Kembalikan ke draf</button>
											<?php
													}
												}
												?>
										</div>
									</div>
								</div>
								<div class="col-md-6 mt-5">
									<div class="card">
										<div class="card-header">
											<label for="SRT_WEBINAR">Sertifikat Webinar</label>
										</div>
										<div class="card-body">
											<label><?= str_replace('_', ' ', $wbnr->SRT_WEBINAR); ?></label>
										</div>
										<div class="card-footer">
											<?php
												if ($wbnr->ST_POSTWEB == 0 && $wbnr->SRT_WEBINAR == NULL) { ?>
											<button type="button" id="detail" class="btn btn-primary btn-sm btn-round"
												style="color: white" data-toggle="modal"
												data-target="#modal_srt<?= $ID_WEBINAR; ?>">Upload</button>
											<?php } elseif ($wbnr->ST_POSTWEB == 0 && $wbnr->SRT_WEBINAR != NULL) { ?>
											<button type="button" id="detail" class="btn btn-primary btn-sm btn-round"
												style="color: white" data-toggle="modal"
												data-target="#modal_srt<?= $ID_WEBINAR; ?>">Edit</button>
											<?php } elseif ($wbnr->ST_POSTWEB != 0 && $wbnr->SRT_WEBINAR == NULL) { ?>
											<button type="button" id="detail" class="btn btn-primary btn-sm btn-round"
												style="color: white" data-toggle="modal"
												data-target="#modal_srt<?= $ID_WEBINAR; ?>">Upload</button>
											<?php } elseif ($wbnr->ST_POSTWEB != 0 && $wbnr->SRT_WEBINAR != NULL && $wbnr->ST_SRT == 0) { ?>
											<button type="button" id="detail" class="btn btn-primary btn-sm btn-round"
												style="color: white" data-toggle="modal"
												data-target="#modal_srt<?= $ID_WEBINAR; ?>">Edit</button>

											<button type="button" id="detail" class="btn btn-warning btn-sm btn-round"
												style="color: white" data-toggle="modal"
												data-target="#modal_sertifikat<?= $ID_WEBINAR; ?>">
												<i class="fas fa-arrow-circle-right"></i> Bagikan Sertifikat</button>
											<?php } elseif ($wbnr->ST_POSTWEB != 0 && $wbnr->SRT_WEBINAR != NULL && $wbnr->ST_SRT != 0) { ?>
											<button type="button" id="detail" class="btn btn-primary btn-sm btn-round"
												style="color: white" data-toggle="modal"
												data-target="#modal_srt<?= $ID_WEBINAR; ?>">Edit</button>

											<button type="button" id="detail" class="btn btn-success btn-sm btn-round"
												style="color: white" data-toggle="modal"
												data-target="#modal_sertifikat<?= $ID_WEBINAR; ?>">
												<i class="fas fa-arrow-circle-left"></i> Kembalikan ke draf</button>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<!-- Nyari status web trus ditampilkan sesuai status web -->
							<?php
								if ($wbnr->ST_POSTWEB == 0) {
									echo '<label for="">Draf</label>';
								} else {
									echo '<label for="">Dipublikasikan</label>';
								}
								?>

							<span class="float-right">
								<!-- Nyari status web trus mau diposting apa nggak -->
								<?php
									if ($wbnr->ST_POSTWEB == 0) { ?>
								<button type="button" id="detail" class="btn btn-warning btn-sm btn-round"
									style="color: white" data-toggle="modal"
									data-target="#modal_posting<?= $wbnr->ID_WEBINAR; ?>">
									<i class="fas fa-arrow-circle-right"></i> Publikasikan</button>
								<?php } else { ?>
								<button type="button" id="detail" class="btn btn-success btn-sm btn-round"
									style="color: white" data-toggle="modal"
									data-target="#modal_posting<?= $wbnr->ID_WEBINAR; ?>">
									<i class="fas fa-arrow-circle-left"></i> Kembalikan ke draf</button>
								<?php }
									?>

								<a class="btn btn-secondary btn-sm"
									href="<?= base_url('admin/webinar/pratinjau/' . strtolower($wbnr->JUDUL_WEBINAR)); ?>"><i
										class="fas fa-eye"></i>
									Pratinjau</a>
								<!-- edit artikel -->
								<a href="<?= base_url('admin/webinar/edit/' . strtolower($wbnr->JUDUL_WEBINAR)); ?>">
									<button type="button" class="btn btn-primary btn-circle btn-sm">
										<i class="fas fa-edit" style="color: white"></i> Edit
									</button>
								</a>
								<!-- hapus artikel -->
								<button type="button" id="detail" class="btn btn-danger btn-circle btn-sm"
									data-toggle="modal" data-target="#modal_hapus<?= $wbnr->ID_WEBINAR; ?>"
									style="color : white"><i class="fas fa-trash"></i> Hapus</button>
							</span>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>
</div>

<!-- modal posting -->
<?php
foreach ($webinar as $wbnr) {
	$ID_WEBINAR = $wbnr->ID_WEBINAR;
	$ST_POSTWEB = $wbnr->ST_POSTWEB;
	$ST_LINK = $wbnr->ST_LINK;
	$ST_SRT = $wbnr->ST_SRT;
?>
<div class="modal fade" id="modal_posting<?= $ID_WEBINAR; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php
				if ($ST_POSTWEB == 0) { ?>
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Publikasikan Webinar</h3>
			</div>
			<form action="<?= base_url('admin/webinar/pr_posting'); ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda yakin ingin mempublikasikan webinar ini?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ST_POSTWEB" value="<?= $ST_POSTWEB; ?>">
					<input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-primary">Ya</button>
				</div>
			</form>
			<?php } else { ?>
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Kembalikan ke Draf</h3>
			</div>
			<form action="<?= base_url('admin/webinar/pr_posting'); ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda ingin mengembalikan webinar ke draf?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ST_POSTWEB" value="<?= $ST_POSTWEB; ?>">
					<input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-primary">Ya</button>
				</div>
			</form>
			<?php } ?>
		</div>
	</div>
</div>

<!-- modal posting link meeting-->
<div class="modal fade" id="modal_link<?= $ID_WEBINAR; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php
				if ($ST_LINK == 0) { ?>
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Posting Link</h3>
			</div>
			<form action="<?= base_url('admin/webinar/posting_link') ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda yakin ingin memposting link ini?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ST_LINK" value="<?= $ST_LINK; ?>">
					<input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-primary">Ya</button>
				</div>
			</form>
			<?php
				} else { ?>
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Kembalikan ke Draf</h3>
			</div>
			<form action="<?= base_url('admin/webinar/posting_link') ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda ingin mengembalikan ke draf?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ST_LINK" value="<?= $ST_LINK; ?>">
					<input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-primary">Ya</button>
				</div>
			</form>
			<?php } ?>
		</div>
	</div>
</div>

<!-- modal bagikan sertifikat-->
<div class="modal fade" id="modal_sertifikat<?= $ID_WEBINAR; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php
				if ($ST_SRT == 0) { ?>
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Bagikan Sertifikat</h3>
			</div>
			<form action="<?= base_url('admin/webinar/posting_srt') ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda yakin ingin membagikan sertifikat ini?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ST_SRT" value="<?= $ST_SRT; ?>">
					<input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-primary">Ya</button>
				</div>
			</form>
			<?php
				} else { ?>
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Kembalikan ke Draf</h3>
			</div>
			<form action="<?= base_url('admin/webinar/posting_srt') ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda ingin mengembalikan ke draf?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ST_SRT" value="<?= $ST_SRT; ?>">
					<input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-primary">Ya</button>
				</div>
			</form>
			<?php } ?>
		</div>
	</div>
</div>

<!-- modal ubah file sertifikat-->
<div class="modal fade" id="modal_srt<?= $ID_WEBINAR; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">File Sertifikat Webinar</h3>
			</div>
			<form action="<?= base_url('admin/webinar/file_srt') ?>" enctype="multipart/form-data" method="post"
				class="form-horizontal">
				<div class="modal-body">
					<!-- <p>Apakah Anda yakin ingin menghapus data ini?</p> -->
					<div class="input-group mb-3">
						<div class="custom-file">
							<input type="file" name="SRT_WEBINAR" value="<?= $wbnr->SRT_WEBINAR; ?>"
								class="custom-file-input" id="file" accept="application/pdf">
							<label class="custom-file-label" for="file">Pilih file PDF
								<?php if ($wbnr->SRT_WEBINAR != null) {
										echo '<b>' . $wbnr->SRT_WEBINAR . '</b>';
									} ?>
							</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- modal hapus -->
<div class="modal fade" id="modal_hapus<?= $ID_WEBINAR; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
			</div>
			<form action="<?= base_url('admin/webinar/hapus'); ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda yakin ingin menghapus data ini?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ID_WEBINAR" value="<?= $ID_WEBINAR; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
