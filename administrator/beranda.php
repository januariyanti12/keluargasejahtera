<?php
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>

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
		    position:bottom;center: 00px; ;
		}
		.picture {
            position:relative;left:0px; top:0px;
				z-index: -1;
        }
		.picture2 {
            position:absolute;left: 870px; top:80px;
				z-index: -1;
        }
		
		 .container {
            border-radius: 9px;
            background-color: #f2f2f2;
            padding: 20px;
            margin-left: 0%;
            width:50%
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
		input[type=textarea], select {
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
		#header2{
			
			height: 10px;
			width:1350px;
			text-align: center;
			color: #ffffff;
			line-height: 50px;
		    position:absolute;left:0px; top:70px;
				z-index: -1
		}
	
	</style>
	

	
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="dist/leaflet.css" />
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
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
			
			$sql = "select * from penduduk p inner join jenis_kb b on p.id_jenis_kb=b.id_jenis_kb inner join jenis_rt c on p.id_jenis_rt=c.id_jenis_rt inner join jenis_ks d on p.id_jenis_ks=d.id_jenis_ks inner join lokasi l on p.id_lokasi=l.id_lokasi";
			$data = mysqli_query($connections,$sql);
			$js = '';
			while($row = mysqli_fetch_assoc($data)) {
				$js .= 'L.marker([
						'.$row['lat'].',
						'.$row['lng'].'
						]).addTo(map)
						.bindPopup("<b> Nama :'.$row['nama_penduduk'].'</b>'.
						'</b><br>Nomor KK :'.$row['nomor_kk'].'</b>'.
						'</b><br>NIK :'.$row['nik'].'</b>'.
						'</b><br>Jenis Kelamin :'.$row['jenis_kelamin'].'</b>'.
						'</b><br>Tanggal Lahir :'.$row['tanggal_lahir'].'</b>'.
						'</b><br>Alamat :'.$row['alamat'].'</b>'.
						'</b><br>Jenis KB :'.$row['nama_kb'].'</b>'.
						'</b><br>Jenis RT :'.$row['rt_rw'].'</b>'.
						'</b><br>Jenis KS :'.$row['nama_ks'].'</b>'.'");
						';
			}
			// menampilkan script js hasil dari looping diatas
			echo $js;

			?>

			var popup = L.popup();
		}
		
	</script>
</head>
</div>
		<div id="header2"></div>
<?php
			include "navigasi.php";	
		?>
		
<body onload="peta_awal()">
	
	<div id="map" style="width: 100%; height:750px; " ></div>
</body>
</html>
<div id="footer">
			<p>copyright; <?php echo date("Y");?></p>
		</div>
