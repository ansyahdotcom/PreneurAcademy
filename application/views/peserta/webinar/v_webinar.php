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
						<li class="breadcrumb-item"><a href="<?= base_url('peserta/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item active"><?= $tittle; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card card-solid">
			<div class="card-body pb-0">
				<div class="row d-flex align-items-stretch">
					<?php 
					$ID_WEBINAR = 0;
					foreach ($webinar as $wbnr) {
						$ID_WEBINAR = $wbnr->ID_WEBINAR; }
						if ($ID_WEBINAR != NULL) : 
							foreach ($webinar as $wbnr) :?>
					<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
						<div class="card bg-light">
							<div class="overflow-hidden position-relative">
								<img class="card-img-top"
									src="<?= base_url('assets/fotowebinar/'). $wbnr->FOTO_WEBINAR;?>" alt="">
							</div>
							<div class="position-relative card-body pt-3">
								<div class="row justify-content-center">
									<div class="row pt-2">
										<span class="col-md-12 text-justify">
											<a href="<?= base_url('peserta/webinar/daftar/' . strtolower($wbnr->JUDUL_WEBINAR)); ?>"
												class="lead text-bold text-dark"><?= str_replace('-', ' ', $wbnr->JUDUL_WEBINAR); ?></a>
										</span>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-5">
										<span class="btn btn-block btn-sm btn-success text-bold"
											title="Pendaftaran Gratis">
											<i class="fas fa-money-check"></i>
											<?= $wbnr->HARGA; ?>
										</span>
									</div>
									<div class="col-7">
										<button type="button" class="btn btn-block btn-sm btn-primary text-bold"
											title="Daftar" data-toggle="modal"
											data-target="#modal_daftar<?= $wbnr->ID_WEBINAR; ?>"
											style="color : white"><i class="fas fa-cart-plus text-bold"></i> Daftar
											Webinar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<?php else : ?>
					<div class="col-md">
						<div class="card-body text-center mt-4">
							<img src="<?= base_url('assets/icon/noClass.svg'); ?>" alt=""
								class="img-rounded img-responsive img-fluid" width="400">
						</div>
						<div class="card-body pt-0 mt-4">
							<h3 class="text-center text-bold text-muted">Event webinar belum ada...</h3>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<?= $this->pagination->create_links(); ?>
			</div>
			<!-- /.card-footer -->
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 
foreach ($webinar as $wbnr) : 
	$ID_WEBINAR = $wbnr->ID_WEBINAR;
?>
<div class="modal fade" id="modal_daftar<?= $ID_WEBINAR; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h2 id="myModalLabel" class="lead text-bold text-dark">
					<?= str_replace('-', ' ', $wbnr->JUDUL_WEBINAR); ?></h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<img class="card-img-top" src="<?= base_url('assets/fotowebinar/'). $wbnr->FOTO_WEBINAR;?>"
							alt="">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<p><?= htmlspecialchars_decode($wbnr->KONTEN_WEB); ?></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
				<a class="btn btn-primary text-bold beli" id="ID_WEBINAR"
					href="<?= base_url('peserta/webinar/daftar/' . strtolower($wbnr->JUDUL_WEBINAR)); ?>"
					title="Daftar">
					<i class="fas fa-cart-plus text-bold"></i> Daftar </a>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
