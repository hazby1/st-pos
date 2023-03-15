<div class="col-12">
    <table class="table table- table-striped table-sm" style="font-size: 18px;">
        <tr class="text-center table-bordered" style="border: 1px;">
            <th>#</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>QTY</th>
            <th colspan="2">Harga</th>
            <th colspan="2">Diskon</th>
            <th colspan="2">Pajak</th>
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

                <td width="60px" class="text-center">Rp</td>
                <td width="100px" class="text-right"><?= number_format($nilai['harga']); ?></td>

                <td width="50px" class="text-center">Rp</td>
                <td width="50px" class="text-right"><?= number_format($nilai['diskon']); ?></td>

                <td width="50px" class="text-center">Rp</td>
                <td width="50px" class="text-right"><?= number_format($nilai['pajak']); ?></td>

                <td width="60px" class="text-center">Rp</td>
                <td width="100px" class="text-right"><?= number_format($nilai['total_harga']); ?></td>
            </tr>
        <?php } ?>
        <tr class="">
            <th class="text-right" colspan="10">
                Total
            </th>
            <th width="50px" class="text-center">Rp</th>
            <th class="text-right"><?= $datatransaksi == null ? '' : number_format(array_sum($grandtotal)); ?></th>
        </tr>
        </tbody>
    </table>
    <hr>
    <table class="table table-sm table-borderless">
        <tr class="text-center">
            <td width="60%" rowspan="2">
                <p class="text-left" style="font-size: 12px;">
                    *Salah model karena kesalahan pembeli bukan tanggungjawab kami <br>
                    *Garansi unit sesuai perjanjian/ketentuan <br>
                    *Kerusakan atau cacat fisik setelah serah terima bukan tanggungjawab kami <br>
                    *Garansi tidak termasuk Software <br>
                    <b>Transfer Rek BCA 0470-6730-36 A/N Suhendar</b>
                </p>
            </td>
            <td width="20%" height="65px">Pelanggan</td>
            <td width="20%">Hormat Kami</td>
        </tr>
        <tr class="text-center">
            <?php foreach ($pelanggan as $key => $nilai) { ?>
                <td><u><?= $nilai['nama_pelanggan']; ?></u></td>
            <?php } ?>
            <td><u><?= session('nama_user'); ?></u></td>
        </tr>
    </table>
</div>