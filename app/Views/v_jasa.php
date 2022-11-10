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

            <table id="example1" class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th width="70px">#</th>
                        <th width="130px">Kode Jasa</th>
                        <th>Nama Jasa</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga Modal</th>
                        <th>Harga Jual</th>
                        <th width="100px">Stok</th>
                        <th width="100px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($jasa as $key => $nilai) { ?>
                        <tr>
                            <td class="text-center"><b><?= $no++; ?></b></td>
                            <td class="text-center"><?= $nilai['kode_jasa']; ?></td>
                            <td><?= $nilai['nama_jasa']; ?></td>
                            <td class="text-center"><?= $nilai['nama_kategori']; ?></td>
                            <td class="text-center"><?= $nilai['nama_satuan']; ?></td>
                            <td class="text-right">Rp<?= number_format($nilai['harga_modal'], 0); ?></td>
                            <td class="text-right">Rp<?= number_format($nilai['harga_jual'], 0); ?></td>
                            <td class="text-center"><?= number_format($nilai['stok']); ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#edit-data<?= $nilai['id_jasa'] ?>"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-data<?= $nilai['id_jasa'] ?>"><i class="fas fa-trash"></i></button>
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
            <?= form_open('Jasa/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kode Jasa</label>
                    <input type="text" name="kode_jasa" class="form-control" placeholder="Kode Jasa" required autofocus value="<?= old('kode_jasa'); ?>">
                </div>
                <div class="form-group">
                    <label for="">Nama Jasa</label>
                    <input type="text" name="nama_jasa" class="form-control" placeholder="Nama Jasa" required value="<?= old('nama_jasa'); ?>">
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="id_kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $key => $kat) { ?>
                            <option value="<?= $kat['id_kategori']; ?>"><?= $kat['nama_kategori']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Satuan</label>
                    <select name="id_satuan" class="form-control" required>
                        <option value="">-- Pilih Satuan --</option>
                        <?php foreach ($satuan as $key => $sat) { ?>
                            <option value="<?= $sat['id_satuan']; ?>"><?= $sat['nama_satuan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Harga Modal</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input id="harga_modal" name="harga_modal" type="text" class="form-control" placeholder="Harga Modal" required value="<?= old('harga_modal'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input id="harga_jual" name="harga_jual" type="text" class="form-control" placeholder="Harga Jual" required value="<?= old('harga_jual'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Stok</label>
                    <input id="stok" type="text" name="stok" class="form-control" placeholder="Stok" required value="<?= old('stok'); ?>">
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
<?php
foreach ($jasa as $key => $nilai) { ?>
    <div class="modal fade" id="edit-data<?= $nilai['id_jasa'] ?>">
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
                <?= form_open('Jasa/UpdateData/' . $nilai['id_jasa']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode Jasa</label>
                        <input value="<?= $nilai['kode_jasa']; ?>" type="text" name="kode_jasa" class="form-control" placeholder="Kode Jasa" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Jasa</label>
                        <input type="text" name="nama_jasa" class="form-control" placeholder="Nama Jasa" required value="<?= $nilai['nama_jasa'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="id_kategori" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($kategori as $key => $kat) { ?>
                                <option value="<?= $kat['id_kategori']; ?>" <?= $nilai['id_kategori'] == $kat['id_kategori'] ? 'selected' : '' ?>><?= $kat['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Satuan</label>
                        <select name="id_satuan" class="form-control" required>
                            <option value="">-- Pilih Satuan --</option>
                            <?php foreach ($satuan as $key => $sat) { ?>
                                <option value="<?= $sat['id_satuan']; ?>" <?= $nilai['id_satuan'] == $sat['id_satuan'] ? 'selected' : '' ?>><?= $sat['nama_satuan']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Modal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input id="harga_modal<?= $nilai['id_jasa']; ?>" name="harga_modal" type="text" class="form-control" placeholder="Harga Modal" required value="<?= $nilai['harga_modal']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Jual</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input id="harga_jual<?= $nilai['id_jasa']; ?>" name="harga_jual" type="text" class="form-control" placeholder="Harga Jual" required value="<?= $nilai['harga_jual']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input id="stok<?= $nilai['id_jasa'] ?>" type="text" name="stok" class="form-control" placeholder="Stok" required value="<?= $nilai['stok'] ?>">
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
<?php } ?>
<!-- /.modal -->

<!-- Modal Hapus Data -->
<?php foreach ($jasa as $key => $nilai) { ?>
    <div class="modal fade" id="delete-data<?= $nilai['id_jasa'] ?>">
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
                    <h5>Yakin akan menghapus <b><?= $nilai['nama_jasa']; ?></b>?</h5>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('Jasa/DeleteData/' . $nilai['id_jasa']) ?>" class="btn btn-danger btn-flat">Hapus</a>
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
    // DataTables
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
            "info": true,
            "ordering": false,
            "buttons": ["excel", "pdf", "print", ]
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

    // AutoNumeric
    new AutoNumeric('#harga_modal', {
        // currencySymbol: ''
        digitalGroupSeparator: ',',
        decimalPlaces: 0,
    });
    new AutoNumeric('#harga_jual', {
        currencySymbol: '',
        digitalGroupSeparator: ',',
        decimalPlaces: 0,
    });
    new AutoNumeric('#stok', {
        currencySymbol: '',
        digitalGroupSeparator: ',',
        decimalPlaces: 0,
    });

    <?php
    foreach ($jasa as $key => $nilai) { ?>
        new AutoNumeric('#harga_modal<?= $nilai['id_jasa'] ?>', {
            // currencySymbol: ''
            digitalGroupSeparator: ',',
            decimalPlaces: 0,
        });
        new AutoNumeric('#harga_jual<?= $nilai['id_jasa'] ?>', {
            currencySymbol: '',
            digitalGroupSeparator: ',',
            decimalPlaces: 0,
        });
        new AutoNumeric('#stok<?= $nilai['id_jasa'] ?>', {
            currencySymbol: '',
            digitalGroupSeparator: ',',
            decimalPlaces: 0,
        });
    <?php } ?>
</script>