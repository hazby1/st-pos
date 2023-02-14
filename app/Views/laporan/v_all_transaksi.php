<div class="col-md-12">
    <div class="card card-red">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah-data"><i class="fas fa-plus"></i> <span>Tambah Data</span>
                </button>
            </div>

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
                        <th>Nomor Faktur</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Harga</th>
                        <th width="300px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($alltransaksi as $key => $nilai) { ?>
                        <tr>
                            <td class="text-center"><b><?= $no++; ?></b></td>
                            <td><?= $nilai['no_faktur']; ?><input id="no_faktur" type="text" hidden value="<?= $nilai['no_faktur']; ?>">
                                <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#detail<?= $nilai['no_faktur'] ?>">
                                    <i class="fas fa-info"></i>
                                </button>
                            </td>
                            <td><?= $nilai['nama_pelanggan']; ?></td>
                            <td class="text-right">Rp<?= number_format($nilai['grand_total']); ?></td>
                            <td class="text-center">
                                <?php if ($nilai['status'] == 'batal') {
                                    echo '<b class="text-danger">Transaksi Dibatalkan</b>';
                                } else { ?>
                                    <button onclick="CetakTransaksi()" class="btn btn-sm btn-success">
                                        <i class="fas fa-print"></i> Cetak
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-data<?= $nilai['no_faktur'] ?>"><i class="fas fa-exclamation-circle"></i> <?= $nilai['status'] == 'batal' ? 'Transaksi Batal' : 'Batalkan'; ?></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<!-- Modal Batalkan Transaksi -->
<?php foreach ($alltransaksi as $key => $nilai) { ?>
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

<!-- Modal Detail -->
<?php foreach ($alltransaksi as $key => $nilai) { ?>
    <div class="modal fade" id="detail<?= $nilai['no_faktur'] ?>">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Transaksi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <div class="modal-body">
                    <h5>Yakin akan Membatalkan Transaksi <b><?= $nilai['nama_pelanggan'][2]; ?></b>?</h5>

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
    function CetakTransaksi() {
        let no_faktur = $('#no_faktur').val();
        if (no_faktur == '') {
            Swal.fire('Nomor Faktur belum diisi!');
        } else {
            NewWin = window.open("<?= base_url('Laporan/CetakTransaksi'); ?>/" + no_faktur, "NewWin", "width=1500")
        }
    }
</script>