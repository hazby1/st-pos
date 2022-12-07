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

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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

    <!-- Terbilang -->
    <script src="<?= base_url('terbilang'); ?>/terbilang.js"></script>
    <!-- end Terbilang -->

    <script src="<?= base_url('adminlte'); ?>/dist/js/adminlte.min.js?v=3.2.0"></script>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('adminlte') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('adminlte'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('adminlte') ?>/dist/js/adminlte.min.js"></script>


</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url('admin') ?>" class="navbar-brand">
                    <span class="brand-text font-weight-light"><i class="fas fa-shopping-cart text-danger"></i><b> Transaksi Penjualan <?= $subjudul; ?></b></span>
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
                            <a class="nav-link <?= $subjudul == 'Reseller A' ? 'active' : '' ?>" href="<?= base_url('Penjualan/ResellerA'); ?>">
                                <i class="fas fa-power-off"></i> Reseller A
                            </a>
                        </li>
                        <li class="nav-item <?= $subjudul == 'Reseller B' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('Penjualan/ResellerB'); ?>">
                                <i class="fas fa-power-off"></i> Reseller B
                            </a>
                        </li>
                        <li class="nav-item <?= $subjudul == 'user' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('Penjualan'); ?>">
                                <i class="fas fa-power-off"></i> User
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Home/Logout'); ?>">
                                <i class="fas fa-power-off"></i> Logout
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item <?= $subjudul == 'Reseller A' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('Penjualan/ResellerA'); ?>">
                                <i class="fas fa-power-off"></i> Reseller A
                            </a>
                        </li>
                        <li class="nav-item <?= $subjudul == 'Reseller B' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('Penjualan/ResellerB'); ?>">
                                <i class="fas fa-power-off"></i> Reseller B
                            </a>
                        </li>
                        <li class="nav-item <?= $subjudul == 'user' ? 'active' : '' ?>">
                            <a class="nav-link" href="<?= base_url('Penjualan'); ?>">
                                <i class="fas fa-power-off"></i> User
                            </a>
                        </li>
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
                                            <label id="jam" class="form-control form-control-lg"></label>
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
                                    <h1 class="text-bold text-right display-4 text-green">Rp<?= number_format($grand_total, 0); ?>.-</h1>
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
                                        <?php echo form_open('penjualan/insertcartA') ?>
                                        <div class="row">
                                            <div class="col-2 input-group">
                                                <input autofocus id="kode_produk" autocomplete="off" name="kode_produk" placeholder="Kode Produk" class="form-control">
                                                <span class="input-group-append">
                                                    <a data-toggle="modal" data-target="#cari-produk" class="btn btn-primary "><i class="fas fa-search"></i></a>
                                                    <button type="reset" class="btn btn-danger "><i class="fas fa-times"></i></button>
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
                                                <input readonly type="text" class="form-control" name="harga_jual_a" placeholder="Harga">
                                                <input readonly type="hidden" name="harga_beli">
                                            </div>
                                            <div class="col-1">
                                                <input id="qty" type="number" value="1" min="1" class="form-control text-center" name="qty" placeholder="QTY">
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" class="btn  btn-primary"><i class="fas fa-cart-plus"></i> Tambah</button>
                                                <a href="<?= base_url('penjualan/ResetCartA'); ?>" class="btn  btn-warning"><i class="fas fa-sync"></i> Bersihkan</a>
                                                <a data-target="#pembayaran" data-toggle="modal" class="btn  btn-success" onclick="Pembayaran()"><i class="fas fa-cash-register"></i> Bayar</a>
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
                                                <?php foreach ($cart as $key => $nilai) { ?>
                                                    <tr>
                                                        <td><?= $nilai['id']; ?></td>
                                                        <td><?= $nilai['name']; ?></td>
                                                        <td><?= $nilai['option']['nama_kategori']; ?></td>
                                                        <td class="text-right">Rp<?= number_format($nilai['price'], 0); ?>.-</td>
                                                        <td class="text-center"><?= $nilai['qty']; ?> <?= $nilai['option']['nama_satuan']; ?></td>
                                                        <td class="text-right">Rp<?= number_format($nilai['subtotal'], 0); ?>.-</td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('Penjualan/RemoveItemCartA/' . $nilai['rowid']); ?>" class="btn btn-danger btn-xs"><i class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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
                                <h1 id="terbilang"></h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <!-- Alert -->
                        <?php
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check"></i>';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                        ?>
                        <!-- end Alert -->
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal Cari Produk -->
        <div class="modal fade" id="cari-produk">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Daftar Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="example1" class="table table-striped table-bordered table-hover text-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th width="120px">Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th width="100px">Harga</th>
                                    <th width="100px">Stok</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($produk as $key  => $nilai) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $nilai['kode_produk']; ?></td>
                                        <td><?= $nilai['nama_produk']; ?></td>
                                        <td class="text-right">Rp<?= number_format($nilai['harga_jual_a']); ?>.-</td>
                                        <td><?= $nilai['stok']; ?></td>
                                        <td class="text-center">
                                            <button onclick="PilihProduk(<?= $nilai['kode_produk']; ?>)" href="" class="btn btn-success btn-xs">Pilih</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Bayar -->
        <div class="modal fade" id="pembayaran">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('Penjualan/SimpanTransaksiA') ?>

                        <div class="form-group">
                            <label for="">Grand Total</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input id="grand_total" name="grand_total" class="form-control form-control-lg text-right text-danger" value="<?= number_format($grand_total); ?>" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Dibayar</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input name="dibayar" autocomplete="off" autofocus name="dibayar" id="dibayar" class="form-control form-control-lg text-right text-success" type="text" autocomplete="false">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Kembalian</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input id="kembalian" name="kembalian" class="form-control form-control-lg text-right text-primary" type="text" readonly value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Bayar</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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

            <?php if ($grand_total == 0) { ?>
                document.getElementById('terbilang').innerHTML = 'Nol Rupiah';
            <?php } else { ?>
                document.getElementById('terbilang').innerHTML = terbilang(<?= $grand_total; ?>) + ' Rupiah';
            <?php } ?>

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

        // Hitung Kembalian
        $('#dibayar').keyup(function(e) {
            HitungKembalian();
        });

        function CekProduk() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Penjualan/CekProdukA') ?>",
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
                        $('[name="harga_jual_a"]').val(response.harga_jual_a);
                        $('[name="harga_beli"]').val(response.harga_beli);
                        $('#qty').focus();
                    }
                }
            });
        }

        function PilihProduk(kode_produk) {
            $('#kode_produk').val(kode_produk);
            $('#cari-produk').modal('hide');
            $('#kode_produk').focus();
        }

        function Pembayaran() {
            $('#pembayaran').modal('show');
        }

        new AutoNumeric('#dibayar', {
            digitGroupSeparator: ',',
            decimalPlaces: 0
        });

        new AutoNumeric('#kembalian', {
            digitGroupSeparator: ',',
            decimalPlaces: 0
        });

        function HitungKembalian() {
            let grand_total = $('#grand_total').val().replace(/[^.\d]/g, '').toString();
            let dibayar = $('#dibayar').val().replace(/[^.\d]/g, '').toString();

            let kembalian = parseFloat(dibayar) - parseFloat(grand_total);

            $('#kembalian').val(kembalian);

            new AutoNumeric('#kembalian', {
                digitGroupSeparator: ',',
                decimalPlaces: 0
            });
        }
    </script>

    <script>
        // DataTables
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": true,
                "info": false,
                "ordering": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

    <!-- Jam realtime -->
    <script>
        window.onload = function() {
            startTime();
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('jam').innerHTML = h + ':' + m + ':' + s;
            var t = setTimeout(function() {
                startTime();
            }, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + 1;
            }
            return i;
        }
    </script>
</body>

</html>