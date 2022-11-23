<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ST-POS | <?= $judul; ?></title>
    <link rel="icon" href="<?= base_url() ?>/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/fontawesome-free/css/all.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- end DataTables -->

    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/dist/css/adminlte.min.css?v=3.2.0">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- End SweetAlert2 -->
    <!-- SweetAlert2 -->
    <script src="<?= base_url('adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- End SweetAlert2 -->
    <script src="<?= base_url('adminlte'); ?>/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url('adminlte'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- end DataTables -->

    <script src="<?= base_url('adminlte'); ?>/dist/js/adminlte.min.js?v=3.2.0"></script>

    <!-- ChartJS -->
    <script src="<?= base_url('adminlte'); ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- end ChartJS -->

    <!-- AutoNumeric -->
    <script src="<?= base_url('autoNumeric'); ?>/src/AutoNumeric.js"></script>
    <!-- end AutoNumeric -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Home/Logout'); ?>">
                        <i class="fas fa-power-off"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-red elevation-4">

            <a href="#" class="brand-link">
                <img src="<?= base_url('adminlte'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Nama Toko</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('adminlte'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->get('nama_user'); ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <?php if (session()->get('level') == 'admin') { ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <li class="nav-item">
                                <a href="<?= base_url('admin'); ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('penjualan'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-cash-register"></i>
                                    <p>
                                        Penjualan
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('servis'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-cash-register"></i>
                                    <p>
                                        Servis
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item <?= $menu == 'masterdata' ? 'menu-open' : ''; ?>">
                                <a href="#" class="nav-link <?= $menu == 'masterdata' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>
                                        Master Data
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('produk'); ?>" class="nav-link <?= $submenu == 'produk' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Produk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('jasa'); ?>" class="nav-link <?= $submenu == 'jasa' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Jasa</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('kategori'); ?>" class="nav-link <?= $submenu == 'kategori' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kategori</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('satuan'); ?>" class="nav-link <?= $submenu == 'satuan' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Satuan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('supplier'); ?>" class="nav-link <?= $submenu == 'supplier' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Supplier</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('user'); ?>" class="nav-link <?= $submenu == 'user' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>User</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item <?= $menu == 'laporan' ? 'menu-open' : ''; ?>">
                                <a href="#" class="nav-link <?= $menu == 'laporan' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>
                                        Laporan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('laporan/LaporanHarian'); ?>" class="nav-link <?= $submenu == 'harian' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Laporan Harian</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('laporan/LaporanBulanan'); ?>" class="nav-link <?= $submenu == 'bulanan' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Laporan Bulanan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('laporan/LaporanTahunan'); ?>" class="nav-link <?= $submenu == 'tahunan' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Laporan Tahunan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/setting'); ?>" class="nav-link <?= $menu == 'setting' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        Setting
                                    </p>
                                </a>
                            </li>
                        </ul>
                    <?php } elseif (session()->get('level') == 'kasir') { ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="<?= base_url('admin'); ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('penjualan'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-cash-register"></i>
                                    <p>
                                        Penjualan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item <?= $menu == 'masterdata' ? 'menu-open' : ''; ?>">
                                <a href="#" class="nav-link <?= $menu == 'masterdata' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>
                                        Master Data
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('produk'); ?>" class="nav-link <?= $submenu == 'produk' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Produk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('kategori'); ?>" class="nav-link <?= $submenu == 'kategori' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kategori</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('satuan'); ?>" class="nav-link <?= $submenu == 'satuan' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Satuan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="<?= base_url('admin'); ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('servis'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-cash-register"></i>
                                    <p>
                                        Servis
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item <?= $menu == 'masterdata' ? 'menu-open' : ''; ?>">
                                <a href="#" class="nav-link <?= $menu == 'masterdata' ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>
                                        Master Data
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('jasa'); ?>" class="nav-link <?= $submenu == 'produk' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Jasa</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('kategori'); ?>" class="nav-link <?= $submenu == 'kategori' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kategori</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('satuan'); ?>" class="nav-link <?= $submenu == 'satuan' ? 'active' : ''; ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Satuan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $judul; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $judul; ?></a></li>
                                <li class="breadcrumb-item active"><?= $subjudul; ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <!-- Konten -->
                        <?php
                        if ($page) {
                            echo view($page);
                        }
                        ?>
                        <!-- end Konten -->

                    </div>

                </div>
            </div>
            <!-- end Content -->

        </div>


        <!-- <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> -->


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                HSSCode
            </div>

            <strong>Copyright &copy; 2022 <a href="#">SentralTEK POS</a>.</strong> All rights reserved.
        </footer>
    </div>

</body>

</html>