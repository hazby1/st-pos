<div class="col-md-12">
    <div class="card card-red">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul; ?></h3>
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

            <?php echo form_open('Admin/UpdateSetting') ?>
            <div class="form-group">
                <label for="">Nama Toko</label>
                <input type="text" name="nama_toko" class="form-control" required autofocus value="<?= $setting['nama_toko']; ?>">
            </div>
            <div class="form-group">
                <label for="">Slogan</label>
                <input type="text" name="slogan" class="form-control" required value="<?= $setting['slogan']; ?>">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" class="form-control" required value="<?= $setting['alamat']; ?>">
            </div>
            <div class="form-group">
                <label for="">No. Telepon</label>
                <input type="text" name="no_telepon" class="form-control" required value="<?= $setting['no_telepon']; ?>">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea rows="3" name="deskripsi" class="form-control"><?= $setting['deskripsi']; ?></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-flat btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>

    </div>

</div>