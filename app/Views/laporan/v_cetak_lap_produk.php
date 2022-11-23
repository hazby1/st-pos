<div class="col-12">
    <table>
        <tr>
            <th width="100">Dicetak oleh</th>
            <th> : <?= session('nama_user'); ?></th>
        </tr>
        <tr>
            <th>Tanggal</th>
            <th> : <?= date('d M Y H:i:s'); ?></th>
        </tr>
    </table>
    <table id="example1" class="table table-striped table-bordered table-hover">
        <thead class="text-center">
            <tr>
                <th width="70px">#</th>
                <th width="130px">Kode Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Harga Reseller A</th>
                <th>Harga Reseller B</th>
                <th width="100px">Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($produk as $key => $nilai) { ?>
                <tr class="<?= $nilai['stok'] == 0 ? 'text-danger' : ''; ?>">
                    <td class="text-center"><b><?= $no++; ?></b></td>
                    <td class="text-center"><?= $nilai['kode_produk']; ?></td>
                    <td><?= $nilai['nama_produk']; ?></td>
                    <td class="text-center"><?= $nilai['nama_kategori']; ?></td>
                    <td class="text-center"><?= $nilai['nama_satuan']; ?></td>
                    <td class="text-right">Rp<?= number_format($nilai['harga_beli'], 0); ?></td>
                    <td class="text-right">Rp<?= number_format($nilai['harga_jual'], 0); ?></td>
                    <td class="text-right">Rp<?= number_format($nilai['harga_jual_a'], 0); ?></td>
                    <td class="text-right">Rp<?= number_format($nilai['harga_jual_b'], 0); ?></td>
                    <td class="text-center"><?= number_format($nilai['stok']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>