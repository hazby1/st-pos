<div class="col-md-12">
    <div class="card card-red">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>

        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Card Body -->
                <div class="card-body">

                    <?php
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                        <div class="alert alert-danger alert-dismissible">
                            <h4>Periksa lagi data yang anda masukkan!</h4>
                            <ul>
                                <?php foreach ($errors as $key => $error) { ?>
                                    <li><?= esc($error) ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <!-- end Alert -->

                    <div class="row">
                        <div class="col-7"></div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Nota Beli</label>
                                <label for="" class="form-control"><?= $nota_beli; ?></label>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <label for="" class="form-control"><?= date('d M Y'); ?></label>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="">Kasir</label>
                                <label class="form-control"><?= session()->get('nama_user'); ?></label>
                            </div>
                        </div>
                    </div>
                    <?php echo form_open('pembelian/insertcart') ?>
                    <div class="row">
                        <div class="col-3">
                            <div class="input-group">
                                <input name="kode_produk" id="kode_produk" class="form-control" autofocus placeholder="Kode Produk">
                                <span class="input-group-append">
                                    <a data-toggle="modal" data-target="#cari-produk" class="btn btn-sm btn-primary "><i class="fas fa-search"></i></a>
                                    <button type="reset" class="btn btn-sm btn-danger "><i class="fas fa-times"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input name="nama_produk" id="nama_produk" class="form-control" readonly placeholder="Nama Produk">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="harga" id="harga" class="form-control text-right" placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <input name="qty" id="qty" class="text-center form-control text-right" type="number" min="1" value="1">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm text-xs btn-primary"><i class="fas fa-cart-plus"></i> Tambah</button>
                                <a href="<?= base_url('pembelian/ResetCart'); ?>" class="btn btn-sm text-xs btn-warning"><i class="fas fa-sync"></i> Bersihkan</a>
                                <a data-target="#simpan" data-toggle="modal" class="btn btn-sm text-xs btn-success" onclick="Simpan()"><i class="fas fa-cash-register"></i> Simpan</a>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                    <hr>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>QTY</th>
                                    <th>Sub Total</th>
                                    <th width="50px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cart as $key => $nilai) { ?>
                                    <tr>
                                        <td><?= $nilai['id']; ?></td>
                                        <td><?= $nilai['option']['nama_kategori'] . ' ' . $nilai['name']; ?></td>
                                        <td>Rp<?= number_format($nilai['price'], 0); ?></td>
                                        <td><?= $nilai['qty'] . $nilai['option']['nama_satuan']; ?></td>
                                        <td><?= number_format($nilai['subtotal'], 0); ?></td>
                                        <td>
                                            <a href="<?= base_url('Pembelian/RemoveItemCart/' . $nilai['rowid']); ?>" class="btn btn-danger btn-xs"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Alert -->
                    <div class="row">
                        <div class="col-12">
                            <?php
                            $faktursimpan = $nota_beli - 1;
                            if (session()->getFlashdata('pesan')) {
                                echo  '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>';
                                echo session()->getFlashdata('pesan');
                                echo '
                    <input hidden id="faktursimpan" name="faktursimpan" value="' . $faktursimpan . '">
                    <button class="btn btn-sm btn-primary float-right" onclick="CetakPembelian()">Cetak Nota</button>
                    </div>';
                            } ?>
                        </div>
                    </div>
                    <!-- end Alert -->
                </div>
                <!-- Card Body -->
            </div>
        </div>


        <!-- Modal Cari Produk -->
        <div class="modal fade" id="cari-produk">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Daftar Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="example1" class="table table-striped table-bordered table-hover text-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th width="120px">Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th width="100px">Harga</th>
                                    <th width="100px">Stok</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($produk as $key  => $nilai) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $nilai['kode_produk']; ?></td>
                                        <td><?= $nilai['nama_produk']; ?></td>
                                        <td class="text-right">Rp<?= number_format($nilai['harga_jual']); ?>.-</td>
                                        <td><?= $nilai['stok']; ?></td>
                                        <td class="text-center">
                                            <button onclick="PilihProduk(<?= $nilai['kode_produk']; ?>)" href="" class="btn btn-success btn-xs">Pilih</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal Bayar -->
        <div class="modal fade" id="simpan">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Simpan Pembelian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('Pembelian/SimpanTransaksi') ?>
                        <div class="form-group">
                            <label for="">Grand Total</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input id="grand_total" name="grand_total" class="form-control form-control-lg text-right text-danger" value="<?= number_format($grand_total); ?>" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Supplier</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tn/Ny</span>
                                </div>
                                <select required id="supplier" name="supplier" class="form-control form-control-lg text-center" type="text" value="">
                                    <option value="">-- Pilih Supplier --</option>
                                    <?php foreach ($supplier as $key => $sup) { ?>
                                        <option value="<?= $sup['id_supplier']; ?>"><?= $sup['nama_supplier']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Bayar</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </div>

</div>

<script>
    $(document).ready(function() {
        $('#kode_produk').focus();

        $('#kode_produk').keydown(function(e) {
            let kode_produk = $('#kode_produk').val();
            if (e.keyCode == 13) {
                e.preventDefault();
                if (kode_produk == '') {
                    Swal.fire('Kode Produk harus diisi!');
                } else {
                    CekProduk();
                }
            }
        })
    });

    function CekProduk() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Pembelian/CekProduk') ?>",
            data: {
                kode_produk: $('#kode_produk').val(),
            },
            dataType: "JSON",
            success: function(response) {
                if (response.nama_produk == '') {
                    Swal.fire('Kode produk tidak terdaftar!');
                } else {
                    $('[name="nama_produk"]').val(response.nama_produk);
                    $('#harga').focus();
                }
            }
        });
    }

    function PilihProduk(kode_produk) {
        $('#kode_produk').val(kode_produk);
        $('#cari-produk').modal('hide');
        $('#kode_produk').focus();
    }

    function Pembayaran() {
        $('#pembayaran').modal('show');
    }

    // DataTables
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "paging": true,
            "info": false,
            "ordering": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    //Cetak Nota
    function CetakPembelian() {
        let faktursimpan = $('#faktursimpan').val();
        if (faktursimpan == '') {
            Swal.fire('Nomor Faktur tidak valid!');
        } else {
            NewWin = window.open("<?= base_url('Laporan/CetakPembelian'); ?>/" + faktursimpan, "NewWin", "width=1500")
        }
    }
</script>