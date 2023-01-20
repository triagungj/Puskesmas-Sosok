<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <i class='fas fa-hospital'></i>
                </div>
                <div class="sidebar-brand-text mx-3">PUSKESMAS SOSOK</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $page == 'dashboard' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <?php if ($this->session->jabatan != 'dokter') { ?>
                <li class="nav-item <?= $page == 'user' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('user') ?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>User</span></a>
                </li>
            <?php } ?>

            <?php if ($this->session->jabatan != 'kepala_puskesmas') { ?>
                <li class="nav-item <?= $page == 'dokter' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('dokter') ?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Dokter</span></a>
                </li>
            <?php } ?>

            <?php if ($this->session->jabatan == 'admin') { ?>
                <li class="nav-item <?= $page == 'poli' ? 'active' : ''; ?>">
                    <a class=" nav-link" href="<?php echo base_url('poli') ?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Poli</span></a>
                </li>
            <?php } ?>

            <?php if ($this->session->jabatan != 'kepala_puskesmas') { ?>
                <li class="nav-item <?= $page == 'dokter_poli' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('dokter_poli') ?>">
                        <i class=" fas fa-fw fa-chart-area"></i>
                        <span>Dokter Poli</span></a>
                </li>
            <?php } ?>

            <?php if ($this->session->jabatan != 'dokter') { ?>
                <li class="nav-item <?= $page == 'pasien' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('pasien') ?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Pasien</span></a>
                </li>
            <?php } ?>

            <?php if ($this->session->jabatan == 'admin') { ?>
                <li class="nav-item <?= $page == 'obat' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('obat') ?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Obat</span></a>
                </li>
            <?php } ?>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= $page == 'transaksi' ? 'active' : ''; ?>"">
                 <a class=" nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Transaksi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu Transaksi:</h6>
                        <a class="collapse-item" href="<?php echo base_url('pendaftaran') ?>">Pendaftaran</a>
                        <?php if ($this->session->jabatan != 'kepala_puskesmas') { ?>
                            <a class="collapse-item" href="<?php echo base_url('pemeriksaan') ?>">Pemeriksaan</a>
                            <a class="collapse-item" href="<?php echo base_url('tindakan') ?>">Tindakan</a>
                            <a class="collapse-item" href="<?php echo base_url('pembayaran') ?>">Pembayaran</a>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <?php if ($this->session->jabatan != 'dokter') { ?>
                <li class="nav-item <?= $page == 'laporan' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?php echo base_url('laporan') ?>">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Laporan</span></a>
                </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 pt-2 my-md-0 mw-100">
                        <h5><?= isset($title) ? ucfirst($title) : ucfirst($page); ?></h5>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-lg-inline d-none">
                                    <span class="text-dark large">
                                        <?= $this->session->nama_user ?? 'Admin'; ?>
                                    </span> -
                                    <span class="mr-2 text-gray-600 large">
                                        <?= str_replace("_", " ", ucwords($this->session->jabatan ?? 'Admin', "_")); ?>
                                    </span>
                                </div>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <?php if (isset($message_success)) { ?>
                    <div class="alert alert-success alert-dismissible fixed-top m-4 shadow">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Berhasil!</strong> <?= $message_success; ?>
                    </div>
                <?php } else if (isset($message_failure)) { ?>
                    <div class="alert alert-success alert-dismissible fixed-top m-4 shadow">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Gagal!</strong> <?= $message_failure; ?>
                    </div>
                <?php } ?>
                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="modalLogout" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLogout">Logout Akun?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Anda akan diarahkan ke halaman login setelah mengklik tombol Logout</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Topbar -->