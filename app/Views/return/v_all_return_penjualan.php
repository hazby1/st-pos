<div class="col-md-12">
    <div class="card card-red">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>

        </div>

        <div class="card-body">

            <!-- Alert -->
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>
            <!-- end Alert -->

            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead class="text-center">
                    <tr>
                        <th width="70px">#</th>
                        <th>Nota Penjualan</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($allreturnpenjualan as $key => $nilai) { ?>
                        <tr>
                            <td class="text-center"><b><?= $no++; ?></b></td>
                            <td><?= $nilai['no_faktur']; ?></td>
                            <td><?= $nilai['nama_pelanggan']; ?></td>
                            <td class="text-right">Rp<?= number_format($nilai['harga']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<!-- Modal Batalkan Transaksi -->
<?php foreach ($allreturnpenjualan as $key => $nilai) { ?>
    <div class="modal fade" id="delete-data<?= $nilai['no_faktur'] ?>">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Batalkan Transaksi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <div class="modal-body">
                    <h5>Yakin akan Membatalkan Transaksi <b><?= $nilai['no_faktur']; ?></b>?</h5>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('penjualan/BatalTransaksi/' . $nilai['no_faktur']) ?>" class="btn btn-danger btn-flat">Batalkan</a>
                </div>
                <!-- end Form -->

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
            "info": true,
            "ordering": false,
            "buttons": ["excel", ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    })
</script>

<script>
    function ViewTabelTransaksi() {
        let no_faktur = $('#no_faktur').val();
        if (no_faktur == '') {
            Swal.fire('Nota Penjualan belum diisi!');
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url('ReturnBarang/ViewReturnPenjualan') ?>",
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