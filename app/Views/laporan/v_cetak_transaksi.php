<div class="col-12">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <table>
                        <tr>
                            <td>Nomor</td>
                            <td> : <?= $no_faktur; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-3">
                    <table>
                        <tr>
                            <td>Kepada</td>
                            <?php foreach ($pelanggan as $key => $nilai) { ?>
                                <td> : <?= $nilai['nama_pelanggan']; ?></td>
                            <?php } ?>
                        </tr>
                    </table>
                </div>
                <div class="col-3">
                    <table>
                        <tr>
                            <td>Kasir</td>
                            <td> : <?= session('nama_user'); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-3">
                    <table>
                        <tr>
                            <td>Tanggal</td>
                            <td> : <?= date('d/m/Y'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped table-sm" style="font-size: 18px;">
        <tr class="text-center">
            <th>#</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>QTY</th>
            <th>Harga</th>
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
                <td class="text-center">Rp<?= number_format($nilai['harga']); ?></td>
                <td class="text-center">Rp<?= number_format($nilai['diskon']); ?></td>
                <td class="text-center">Rp<?= number_format($nilai['pajak']); ?></td>
                <td class="text-right">Rp<?= number_format($nilai['total_harga']); ?></td>
            </tr>
        <?php } ?>
        <tr class="">
            <th class="text-right" colspan="7">
                Total
            </th>
            <th class="text-right">Rp<?= $datatransaksi == null ? '' : number_format(array_sum($grandtotal)); ?></th>
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
            <td width="20%">Nama Toko</td>
        </tr>
        <tr class="text-center">
            <?php foreach ($pelanggan as $key => $nilai) { ?>
                <td><u><?= $nilai['nama_pelanggan']; ?></u></td>
            <?php } ?>
            <td><u><?= session('nama_user'); ?></u></td>
        </tr>
    </table>
</div>