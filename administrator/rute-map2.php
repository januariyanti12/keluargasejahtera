<!DOCTYPE html>
<html>
<head>
	<title>Leaflet - GIS LOKASI KELUARGA SEJAHTERA</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="dist/leaflet.css" />
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
	
	
	<link rel="stylesheet" href="dist/leaflet-routing-machine.css" />
	<script src="dist/leaflet.js"></script>
	<script src="dist/leaflet-routing-machine.js"></script>
	
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js">    </script>
	

	
	
<script src="dist/leaflet.js"></script>
	
	<script>
		function peta_awal() {
			// posisi default peta saat diload
			// koordinat dan zoom view peta 
			//var map = L.map('map').setView([-0.075819, 109.399202], 12);
			var map = L.map('map').setView([-0.075819, 109.399202], 12);
			// ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
			// OSM Mapnik
             // OSM Mapnik
            var osmLink = "<a href='http://www.openstreetmap.org'>Open StreetMap</a>";
            L.tileLayer(
                'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; ' + osmLink,
                    maxZoom: 18
                }).addTo(map);
			
			
					
			<?php
			require ('config.php');
			// query
			$sql = "SELECT * from `lokasi`";
			$data = mysql_query($sql);

			$js = '';

			// looping script js ini sesuai dengan jumlah lokasi yang ada pada database
			while($row = mysql_fetch_assoc($data)) {
				$js .= 'L.marker(['.$row['lat'].', '.$row['lng'].']).addTo(map)
						.bindPopup("<b>'.$row['nama_penduduk'].'</b>");
						';
			}
			// menampilkan script js hasil dari looping diatas
			echo $js;

			?>

			var popup = L.popup();
				L.Routing.control({
  waypoints: [
    L.latLng(-0.075819, 109.399202),
    L.latLng(-0.075819, 109.399202)
  ]
}).addTo(map);
		
		}
		
	</script>
</head>
<b>SIG KELUARGA SEJAHTERA </b><a href='index.php'>Home</a> | <a href='user-map.php'>Tambah Data</a>| <a href='rute-map.php'>Model Kesejahteraan Keluarga</a></div>
<body onload="peta_awal()">
	<h3>Peta GIS LOKASI KELUARGA SEJAHTERA - PHP & MySQL</h3>
	<div id="map" style="width: 100%; height:600px;"></div>
</body>
</html>
