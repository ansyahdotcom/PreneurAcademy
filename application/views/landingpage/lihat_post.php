</div>
<main class="mt-5">
    <div class="container py-5">
        <section class="mt-4">
            <?php foreach ($blog as $blg) { ?>
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card mb-2">
                        <img src="<?= base_url('assets/fotoblog/' . $blg->FOTO_POST); ?>" class="img-fluid rounded"
                            alt="foto-post">
                    </div>
                    <div class="card mb-4 border-light shadow">
                        <div class="card-body">
                            <div class="awal">
                                <h2 class="m-3 font-weight-bold"><?= str_replace('-', ' ', $blg->JUDUL_POST); ?></h2>
                                <div class="ket m-3">
                                    <i class="fas fa-clock text-primary"></i>&nbsp<?= tanggal_indo($blg->TGL_POST, false); ?> &nbsp;
                                    <i class="fa fa-folder text-info"></i>
                                        <a class="" href="<?= base_url('blog/kategori/' . strtolower($blg->NM_CT)); ?>"><?= $blg->NM_CT; ?></a>
                                    <i class="fas fa-tag text-success ml-2"></i>
                                    <?php $i = 1;
                                    foreach ($detail_tags as $dt) { ?>
                                    <a class=""
                                        href="<?= base_url('blog/tag/' . strtolower($dt->NM_TAGS)); ?>"><?= $dt->NM_TAGS; ?><?= $i == count((array) $detail_tags) ? '' : ', ' ?></a>
                                    <?php $i++;
                                    } ?>
                                    <i class="fas fa-comments text-primary ml-2"></i> <a
                                    href="<?= base_url('blog/detail/' . strtolower($blg->JUDUL_POST.'#disqus_thread')); ?>"></a>
                                </div>
                            </div>
                            <p class="h5 my-4"><?= htmlspecialchars_decode($blg->KONTEN_POST) ?></p>
                            <hr>
                            <div class="text-right mb-1"><i class="fas fa-flipboard"></i>
                                <!-- <br> -->
                                <i class="fa fa-folder text-info"></i>
                                <a class=""
                                    href="<?= base_url('blog/kategori/' . strtolower($blg->NM_CT)); ?>"><?= $blg->NM_CT; ?></a>
                                <i class="fas fa-tag ml-2 text-success"></i>
                                <?php
                  $i = 1;
                  foreach ($detail_tags as $dt) { ?>
                                <a class=""
                                    href="<?= base_url('blog/tag/' . strtolower($dt->NM_TAGS)); ?>"><?= $dt->NM_TAGS; ?><?= $i == count((array) $detail_tags) ? '' : ', ' ?></a>
                                <?php $i++;
                  } ?>
                            </div>
                            <div>
                            <p class="font-weight-bold">Bagikan postingan</p>
                            <!-- ShareThis BEGIN -->
                            <div class="sharethis-inline-share-buttons"></div>
                            <!-- ShareThis END -->
                            </div>
        

                        </div>

                    </div>
                    <div class="card mb-4 shadow">

                        <div class="card-header font-weight-bold">
                            <span>Ikuti kami</span>
                            <span class="pull-right">
                                <?php foreach ($footer as $f) :
                    $icon = $f['IC_MS'];
                    $link = $f['LINK_MS'];
                  ?>
                                <a style="text-decoration : none;" href="<?= $link; ?>" target="_blank">
                                    <i class="<?= $icon; ?> mr-2"></i>
                                </a>
                                <?php endforeach; ?>
                            </span>
                        </div>
                    </div>
                    <div class="card mb-3 p-2 shadow">
                        <div id="disqus_thread"></div>
                        <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://preneur-academy.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a
                                href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card mb-4 border-light shadow">

                        <div class="card-header"><i class="fas fa-fire-alt text-danger"></i> Artikel Terbaru</div>

                        <div class="card-body">
                            <?php foreach ($list as $ls) { ?>
                            <ul class="list-unstyled">
                                <li class="media">
                                    <img class="d-flex mr-3" src="<?= base_url('assets/fotoblog/' . $ls->FOTO_POST); ?>"
                                        alt="post-blog" width="100">
                                    <div class="media-body">
                                        <a style="text-decoration : none;" href="<?= base_url('blog/detail/' . strtolower($ls->JUDUL_POST)); ?>">
                                            <h5 class="mt-0 mb-1 font-weight-bold">
                                                <?= str_replace('-', ' ', $ls->JUDUL_POST); ?></h5>
                                        </a>
                                        <p class="card-text">
                                            <?php
                          $aa = 100;
                          $konten = htmlspecialchars_decode($ls->KONTEN_POST);
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
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <?php } ?>

                        </div>

                    </div>
                    <div class="card mb-4 border-light shadow">

                        <div class="card-header font-weight-bold"><i class="fas fa-newspaper text-info"></i>
                            Berlangganan newsletter?</div>
                        <div class="card-body">
                            <?php foreach($blog as $blg){ 
                                $judul= $blg->JUDUL_POST;
                            ?>
                            <form method="POST" action="<?= base_url('subscribe');?>">
                            <div><?php echo $this->session->flashdata('message'); ?></div>
                                <input type="hidden" name="url" value="<?= base_url('blog/detail/'. strtolower($judul)); ?>"required>
                                <label for="email" class="grey-text">Email Anda</label>
                                <input type="email" name="email" placeholder="Your Email" id="email" class="form-control">
                                <div class="text-center mt-4">
                                    <button class="btn btn-info btn-md" type="submit"><i class="fas fa-paper-plane"></i>
                                        Daftar</button>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </section>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#FFC107" fill-opacity="1"
            d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
</main>