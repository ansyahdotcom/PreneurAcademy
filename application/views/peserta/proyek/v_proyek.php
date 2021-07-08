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
                    <h4 class="text-center">Tugas Proyek</h4>
                </div>
                <div class="card-body px-5">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <p class="text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magni molestias aperiam nulla ut provident necessitatibus iste maiores placeat sunt quasi eaque sint tempore soluta quia dolore, asperiores est culpa?
                            </p>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-right">Status pengumpulan :</td>
                                        <td><span class="badge badge-pill badge-primary">Belum mengumpulkan</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Waktu Pengumpulan :</td>
                                        <td>11-12-2020</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Deadline Tugas :</td>
                                        <td>20-01-2021</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">File Tugas :</td>
                                        <td><a href="#">Link tugas</a></td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="text-center">
                                <a class="btn btn-info" href="<?=base_url()?>peserta/tugas/submit" role="button">Submit Tugas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
