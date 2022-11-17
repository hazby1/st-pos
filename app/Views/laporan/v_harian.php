<div class="col-md-12">
    <div class="card card-red">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>

        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 input-group">
                            <label class="col-sm-3 col-form-label">
                                Tanggal
                            </label>
                            <input type="date" id="tgl" name="tgl" class="form-control col-sm-5">
                            <span class="input-group-append">
                                <button onclick="ViewTabelLaporan()" class="btn btn-primary ">
                                    <i class="fas fa-file-alt"></i> Lihat
                                </button>
                                <button onclick="CetakLaporan()" class="btn btn-success">
                                    <i class="fas fa-print"></i> Cetak
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <hr>
                    <div class="Tabel">
                        <!-- Tabel laporan -->
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    function ViewTabelLaporan() {
        let tgl = $('#tgl').val();
        if (tgl == '') {
            Swal.fire('Tanggal belum dipilih!');
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/ViewLaporanHarian') ?>",
                data: {
                    tgl: tgl,
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.data) {
                        $('.Tabel').html(response.data)
                    }
                },
            });
        }
    }

    function CetakLaporan() {
        let tgl = $('#tgl').val();
        if (tgl == '') {
            Swal.fire('Tanggal belum dipilih!');
        } else {
            NewWin = window.open("<?= base_url('Laporan/CetakLaporanHarian'); ?>/" + tgl, "NewWin", "width=1500")
        }
    }
</script>