<div class="row">
    <div class="col-12 text-center">
        <address>
            <i class="fas fa-shopping-cart fa-3x text-danger"></i>
            <b>
                <font size=9> <?= $web['nama_toko']; ?></font>
                <br>
                <label class=""><?= $web['slogan']; ?></label><br>
            </b>
            <?= $web['alamat']; ?> <strong><?= $web['no_telepon']; ?></strong>
        </address>
        <hr>
    </div>
    <div class="col-12 text-center">
        <h4><b><?= $subjudul; ?></b></h4>
    </div>

    <div class="col-12">
        <b>Tanggal : </b><?= $tgl; ?>
        <hr>
        <table class="table table-striped table-bordered">
            <tr class="text-center bg-gray">
                <th>#</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>QTY</th>
                <th>Total Harga</th>
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
            <tr class="bg-gray">
                <td class="text-right " colspan="4">
                    <h5>Grand Total</h5>
                </td>
                <th class="text-right">Rp<?= $dataharian == null ? '' : number_format(array_sum($grandtotal)); ?></th>
                <th class="text-right">Rp<?= $dataharian == null ? '' : number_format(array_sum($granduntung)); ?></th>
            </tr>
        </table>
    </div>
</div>