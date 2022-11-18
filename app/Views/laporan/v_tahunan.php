<div class="col-md-12">
    <div class="card card-red">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-9 input-group">
                            <label class="col-sm-2 col-form-label">
                                Tahun
                            </label>
                            <select class="form-control col-sm-3" name="tahun" id="tahun">
                                <option class="text-center" value="">-- Pilih Tahun --</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
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
        let tahun = $('#tahun').val();

        // Alert ketika input kosong
        if (tahun == '') {
            Swal.fire('Tahun belum dipilih!');
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/ViewLaporanTahunan') ?>",
                data: {
                    tahun: tahun,
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
        let tahun = $('#tahun').val();

        // Alert ketika input kosong
        if (tahun == '') {
            Swal.fire('Tahun belum dipilih!');
        } else {
            NewWin = window.open("<?= base_url('Laporan/CetakLaporanTahunan'); ?>/" + tahun, "NewWin", "width=1500")
        }
    }
</script>