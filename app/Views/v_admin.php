<!-- Widget -->
<div class="col-lg-2 col-6">

    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $produk; ?></h3>
            <p>Produk</p>
        </div>
        <div class="icon">
            <i class="fas fa-box"></i>
        </div>
        <a href="<?= base_url('produk'); ?>" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">

    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $jasa; ?></h3>
            <p>Jasa</p>
        </div>
        <div class="icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <a href="<?= base_url('jasa'); ?>" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">

    <div class="small-box bg-teal">
        <div class="inner">
            <h3><?= $kategori; ?></h3>
            <p>Kategori</p>
        </div>
        <div class="icon">
            <i class="fas fa-th-list"></i>
        </div>
        <a href="<?= base_url('kategori'); ?>" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">

    <div class="small-box bg-primary">
        <div class="inner">
            <h3><?= $satuan; ?></h3>
            <p>Satuan</p>
        </div>
        <div class="icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <a href="<?= base_url('satuan'); ?>" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">

    <div class="small-box bg-primary">
        <div class="inner">
            <h3><?= $supplier; ?></h3>
            <p>Supplier</p>
        </div>
        <div class="icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <a href="<?= base_url('supplier'); ?>" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-2 col-6">

    <div class="small-box bg-pink">
        <div class="inner">
            <h3><?= $user; ?></h3>
            <p>User</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="<?= base_url('user'); ?>" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<!-- end Widget -->

<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-indigo">
        <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Pendapatan Hari Ini</span>
            <span class="info-box-number">Rp<?= $pendapatanhari == null ? 0 : number_format($pendapatanhari['total_harga']); ?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>
<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-maroon">
        <span class="info-box-icon"><i class="fas fa-money-bill-alt"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Pendapatan Bulan Ini</span>
            <span class="info-box-number">Rp<?= $pendapatanbulan == null ? 0 : number_format($pendapatanbulan['total_harga']); ?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>
<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-navy">
        <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Pendapatan Tahun Ini</span>
            <span class="info-box-number">Rp<?= $pendapatantahun == null ? 0 : number_format($pendapatantahun['total_harga']); ?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>

<!-- <div class="col md-12">
    <canvas id="myChart" width="100%" height="30px"></canvas>
</div> -->

<!-- AREA CHART -->
<div class="card col-sm-12 card-primary">
    <div class="card-body">
        <div class="chart">
            <canvas id="myChart" width="100%" height="30px"></canvas>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<?php

if ($grafik == null) {
    $tgl[] = 0;
    $total[] = 0;
    $untung[] = 0;
} else {
    foreach ($grafik as $key => $nilai) {
        $tgl[] = $nilai['tgl_jual'];
        $total[] = $nilai['total_harga'];
        $untung[] = $nilai['untung'];
    }
}

?>

<script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($tgl); ?>,
            datasets: [{
                    label: 'Grafik Pendapatan Penjualan Bulan <?= date('F Y'); ?>',
                    data: <?= json_encode($total); ?>,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 3
                },
                {
                    label: 'Grafik Keuntungan Penjualan Bulan <?= date('F Y'); ?>',
                    data: <?= json_encode($untung); ?>,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 3
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>