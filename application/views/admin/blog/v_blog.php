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
				<a class="btn btn-primary" href="<?= base_url('admin/blog/tulis_artikel'); ?>"><i
						class="fas fa-plus-circle"></i> Artikel</a>
			</div>
		</div>
		<?php foreach ($blog as $blg) {
			$ID_POST = $blg->ID_POST;
			$ID_CT = $blg->ID_CT;
		?>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="user-block">
							<span class="username m-0 text-lg">
								<a class=""
									href="<?= base_url('admin/blog/edit_artikel/' . $blg->JUDUL_POST . '/'); ?>"><?= str_replace('-', ' ', $blg->JUDUL_POST); ?></a>
							</span>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12 mb-2">
								<i class="fa fa-folder text-info"></i>
								<a class="text-dark" href="#"><?= $blg->NM_CT; ?>&nbsp;&nbsp;</a>
								<i class="fas fa-tag text-success ml-2"></i>
								<?php
									$detail_tags = $this->db->query("SELECT detail_tags.ID_TAGS, tags.NM_TAGS 
															FROM detail_tags, tags, post
															WHERE detail_tags.ID_TAGS = tags.ID_TAGS
															AND detail_tags.ID_POST = post.ID_POST
															AND post.ID_POST = '$ID_POST'");
									$i = 1;
									foreach ($detail_tags->result() as $dt) { ?>
								<a class="text-dark"
									href="#"><?= $dt->NM_TAGS; ?><?= $i == count((array) $detail_tags->result()) ? '' : ', ' ?></a>
								<?php $i++;
									} ?>
							</div>
							<div class="col-sm-3">
								<img class="card-img-top" alt="tidak ada foto.."
									src="<?= base_url('assets/fotoblog/' . $blg->FOTO_POST); ?>">

							</div>
							<div class="col-sm-8">
								<?php
									$aa = 500;
									$konten = htmlspecialchars_decode($blg->KONTEN_POST);
									$em = str_replace('<em>', '', $konten);
									$strong = str_replace('<strong>', '', $em);
									$count = strlen($strong);
									if ($count > $aa) {
										$char = $strong[$aa - 1];
										while ($char != ' ') {
											$char = $strong[--$aa];
										}
										echo substr($strong, 0, $aa) . ' ...';
									} else {
										echo $strong;
									}
									?>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<p>
							<!-- Nyari status post trus ditampilkan sesuai status post -->
							<?php
								if ($blg->ST_POST == 0) {
									echo '<label for="">Draf</label>';
								} else {
									echo '<label for="">Dipublikasikan</label>';
								}
								?>

							<label for="TGL_POST"
								class="text-sm mr-2"><?= ' | ' . tanggal_indo($blg->TGL_POST); ?></label>
							<span class="float-right">
								<!-- Nyari status post trus mau diposting apa nggak -->
								<?php
									if ($blg->ST_POST == 0) {
										echo '<button type="button" id="detail" class="btn btn-warning btn-sm btn-round" style="color: white"
									data-toggle="modal" data-target="#modal_posting' . $blg->ID_POST . '">
									<i class="fas fa-arrow-circle-right"></i> Publikasikan</button>';
									} else {
										echo '<button type="button" id="detail" class="btn btn-success btn-sm btn-round" style="color: white"
									data-toggle="modal" data-target="#modal_posting' . $blg->ID_POST . '">
									<i class="fas fa-arrow-circle-left"></i> Kembalikan ke draf</button>';
									}
									?>
								<!-- dilihat tampilan blognya sebelum diposting -->
								<a class="btn btn-secondary btn-sm btn-round"
									href="<?= base_url('admin/blog/pratinjau/' . strtolower($blg->JUDUL_POST)); ?>"><i
										class="fas fa-eye"></i> Pratinjau</a>

								<!-- edit artikel -->
								<a href="<?= base_url('admin/blog/edit_artikel/' . strtolower($blg->JUDUL_POST)); ?>">
									<button type="button" class="btn btn-primary btn-circle btn-sm">
										<i class="fas fa-edit" style="color: white"></i> Edit
									</button>
								</a>
								<!-- hapus artikel -->
								<button type="button" id="detail" class="btn btn-danger btn-circle btn-sm"
									data-toggle="modal" data-target="#modal_hapus<?= $blg->ID_POST; ?>"
									style="color : white"><i class="fas fa-trash"></i> Hapus</button>
							</span>
						</p>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal posting -->
<?php
foreach ($blog as $blg) {
	$ID_POST = $blg->ID_POST;
	$ST_POST = $blg->ST_POST;
?>
<div class="modal fade" id="modal_posting<?= $ID_POST; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php
				if ($ST_POST == 0) {
					echo '<div class="modal-header">
						<h3 class="modal-title" id="myModalLabel">Publikasikan Artikel</h3>
					</div>
					<form action="' . base_url('admin/blog/pr_posting') . '" method="post" class="form-horizontal">
						<div class="modal-body">
							<p>Apakah Anda yakin ingin mempublikasikan artikel ini?</p>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="ST_POST" value="' . $ST_POST . '">
							<input type="hidden" name="ID_POST" value="' . $ID_POST . '">
							<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
							<button class="btn btn-primary">Ya</button>
						</div>
					</form>';
				} else {
					echo '<div class="modal-header">
						<h3 class="modal-title" id="myModalLabel">Kembalikan ke Draf</h3>
					</div>
					<form action="' . base_url('admin/blog/pr_posting') . '" method="post" class="form-horizontal">
						<div class="modal-body">
							<p>Apakah Anda ingin mengembalikan artikel ke draf?</p>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="ST_POST" value="' . $ST_POST . '">
							<input type="hidden" name="ID_POST" value="' . $ID_POST . '">
							<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
							<button class="btn btn-primary">Ya</button>
						</div>
					</form>';
				}
				?>
		</div>
	</div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modal_hapus<?= $ID_POST; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
			</div>
			<form action="<?= base_url('admin/blog/hapus_artikel'); ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda yakin ingin menghapus data ini?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ID_POST" value="<?= $ID_POST; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
