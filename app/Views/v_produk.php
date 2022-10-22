<div class="col-md-12">
    <div class="card card-red">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah-data"><i class="fas fa-plus"></i> <span>Tambah Data</span>
                </button>
            </div>

        </div>

        <div class="card-body">

            <!-- Alert -->
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>
            <!-- end Alert -->

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
                        <th width="100px">Stok</th>
                        <th width="100px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($produk as $key => $nilai) { ?>
                        <tr>
                            <td class="text-center"><b><?= $no++; ?></b></td>
                            <td class="text-center"><?= $nilai['kode_produk']; ?></td>
                            <td><?= $nilai['nama_produk']; ?></td>
                            <td class="text-center"><?= $nilai['nama_kategori']; ?></td>
                            <td class="text-center"><?= $nilai['nama_satuan']; ?></td>
                            <td class="text-right">Rp<?= number_format($nilai['harga_beli'], 0); ?></td>
                            <td class="text-right">Rp<?= number_format($nilai['harga_jual'], 0); ?></td>
                            <td class="text-center"><?= number_format($nilai['stok']); ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#edit-data<?= $nilai['id_produk'] ?>"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-data<?= $nilai['id_produk'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambah-data">
    <!-- Modal Dialog -->
    <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data <?= $subjudul; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Form -->
            <?= form_open('Produk/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kode Produk</label>
                    <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" required autofocus>
                </div>
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                        <option value=""><?= $nilai['nama_kategori']; ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Satuan</label>
                    <select name="satuan" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input name="harga_beli" type="text" class="form-control" placeholder="Harga Beli">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input name="harga_jual" type="text" class="form-control" placeholder="Harga Jual">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Stok</label>
                    <input type="text" name="stok" class="form-control" placeholder="Stok" required>
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            </div>
            <?= form_close(); ?>
            <!-- end Form -->

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal Edit Data -->
<?php foreach ($produk as $key => $nilai) { ?>
    <div class="modal fade" id="edit-data<?= $nilai['id_produk'] ?>">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <?= form_open('Produk/UpdateData/' . $nilai['id_produk']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input value="<?= $nilai['nama_produk'] ?>" type="text" name="nama_produk" class="form-control" placeholder="Produk" required autofocus>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning btn-flat">Simpan</button>
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

<!-- Modal Hapus Data -->
<?php foreach ($produk as $key => $nilai) { ?>
    <div class="modal fade" id="delete-data<?= $nilai['id_produk'] ?>">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $subjudul; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <div class="modal-body">
                    <h5>Yakin akan menghapus <b><?= $nilai['nama_produk']; ?></b>?</h5>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('produk/DeleteData/' . $nilai['id_produk']) ?>" class="btn btn-danger btn-flat">Hapus</a>
                </div>
                <!-- end Form -->

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
            "info": true,
            "ordering": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        // $("#example2").DataTable({
        //     "paging": true,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        //     "responsive": true,
        // })
    })
</script>