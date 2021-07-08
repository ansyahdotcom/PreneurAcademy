    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= base_url('peserta/dashboard'); ?>" class="brand-link">
            <img src="<?= base_url(); ?>assets/dist/img/PA02.jpg" alt="PA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-400 text-uppercase">
                Preneur Academy
            </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <!-- MENU -->

                    <!-- ini menu yang ga ada sub menunya -->
                    <!-- kalo ngopy codingan menunya dari sini -->
                    <li class="nav-item">
                        <a href="<?= base_url('peserta/dashboard'); ?>" class="nav-link <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>">
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
                        <a href="#" class="nav-link <?php if($this->uri->segment(2)=="profil"){echo "active";}?>">
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
                                <a href="<?= base_url('peserta/profil'); ?>" class="nav-link <?php if($this->uri->segment(2)=="profil"){echo "active";}?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Konfigurasi Profil</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Pemberitahuan</li>
                    <li class="nav-item">
                        <a href="<?= base_url('peserta/notifikasi'); ?>" class="nav-link <?php if($this->uri->segment(2)=="notifikasi"){echo "active";}?>">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>
                                Pemberitahuan
                                <span class="badge badge-danger right pemberitahuan"></span>
                            </p>
                        </a>
                    </li> 

                    <li class="nav-header">Transaksi</li>
                    <li class="nav-item">
                        <a href="<?= base_url('peserta/transaksi'); ?>" class="nav-link <?php if($this->uri->segment(2)=="transaksi" && $this->uri->segment(3)== null|| $this->uri->segment(2)=="transaksi" && $this->uri->segment(3)=="dettrn"){echo "active";}?>">
                            <i class="nav-icon fas fa-history"></i>
                            <p>
                                Histori Transaksi
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Kelas</li>
                    <li class="nav-item">
                        <a href="<?= base_url('peserta/kelas'); ?>" class="nav-link <?php if($this->uri->segment(2)=="kelas" || $this->uri->segment(2)=="transaksi" && $this->uri->segment(3)=="beli"){echo "active";}?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Daftar Kelas Belajar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('peserta/myclass'); ?>" class="nav-link <?php if($this->uri->segment(2)=="myclass" || $this->uri->segment(2)=="mymateri"){echo "active";}?>">
                            <i class="nav-icon fab fa-leanpub"></i>
                            <p>
                                Kelas Saya
                                <!-- <span class="badge badge-info right">2</span> -->
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Webinar</li>

                    <li class="nav-item">
                        <a href="<?= base_url('peserta/webinar'); ?>" class="nav-link <?php if($this->uri->segment(2)=="webinar" && $this->uri->segment(3)== null){echo "active";}?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Daftar Event Webinar
                            </p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?= base_url('peserta/webinar/mywebinar'); ?>" class="nav-link <?php if($this->uri->segment(3)=="mywebinar"){echo "active";}?>">
                            <i class="nav-icon fab fa-leanpub"></i>
                            <p>
                                Webinar Saya
                                <!-- <span class="badge badge-info right">2</span> -->
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Bantuan</li>

                    <li class="nav-item">
                        <a href="<?= base_url('peserta/faq'); ?>" class="nav-link <?php if($this->uri->segment(2)=="faq"){echo "active";}?>">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>
                                FAQ
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('peserta/ketentuan'); ?>" class="nav-link <?php if($this->uri->segment(2)=="ketentuan"){echo "active";}?>">
                            <i class="nav-icon fas fa-gavel"></i>

                            <p>
                                Ketentuan
                            </p>
                        </a>
                    </li>

                </ul>

                <ul class="nav nav-pills bg-danger nav-sidebar flex-column mt-4 mb-4" data-widget="treeview" role="menu" data-accordion="false">
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
