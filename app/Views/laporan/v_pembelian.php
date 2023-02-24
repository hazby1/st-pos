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

            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th width="70px">#</th>
                        <th>Nota Pembelian</th>
                        <th>Nama Supplier</th>
                        <th>Total Harga</th>
                        <th width="300px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pembelian as $key => $nilai) { ?>
                        <tr>
                            <td class="text-center"><b><?= $no++; ?></b></td>
                            <td><?= $nilai['nota_beli']; ?>
                            </td>
                            <td><?= $nilai['nama_supplier']; ?></td>
                            <td class="text-right">Rp<?= number_format($nilai['grand_total']); ?></td>
                            <td class="text-center">
                                <?php if ($nilai['status'] == 'batal') {
                                    echo '<b class="text-danger">Pembelian Dibatalkan</b>';
                                } else { ?>
                                    <button onclick="CetakPembelian()" class="btn btn-sm btn-success">
                                        <i class="fas fa-print"></i> Cetak
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-data<?= $nilai['nota_beli'] ?>"><i class="fas fa-exclamation-circle"></i> <?= $nilai['status'] == 'batal' ? 'Pembelian Batal' : 'Batalkan'; ?></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<!-- Modal Batalkan Pembelian -->
<?php foreach ($pembelian as $key => $nilai) { ?>
    <div class="modal fade" id="delete-data<?= $nilai['nota_beli'] ?>">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Batalkan Pembelian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <div class="modal-body">
                    <h5>Yakin akan Membatalkan Pembelian <b><?= $nilai['nota_beli']; ?></b>?</h5>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                    <a href="<?= base_url('pembelian/BatalPembelian/' . $nilai['nota_beli']) ?>" class="btn btn-danger btn-flat">Batalkan</a>
                </div>
                <!-- end Form -->

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->

<!-- Modal Detail -->
<?php foreach ($pembelian as $key => $nilai) { ?>
    <div class="modal fade" id="detail<?= $nilai['nota_beli'] ?>">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pembelian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <div class="modal-body">
                    <h5>Yakin akan Membatalkan Pembelian <b><?= $nilai['nama_supplier'][2]; ?></b>?</h5>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
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
    function CetakPembelian() {
        let nota_beli = $('#nota_beli<?= $nilai['nota_beli']; ?>').val();
        if (nota_beli == '') {
            Swal.fire('Nota Pembelian belum diisi!');
        } else {
            NewWin = window.open("<?= base_url('Laporan/CetakPembelian'); ?>/" + nota_beli, "NewWin", "width=1500")
        }
    }
</script>