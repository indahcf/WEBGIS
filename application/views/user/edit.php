<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
                <?php
                //validasi data tidak boleh kosong
                echo validation_errors('<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>', '</div>');

                //notifikasi pesan data berhasil disimpan
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }

                echo form_open('user/edit/' . $data_user->id);
                ?>

                <div class="form-group">
                    <label class="text-dark">Nama User</label>
                    <input name="name" placeholder="Nama User" value="<?= $data_user->name ?>" class="form-control" />
                </div>

                <div class="form-group">
                    <label class="text-dark">Email</label>
                    <input name="email" placeholder="Email" value="<?= $data_user->email ?>" class="form-control" />
                </div>

                <div class="form-group">
                    <label class="text-dark">Ganti Password</label>
                    <input type="password" name="password" placeholder="Ganti Password" value="" class="form-control" />
                </div>

                <div class="form-group">
                    <label></label>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    <button type="submit" class="btn btn-sm btn-success">Reset</button>
                </div>

                <?php echo form_close() ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->