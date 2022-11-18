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
        <?php
        switch ($bulan) {
            case '2':
                $bulan = "Februari";
                break;
            case '3':
                $bulan = "Maret";
                break;
            case '4':
                $bulan = "April";
                break;
            case '5':
                $bulan = "Mei";
                break;
            case '6':
                $bulan = "Juni";
                break;
            case '7':
                $bulan = "Juli";
                break;
            case '8':
                $bulan = "Agustus";
                break;
            case '9':
                $bulan = "September";
                break;
            case '10':
                $bulan = "Oktober";
                break;
            case '11':
                $bulan = "November";
                break;
            case '12':
                $bulan = "Desember";
                break;
            default:
                $bulan = "Januari";
                break;
        }
        ?>
        <b>Bulan : <?= $bulan . ' ' . $tahun; ?></b>
        <hr>
        <table class="table table-striped table-bordered">
            <tr class="text-center bg-gray">
                <th width="50">#</th>
                <th>Tanggal</th>
                <th>Total Penjualan</th>
                <th>Total Untung</th>
            </tr>
            <?php $no = 1;
            foreach ($databulanan as $key => $nilai) {
                $grandtotal[] = $nilai['total_harga'];
                $granduntung[] = $nilai['untung']; ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $nilai['tgl_jual']; ?></td>
                    <td class="text-right">Rp<?= number_format($nilai['total_harga']); ?></td>
                    <td class="text-right">Rp<?= number_format($nilai['untung']); ?></td>
                </tr>
            <?php } ?>
            <tr class="bg-gray">
                <td class="text-right " colspan="2">
                    <h5>Grand Total</h5>
                </td>
                <th class="text-right">Rp<?= $databulanan == null ? '' : number_format(array_sum($grandtotal)); ?></th>
                <th class="text-right">Rp<?= $databulanan == null ? '' : number_format(array_sum($granduntung)); ?></th>
            </tr>
        </table>
    </div>
</div>