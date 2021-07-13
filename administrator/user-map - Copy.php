<?php
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
<?php
include_once 'header.php';
include 'locations_model.php';
//get_unconfirmed_locations();exit;
?>


    <style>
#header2{
		
			height: 10px;
			width:1350px;
			text-align: center;
			color: #ffffff;
			line-height: 50px;
		    position:absolute;left:0px; top:70px;
				z-index: -1
		}
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 10px 0;
            display: inline-block;
            border: 2px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 200px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 9px;
            background-color: #f2f2f2;
            padding: 20px;
            margin-left: 0%;
            width:50%
        }
        #map { position:absolute;left: 0px; top:490px; bottom:300px;height:600px ;width:100%; }
        .geocoder {
            position:absolute;left: 00px; top:460px;
        }
		.picture {
            position:absolute;left: 730px; top:190px;
			height:310px;
			overflow-y:scroll;
			overflow-x:auto;
		}
		.picture3 {
            position:absolute;left: 730px; top:80px;
			height:50px;
				z-index: -1;
			
		}
		.Header {
            position:absolute;left: 5px; top:10px;
        }
		
		.mapboxgl-popup {
		max-width: 200px;
			}

		.mapboxgl-popup-content {
		text-align: center;
		font-family: 'Open Sans', sans-serif;
		}
    </style>

	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
 
		#wrapper{
			width: 960px;
			margin: auto;
		}
 
	
 
		#menu{
			background: black;
			height: 50px;
		}
 
		#menu ul .active{
			text-decoration: underline;
		}
 
		#menu ul .active a{
			color: #ffff00;
		}
 
		#menu ul li{
			list-style: none;
			text-decoration: none;
			display: inline;
			margin: 0 85px;
			line-height: 50px;
		}
 
		#menu ul li a{
			color: #000000;
			text-decoration: none;
			text-transform: uppercase;
			color: #ffffff;
			font-weight: bold;
		}
 
		#content{
			padding: 5px;
			line-height: 20px;
			height: 300px;
		}
 
		#footer{
			background-color: black;
			height: 50px;
			width:1350px;
			text-align: center;
			color: #ffffff;
			line-height: 50px;
		    position:absolute;center: 00px; top:1100px;
		}
	</style>
	<?php
			include "navigasi.php";	
		?>

 <div id="map"><br></div>
     <div class="container" >
        <form action="proses_geografis.php" >
			<label for="namain">Nama Keluarga Sejahtera</label>
            <input type="text" id="namain" name="namain" placeholder="Nama Penduduk">
			
			
            <label for="lat">lat</label>
            <input type="text" id="lat" name="lat" placeholder="Latitude Anda">

            <label for="lng">lng</label>
            <input type="text" id="lng" name="lng" placeholder="Longitude Anda">

			
			
            <input type="submit" value="Simpan" >
        </form>
		
		<div><br><br></div>
    </div>

    <div class="geocoder">
        <div id="geocoder" ></div>
    </div>
<div class="picture3">
<img src=images/banner.jpg height='100 px' width='600'>
</div>
<div id="header2"></div>
     <div class="picture">
	 <div><center>
	 </b>Data Geografis Keluarga Sejahtera</b></center>
	 <table border="1" cellpadding="0"  cellspacing="0" align="center" width="580">
<tr>
 
  
  <th width='200'>Nama Penduduk</th>
  <th width='100'>Latitude</th>
  <th width='100'>Longitude</th>
  <th width='50'>Aksi</th>
</tr>
	 <?php
        $sql="SELECT * FROM lokasi ";
          $hasil=mysqli_query($connections,$sql);
          $row = mysqli_num_rows($hasil);
		if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
  while($data = mysqli_fetch_array($hasil)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
   
    echo "<td>".$data['nama_penduduk']."</td>";
    echo "<td>".$data['lat']."</td>";
    echo "<td>".$data['lng']."</td>";
	echo "<td>";
		?>
		<a href="hapusgeografis.php?id=<?php echo $data['id_lokasi']; ?>">Hapus</a>
	<?php
	echo "</td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
}
?>
</table><br>
</div>
    </div>


    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    </style>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />

    <script>

        var saved_markers = <?= get_saved_locations() ?>;
       
		var user_location = [-0.07822242170123424, 109.4022918741571];
		
        mapboxgl.accessToken = 'pk.eyJ1Ijoia2hhdWxhaGFsYXp3YXIiLCJhIjoiY2p5MWlwZWFnMDl2dDNocDZxenk2NW10dyJ9.RvPGUU817y-TkV7SRQ5ZZg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            center: user_location,
            zoom: 10
        });
	
		
		
        //  geocoder here
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            // limit results to Australia
            //country: 'IN',
        });

        var marker ;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);
			
			

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                alert("Data Ditemukan");
                console.log(ev.result.center);

            });
        });
        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;

        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }
		
		
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
				console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                    .setLngLat(marker)
					
              		.setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
					.setHTML('<h3>' + 'Perhatian !' + '</h3><p>' + 'Geser Titik Merah !!!' + '</p>'))
					
					.addTo(map);
					
            });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        $('#signupForm').submit(function(event){
            event.preventDefault();
			var namain = $('#namain').val();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
			
            var url = 'locations_model.php?add_location&namain='+ namain +'&lat=' + lat + '&lng=' + lng ;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
		
	
		

    </script>



<div id="footer">
			<p>copyright; <?php echo date("Y");?></p>
		</div>