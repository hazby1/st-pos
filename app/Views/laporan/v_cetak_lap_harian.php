<div class="col-12">
    <table>
        <tr>
            <th width="100">Dicetak oleh</th>
            <th> : <?= session('nama_user'); ?></th>
        </tr>
        <tr>
            <th>Tanggal</th>
            <th> : <?= $tgl; ?></th>
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
            <th>Total Untung</th>
        </tr>
        <?php $no = 1;
        foreach ($dataharian as $key => $nilai) {
            $grandtotal[] = $nilai['total_harga'];
            $granduntung[] = $nilai['untung']; ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $nilai['kode_produk']; ?></td>
                <td><?= $nilai['nama_produk']; ?></td>
                <td class="text-center"><?= $nilai['qty']; ?></td>
                <td class="text-right">Rp<?= number_format($nilai['total_harga']); ?></td>
                <td class="text-right">Rp<?= number_format($nilai['untung']); ?></td>
            </tr>
        <?php } ?>
        <tr class="">
            <th class="text-right" colspan="4">
                Grand Total
            </th>
            <th class="text-right">Rp<?= $dataharian == null ? '' : number_format(array_sum($grandtotal)); ?></th>
            <th class="text-right">Rp<?= $dataharian == null ? '' : number_format(array_sum($granduntung)); ?></th>
        </tr>
        </tbody>
    </table>
</div>