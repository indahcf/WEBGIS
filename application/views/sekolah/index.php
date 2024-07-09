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
            echo '</div>';
        }
        ?>
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sekolah</th>
                    <th>Alamat</th>
                    <th>Status Sekolah</th>
                    <th>Kepala Sekolah</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($sekolah as $key => $value) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value->nama_sekolah ?></td>
                        <td><?= $value->alamat ?></td>
                        <td><?= $value->status_sekolah ?></td>
                        <td><?= $value->kepala_sekolah ?></td>
                        <td><img src="<?= base_url('gambar/' . $value->gambar) ?>" width="80px"></td>
                        <td>
                            <a href="<?= base_url('sekolah/edit/' . $value->id_sekolah) ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
                            <a href="<?= base_url('sekolah/hapus/' . $value->id_sekolah) ?>" class="btn btn-sm btn-danger mb-1" onClick="return confirm('Apakah Data Ingin Dihapus?')">Hapus</a>
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