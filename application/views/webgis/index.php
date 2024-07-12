<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="hero-bg">
            <img src="<?php echo base_url('front_end/assets/img/hero-bg-light.webp'); ?>" alt="">
        </div>
        <div class="container text-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1>Welcome to <span>WebGIS</span></h1>
                <p data-aos-delay="100">Pemetaan Sekolah di Purwokerto<br></p>
                <img src="<?php echo base_url('front_end/assets/img/hero-services-img.webp'); ?>" class="img-fluid hero-img" alt="" data-aos-delay="300">
            </div>
        </div>
    </section><!-- /Hero Section -->
    <!-- Section Title -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container section-title">
            <h2>Pemetaan</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-12 content" data-aos-delay="100">
                    <!-- <div class="row">
    <div class="col-sm-12"> -->
                    <div class="panel panel-primary">
                        <!-- <div class="panel-heading"> Pemetaan Lokasi Sekolah</div> -->
                        <div class="panel-body">
                            <div id="map" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script>
        navigator.geolocation.getCurrentPosition(function(location) {
            var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

            //map view
            console.log(location.coords.latitude, location.coords.longitude);

            var map = L.map('map').setView([-7.4224768, 109.233094], 14); // Adjusted initial view

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            <?php foreach ($sekolah as $key => $value) { ?>
                L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>]).addTo(map)
                    .bindPopup("<img src='<?= base_url('gambar/' . $value->gambar) ?>' width='100%'>" +
                        "<b>Nama Sekolah : <?= $value->nama_sekolah ?></b><br/>" +
                        "Alamat : <?= $value->alamat ?></br>" +
                        "Status : <?= $value->status_sekolah ?></br>" +
                        "Ket : <?= $value->ket ?></br>" +
                        "<a href='<?= base_url('webgis/detail/' . $value->id_sekolah) ?>' class='btn btn-sm btn-default'>Detail</a>" +
                        "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                        location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value->latitude ?>,<?= $value->longitude ?>' class='btn btn-sm btn-default' target='_blank'>Rute</a>");
            <?php } ?>

            // Add location control
            L.control.locate({
                strings: {
                    title: "Show me where I am, yo!"
                }
            }).addTo(map);
        });
    </script>

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title">
            <h2>Sekolah</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row justify-content-between">

                <div class="col-lg-12">

                    <div>
                        <table id="sekolah" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sekolah</th>
                                    <th>Alamat</th>
                                    <th>Status Sekolah</th>
                                    <th>Kepala Sekolah</th>
                                    <th>Keterangan</th>
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
                                        <td><?= $value->ket ?></td>
                                        <td><a href="<?= base_url('webgis/detail/' . $value->id_sekolah) ?>" class="btn btn-sm btn-success">Detail</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <script>
                            $(document).ready(function() {
                                $('#sekolah').DataTable({
                                    'scrollX': true
                                });
                            });
                        </script>
                    </div><!-- End Tab Nav -->
                </div>
            </div>
        </div>
    </section><!-- /Features Section -->
</main>