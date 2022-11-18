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
        <b>Tahun : <?= $tahun; ?></b>
        <hr>
        <table class="table table-striped table-bordered">
            <tr class="text-center bg-gray">
                <th width="50">#</th>
                <th width="250">Bulan</th>
                <th>Total Penjualan</th>
                <th>Total Untung</th>
            </tr>
            <?php $no = 1;
            foreach ($datatahunan as $key => $nilai) {
                $grandtotal[] = $nilai['total_harga'];
                $granduntung[] = $nilai['untung']; ?>

                <?php
                switch ($nilai['bulan']) {
                    case '2':
                        $nilai['bulan'] = "Februari";
                        break;
                    case '3':
                        $nilai['bulan'] = "Maret";
                        break;
                    case '4':
                        $nilai['bulan'] = "April";
                        break;
                    case '5':
                        $nilai['bulan'] = "Mei";
                        break;
                    case '6':
                        $nilai['bulan'] = "Juni";
                        break;
                    case '7':
                        $nilai['bulan'] = "Juli";
                        break;
                    case '8':
                        $nilai['bulan'] = "Agustus";
                        break;
                    case '9':
                        $nilai['bulan'] = "September";
                        break;
                    case '10':
                        $nilai['bulan'] = "Oktober";
                        break;
                    case '11':
                        $nilai['bulan'] = "November";
                        break;
                    case '12':
                        $nilai['bulan'] = "Desember";
                        break;
                    default:
                        $nilai['bulan'] = "Januari";
                        break;
                }
                ?>

                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $nilai['bulan']; ?></td>
                    <td class="text-right">Rp<?= number_format($nilai['total_harga']); ?></td>
                    <td class="text-right">Rp<?= number_format($nilai['untung']); ?></td>
                </tr>
            <?php } ?>
            <tr class="bg-gray">
                <td class="text-right " colspan="2">
                    <h5>Grand Total</h5>
                </td>
                <th class="text-right">Rp<?= $datatahunan == null ? '' : number_format(array_sum($grandtotal)); ?></th>
                <th class="text-right">Rp<?= $datatahunan == null ? '' : number_format(array_sum($granduntung)); ?></th>
            </tr>
        </table>
    </div>
</div>