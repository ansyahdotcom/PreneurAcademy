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
		</div><!-- /.container-fluid -->
	</section>

    <section class="content">
		<div class="container-fluid">
			<div class="card card-primary card-outline">
				<!-- <div class="card-header">
					<h3 class="card-title">
						<i class="fab fa-leanpub"></i>
						List Materi
					</h3>
				</div> -->
				<div class="card-body">
					<!-- <h4 class="mt-4">Materi Kelas</h4> -->
					<div class="row">
						<div class="col-7 col-sm-12">
							<div class="tab-content card p-3" id="vert-tabs-right-tabContent">
								<div class="tab-pane fade show active p-3 mb-2 mt-2 bg-info" id="vert-tabs-right"
									role="tabpanel" aria-labelledby="vert-tabs-right-tab">
									<div class="detail mb-4">
                                    djsfksdfhkjhsdf
									</div>
									<div class="file mt-1 d-flex">
										<a href="#" class="btn btn-warning mr-1 ml-1"><i class="fas fa-file-pdf"></i>
											dsfsfdsfds</a>
                                            <div class="card-tools ml-auto">
                                                <button type="button" class="btn btn-warning">
                                                <i class="fas fa-edit"></i> Detail</button>
                                            </div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-5 col-sm-3">
							<div class="nav flex-column bg-outlines-primary nav-tabs nav-tabs-right h-100" id="vert-tabs-right-tab"
								role="tablist" aria-orientation="vertical">
								<?php foreach ($cek as $c) : ?>
								<a class="nav-link" id="vert-tabs-right-<?= $c['NM_MT']?>-tab" data-toggle="pill"
									href="#vert-tabs-right-<?= $c['NM_MT']?>" role="tab" aria-controls="vert-tabs-right-<?= $c['NM_MT']?>"
									aria-selected="true"><?= $c['NM_MT']?></a>
								<?php endforeach; ?>
							</div>
						</div>
					</div> -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</section>
</div>