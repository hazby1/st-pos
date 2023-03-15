<div class="col-12">
    <table class="table table-striped table-sm" style="font-size: 18px;">
        <tr class="text-center table-bordered" style="border: 1px;">
            <th>#</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>QTY</th>
            <th colspan="2">Sub Total</th>
        </tr>
        <?php $no = 1;
        foreach ($datatransaksi as $key => $nilai) {
            $grandtotal[] = $nilai['total_harga']; ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $nilai['kode_produk']; ?></td>
                <td><?= $nilai['nama_produk']; ?></td>
                <td class="text-center"><?= $nilai['qty']; ?></td>
                <td>Rp</td>
                <td class="text-right"><?= number_format($nilai['total_harga']); ?></td>
            </tr>
        <?php } ?>
        <tr class="">
            <th class="text-right" colspan="4">
                Total
            </th>
            <th>Rp</th>
            <th class="text-right"><?= $datatransaksi == null ? '' : number_format(array_sum($grandtotal)); ?></th>
        </tr>
        </tbody>
    </table>
    <table class="table table-sm table-borderless">
        <tr class="text-center">
            <td width="60%"></td>
            <td width="20%" height="65px">Supplier</td>
            <td width="20%">Hormat Kami</td>
        </tr>
        <tr class="text-center">
            <td></td>
            <?php foreach ($supplier as $key => $nilai) { ?>
                <td><u><?= $nilai['nama_supplier']; ?></u></td>
            <?php } ?>
            <td><u><?= session('nama_user'); ?></u></td>
        </tr>
    </table>
</div>