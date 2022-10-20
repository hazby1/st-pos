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

            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th width="70px">#</th>
                        <th>Kategori</th>
                        <th width="100px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $key => $nilai) { ?>
                        <tr>
                            <td class="text-center"><b><?= $no++; ?></b></td>
                            <td><?= $nilai['nama_kategori']; ?></td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#edit-data<?= $nilai['id_kategori'] ?>"></i></button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-data<?= $nilai['id_kategori'] ?>"><i class="fas fa-trash"></i></button>
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
            <?= form_open('Kategori/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Kategori" required autofocus>
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
<?php foreach ($kategori as $key => $nilai) { ?>
    <div class="modal fade" id="edit-data<?= $nilai['id_kategori'] ?>">
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
                <?= form_open('Kategori/UpdateData/' . $nilai['id_kategori']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input value="<?= $nilai['nama_kategori'] ?>" type="text" name="nama_kategori" class="form-control" placeholder="Kategori" required autofocus>
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
<?php foreach ($kategori as $key => $nilai) { ?>
    <div class="modal fade" id="delete-data<?= $nilai['id_kategori'] ?>">
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
                    <h5>Yakin akan menghapus <b><?= $nilai['nama_kategori']; ?></b>?</h5>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('kategori/DeleteData/' . $nilai['id_kategori']) ?>" class="btn btn-danger btn-flat">Hapus</a>
                </div>
                <!-- end Form -->

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal -->