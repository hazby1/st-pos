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
                                Nomor Faktur
                            </label>
                            <input id="no_faktur" name="no_faktur" class="form-control col-sm-5">
                            <span class="input-group-append">
                                <button onclick="ViewTabelTransaksi()" class="btn btn-primary ">
                                    <i class="fas fa-file-alt"></i> Lihat
                                </button>
                                <button onclick="CetakTransaksi()" class="btn btn-success">
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
    function ViewTabelTransaksi() {
        let no_faktur = $('#no_faktur').val();
        if (no_faktur == '') {
            Swal.fire('Nomor Faktur belum diisi!');
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/ViewTransaksi') ?>",
                data: {
                    no_faktur: no_faktur,
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

    function CetakTransaksi() {
        let no_faktur = $('#no_faktur').val();
        if (no_faktur == '') {
            Swal.fire('Nomor Faktur belum diisi!');
        } else {
            NewWin = window.open("<?= base_url('Laporan/CetakTransaksi'); ?>/" + no_faktur, "NewWin", "width=1500")
        }
    }
</script>