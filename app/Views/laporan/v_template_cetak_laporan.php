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
                    <address>
                        <i class="fas fa-shopping-cart fa-3x text-danger"></i>
                        <b>
                            <font size=9> <?= $web['nama_toko']; ?></font>
                            <br>
                            <label class=""><?= $web['slogan']; ?></label><br>
                        </b>
                        <?= $web['alamat']; ?> <strong><?= $web['no_telepon']; ?></strong>
                        <hr>
                    </address>
                </div>
                <div class="col-12 text-center">
                    <b>
                        <h4><?= $judul; ?></h4>
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