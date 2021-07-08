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
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Detail Pembelian</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form id="payment-form" method="POST" action="<?= site_url('peserta/transaksi/finish'); ?>">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<input type="hidden" name="result_type" id="result-type" value="">
										<input type="hidden" name="result_data" id="result-data" value="">
										<input type="hidden" id="idkls" name="idkls" value="<?= $kelas['ID_KLS']; ?>">
										<input type="hidden" id="idps" nmae="idps" value="<?= $peserta['ID_PS']; ?>">
										<div class="form-group">
											<label for="kelas">Item Pembelian</label>
											<input type="text" class="form-control" id="kelas" name="kelas"
												value="<?= $kelas['TITTLE']; ?>" disabled>
										</div>
										<div class="form-group">
											<label for="qty">Jumlah Pembelian</label>
											<input type="text" class="form-control" id="qty" name="qty" value="1"
												disabled>
										</div>
										<div class="form-group">
											<label for="hrg">Jumlah Donasi</label>
											<input onkeyup="checklength(this)" type="number" class="form-control"
												id="hrg" name="hrg"
												placeholder="Masukkan jumlah donasi yang ingin dibayarkan" minlength="5"
												required>
											<small class="text-danger text-bold" id="notif"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="nmps">Nama Lengkap</label>
											<input type="text" class="form-control" id="namaps" name="nmps"
												value="<?= $peserta['NM_PS']; ?>" disabled>
										</div>
										<div class="form-group">
											<label for="hp">No HP</label>
											<input type="text" class="form-control" id="hp" name="hp"
												value="<?= $peserta['HP_PS']; ?>" disabled>
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input type="text" class="form-control" id="email" name="email"
												value="<?= $peserta['EMAIL_PS']; ?>" disabled>
										</div>
									</div>
								</div>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1" required>
									<label class="form-check-label" for="exampleCheck1">Mencentang ini berarti anda
										menyetujui segala jenis ketentuan transaksi yang berlaku.</label>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<div class="float-right">
									<a href="<?= base_url('peserta/kelas'); ?>" class="btn btn-default"><i
											class="fas fa-arrow-circle-left"></i> Batal</a>
									<button type="submit" class="btn btn-primary" id="pay-button"><i
											class="fas fa-money-bill"></i> Bayar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- /.card -->
			</div>
			<!--/.col (right) -->
		</div>
		<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
