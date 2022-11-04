<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- End SweetAlert2 -->

    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/dist/css/adminlte.min.css?v=3.2.0">

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

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('adminlte') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('adminlte') ?>/dist/js/adminlte.min.js"></script>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url('admin') ?>" class="navbar-brand">
                    <span class="brand-text font-weight-light"><i class="fas fa-shopping-cart text-danger"></i><b> Transaksi Penjualan</b></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <?php if (session()->get('level') == 'admin') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin'); ?>">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Home/Logout'); ?>">
                                <i class="fas fa-power-off"></i> Logout
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Home/Logout'); ?>">
                                <i class="fas fa-power-off"></i> Logout
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
                        </div> -->
            <!-- /.col -->
            <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"></a></li>
                                <li class="breadcrumb-item"><a href="#"></a></li>
                            </ol>
                        </div> -->
            <!-- /.col -->
            <!-- </div> -->
            <!-- /.row -->
            <!-- </div> -->
            <!-- /.container-fluid -->
            <!-- </div> -->
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0"></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="">No Faktur</label>
                                            <label class="form-control form-control-lg"><?= $no_faktur; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="">Tanggal</label>
                                            <label class="form-control form-control-lg"><?= date('d M Y'); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="">Jam</label>
                                            <label class="form-control form-control-lg"><?= date('13:00:00'); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="">Kasir</label>
                                            <label class="form-control form-control-lg"><?= session()->get('nama_user'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-7 -->
                    <div class="col-lg-5">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0"></h5>
                            </div>
                            <div class="card-body bg-dark color-palette">
                                <div class="form-group">
                                    <h1 class="text-bold text-right display-4 text-green">Rp4,500,000,-</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-7 -->
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo form_open() ?>
                                        <div class="row">
                                            <div class="col-2 input-group">
                                                <input id="kode_produk" autocomplete="off" name="kode_produk" placeholder="Kode Produk" class="form-control">
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary "><i class="fas fa-search"></i></button>
                                                    <button class="btn btn-danger "><i class="fas fa-times"></i></button>
                                                </span>
                                            </div>
                                            <div class="col-3">
                                                <input readonly type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
                                            </div>
                                            <div class="col-1">
                                                <input readonly type="text" class="form-control" name="nama_kategori" placeholder="Kategori">
                                            </div>
                                            <div class="col-1">
                                                <input readonly type="text" class="form-control" name="nama_satuan" placeholder="Satuan">
                                            </div>
                                            <div class="col-1">
                                                <input readonly type="text" class="form-control" name="harga_jual" placeholder="Harga">
                                            </div>
                                            <div class="col-1">
                                                <input id="qty" type="number" value="1" min="1" class="form-control text-center" name="qty" placeholder="QTY">
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" class="btn  btn-primary"><i class="fas fa-cart-plus"></i> Tambah</button>
                                                <button type="reset" class="btn  btn-warning"><i class="fas fa-sync"></i> Bersihkan</button>
                                                <button class="btn  btn-success"><i class="fas fa-cash-register"></i> Bayar</button>
                                            </div>
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Kode Produk</th>
                                                    <th>Nama Produk</th>
                                                    <th>Kategori</th>
                                                    <th>Harga</th>
                                                    <th width="125px">Qty</th>
                                                    <th>Total</th>
                                                    <th width="50px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>11111111</td>
                                                    <td>Asus</td>
                                                    <td>Laptop</td>
                                                    <td class="text-right">@ 1,500,000</td>
                                                    <td class="text-center">3 Unit</td>
                                                    <td class="text-right">4,500,000</td>
                                                    <td class="text-center">
                                                        <a href="" class="btn btn-danger btn-xs"><i class="fas fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">

                            </div>
                            <div class="card-body text-center text-waring bg-dark">
                                <h1 for="">Empat Juta Lima Ratus Ribu Rupiah</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                HSSCode
            </div>

            <strong>Copyright &copy; 2022 <a href="#">SentralTEK POS</a>.</strong> All rights reserved.
        </footer>
    </div>
    </div>
    <!-- ./wrapper -->

    <script>
        $(document).ready(function() {
            $('#kode_produk').focus();
            $('#kode_produk').keydown(function(e) {
                let kode_produk = $('#kode_produk').val();
                if (e.keyCode == 13) {
                    e.preventDefault();
                    if (kode_produk == '') {
                        Swal.fire('Kode produk harus diisi!');
                    } else {
                        CekProduk();
                    }
                }
            })
        });

        function CekProduk() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Penjualan/CekProduk') ?>",
                data: {
                    kode_produk: $('#kode_produk').val(),
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.nama_produk == '') {
                        Swal.fire('Kode produk tidak terdaftar!');
                    } else {
                        $('[name="nama_produk"]').val(response.nama_produk);
                        $('[name="nama_kategori"]').val(response.nama_kategori);
                        $('[name="nama_satuan"]').val(response.nama_satuan);
                        $('[name="harga_jual"]').val(response.harga_jual);
                        $('#qty').focus();
                    }
                }
            });
        }
    </script>

</body>

</html>