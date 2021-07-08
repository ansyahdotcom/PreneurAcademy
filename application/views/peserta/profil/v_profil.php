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
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div>
			</div>
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">

					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile" id="img">
							<div class="text-center">
								<img class="img-fluid img-thumbnail" src="<?= base_url(); ?>assets/dist/img/peserta/<?= $peserta['FTO_PS']; ?>" alt="User profile picture">
							</div>

							<h3 class="profile-username text-center text-bold"><?= $peserta['NM_PS']; ?></h3>

							<ul class="list-group">
								<li class="list-group-item">
									<b>Hak akses</b> <span class="badge bg-warning text-bold float-right"><?= $peserta['ROLE']; ?></span>
								</li>
								<li class="list-group-item">
									<b>Terdaftar</b> <span class="badge bg-primary text-bold float-right"><?= date('d M Y', $peserta['DATE_CREATE']); ?></span>
								</li>
							</ul>
							<!-- <button type="button" class="btn btn-primary btn-block" id="btn-ubhgbr"><i class="fas fa-images"></i> Ubah Gambar</button> -->
						</div>

						<div class="card-body box-profil" id="imgedit" hidden>
							<?= form_open_multipart('peserta/profil'); ?>
							<div class="form-group">
								<div class="form-group text-center" style="position: relative;">
									<span class="img-div">
										<div class="text-center img-placeholder" onClick="triggerClick()">
											<h3 class="profile-username text-center text-bold">Edit Foto Profil</h3>
											<label class="sm-0 text-primary"><small>(Klik gambar di bawah untuk mengganti)</small></label>
										</div>
										<div>
											<img src="<?= base_url(); ?>assets/dist/img/peserta/<?= $peserta['FTO_PS']; ?>" onClick="triggerClick()" id="daftarDisplay" width="200px" alt="User profile picture">
										</div>
									</span>
									<input type="file" name="FTO_PS" value="<?= $peserta['FTO_PS']; ?>" id="daftarImage" class="form-control" style="display: none;" accept="image/x-png,image/jpeg" onChange="displayImage(this)">
									<input type="hidden" name="HAPUS_FOTO" value="<?= $peserta['FTO_PS']; ?>">
									<?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
									<label class="text-bold text-gray">Foto Profil</label>
									<div>
										<small class="text-danger text-bold">(Ukuran file gambar max 2 mb.)</small>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->

				<div class="col-md-9">
					<div class="card card-primary card-outline card-outline-tabs">
						<div class="card-header p-0 border-bottom-0">
							<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active tittle" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Profil</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Ubah Password</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="custom-tabs-four-tabContent">
								<!-- Profil -->
								<div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
									<!-- <form class="form-horizontal" action="<?= base_url('peserta/profil'); ?>" method="POST"> -->
									<div class="form-group row">
										<label for="nama" class="col-sm-3 col-form-label">Nama</label>
										<div class="input-group mb-1 col-sm-9">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user"></i></span>
											</div>
											<input type="text" class="form-control" id="nm" name="nmps" placeholder="Nama Lengkap" value="<?= $peserta['NM_PS']; ?>" disabled>
										</div>
										<div class="offset-sm-3">
											<?= form_error('nmps', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="email" class="col-sm-3 col-form-label">Email</label>
										<div class="input-group mb-1 col-sm-9">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-envelope"></i></span>
											</div>
											<input type="email" class="form-control" id="em" name="email" placeholder="Email" value="<?= $peserta['EMAIL_PS']; ?>" disabled>
										</div>
										<div class="offset-sm-3">
											<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="hp" class="col-sm-3 col-form-label">No Handphone</label>
										<div class="input-group mb-1 col-sm-9">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-phone"></i></span>
											</div>
											<input type="number" class="form-control" id="hp" name="hp" placeholder="No Handphone" value="<?= $peserta['HP_PS']; ?>" disabled>
										</div>
										<div class="offset-sm-3">
											<?= form_error('hp', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
										<div class="input-group mb-1 col-sm-9">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
											</div>
											<input type="text" class="form-control" id="almt" name="alamat" placeholder="Alamat" value="<?= $peserta['ALMT_PS']; ?>" disabled>
										</div>
										<div class="offset-sm-3">
											<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
										<div class="input-group mb-1 col-sm-9">
											<div class="input-group-prepend">
												<span class="input-group-text" for="jk"><i class="fas fa-venus-mars"></i></span>
											</div>
											<select class="custom-select form-control" name="jk" id="jk" disabled>
												<option selected>--Pilih--</option>
												<option value="Laki-laki" <?= $peserta['JK_PS'] == "Laki-laki" ? "selected" : "" ?>>Laki-laki
												</option>
												<option value="Perempuan" <?= $peserta['JK_PS'] == "Perempuan" ? "selected" : "" ?>>Perempuan
												</option>
											</select>
										</div>
										<div class="offset-sm-3">
											<?= form_error('jk', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
										<div class="input-group mb-1 col-sm-9">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
											</div>
											<select name="pekerjaan" id="pekerjaan" class="custom-select form-control" disabled>
												<option selected>--Pilih--</option>
												<option value="Pelajar/Mahasiswa" <?= $peserta['PEKERJAAN'] == "Pelajar/Mahasiswa" ? "selected" : "" ?>>Pelajar/Mahasiswa
												</option>
												<option value="Wiraswasta" <?= $peserta['PEKERJAAN'] == "Wiraswasta" ? "selected" : "" ?>>
													Wiraswasta</option>
												<option value="PNS" <?= $peserta['PEKERJAAN'] == "PNS" ? "selected" : "" ?>>PNS</option>
												<option value="Petani" <?= $peserta['PEKERJAAN'] == "Petani" ? "selected" : "" ?>>Petani
												</option>
												<option value="Peternak" <?= $peserta['PEKERJAAN'] == "Peternak" ? "selected" : "" ?>>Peternak
												</option>
												<option value="TNI/Polisi" <?= $peserta['PEKERJAAN'] == "TNI/Polisi" ? "selected" : "" ?>>
													TNI/Polisi</option>
												<option value="Lain-lain" <?= $peserta['PEKERJAAN'] == "Lain-lain" ? "selected" : "" ?>>
													Lain-lain</option>
											</select>
											<!-- <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?= $peserta['PEKERJAAN']; ?>" disabled> -->
										</div>
										<div class="offset-sm-3">
											<?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="agama" class="col-sm-3 col-form-label">Agama</label>
										<div class="input-group mb-1 col-sm-9">
											<div class="input-group-prepend">
												<span class="input-group-text" for="agama"><i class="fas fa-praying-hands"></i></span>
											</div>
											<select class="custom-select form-control" name="agama" id="agama" disabled>
												<option selected>--Pilih Agama--</option>
												<option value="Islam" <?= $peserta['AGAMA_PS'] == "Islam" ? "selected" : "" ?>>Islam</option>
												<option value="Hindu" <?= $peserta['AGAMA_PS'] == "Hindu" ? "selected" : "" ?>>Hindu</option>
												<option value="Buddha" <?= $peserta['AGAMA_PS'] == "Buddha" ? "selected" : "" ?>>Buddha</option>
												<option value="Kristen" <?= $peserta['AGAMA_PS'] == "Kristen" ? "selected" : "" ?>>Kristen
												</option>
												<option value="Katolik" <?= $peserta['AGAMA_PS'] == "Katolik" ? "selected" : "" ?>>Katolik
												</option>
												<option value="Konghucu" <?= $peserta['AGAMA_PS'] == "Konghucu" ? "selected" : "" ?>>Konghucu
												</option>
											</select>
										</div>
										<div class="offset-sm-3">
											<?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<!-- <div class="form-group row">
                    <label for="kotaasal" class="col-sm-3 col-form-label">Kota Asal</label>
                    <div class="input-group mb-1 col-sm-9">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                      </div>
                      <input type="text" class="form-control" id="kota" name="kotaasal" placeholder="Kota Asal" value="<?= $peserta['KOTA']; ?>" disabled>
                    </div>
                    <div class="offset-sm-3">
                      <?= form_error('kotaasal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                  </div> -->
									<div class="form-group row">
										<div class="offset-sm-3 col-sm-9">
											<button type="button" class="btn btn-default" id="btn-cancel" hidden><i class="fas fa-arrow-alt-circle-left"></i> Batal</button>
											<button type="submit" class="btn btn-primary" id="btn-save" hidden><i class="fas fa-save"></i>
												Simpan</button>
											<button type="button" class="btn btn-primary" id="btn-edit"><i class="fas fa-edit"></i>
												Edit</button>
										</div>
									</div>
									<?= form_close() ?>
								</div>

								<!-- Ubah Password -->
								<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
									<form class="form-horizontal" action="<?= base_url('peserta/profil/editpsw'); ?>" method="POST">
										<div class="form-group row">
											<label for="pswlma" class="col-sm-3 col-form-label">Password Sekarang</label>
											<div class="input-group mb-1 col-sm-9">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fas fa-lock"></i></span>
												</div>
												<input type="password" class="form-control" id="pswlma" name="pswlma" placeholder="Password Sekarang">
											</div>
											<div class="offset-sm-3">
												<?= form_error('pswlma', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="pswbru" class="col-sm-3 col-form-label">Password Baru</label>
											<div class="input-group mb-1 col-sm-9">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fas fa-lock"></i></span>
												</div>
												<input type="password" class="form-control" id="pswbru" name="pswbru" placeholder="Password Baru">
											</div>
											<div class="offset-sm-3">
												<?= form_error('pswbru', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<label for="pswbru1" class="col-sm-3 col-form-label">Ulangi Password Baru</label>
											<div class="input-group mb-1 col-sm-9">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fas fa-lock"></i></span>
												</div>
												<input type="password" class="form-control" id="pswbru1" name="pswbru1" placeholder="Ulangi Password Baru">
											</div>
											<div class="offset-sm-3">
												<?= form_error('pswbru1', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>
										<div class="form-group row">
											<div class="offset-sm-3 col-sm-9">
												<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->