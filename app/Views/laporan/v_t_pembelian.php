<div class="row">

    <div class="col-12 text-center">
        <h4><b><?= $subjudul; ?></b></h4>
    </div>

    <div class="col-12">
        <b>Nomor : </b><?= $nota_beli; ?>
        <?php foreach ($supplier as $key => $nilai) { ?>
            <b>Nama Supplier : </b><?= $nilai['nama_supplier']; ?>
        <?php } ?>
        <hr>
        <table class="table table-striped table-bordered">
            <tr class="text-center bg-gray">
                <th>#</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>QTY</th>
                <th>Total Harga</th>
            </tr>
            <?php $no = 1;
            foreach ($datapembelian as $key => $nilai) {
                $grandtotal[] = $nilai['total_harga']; ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $nilai['kode_produk']; ?></td>
                    <td><?= $nilai['nama_produk']; ?></td>
                    <td class="text-center"><?= $nilai['qty']; ?></td>
                    <td class="text-right">Rp<?= number_format($nilai['total_harga']); ?></td>
                </tr>
            <?php } ?>
            <tr class="bg-gray">
                <td class="text-right " colspan="4">
                    <h5>Grand Total</h5>
                </td>
                <th class="text-right">Rp<?= $datapembelian == null ? '' : number_format(array_sum($grandtotal)); ?></th>
            </tr>
        </table>
    </div>
</div>