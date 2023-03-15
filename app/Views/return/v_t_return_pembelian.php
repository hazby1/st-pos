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
        <table class="table table-striped table-bordered table-sm">
            <tr class="text-center bg-gray">
                <th>#</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>QTY</th>
                <th colspan="2">Total Harga</th>
                <th>Opsi</th>
            </tr>
            <?php $no = 1;
            foreach ($datareturnpembelian as $key => $nilai) {
                $grandtotal[] = $nilai['total_harga']; ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $nilai['kode_produk']; ?></td>
                    <td class=""><?= $nilai['nama_produk']; ?></td>
                    <td class="text-center"><?= $nilai['qty']; ?></td>
                    <td class="" style="border-right: 0;">Rp</td>
                    <td class="text-right" style="border-left: 0;"><?= number_format($nilai['total_harga']); ?></td>
                    <td class="text-center">
                        <?php if ($nilai['return_barang'] == $nilai['qty']) {
                            echo '<b class="text-danger">Barang sudah direturn</b>';
                        } else { ?>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-data<?= $nilai['kode_produk'] ?>"><i class="fas fa-exclamation-circle"></i> Return</button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            <tr class="bg-gray">
                <td class="text-right" colspan="4">
                    <h5>Grand Total</h5>
                </td>
                <td class="" style="border-right: 0;">Rp</td>
                <th class="text-right" style="border-left: 0;"><?= $datareturnpembelian == null ? '' : number_format(array_sum($grandtotal)); ?></th>
            </tr>
        </table>
    </div>
</div>


<!-- Modal Return Penjualan -->
<?php foreach ($datareturnpembelian as $key => $nilai) { ?>
    <div class="modal  fade" id="delete-data<?= $nilai['kode_produk'] ?>">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Return Penjualan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <?= form_open('ReturnBarang/ReturnBarangPembelian'); ?>
                <div class="modal-body">
                    <input hidden id="nota_beli" name="nota_beli" value="<?= $nota_beli; ?>">
                    <input hidden id="kode_produk" name="kode_produk" value="<?= $nilai['kode_produk']; ?>">
                    <input hidden name="harga" id="harga" value="<?= $nilai['total_harga'] / $nilai['qty']; ?>">
                    <input hidden id="id_supplier" name="id_supplier" value="<?= $nilai['id_supplier']; ?>">
                    <div class="form-group">
                        <label for="">Harga terbeli</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <div class="form-control form-control-lg text-right"><?= number_format($nilai['total_harga'] / $nilai['qty']); ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Supplier</label>
                        <div class="input-group">
                            <div class="form-control form-control-lg"><?= $nilai['nama_supplier']; ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alasan">Alasan return barang</label>
                        <div class="input-group">
                            <select required id="alasan" name="alasan" class="form-control form-control-lg text-center" type="text">
                                <option value="">-- Pilih Alasan --</option>
                                <option value="1">Cacat fisik</option>
                                <option value="2">Salah type</option>
                                <option value="3">Lainnya</option>
                            </select </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-right">Jumlah</label>
                        <div class="input-group">
                            <div class="col-10"></div>
                            <div class="col-2">
                                <input autocomplete="off" name="qty" id="qty" class="form-control form-control-lg text-center" type="number" value="1" min="1" max="<?= $nilai['qty']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
                    <!-- <a href="<? //= base_url('ReturnBarang/ReturnBarangPenjualan/' . $nilai['kode_produk']) . '/' . $no_faktur.'/'. 
                                    ?>" class="btn btn-danger btn-flat">Return</a> -->
                    <button type="submit" class="btn btn-danger btn-flat">Return</button>
                </div>
                <?= form_close(); ?>
                <!-- end Form -->

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->