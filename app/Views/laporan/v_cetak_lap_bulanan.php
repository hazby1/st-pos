<div class="col-12">
    <table>
        <tr>
            <th width="100">Dicetak oleh</th>
            <th> : <?= session('nama_user'); ?></th>
        </tr>
        <tr>
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
            <th>Bulan</th>
            <th> : <?= $bulan . ' ' . $tahun; ?></th>
        </tr>
    </table>
    <hr>
    <table class="table table-striped table-bordered">
        <tr class="text-center">
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
        <tr class="">
            <td class="text-right " colspan="2">
                <h5>Grand Total</h5>
            </td>
            <th class="text-right">Rp<?= $databulanan == null ? '' : number_format(array_sum($grandtotal)); ?></th>
            <th class="text-right">Rp<?= $databulanan == null ? '' : number_format(array_sum($granduntung)); ?></th>
        </tr>
    </table>
</div>