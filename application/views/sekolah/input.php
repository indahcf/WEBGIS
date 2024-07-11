<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lokasi Sekolah</h6>
                </div>
                <div class="card-body">
                    <div id="map" style="height: 500px;"></div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Sekolah</h6>
                </div>
                <div class="card-body">
                    <?php
                    //notifikasi gagal upload gambar
                    if (isset($error_upload)) {
                        echo '<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>' . $error_upload . '</div>';
                    }
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

                    echo form_open_multipart('sekolah/input');
                    ?>

                    <div class="form-group">
                        <label class="text-dark">Nama Sekolah</label>
                        <input name="nama_sekolah" placeholder="Nama Sekolah" value="<?= set_value('nama_sekolah') ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Alamat</label>
                        <input name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Status Sekolah</label>
                        <select name="status_sekolah" class="form-control">
                            <option value="">--Pilih Status Sekolah--</option>
                            <option value="Negeri">Negeri</option>
                            <option value="Swasta">Swasta</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Kepala Sekolah</label>
                        <input name="kepala_sekolah" placeholder="Kepala Sekolah" value="<?= set_value('kepala_sekolah') ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Latitude</label>
                        <input id="Latitude" name="latitude" placeholder="Latitude" value="<?= set_value('latitude') ?>" class="form-control" readonly />
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Longitude</label>
                        <input id="Longitude" name="longitude" placeholder="Longitude" value="<?= set_value('longitude') ?>" class="form-control" readonly />
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Keterangan</label>
                        <input name="ket" placeholder="Keterangan" value="<?= set_value('ket') ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label class="text-dark">Gambar</label>
                        <input type="file" name="gambar" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label></label>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <button type="submit" class="btn btn-sm btn-success">Reset</button>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        var curLocation = [0, 0];
        if (curLocation[0] == 0 && curLocation[1] == 0) {
            curLocation = [-7.423843, 109.243012];
        }

        var mymap = L.map('map').setView([-7.4224768, 109.233094], 14);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            id: 'mapbox/streets-v11'
        }).addTo(mymap);

        mymap.attributionControl.setPrefix(false);
        var marker = new L.marker(curLocation, {
            draggable: 'true'
        }).addTo(mymap);

        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            $("#Latitude").val(position.lat);
            $("#Longitude").val(position.lng).keyup();
        });

        $("#Latitude, #Longitude").change(function() {
            var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            mymap.panTo(position);
        });
        mymap.addLayer(marker);
    </script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->