<!-- Widget -->
<div class="col-lg-3 col-6">

    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>
            <p>Produk</p>
        </div>
        <div class="icon">
            <i class="fas fa-box"></i>
        </div>
        <a href="#" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">

    <div class="small-box bg-teal">
        <div class="inner">
            <h3>53<sup style="font-size: 50%">%</sup></h3>
            <p>Kategori</p>
        </div>
        <div class="icon">
            <i class="fas fa-th-list"></i>
        </div>
        <a href="#" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">

    <div class="small-box bg-olive">
        <div class="inner">
            <h3>44</h3>
            <p>Satuan</p>
        </div>
        <div class="icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <a href="#" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">

    <div class="small-box bg-pink">
        <div class="inner">
            <h3>65</h3>
            <p>User</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<!-- end Widget -->

<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-indigo">
        <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Pendapatan hari ini</span>
            <span class="info-box-number">Rp5,200</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>
<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-maroon">
        <span class="info-box-icon"><i class="fas fa-money-bill-alt"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Pendapatan bulan ini</span>
            <span class="info-box-number">Rp5,200</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>
<div class="col-md-4">
    <!-- Info Boxes Style 2 -->
    <div class="info-box mb-3 bg-navy">
        <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Pendapatan tahun ini</span>
            <span class="info-box-number">Rp5,200</span>
        </div>
        <!-- /.info-box-content -->
    </div>
</div>

<div class="col md-12">
    <canvas id="myChart" width="100%" height="30px"></canvas>
</div>

<script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: '# Pendapatan',
                data: [12, 19, 3, 5, 6, 3, 3, 9, 3, 4, 17, 10],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
            }]
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