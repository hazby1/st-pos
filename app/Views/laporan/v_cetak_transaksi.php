<div class="col-12">
    <table>
        <tr>
            <th width="100">Dicetak oleh</th>
            <th> : <?= session('nama_user'); ?></th>
        </tr>
        <tr>
            <th>Nomor Faktur</th>
            <th> : <?= $no_faktur; ?></th>
        </tr>
    </table>
    <hr>
    <table class="table table-striped table-bordered">
        <tr class="text-center">
            <th>#</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>QTY</th>
            <th>Total Penjualan</th>
        </tr>
        <?php $no = 1;
        foreach ($datatransaksi as $key => $nilai) {
            $grandtotal[] = $nilai['total_harga']; ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $nilai['kode_produk']; ?></td>
                <td><?= $nilai['nama_produk']; ?></td>
                <td class="text-center"><?= $nilai['qty']; ?></td>
                <td class="text-right">Rp<?= number_format($nilai['total_harga']); ?></td>
            </tr>
        <?php } ?>
        <tr class="">
            <th class="text-right" colspan="4">
                Grand Total
            </th>
            <th class="text-right">Rp<?= $datatransaksi == null ? '' : number_format(array_sum($grandtotal)); ?></th>
        </tr>
        </tbody>
    </table>
</div>