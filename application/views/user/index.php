<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-sm-12">
        <?php
        //notifikasi pesan data berhasil disimpan
        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>';
            echo $this->session->flashdata('pesan');
            echo '
            </div>';
        }
        ?>

        <table class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($data_user as $value) { ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value->name ?></td>
                        <td><?= $value->email ?></td>
                        <td>
                            <a href="<?= base_url('user/edit/' . $value->id) ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
                            <a href="<?= base_url('user/hapus/' . $value->id) ?>" class="btn btn-sm btn-danger mb-1" onClick="return confirm('Apakah Data Ingin Dihapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->