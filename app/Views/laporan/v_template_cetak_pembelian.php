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
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="media">
                        <img width="60px" height="60px" class="mr-1 mt-2" src="<?= base_url('logo.png'); ?>" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">
                                <font size=7> <b><?= $web['nama_toko']; ?></b></font>
                            </h5>
                            <label for="" class="mt-0 mb-0"><?= $web['slogan']; ?></label><br>
                            <span class="mt-0"><?= $web['alamat']; ?> <?= $web['no_telepon']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt-0">
                    <hr>
                    <b>
                        <h4 class="">Nota Pembelian</h4>
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