<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div id="map" style="height: 400px;"></div>

    <script>
        var map = L.map('map').setView([-7.423843, 109.243012], 14);

        var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {

            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
        }).addTo(map);

        <?php foreach ($sekolah as $key => $value) { ?>
            L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>]).addTo(map)
                .bindPopup("<b>Nama Sekolah : <?= $value->nama_sekolah ?></b><br/>" +
                    "Alamat : <?= $value->alamat ?></br>" +
                    "Status : <?= $value->status_sekolah ?></br>" +
                    "Ket : <?= $value->ket ?></br>");
        <?php } ?>
    </script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->