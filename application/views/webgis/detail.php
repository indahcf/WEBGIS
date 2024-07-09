<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading"> Lokasi Sekolah</div>
            <div class="panel-body">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading"> Gambar Sekolah</div>
            <div class="panel-body">
                <img src="<?= base_url('gambar/' . $sekolah->gambar) ?>" width="100%" height="400px">
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading"> Data Sekolah</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="200px">Nama Sekolah</th>
                            <th width="50px">:</th>
                            <td><?= $sekolah->nama_sekolah ?></td>
                        </tr>
                        <tr>
                            <th width="200px">Alamat</th>
                            <th width="50px">:</th>
                            <td><?= $sekolah->alamat ?></td>
                        </tr>
                        <tr>
                            <th>Status Sekolah</th>
                            <th>:</th>
                            <td><?= $sekolah->status_sekolah ?></td>
                        </tr>
                        <tr>
                            <th>Latitude</th>
                            <th>:</th>
                            <td><?= $sekolah->latitude ?></td>
                        </tr>
                        <tr>
                            <th>Longitude</th>
                            <th>:</th>
                            <td><?= $sekolah->longitude ?></td>
                        </tr>
                        <tr>
                            <th>Kepala Sekolah</th>
                            <th>:</th>
                            <td><?= $sekolah->kepala_sekolah ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <th>:</th>
                            <td><?= $sekolah->ket ?></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var map = L.map('map').setView([<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>], 20);

    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {

        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
    }).addTo(map);

    L.marker([<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>]).addTo(map)
        .bindPopup("<img src='<?= base_url('gambar/' . $sekolah->gambar) ?>' width='100%'>" +
            "<b>Nama Sekolah : <?= $sekolah->nama_sekolah ?></b><br/>" +
            "Alamat : <?= $sekolah->alamat ?></br>" +
            "Status : <?= $sekolah->status_sekolah ?></br>" +
            "Ket : <?= $sekolah->ket ?></br>").openPopup();;
</script>