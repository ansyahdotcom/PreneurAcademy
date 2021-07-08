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
						<li class="breadcrumb-item"><a href="<?= base_url('peserta/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('peserta/myclass'); ?>">Kelas Saya</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="card">
			<!-- <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                <i class="fas fa-plus-circle"></i>Sertifikat</button>
            </div>
            </div> -->
			<div class="card-body">
				<?php if ($cek == null) : ?>
					<!-- Jika Belum Terdapat data -->
					<div class="col-md">
						<div class="card-body text-center mt-4">
							<img src="<?= base_url('assets/icon/noList.svg'); ?>" alt="noData" class="img-rounded img-responsive img-fluid" width="100">
						</div>
						<div class="card-body pt-0 mt-4">
							<h3 class="text-center text-bold text-muted">Belum terdapat modul</h3>
						</div>
					</div>
				<?php else : ?>
					<?php foreach ($cek as $mtr) :
						$id = $mtr['ID_MT'];
						$nama = $mtr['NM_MT'];
					?>
						<div class="card">
							<div class="card-header bg-dark">
								<h3 class="card-title pt-2"><?= $nama; ?></h3>
							</div>
							<div class="card-body">
								<?php
								$id = $mtr['ID_MT'];
								$query = $this->db->query("SELECT * FROM materi_sub, materi WHERE materi.ID_MT = materi_sub.ID_MT AND materi.ID_MT ='$id'");
								$sub = $query->result_array();
								foreach ($sub as $i) :
									$id_sub = $i['ID_SUB'];
									$nm_sub = $i['NM_SUB'];
								?>
									<div class="row">
										<div class="card col-sm-12 bg-navy mt-2">
											<div class="card-header">
												<h1 class="card-title mt-2"><i class="<?= $i['ICON_SUB']; ?> fa-lg mr-2"></i> <?= str_replace('_', ' ', htmlspecialchars_decode($i['FILE_SUB'])); ?></h1>
												<div class="card-tools pb-2">
													<?php if ($i['ICON_SUB'] != "fas fa-link") { ?>
														<a class="btn btn-success" href="<?= base_url('assets/dist/materi/' . $i['FILE_SUB']); ?>" target="_blank">
															<i class="fas fa-download"></i>
														</a>
													<?php } ?>
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
									$detail = $this->db->get_where('detil_tugas', ['ID_TG' => $id_tg])->row_array();
								?>
									<div class="row">
										<div class="card bg-blue col-sm-12 mt-2">
											<div class="status mt-2">
												<?php if ($detail != null) { ?>
													<?php if($detail['STATUS'] == 'Sudah Mengumpulkan'){?>
													<h5 class="card-title badge badge-success m-2">Sudah mengerjakan</h5>
													<?php }else{?>
													<h5 class="card-title badge badge-danger m-2">Sudah mengerjakan</h5>
													<?php }?>
													<h5 class="card-title badge badge-warning m-2 text-bold"><i class="fas fa-stopwatch"></i> Dikumpulkan: <?= date('d M Y H:i', strtotime($detail['TIME_DT_TG'])); ?></h5>
												<?php } else { ?>
													<h5 class="card-title badge badge-secondary m-2">Belum mengerjakan</h5>
													<h5 class="card-title badge badge-danger m-2 text-bold"><i class="fas fa-stopwatch"></i> Batas Pengumpulan: <?= date('d M Y H:i', strtotime($i['DEADLINE'])); ?></h5>
												<?php } ?>
											</div>
											<div class="card-header">
												<h1 class="card-title mt-2"><i class="<?= $i['ICON_TG'] ?> fa-lg mr-2"></i> <?= $i['NM_TG']; ?></h1>
												<div class="card-tools pb-2">
													<a class="btn btn-success" href="<?= base_url('assets/dist/tugas/' . $i['FILE_TG']); ?>" target="_blank">
														<i class="fas fa-download"></i>
													</a>
													<a href="<?= base_url() ?>peserta/tugas/detail/<?= $id_tg ?>" class="btn btn-warning">
														<i class="fas fa-eye"></i> Detail
													</a>
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
			<div class="card-footer">
				<div class="float-right">
					<a href="<?= base_url('peserta/myclass'); ?>" class="btn btn-default text-bold"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</section>
</div>