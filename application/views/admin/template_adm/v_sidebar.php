    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    	<!-- Brand Logo -->
    	<a href="<?= base_url('admin/dashboard'); ?>" class="brand-link">
    		<img src="<?= base_url(); ?>assets/dist/img/PA02.jpg" alt="PA Logo"
    			class="brand-image img-circle elevation-3" style="opacity: .8">
    		<span class="brand-text font-weight-bold text-uppercase">
    			<h5>Preneur Academy</h5>
    		</span>
    	</a>

    	<!-- Sidebar -->
    	<div class="sidebar">
    		<!-- Sidebar user panel (optional) -->
    		<!-- Sidebar Menu -->
    		<nav class="mt-2">
    			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
    				data-accordion="false">
    				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
    				<!-- MENU -->

    				<!-- ini menu yang ga ada sub menunya -->
    				<!-- kalo ngopy codingan menunya dari sini -->
    				<li class="nav-item">
    					<a href="<?= base_url('admin/dashboard'); ?>" class="nav-link 
                            <?php if ($this->uri->segment(2) == "dashboard") {
                                echo "active";
                            } ?>">
    						<i class="nav-icon fas fa-tachometer-alt"></i>
    						<p>
    							Dashboard
    							<!-- <span class="right badge badge-danger">New</span> -->
    						</p>
    					</a>
    				</li>
    				<!-- akhir ngopy sampai sini -->

    				<!-- Ini menu yang ada submenunya -->
    				<!-- kalo ngopy codingan menunya dari sini -->
    				<li class="nav-item has-treeview">
    					<a href="#" class="nav-link 
                            <?php if ($this->uri->segment(2) == "profile") {
                                echo "active";
                            } ?>">
    						<i class="nav-icon fas fa-user"></i>
    						<p>
    							Profil
    							<i class="right fas fa-angle-left"></i>
    						</p>
    					</a>
    					<!-- ini submenunya -->
    					<ul class="nav nav-treeview">
    						<!-- kalo ngopy sub menu dari sini -->
    						<li class="nav-item">
    							<a href="<?= base_url('admin/profile'); ?>" class="nav-link 
                                    <?php if ($this->uri->segment(2) == "profile") {
                                        echo "active";
                                    } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Konfigurasi Profil</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Pemberitahuan</li>
					
                    <li class="nav-item">
                        <a href="<?= base_url('admin/notifikasi'); ?>" class="nav-link
                            <?php if ($this->uri->segment(2) == "notifikasi") {
                                echo "active";
                            } ?>">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>
                                Pemberitahuan
                                <span class="badge badge-danger right pemberitahuan"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('admin/transaksi'); ?>" class="nav-link
                            <?php if ($this->uri->segment(2) == "transaksi") {
                                echo "active";
                            } ?>">
                            <i class="nav-icon fas fa-receipt"></i>
                            <p>
                                Transaksi
                                <!-- <span class="badge badge-info right">2</span> -->
                            </p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="<?= base_url('admin/#'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-history"></i>
                            <p>
                                Histori
                            </p>
                        </a>
                    </li> -->

    				<li class="nav-header">Kelas</li>

    				<li class="nav-item has-treeview">
    					<a href="#" class="nav-link 
                            <?php if ($this->uri->segment(2) == "kelas"  || $this->uri->segment(2) == "listpeserta" || $this->uri->segment(2) == "materi") {
                                echo "active";
                            } ?>">
    						<i class="nav-icon fab fa-leanpub"></i>
    						<p>
    							Manajemen Kelas
    							<i class="right fas fa-angle-left"></i>
    						</p>
    					</a>
    					<ul class="nav nav-treeview">
    						<li class="nav-item">
    							<a href="<?= base_url('admin/kelas'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(2) == "kelas") {
                                    echo "active";
                                } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Data Kelas</p>
    							</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?= base_url('admin/#'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(2) == "") {
                                    echo "active";
                                } ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengumpulan Tugas</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Webinar</li>
                    
                    <li class="nav-item has-treeview">
    					<a href="#" class="nav-link 
                        <?php if ($this->uri->segment(2) == "webinar") {
                            echo "active";
                        } ?>">
    						<i class="nav-icon fas fa-users"></i>
    						<p>
    							Manajemen Webinar
    							<i class="right fas fa-angle-left"></i>
    						</p>
    					</a>
    					<ul class="nav nav-treeview">
    						<li class="nav-item">
    							<a href="<?= base_url('admin/webinar'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(2) == "webinar") {
                                    echo "active";
                                } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Webinar</p>
    							</a>
    						</li>
    					</ul>
    				</li>

    				<li class="nav-header">Website</li>

    				<li class="nav-item has-treeview">
    					<a href="#" class="nav-link 
                            <?php if ($this->uri->segment(2) == "blog" || $this->uri->segment(2) == "kategori" || $this->uri->segment(2) == "tags") {
                                echo "active";
                            } ?>">
    						<i class="nav-icon fas fa-blog"></i>
    						<p>
    							Manajemen Blog
    							<i class="right fas fa-angle-left"></i>
    						</p>
    					</a>
    					<ul class="nav nav-treeview">
    						<li class="nav-item">
    							<a href="<?= base_url('admin/blog'); ?>" class="nav-link 
                                    <?php if ($this->uri->segment(2) == "blog") {
                                        echo "active";
                                    } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Blog</p>
    							</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?= base_url('admin/kategori'); ?>" class="nav-link 
                                    <?php if ($this->uri->segment(2) == "kategori") {
                                        echo "active";
                                    } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Kategori</p>
    							</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?= base_url('admin/tags'); ?>" class="nav-link 
                                    <?php if ($this->uri->segment(2) == "tags") {
                                        echo "active";
                                    } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Tags</p>
    							</a>
    						</li>
    					</ul>
    				</li>

    				<li class="nav-item has-treeview">
    					<a href="#" class="nav-link 
                        <?php if (
                            $this->uri->segment(2) == "navigasi" || $this->uri->segment(2) == "website" || $this->uri->segment(2) == "medsos"
                            || $this->uri->segment(2) == "kebijakan" || $this->uri->segment(2) == "key"
                        ) {
                            echo "active";
                        } ?>">
    						<i class="nav-icon fas fa-th"></i>
    						<p>
    							Setting Website
    							<i class="right fas fa-angle-left"></i>
    						</p>
    					</a>
    					<ul class="nav nav-treeview">
    						<li class="nav-item">
    							<a href="<?= base_url('admin/navigasi'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(2) == "navigasi") {
                                    echo "active";
                                } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Navigasi</p>
    							</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?= base_url('admin/website'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(2) == "website") {
                                    echo "active";
                                } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Website</p>
    							</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?= base_url('admin/medsos'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(2) == "medsos") {
                                    echo "active";
                                } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Media Sosial</p>
    							</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?= base_url('admin/kebijakan'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(2) == "kebijakan") {
                                    echo "active";
                                } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Kebijakan</p>
    							</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?= base_url('admin/key'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(2) == "key") {
                                    echo "active";
                                } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Key API</p>
    							</a>
    						</li>
    					</ul>
    				</li>

    				<li class="nav-header">Master</li>

    				<li class="nav-item has-treeview">
    					<a href="#" class="nav-link 
                        <?php if ($this->uri->segment(2) == "peserta" || $this->uri->segment(2) == "ktgkelas") {
                            echo "active";
                        } ?>">
    						<i class="nav-icon fas fa-database"></i>
    						<p>
    							Data Master
    							<i class="right fas fa-angle-left"></i>
    						</p>
    					</a>
    					<ul class="nav nav-treeview">
    						<li class="nav-item">
    							<a href="<?= base_url('admin/peserta'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(2) == "peserta") {
                                    echo "active";
                                } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Data Peserta</p>
    							</a>
    						</li>
    						<li class="nav-item">
    							<a href="<?= base_url('admin/ktgkelas'); ?>" class="nav-link 
                                <?php if ($this->uri->segment(2) == "ktgkelas") {
                                    echo "active";
                                } ?>">
    								<i class="far fa-circle nav-icon"></i>
    								<p>Kategori Kelas</p>
    							</a>
    						</li>
    						<!-- <li class="nav-item">
                                <a href="<?= base_url('admin/diskon'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Diskon</p>
                                </a>
                            </li> -->
    					</ul>
    				</li>

    			</ul>

    			<ul class="nav nav-pills bg-danger nav-sidebar flex-column mt-4 mb-4" data-widget="treeview" role="menu"
    				data-accordion="false">
    				<li class="nav-item">
    					<a href="#" class="nav-link" data-toggle="modal" data-target="#modal-sm">
    						<i class="nav-icon fas fa-sign-out-alt"></i>
    						<p>
    							Logout
    						</p>
    					</a>
    				</li>
    			</ul>
    		</nav>
    		<!-- /.sidebar-menu -->
    	</div>
    	<!-- /.sidebar -->
    </aside>
