<!-- Page Content -->
<div class="m-5 rounded">
    <div class="content shadow pt-5 pl-5 pr-5">
        <?php foreach ($terms as $k) : ?>
        <div class="row">
            <div class="top float-left">
                <a href="<?= base_url(); ?>" style="text-underline:none;"><i class="fas fa-home text-primary"></i>
                    home</a><span class="ml-auto"> / <?= $k->LINK_KB ?></span>
            </div>
            <div class="col-md-12 mb-5">
                <div class="card border-light justify-content-center">
                    <div class="text-center">
                        <img class="card-img" src="<?= base_url('assets/dist/img/kebijakan/') . $k->IMG_KB; ?>"
                            style="width: 200px;" alt="gambar-kebijakan">
                    </div>
                    <div class="card-header text-center">
                        <h4 class="card-title"><?= $k->NM_KB ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="deskripsi">
                            <p><?= htmlspecialchars_decode($k->ISI_KB) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#FFC107" fill-opacity="1" d="M0,128L480,128L960,128L1440,128L1440,0L960,0L480,0L0,0Z"></path>
    </svg>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#FFC107" fill-opacity="1"
        d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path>
</svg>