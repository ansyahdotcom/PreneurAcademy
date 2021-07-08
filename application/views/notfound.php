<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?=$title?></title>
        <!--  Bootstrap css file  -->
        <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/bootstrap.min.css">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-32x32.png"
            sizes="32x32" />
        <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-16x16.png"
            sizes="16x16" />
        
        <!--  font awesome icons  -->
	    <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/all.min.css">

    </head>  
<body class="container-fluid">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <img src="<?= base_url('assets/dist/img/not_found.svg'); ?>" alt="" class="img-rounded img-responsive img-fluid" width="400">
            <div class="error-template">
                <h1>404</h1>
                <h2><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Halaman tidak ditemukan.</h2>
                <div class="error-details">
                    Halaman yang anda tuju tidak tersedia. Silahkan klik tombol dibawah untuk kembali
                </div>
                <div class="error-actions mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <?php if ($this->session->userdata('role') == null ) {?>
                                <a href="<?=base_url();?>" class="btn btn-outline-primary"><i class="fas fa-home"></i> kembali ke Home</a>
                            <?php } elseif($this->session->userdata('role') == 1) {?>
                                <a href="<?=base_url('admin/dashboard');?>" class="btn btn-outline-primary"><i class="fas fa-tachometer-alt"></i> kembali ke dashboard</a> atau 
                                <a href="<?=base_url();?>" class="btn btn-outline-primary"><i class="fas fa-home"></i> kembali ke Home</a>
                                <?php } else{?>
                                <a href="<?=base_url('peserta/dashboard');?>" class="btn btn-outline-primary"><i class="fas fa-tachometer-alt"></i></i> kembali ke dashboard</a> atau 
                                <a href="<?=base_url();?>" class="btn btn-outline-primary"><i class="fas fa-home"></i> kembali ke Home</a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>