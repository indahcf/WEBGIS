<!-- Services Section -->
<section id="services" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title">
        <h2>Detail Sekolah</h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row mt-1">
            <div class="col-lg-6" data-aos-delay="300">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>
                            Lokasi Sekolah
                        </h5>
                    </div>
                    <div class="panel-body">
                        <div id="map" style="height: 400px;"></div>
                    </div>
                </div>
            </div><!-- End Google Maps -->

            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>
                            Gambar Sekolah
                        </h5>
                    </div>
                    <div class="panel-body">
                        <img src="<?= base_url('gambar/' . $sekolah->gambar) ?>" width="100%" height="400px">
                    </div>
                </div>
            </div><!-- End Contact Form -->
        </div>

        <div class="row gy-4 mt-1">
            <div class="col-lg-12" data-aos-delay="300">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Data Sekolah</h5>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered" width="100%">
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
            </div><!-- End Google Maps -->
        </div>
    </div>

</section><!-- /Services Section -->

<script>
    var map = L.map('map').setView([<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>], 20);

    var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {

        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        id: 'mapbox/streets-v11',
    }).addTo(map);

    L.marker([<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>]).addTo(map)
        .bindPopup("<img src='<?= base_url('gambar/' . $sekolah->gambar) ?>' width='100%'>" +
            "<b>Nama Sekolah : <?= $sekolah->nama_sekolah ?></b><br/>" +
            "Alamat : <?= $sekolah->alamat ?></br>" +
            "Status : <?= $sekolah->status_sekolah ?></br>" +
            "Ket : <?= $sekolah->ket ?></br>").openPopup();;
</script>

<!-- <div class="row">
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
</div>-->