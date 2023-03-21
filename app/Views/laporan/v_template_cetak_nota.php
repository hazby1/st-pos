<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ST-POS | <?= $judul; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminlte') ?>/dist/css/adminlte.min.css">
    <!-- Nota CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>/print.css">

</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">

                <div class="col-12 hr">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="media col-2 float-end">
                                    <img width="95px" height="95px" class="mt-1 ml-1" src="<?= base_url('logo.png'); ?>">
                                </div>
                                <div class="media-body col-7 text-center">
                                    <h5 class="mt-0 mb-0">
                                        <font size=7> <b><?= $web['nama_toko']; ?></b></font>
                                    </h5>
                                    <label for="" class="mt-0 mb-0"><?= $web['slogan']; ?></label><br>
                                    <span class="mt-0"><?= $web['alamat']; ?> <?= $web['no_telepon']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <table>
                                <tr>
                                    <td>Tanggal</td>
                                    <td> : <?php echo date('d/m/Y'); ?></td>
                                </tr>
                                <tr>
                                    <td>Pelanggan</td>
                                    <?php foreach ($pelanggan as $key => $nilai) { ?>
                                        <td> : <?php echo $nilai['nama_pelanggan']; ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td>No Nota</td>
                                    <td> : <?php echo $no_faktur; ?></td>
                                </tr>
                                <tr>
                                    <td>Kasir</td>
                                    <td> : <?= session('nama_user'); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center mt-0">
                    <b>
                        <h4 class=" mt-0"><b>NOTA PENJUALAN</b></h4>
                    </b>
                </div>
                <!-- /.col -->
            </div>
            <!-- Table row -->
            <div class="row">
                <?php if ($page) {
                    echo view($page);
                } ?>
            </div>
            <!-- /.row -->


            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>