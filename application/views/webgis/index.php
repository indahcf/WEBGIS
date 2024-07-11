<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading"> Pemetaan Lokasi Sekolah</div>
            <div class="panel-body">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>
</div>

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