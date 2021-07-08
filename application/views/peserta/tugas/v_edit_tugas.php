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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center"><?=$tugas['NM_TG']?></h4>
                </div>
                <div class="card-body px-5">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <p class="text-justify">
                            <?=$tugas['DETAIL_TG']?>
                            </p>
                        </div>
                        <div class="col-lg-6 col-12">
                            <form action="<?=base_url()?>peserta/tugas/submittugas" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="ID_TG" value="<?=$tugas['ID_TG']?>">
                                <input type="hidden" name="ID_PS" value="<?=$peserta['ID_PS']?>">
                                <div class="form-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="file">
                                        <label class="custom-file-label" for="file">Unggah file</label>
                                    </div>
                                    <small class="form-text text-success">Unggah file materi. *maximal ukuran 5mb</small>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-info" type="submit">Submit Tugas</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>