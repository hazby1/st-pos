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

<!-- Konten -->
<?php
if ($page) {
    echo view($page);
}
?>
<!-- end Konten -->

</html>