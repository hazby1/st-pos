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
                                Nota Penjualan
                            </label>
                            <input id="no_faktur" name="no_faktur" class="form-control col-sm-5">
                            <span class="input-group-append">
                                <button onclick="ViewTabel()" class="btn btn-primary ">
                                    <i class="fas fa-file-alt"></i> Lihat
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <hr>
                    <div>
                        <div class="Tabel">
                            <?php if (session()->getFlashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-check"></i>';
                                echo session()->getFlashdata('pesan');
                            } ?>
                        </div>
                        <!-- Tabel laporan -->
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<script>
    function ViewTabel() {
        let no_faktur = $('#no_faktur').val();
        if (no_faktur == '') {
            Swal.fire('Nota Penjualan belum diisi!');
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url('ReturnBarang/ViewTransaksi') ?>",
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
</script>