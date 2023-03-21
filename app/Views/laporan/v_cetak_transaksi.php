<div class="col-12 page">
    <table class="">
        <thead>
            <tr class=" text-center">
                <th>#</th>
                <th>Kd Produk</th>
                <th>Nama Produk</th>
                <th>QTY</th>
                <th colspan="2">Harga</th>
                <th colspan="2">Diskon</th>
                <th colspan="2">Pajak</th>
                <th colspan="2">Sub Total</th>
            </tr>
        </thead>
        <?php $no = 1;
        foreach ($datatransaksi as $key => $nilai) { ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $nilai['kode_produk']; ?></td>
                <td><?= $nilai['nama_produk']; ?></td>
                <td class="text-center"><?= $nilai['qty']; ?></td>

                <td width="60px" class="text-center rp">Rp</td>
                <td width="100px" class="text-right nominal"><?= number_format($nilai['harga']); ?></td>

                <td width="50px" class="text-center rp">Rp</td>
                <td width="50px" class="text-right nominal"><?= number_format($nilai['diskon']); ?></td>

                <td width="50px" class="text-center rp">Rp</td>
                <td width="50px" class="text-right nominal"><?= number_format($nilai['pajak']); ?></td>

                <td width="60px" class="text-center rp">Rp</td>
                <td width="100px" class="text-right nominal"><?= number_format($nilai['total_harga']); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="footer d-none">
        <div class="col-12">
            <div class="row">
                <table class="bawah">
                    <tbody>
                        <?php $no = 1;
                        foreach ($datatransaksi as $key => $nilai) {
                            $grandtotal[] = $nilai['total_harga']; ?>
                            <tr>
                                <td class="transparant"><?= $no++; ?></td>
                                <td class="transparant"><?= $nilai['kode_produk']; ?></td>
                                <td class="transparant"><?= $nilai['nama_produk']; ?></td>
                                <td class="transparant"><?= $nilai['qty']; ?></td>

                                <td width="60px" class="transparant rp">Rp</td>
                                <td width="100px" class="transparant nominal"><?= number_format($nilai['harga']); ?></td>

                                <td width="50px" class="transparant rp">Rp</td>
                                <td width="50px" class="transparant nominal"><?= number_format($nilai['diskon']); ?></td>

                                <td width="50px" class="transparant rp">Rp</td>
                                <td width="50px" class="transparant nominal"><?= number_format($nilai['pajak']); ?></td>

                                <td width="60px" class="transparant rp">Rp</td>
                                <td width="100px" class="transparant nominal"><?= number_format($nilai['total_harga']); ?></td>
                            </tr>
                        <?php } ?>
                        <tr class="text-bold total">
                            <td class="text-right" colspan="10">
                                Total
                            </td>
                            <td class="rp" width="50px" class="text-center">Rp</th>
                            <td class="text-right nominal"><?= $datatransaksi == null ? '' : number_format(array_sum($grandtotal)); ?></td>
                        </tr>
                    </tbody>
                </table>

                <div class="col-8">
                    <p class="text-left">
                        *Salah model karena kesalahan pembeli bukan tanggungjawab kami <br>
                        *Garansi unit sesuai perjanjian/ketentuan <br>
                        *Kerusakan atau cacat fisik setelah serah terima bukan tanggungjawab kami <br>
                        *Garansi tidak termasuk Software <br>
                        <b style="font-size: 12pt;">Transfer Rek BCA 0470-6730-36 A/N Suhendar</b>
                    </p>
                </div>
                <div class="col-4 footer-text">
                    <table>
                        <tr>
                            <td>Pelanggan</td>
                            <td>Hormat Kami</td>
                        </tr>
                        <tr height="100px">
                            <?php foreach ($pelanggan as $key => $nilai) { ?>
                                <td><?= $nilai['nama_pelanggan']; ?></td>
                            <?php } ?>
                            <td><?= session()->get('nama_user'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>