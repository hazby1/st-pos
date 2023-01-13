<div class="col-md-12">
    <div class="card card-red">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>
            <div class="card-tools">
                <button onclick="NewWin=window.open('<?= base_url('laporan/CetakProduk') ?>', 'NewWin', 'width=1500')" type="button" class="btn btn-tool"><i class="fas fa-print"></i> <span> Cetak</span>
                </button>
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah-data"><i class="fas fa-plus"></i> <span> Servis Masuk</span>
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
                        <th>Biaya</th>
                        <th>Penanganan</th>
                        <th>Status</th>
                        <th width="110px">Opsi</th>
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
                            <td><?= $nilai['merk'] . ' ' . $nilai['type']; ?></td>
                            <td><?= $nilai['sn']; ?></td>
                            <td><?= $nilai['kelengkapan']; ?></td>
                            <td><?= $nilai['kerusakan']; ?></td>
                            <td><?= $nilai['biaya']; ?></td>
                            <td><?= $nilai['penanganan']; ?></td>
                            <td><?= ucfirst($nilai['status']); ?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-warning"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#edit-data"></i></button>
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-data"><i class="fas fa-trash"></i></button>
                                <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#ubah-status<?= $nilai['id_servis'] ?>"><i class="fa fa-share"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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
                <?= form_open('Servis/KeSudahDiambil/' . $nilai['id_servis']) ?>
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
                        <input type="text" class="form-control" value="<?= $nilai['biaya']; ?>">
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