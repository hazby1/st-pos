<div class="col-md-12">
    <div class="card card-red">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>
            <div class="card-tools">
                <button onclick="NewWin=window.open('<?= base_url('laporan/CetakProduk') ?>', 'NewWin', 'width=1500')" type="button" class="btn btn-tool"><i class="fas fa-print"></i> <span> Cetak</span>
                </button>
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah-data"><i class="fas fa-plus"></i> <span> Servis Masuk</span>
                </button>
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah-pelanggan"><i class="fas fa-user-plus"></i> <span>Tambah Pelanggan</span>
            </div>
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

        <table id="example1" class="table table-sm table-striped table-bordered table-hover text-sm">
            <thead class="text-center">
                <tr>
                    <th width="60px">#</th>
                    <th width="130px">No Servis</th>
                    <th>Penerima</th>
                    <th>Tanggal Masuk</th>
                    <th>Pemilik</th>
                    <th>Nama Barang</th>
                    <th>No Seri</th>
                    <th>Kelengkapan</th>
                    <th>Kerusakan</th>
                    <th>Status</th>
                    <th width="140px">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($servis as $key => $nilai) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $nilai['no_servis']; ?></td>
                        <td><?= $nilai['nama_user']; ?></td>
                        <td><?= $nilai['tgl_masuk']; ?></td>
                        <td><?= $nilai['nama_pelanggan']; ?></td>
                        <td><?= $nilai['nama_kategori'] . ' ' . $nilai['merk'] . ' ' . $nilai['type']; ?></td>
                        <td><?= $nilai['sn']; ?></td>
                        <td><?= $nilai['kelengkapan']; ?></td>
                        <td><?= $nilai['kerusakan']; ?></td>
                        <td><?= ucfirst($nilai['status']); ?></td>
                        <td class="text-center">
                            <button class="btn btn-xs btn-success" data-placement="top" title="Cetak tanda terima">
                                <i class="fas fa-print"></i>
                            </button>
                            <button class="btn btn-xs btn-warning" data-placement="top" title="Edit" data-toggle="modal" data-target="#edit-data">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-xs btn-danger" data-placement="top" title="Hapus" data-toggle="modal" data-target="#delete-data">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="btn btn-xs btn-primary" data-toggle="modal" data-placement="top" title="Bisa diambil" data-target="#ubah-status<?= $nilai['id_servis'] ?>">
                                <i class="fa fa-share"></i>
                            </button>
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
                <h4 class="modal-title">Tambah Data <?= $judul; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Form -->
            <?= form_open('Servis/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">No Servis</label>
                    <label type="text" name="no_servis" class="form-control" required value="<?= $no_servis ?>"><?= $no_servis ?></label>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Masuk</label>
                    <label type="date" name="tgl_masuk" class="form-control" required value="<?= date('Y-m-d') ?>"><?= date('Y-m-d') ?></label>
                </div>
                <div class="form-group">
                    <label for="">Pemilik</label>
                    <select name="pemilik" class="form-control" required>
                        <option value="">-- Nama Pemilik --</option>
                        <?php foreach ($pelanggan as $key => $pel) { ?>
                            <option value="<?= $pel['id_pelanggan']; ?>"><?= $pel['nama_pelanggan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <input hidden type="text" name="penerima" class="form-control" required value="<?= session('id_user'); ?>">
                </div>
                <div class="form-group">
                    <input hidden type="text" name="status" class="form-control" required value="proses">
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="">-- Kategori --</option>
                        <?php foreach ($kategori as $key => $pel) { ?>
                            <option value="<?= $pel['id_kategori']; ?>"><?= $pel['nama_kategori']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Merk</label>
                    <input type="text" name="merk" class="form-control" placeholder="Asus" required value="<?= old('merk'); ?>">
                </div>
                <div class="form-group">
                    <label for="">Type</label>
                    <input type="text" name="type" class="form-control" placeholder="X455LD" required value="<?= old('type'); ?>">
                </div>
                <div class="form-group">
                    <label for="">Serial Number</label>
                    <input type="text" name="sn" class="form-control" placeholder="5DH125" required value="<?= old('sn'); ?>">
                </div>
                <div class="form-group">
                    <label for="">Kelengkapan</label>
                    <input type="text" name="kelengkapan" class="form-control" placeholder="Charger, Battery, dll." required value="<?= old('kelengkapan'); ?>">
                </div>
                <div class="form-group">
                    <label for="">Kerusakan</label>
                    <input type="text" name="kerusakan" class="form-control" placeholder="Ganti Keyboard" required value="<?= old('kerusakan'); ?>">
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

<!-- Modal Ubah Status -->
<?php
foreach ($servis as $key => $nilai) { ?>
    <div class="modal fade" id="ubah-status<?= $nilai['id_servis'] ?>">
        <!-- Modal Dialog -->
        <div class="modal-dialog">
            <!-- Modal Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Status <?= $subjudul; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Form -->
                <?= form_open('Servis/KeBisaDiambil/' . $nilai['id_servis']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">No Servis</label>
                        <input value="<?= $nilai['no_servis']; ?>" type="text" name="no_servis" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Pemilik</label>
                        <input type="text" name="pemilik" class="form-control" required readonly value="<?= $nilai['nama_pelanggan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control" required readonly value="<?= $nilai['nama_kategori'] . " " . $nilai['merk'] . " " . $nilai['type'] ?>">
                    </div>
                    <div class="form-group">
                        <select hidden name="id_kategori" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($kategori as $key => $kat) { ?>
                                <option value="<?= $kat['id_kategori']; ?>" <?= $nilai['id_kategori'] == $kat['id_kategori'] ? 'selected' : '' ?>><?= $kat['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Penanganan</label>
                        <select onchange="myFunction(this.value)" id="penanganan" name="penanganan" class="form-control" required>
                            <option value="">-- Pilih Penanganan --</option>
                            <?php foreach ($jasa as $key => $jas) { ?>
                                <option value="<?= $jas['id_jasa']; ?>"><?= $jas['nama_jasa']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Biaya</label>
                        <p id="biaya" type="text" name="biaya" class="form-control" required readonly></p>
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

<!-- Modal Tambah Data Pelanggan -->
<div class="modal fade" id="tambah-pelanggan">
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
            <?= form_open('Pelanggan/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Pelanggan" required autofocus>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="alamat" name="alamat" class="form-control" placeholder="Alamat" required>
                </div>
                <div class="form-group">
                    <label for="no_hp">No Handphone</label>
                    <input type="no_hp" name="no_hp" class="form-control" placeholder="No Handphone" required>
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

<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("penanganan").value;
        console.log(x + "h");

        document.getElementById("biaya").innerHTML = "Rp" + x;
    }
</script>