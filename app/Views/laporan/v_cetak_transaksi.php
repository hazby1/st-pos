<div class="col-12">
    <table class="table table-borderless table-sm">
        <tr>
            <td>
                <table>
                    <tr>
                        <td>Nomor</td>
                        <td> : <?= $no_faktur; ?></td>

                    </tr>
                    <tr>
                        <td>Kepada</td>
                        <?php foreach ($pelanggan as $key => $nilai) { ?>
                            <td> : <?= $nilai['nama_pelanggan']; ?></td>
                        <?php } ?>
                    </tr>
                </table>
            </td>
            <td width="200px"></td>
            <td>
                <table>
                    <tr>
                        <td>Kasir</td>
                        <td> : <?= session('nama_user'); ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td> : <?= date('d/m/Y'); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <hr>
    <table class="table table-striped">
        <tr class="text-center">
            <th>#</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>QTY</th>
            <th>Disc</th>
            <th>Pajak</th>
            <th>Sub Total</th>
        </tr>
        <?php $no = 1;
        foreach ($datatransaksi as $key => $nilai) {
            $grandtotal[] = $nilai['total_harga']; ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $nilai['kode_produk']; ?></td>
                <td><?= $nilai['nama_produk']; ?></td>
                <td class="text-center"><?= $nilai['qty']; ?></td>
                <td class="text-center">Rp<?= number_format($nilai['diskon']); ?></td>
                <td class="text-center">Rp<?= number_format($nilai['pajak']); ?></td>
                <td class="text-right">Rp<?= number_format($nilai['total_harga']); ?></td>
            </tr>
        <?php } ?>
        <tr class="">
            <th class="text-right" colspan="6">
                Total
            </th>
            <th class="text-right">Rp<?= $datatransaksi == null ? '' : number_format(array_sum($grandtotal)); ?></th>
        </tr>
        </tbody>
    </table>
    <hr>
    <table class="table table-sm table-borderless">
        <tr class="text-center">
            <td width="30%" height="65px">Pelanggan</td>
            <td width="30%"></td>
            <td width="30%">Nama Toko</td>
        </tr>
        <tr class="text-center">
            <?php foreach ($pelanggan as $key => $nilai) { ?>
                <td><u><?= $nilai['nama_pelanggan']; ?></u></td>
            <?php } ?>
            <td></td>
            <td><u><?= session('nama_user'); ?></u></td>
        </tr>
    </table>
</div>