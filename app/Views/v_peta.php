<div class="page-heading">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</div>
<div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <p class="text-subtitle text-muted">Peta ini berisikan bahaya, kerentanan, dan risiko tsunami, serta lokasi dari titik evakuasi.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Home">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $judul ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
		<div class="row">
			<div class="col-lg-12 col-md-6">
				<div class="card">
					<div class="card-body">
                    <div id="map" style="width: 100%; height: 100vh; position: relative; z-index: 1;"></div>
					</div>
				</div>
			</div>
		</div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                          <h4>Metode Penyusunan Bahaya Tsunami</h4>
                    </div>
                    <div class="card-body">
                        <p class="justify-text">Peta bahaya tsunami pada penelitian ini diperoleh dari pemodelan penggenangan/ inundasi tsunami berdasarkan ketinggian gelombang maksimum yang tiba di pantai. 
                            Pemodelan ini dilakukan menggunakan metode Hloss oleh Berryman (2006). Parameter yang digunakan adalah koefisien kekasaran, tinggi gelombang tsunammi, dan lereng permukaan. 
                            Data yang digunakan sebagai penyusunan peta bahaya tsunami adalah Data DSM di Gumuk Pasir Paranggtritis tahun 2022 dengan resolusi spasial 30cm yang bersumber dari PGSP, data DEMNAS skala 1:50.000 dengan resolusi spasial 0.27 arsecond yang bersumber dari BIG, dan peta penggunaan lahan skala 1:5.000 yang bersumber dari PGSP.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                          <h4>Metode Penyusunan Kerentanan Tsunami</h4>
                    </div>
                    <div class="card-body">
                        <p class="justify-text">Peta kerentanan tsunami disusun dengan menggunakan metode skoring yang mengacu pada Perka BNPB No.2 Tahun 2012. Parameter yang digunakan diantaranya adalah kerentanan sosial, kerentanan fisik, kerentanan ekonomi, dan kerentanan lingkungan. Skor masing-masing parameter kerentanan mengacu pada Perka BNPB No. 2 Tahun 2012.</p>
                        <p>Parameter kerentanan sosial adalah kepadatan penduduk dan kelompok rentan. Kerentanan fisik adalah harga dari rumah, fasilitas umum, dan fasilitas kritis. Kerentanan ekonomi adalah harga dari lahan produktif dan PDRB. Kerentanan Lingkungan adalah luas dari hutan lindung, hutan alam, hutan bakau, semak, dan rawa.</p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                          <h4>Metode Penyusunan Risiko Tsunami</h4>
                    </div>
                    <div class="card-body">
                        <p class="justify-text">Peta risiko tsunami dibuat menggunakan Model Crunch yaitu dengan cara melakukan overlay peta kerentanan dengan peta bahaya.</p>
                    </div>
                </div>
            </div>
        </div>
	</section>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.4/dist/L.Control.Locate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="leaflet-locatecontrol/dist/L.Control.Locate.min.css" />
<script src="<?= base_url() ?>leaflet-locatecontrol/src/L.Control.Locate.js"></script>

<script>
navigator.geolocation.getCurrentPosition(function(Location) {
    var Latlng = new L.Latlng(location.coords.latitude, location.coords.longitude);

    
});

//Basemap
var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
});

var osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France'
});

var SDM = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptile s.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
});

var TopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenTopoMap'
    });

    const map = L.map('map', {
	center: [-8.0083290568724, 110.30863572614165],
	zoom: 14,
	layers: [osm]
    });

const baseLayers = {
	'OpenStreetMap': osm,
	'OpenStreetMap.HOT': osmHOT,
    'StadiaDarkMode' : SDM,
    'TopoMap' : TopoMap,
};

const layerControl = L.control.layers(baseLayers, null, {
    collapsed: false
}).addTo(map);

// //marker Tempat Evakuasi
// var TPR = L.marker([-7.996810068761952, 110.3150828921103])
// .bindPopup("<img src='<?= base_url('foto/TPR.jpeg') ?>' width='100%'> <br>" +
//     '<br> <b>Tempat Evakuasi Sementara TPR Parangtritis</b> <br>' +
//     '<a href="https://maps.app.goo.gl/UKXKujMsZihwuajY6">Link Google Maps</a>');
// var Kalurahan = L.marker([-8.003892923519986, 110.31682363201382])
// .bindPopup("<img src='<?= base_url('foto/Kalurahan.jpeg') ?>' width='100%'> <br>" +
//     '<br> <b>Tempat Evakuasi Akhir Kalurahan Parangtritis</b> <br>' +
//     '<a href="https://maps.app.goo.gl/wRRiZjZHbQwsPeUB6">Link Google Maps</a>');
// var BelaBelu = L.marker([-8.016373342315301, 110.32430470876805])
// .bindPopup("<img src='<?= base_url('foto/BelaBelu.jpeg') ?>' width='100%'> <br>" +
//     '<br> <b>Tempat Evakuasi Sementara Syekh Bela-Belu</b> <br>' +
//     '<a href="https://maps.app.goo.gl/3YhY47XEJoePcfgX7">Link Google Maps</a>');
// var MaulanaMaghribi = L.marker([-8.019829118425166, 110.32824053730512])
// .bindPopup("<img src='<?= base_url('foto/MaulanaMagribi.jpeg') ?>' width='100%'> <br>" +
//     '<br> <b>Tempat Evakuasi Sementara Syekh Maulana Maghribi</b> <br>' +
//     '<a href="https://maps.app.goo.gl/SG5n5RwyFAro7TDaA">Link Google Maps</a>');
// var BulakMabul = L.marker([-8.020746050016868, 110.33478330245828])
// .bindPopup("<img src='<?= base_url('foto/BulakMabul2.jpeg') ?>' width='100%'> <br>" +
//     '<br> <b>Tempat Evakuasi Akhir Bulak Mabul</b> <br>' +
//     '<a href="https://maps.app.goo.gl/K5N6hxMRHv8JaCmF6">Link Google Maps</a>');

// var TempatEvakuasi = L.layerGroup([BulakMabul, Kalurahan, TPR, MaulanaMaghribi, BelaBelu]);
// layerControl.addOverlay(TempatEvakuasi, "Tempat Evakuasi");

//Geojson  Bahaya Tsunami
$.getJSON("<?= base_url('geojson/Parangtritis.geojson') ?>", function(data) {
    var Bahaya = L.geoJson(data, {
        style : function(feature) {
            return {
                color: 'red',
                fillOpacity: 0.5,
            }
        }
    })
    .bindPopup(
    "<b>Bahaya Tsunami</b><br>" +
    "Tingkat Bahaya Tsunami : Tinggi <br>")
    var Bahaya = L.layerGroup([Bahaya])
layerControl.addOverlay(Bahaya, "Bahaya Tsunami").addTo(map);
});

//Geojson  Kerentanan Tsunami
$.getJSON("<?= base_url('geojson/Parangtritis.geojson') ?>", function(data) {
    var Kerentanan = L.geoJson(data, {
        style : function(feature) {
            return {
                color: 'red',
                fillOpacity: 0.5,
            }
        }
    })
    .bindPopup(
    "<b>Kerentanan Tsunami</b><br>" +
    "Tingkat Kerentanan Tsunami : Tinggi <br>")
    var Kerentanan = L.layerGroup([Kerentanan])
layerControl.addOverlay(Kerentanan, "Kerentanan Tsunami").addTo(map);
});

//Geojson  Risiko Tsunami
$.getJSON("<?= base_url('geojson/Parangtritis.geojson') ?>", function(data) {
    var Risiko = L.geoJson(data, {
        style : function(feature) {
            return {
                color: 'red',
                fillOpacity: 0.5,
            }
        }
    })
    .bindPopup(
    "<b>Risiko Tsunami</b><br>" +
    "Tingkat Risiko Tsunami : Tinggi <br>")
    var Risiko = L.layerGroup([Risiko])
layerControl.addOverlay(Risiko, "Risiko Tsunami").addTo(map);
});

//geolocation
L.control.locate().addTo(map);

//marker dari database
<?php foreach ($evakuasi as $key => $value) { ?>
    <?php
     $foto = base64_encode($value['foto']); // Encode data BLOB ke dalam base64
     $fotoSrc = 'data:image/jpeg;base64,' . $foto; // Buat src untuk tag img
    ?>
    L.marker([<?= $value['latitude'] ?>, <?= $value['longitude'] ?>])
    .bindPopup('<img src="<?= $fotoSrc ?>" width="250px"><br>' +
        '<b><?= $value['nama_wilayah'] ?></b><br>' +
        '<a href="<?= $value['googlemaps'] ?>" target="_blank">Link Google Maps</a>'
    )
    .addTo(map);
<?php } ?>


</script>