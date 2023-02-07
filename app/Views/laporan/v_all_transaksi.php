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
                        <th width="200px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($alltransaksi as $key => $nilai) { ?>
                        <tr>
                            <td class="text-center"><b><?= $no++; ?></b></td>
                            <td><?= $nilai['no_faktur']; ?><input id="no_faktur" type="text" hidden value="<?= $nilai['no_faktur']; ?>"></td>
                            <td><?= $nilai['nama_pelanggan']; ?></td>
                            <td class="text-right">Rp<?= number_format($nilai['total_harga']); ?></td>
                            <td class="text-center">
                                <button onclick="CetakTransaksi()" class="btn btn-sm btn-success">
                                    <i class="fas fa-print"></i> Cetak
                                </button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-data"><i class="fas fa-exclamation-circle"></i> Batalkan</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>
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