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
						<li class="breadcrumb-item"><a href="<?= base_url('admin/kelas'); ?>">Data Kelas</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div>
			</div>
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		</div>

	</section>
	<section class="content">
		<div class="card">
			<div class="card-header bg-dark">
				<h3 class="card-title text-bold"> List Modul</h3>
				<div class="card-tools">
					<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                <i class="fas fa-plus-circle"></i> Import Excel</button> -->
					<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd">
						<i class="fas fa-plus-circle"></i> Modul</button>
					<a href="<?= base_url('admin/kelas'); ?>" class="btn btn-sm btn-default">
						<i class="fas fa-arrow-circle-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<?php if ($materi == null) : ?>
				<!-- Jika Belum Terdapat data -->
				<div class="col-md">
					<div class="card-body text-center mt-4">
						<img src="<?= base_url('assets/icon/noList.svg'); ?>" alt="noData"
							class="img-rounded img-responsive img-fluid" width="100">
					</div>
					<div class="card-body pt-0 mt-4">
						<h3 class="text-center text-bold text-muted">Belum terdapat data</h3>
					</div>
				</div>
				<?php else : ?>
				<?php foreach ($materi as $mtr) :
						$id = $mtr['ID_MT'];
						$nama = $mtr['NM_MT'];
					?>
				<div class="card">
					<div class="card-header bg-dark">
						<h3 class="card-title pt-2"><?= $nama; ?></h3>
						<div class="card-tools">
							<button type="button" class="btn btn-sm btn-info" data-toggle="modal"
								data-target="#modalTug<?= $id; ?>">
								<i class="fas fa-plus-circle"></i> File Tugas</button>
							<button type="button" class="btn btn-sm btn-success" data-toggle="modal"
								data-target="#modalSub<?= $id; ?>">
								<i class="fas fa-plus-circle"></i> File Materi</button>
							<button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
								data-target="#modalLink<?= $id; ?>">
								<i class="fas fa-plus-circle"></i> Link Meeting</button>
							<button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
								data-target="#modalEdit<?= $id; ?>">
								<i class="fas fa-edit"></i> Edit</button>
							<button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
								data-target="#modalDelete<?= $id; ?>">
								<i class="fas fa-trash"></i> Hapus</button>
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
								title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<?php
								$id = $mtr['ID_MT'];
								$query = $this->db->query("SELECT * FROM materi_sub, materi WHERE materi.ID_MT = materi_sub.ID_MT AND materi.ID_MT ='$id'");
								$sub = $query->result_array();
								foreach ($sub as $i) :
									$id_sub = $i['ID_SUB'];
									$nm_sub = $i['NM_SUB'];
									$icon_sub = $i['ICON_SUB'];
								?>
						<div class="row">
							<div class="card col-sm-12 bg-navy mt-2">
								<div class="card-header">
									<h1 class="card-title mt-2"><i class="<?= $i['ICON_SUB']; ?> fa-md"></i>
										<?= htmlspecialchars_decode($i['FILE_SUB']); ?></h1>
									<div class="card-tools pb-2">
										<?php if ($icon_sub == "fas fa-link") { ?>
										<button type="button" class="btn btn-info" data-toggle="modal"
											data-target="#modal_edit_link<?= $id_sub; ?>">
											<i class="fas fa-edit"></i> Edit Link</button>
										<?php } else { ?>
										<button type="button" class="btn btn-warning" data-toggle="modal"
											data-target="#modal_edit_sub<?= $id_sub; ?>">
											<i class="fas fa-edit"></i> Edit</button>
										<?php } ?>
										<button type="button" class="btn btn-danger" data-toggle="modal"
											data-target="#modal_hapus_sub<?= $id_sub; ?>">
											<i class="fas fa-trash"></i> Hapus</button>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						<!-- Tugas -->
						<?php
								$id = $mtr['ID_MT'];
								$query = $this->db->query("SELECT * FROM tugas, materi WHERE materi.ID_MT = tugas.ID_MT AND tugas.ID_MT = '$id'");
								$tugas = $query->result_array();
								foreach ($tugas as $i) :
									$id_tg = $i['ID_TG'];
									$nm_tg = $i['DETAIL_TG'];
								?>
						<div class="row">
							<div class="card col-sm-12 bg-blue mt-2">
								<div class="card-header">
									<h1 class="card-title mt-2"><i class="<?= $i['ICON_TG'] ?> fa-lg mr-2"></i>
										<?= $i['NM_TG']; ?></h1>
									<div class="card-tools pb-2">
										<button type="button" class="btn btn-warning" data-toggle="modal"
											data-target="#modal_edit_tg<?= $id_tg; ?>">
											<i class="fas fa-edit"></i> Edit</button>
										<button type="button" class="btn btn-danger" data-toggle="modal"
											data-target="#modal_hapus_tg<?= $id_tg; ?>">
											<i class="fas fa-trash"></i> Hapus</button>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>


	<?php
	$id_kls = $this->uri->segment(4);
	?>
	<!-- Modal Tambah -->
	<div class="modal fade" id="modalAdd" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h5 class="modal-title">Tambah Materi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url('admin/materi/create') ?>" method="post"
					enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Judul Materi</label>
							<input type="text" name="nama" class="form-control" placeholder="Nama Menu">
							<small class="form-text text-success">Contoh: BAB 1 Pengenalan</small>
							<?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="isi">Isi Konten</label>
							<textarea class="textarea" name="detail" placeholder="Isi Konten"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							<small class="form-text text-success">Berisi keterangan materi</small>
							<?= form_error('detail', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<input type="hidden" name="id_kelas" value="<?= $id_kls ?>" class="form-control"
								placeholder="Label Icon">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<?php foreach ($materi as $p) :
		$id = $p['ID_MT'];
		$nama = $p['NM_MT'];
		$detail = $p['DETAIL_MT'];
		$query = $this->db->query("SELECT * FROM materi_sub, materi WHERE materi.ID_MT = materi_sub.ID_MT");
		$sub = $query->result_array();
		foreach ($sub as $i) :
			$id_sub = $i['ID_SUB'];
			$nm_sub = $i['NM_SUB'];
			$file_sub = $i['FILE_SUB'];
			$ic_sub = $i['ICON_SUB'];
	?>
	<!-- Modal -->
	<form action="<?php echo base_url() . 'admin/materi/upload_file' ?>" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="modalSub<?= $id; ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Tambah File Materi</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Sub File</label>
							<input type="text" name="nama" class="form-control" placeholder="Nama Menu">
							<small class="form-text text-success">Contoh: Pengenalan dasar wirausaha</small>
							<?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="status">Jenis File</label>
							<select class="form-control" id="jenis" name="jenis">
								<option value="fas fa-file-pdf">PDF (.pdf)</option>
								<option value="fas fa-file-word">Word (.doc/.docx)</option>
								<option value="fas fa-file-powerpoint">Power Point (.ppt/.pptx)</option>
							</select>
							<small class="form-text text-success">Jenis tipe file yang akan di unggah</small>
							<?= form_error('jenis', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group mb-3">
							<div class="custom-file">
								<input type="file" name="file" class="custom-file-input" id="file"
									accept="application/msword, application/vnd.ms-powerpoint, application/pdf">
								<label class="custom-file-label" for="file">Unggah file</label>
							</div>
							<small class="form-text text-success">Unggah file materi. *maximal ukuran 5mb</small>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="hidden" name="id_materi" value="<?= $id; ?>" required>
						<input type="hidden" name="id_kelas" value="<?= $id_kls; ?>" required>
						<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form action="<?php echo base_url() . 'admin/materi/update_file' ?>" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="modal_edit_sub<?= $id_sub; ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Edit File Materi</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Nama File</label>
							<input type="text" name="nama" value="<?= $nm_sub; ?>" class="form-control"
								placeholder="Nama Menu">
							<small class="form-text text-success">Contoh: Pengenalan dasar wirausaha</small>
							<?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="status">Jenis File</label>
							<select class="form-control" id="jenis" name="jenis">
								<option value="fas fa-file-pdf" <?= $ic_sub == "fas fa-file-pdf" ? "selected" : "" ?>>
									PDF
									(.pdf)</option>
								<option value="fas fa-file-word" <?= $ic_sub == "fas fa-file-word" ? "selected" : "" ?>>
									Word
									(.doc/.docx)</option>
								<option value="fas fa-file-powerpoint"
									<?= $ic_sub == "fas fa-file-powerpoint" ? "selected" : "" ?>>Power Point
									(.ppt/.pptx)
								</option>
							</select>
							<small class="form-text text-success">Jenis tipe file yang akan di unggah</small>
							<?= form_error('jenis', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group mb-3">
							<div class="custom-file">
								<input type="file" name="file" value="<?= $file_sub; ?>" class="custom-file-input"
									id="file"
									accept="application/msword, application/vnd.ms-powerpoint, application/pdf">
								<label class="custom-file-label" for="file"><?= $file_sub; ?></label>
							</div>
							<small class="form-text text-success">Unggah file materi. *maksimal ukuran 5mb</small>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="hidden" name="id_sub" value="<?= $id_sub; ?>" required>
						<input type="hidden" name="id_kelas" value="<?= $id_kls; ?>" required>
						<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form action="<?php echo base_url() . 'admin/materi/meet' ?>" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="modalLink<?= $id; ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Tambah Link Meeting</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Nama Link</label>
							<input type="text" name="nama" class="form-control" placeholder="Nama Menu">
							<small class="form-text text-success">Contoh: Link pertemuan</small>
							<?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="nama">Link Meeting</label>
							<textarea class="textarea" name="link" placeholder="Isi Konten"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
							<?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="hidden" name="detail" value="Link meeting" required>
						<input type="hidden" name="icon" value="fas fa-link" required>
						<input type="hidden" name="id_materi" value="<?= $id; ?>" required>
						<input type="hidden" name="id_kelas" value="<?= $id_kls; ?>" required>
						<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form action="<?php echo base_url() . 'admin/materi/meet_edit' ?>" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="modal_edit_link<?= $id_sub; ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Edit Link Meeting</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Nama Link</label>
							<input type="text" name="nama" value="<?= $nm_sub; ?>" class="form-control"
								placeholder="Nama Menu">
							<small class="form-text text-success">Contoh: Link pertemuan</small>
							<?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="nama">Link Meeting</label>
							<textarea class="textarea" name="link" placeholder="Isi Konten"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $file_sub; ?></textarea>
							<?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="hidden" name="detail" value="Link meeting" required>
						<input type="hidden" name="icon" value="fas fa-link" required>
						<input type="hidden" name="id_materi" value="<?= $id; ?>" required>
						<input type="hidden" name="id_sub" value="<?= $id_sub; ?>" required>
						<input type="hidden" name="id_kelas" value="<?= $id_kls; ?>" required>
						<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form action="<?php echo base_url() . 'admin/materi/delete_file' ?>" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="modal_hapus_sub<?= $id_sub; ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Hapus Menu</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body justify-content-center">
						<div class="text-center">
							<img class="mt-2 mb-2" src="<?= base_url(); ?>assets/dist/img/hapus.svg" width=80%
								alt="delete-img">
							<h4 class="mb-4">Apakah anda yakin untuk menghapus file ini?</h4>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="hidden" name="delete_id" value="<?= $id_sub; ?>" required>
						<input type="hidden" name="id_kelas" value="<?= $id_kls; ?>" required>
						<button type="submit" class="btn btn-danger"><i class="far fa-save"></i> Hapus</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php endforeach; ?>

	<form action="<?php echo base_url() . 'admin/materi/update' ?>" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="modalEdit<?= $id ?>" aria-hidden="true" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Edit Menu</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Judul Materi</label>
							<input type="text" name="nama" value="<?= $nama; ?>" class="form-control"
								placeholder="Nama Menu">
							<small class="form-text text-success">Contoh: BAB 1 Pengenalan</small>
							<?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="isi">Isi Konten</label>
							<textarea class="textarea" name="detail" placeholder="Isi Konten"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $detail ?></textarea>
							<small class="form-text text-success">Berisi keterangan materi</small>
							<?= form_error('detail', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
					</div>
					<div class="card-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="hidden" name="id_edit" value="<?= $id; ?>" required>
						<input type="hidden" name="id_kelas" value="<?= $id_kls; ?>" required>
						<button type="submit" class="btn btn-warning"><i class="far fa-save"></i> Update</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form action="<?php echo base_url() . 'admin/materi/delete' ?>" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="modalDelete<?= $id; ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Hapus Materi</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body justify-content-center">
						<div class="text-center">
							<img class="mt-2 mb-2" src="<?= base_url(); ?>assets/dist/img/hapus.svg" width=80%
								alt="delete-img">
							<h4 class="mb-4">Apakah anda yakin untuk menghapus materi ini?</h4>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="hidden" name="delete_id" value="<?= $id; ?>" required>
						<input type="hidden" name="id_kelas" value="<?= $id_kls; ?>" required>
						<button type="submit" class="btn btn-danger"><i class="far fa-save"></i> Hapus</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form action="<?php echo base_url() . 'admin/materi/upload_tugas' ?>" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="modalTug<?= $id; ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Tambah Tugas</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Judul Tugas</label>
							<input type="text" name="nama" class="form-control" placeholder="Nama Menu"
								value="<?= set_value('nama'); ?>" required autofocus>
							<small class="form-text text-success">Contoh: Pengenalan dasar wirausaha</small>
							<?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="status">Jenis File</label>
							<select class="form-control" id="jenis" name="jenis">
								<option value="fas fa-file-pdf">PDF (.pdf)</option>
								<option value="fas fa-file-word">Word (.doc/.docx)</option>
								<option value="fas fa-file-powerpoint">Power Point (.ppt/.pptx)</option>
							</select>
							<small class="form-text text-success">Jenis tipe file yang akan di unggah</small>
							<?= form_error('jenis', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="isi">Isi Konten</label>
							<textarea class="textarea" name="deskripsi" placeholder="Isi Konten"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
								required><?= set_value('deskripsi'); ?></textarea>
							<small class="form-text text-success">Berisi keterangan tugas</small>
							<?= form_error('deskripsi', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="deadline">Deadline Tugas</label>
							<!-- <input type="date" class="form-control" name="deadline" id="deadline"> -->
							<div class="input-group">
								<input class="form-control pendaftaran" data-toggle="datetimepicker"
									data-target=".pendaftaran" type="text" id="deadline" name="deadline"
									value="<?= set_value('deadline'); ?>" placeholder="dd/mm/yyyy 00:00"
									autocomplete="off" required>
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="far fa-calendar-alt"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="custom-file">
								<input type="file" name="file" class="custom-file-input" id="file"
									accept="application/msword, application/vnd.ms-powerpoint, application/pdf">
								<label class="custom-file-label" for="file">Unggah file</label>
							</div>
							<small class="form-text text-success">Unggah file materi. *maximal ukuran 5mb</small>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="hidden" name="id_materi" value="<?= $id; ?>" required>
						<input type="hidden" name="id_kelas" value="<?= $id_kls; ?>" required>
						<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<?php foreach ($materi as $p) :
			$id = $p['ID_MT'];
			// $nama = $p['NM_MT'];
			// $detail = $p['DETAIL_MT'];
			$query = $this->db->query("SELECT * FROM tugas WHERE tugas.ID_MT = '$id'");
			$sub = $query->result_array();
			foreach ($sub as $i) :
				$id_mt = $i['ID_MT'];
				$id_tg = $i['ID_TG'];
				$nm_tg = $i['NM_TG'];
				$detail = $i['DETAIL_TG'];
				$deadline = $i['DEADLINE'];
				$file_tg = $i['FILE_TG'];
				$ic_tg = $i['ICON_TG'];
?>
	<!-- Modal -->

	<form action="<?php echo base_url() . 'admin/materi/update_tugas' ?>" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="modal_edit_tg<?= $id_tg; ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Edit Tugas</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Nama File</label>
							<input type="text" name="nama" value="<?= $nm_tg; ?>" class="form-control"
								placeholder="Nama Menu">
							<small class="form-text text-success">Contoh: Pengenalan dasar wirausaha</small>
							<?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="status">Jenis File</label>
							<select class="form-control" id="jenis" name="jenis">
								<option value="fas fa-file-pdf" <?= $ic_tg == "fas fa-file-pdf" ? "selected" : "" ?>>PDF
									(.pdf)</option>
								<option value="fas fa-file-word" <?= $ic_tg == "fas fa-file-word" ? "selected" : "" ?>>
									Word
									(.doc/.docx)</option>
								<option value="fas fa-file-powerpoint"
									<?= $ic_tg == "fas fa-file-powerpoint" ? "selected" : "" ?>>Power Point (.ppt/.pptx)
								</option>
							</select>
							<small class="form-text text-success">Jenis tipe file yang akan di unggah</small>
							<?= form_error('jenis', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="isi">Isi Konten</label>
							<textarea class="textarea" name="deskripsi" placeholder="Isi Konten"
								style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $detail; ?></textarea>
							<small class="form-text text-success">Berisi keterangan tugas</small>
							<?= form_error('deskripsi', '<small class="text-danger col-md">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="deadline">Deadline Tugas</label>
							<span class="badge badge-danger"><?= date('d F Y H:i', strtotime($deadline)); ?></span>
							<!-- <input type="date" class="form-control" name="deadline" id="deadline" value="<?= $deadline; ?>"> -->
							<div class="input-group">
								<input class="form-control pendaftaran" data-toggle="datetimepicker"
									data-target=".pendaftaran" type="text" id="deadline" name="deadline"
									value="<?= date('d F Y H:i', strtotime($deadline)); ?>"
									placeholder="dd/mm/yyyy 00:00" autocomplete="off" required>
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="far fa-calendar-alt"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group mb-3">
							<div class="custom-file">
								<input type="file" name="file" value="<?= $file_tg; ?>" class="custom-file-input"
									id="file"
									accept="application/msword, application/vnd.ms-powerpoint, application/pdf">
								<label class="custom-file-label" for="file"><?= $file_tg; ?></label>
							</div>
							<small class="form-text text-success">Unggah file materi. *maksimal ukuran 5mb</small>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="hidden" name="id_mt" value="<?= $id_mt; ?>" required>
						<input type="hidden" name="id_tg" value="<?= $id_tg; ?>" required>
						<input type="hidden" name="id_kelas" value="<?= $id_kls; ?>" required>
						<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form action="<?php echo base_url() . 'admin/materi/delete_tugas' ?>" method="post" enctype="multipart/form-data">
		<div class="modal fade" id="modal_hapus_tg<?= $id_tg; ?>" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title">Hapus Menu</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body justify-content-center">
						<div class="text-center">
							<img class="mt-2 mb-2" src="<?= base_url(); ?>assets/dist/img/hapus.svg" width=80%
								alt="delete-img">
							<h4 class="mb-4">Apakah anda yakin untuk menghapus file ini?</h4>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="hidden" name="delete_id" value="<?= $id_tg; ?>" required>
						<input type="hidden" name="id_kelas" value="<?= $id_kls; ?>" required>
						<button type="submit" class="btn btn-danger"><i class="far fa-save"></i> Hapus</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php endforeach; ?>
	<?php endforeach; ?>
	<?php endforeach; ?>
</div>
