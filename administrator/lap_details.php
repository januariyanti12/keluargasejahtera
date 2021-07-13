<?php
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
<html>
<head>
  <title>Laporan Details Data Keluarga Sejahtera</title>
</head>
<style type="text/css">
#header2{
		
			height: 10px;
			width:1350px;
			text-align: center;
			color: #ffffff;
			line-height: 50px;
		    position:absolute;left:0px; top:70px;
				z-index: -1
		}
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
            position:absolute;left: 950px; top:90px;
				z-index: -1;
        }
		.gambarku {
            position:relative;left: 0px; top:16px;
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
			
	</style>
	
	<style type="text/css">
	h1{
  font-family: sans-serif;
}

table {
  font-family: Arial, Helvetica, sans-serif;
  color: #666;
  text-shadow: 1px 1px 0px #fff;
  background: #eaebec;
  border: #ccc 1px solid;
}

table th {
  padding: 15px 35px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
}

table th:first-child{  
  border-left:none;  
}

table tr {
  text-align: center;
  padding-left: 20px;
}

table td:first-child {
  text-align: left;
  padding-left: 20px;
  border-left: 0;
}

table td {
  padding: 15px 35px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
}

table tr:last-child td {
  border-bottom: 0;
}

table tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 3px;
  -webkit-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}

table tr:last-child td:last-child {
  -moz-border-radius-bottomright: 3px;
  -webkit-border-bottom-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

table tr:hover td {
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
}
	</style>
<body>
<?php
			include "navigasi.php";	
		?>
 
	
  
<html>

<body>
<div id="header2"></div>
<div class="parallax_background parallax-window"><br>
<b>
Laporan Data Keluarga Sejahtera Kelurahan Desa Kapur
</b>
<table border="1" cellpadding="8" align="center" width="1350">
<tr>
  <th width='200'>Nomor KK</th>
  <th width='200'>NIK</th>
  <th width='5'>KNama</th>
  <th width='500'>Jenis Kelamin</th>
  <th width='10'>Tanggal Lahir</th>
  <th width='500'>Alamat</th>
  <th width='50'>Jenis KB</th>
  <th width='10'>Jenis RT</th>
  <th width='50'>Jenis Golongan KS</th>
  <th width='250'>Aksi</th>
</tr>

<?php
// Load file koneksi.php
include "config.php";
$query ="select * from penduduk p inner join jenis_kb b on p.id_jenis_kb=b.id_jenis_kb inner join jenis_rt c on p.id_jenis_rt=c.id_jenis_rt inner join jenis_ks d on p.id_jenis_ks=d.id_jenis_ks inner join lokasi l on p.id_lokasi=l.id_lokasi";
// Tampilkan semua data gambar
$sql = mysqli_query($connections, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";

	echo "<td>".$data['nomor_kk']."</td>";
    echo "<td>".$data['nik']."</td>";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['jenis_kelamin']."</td>";
    echo "<td>".$data['tanggal_lahir']."</td>";
    echo "<td>".$data['alamat']."</td>";
    echo "<td>".$data['nama_kb']."</td>";
	  echo "<td>".$data['rt_rw']."</td>";
    echo "<td>".$data['nama_ks']."</td>";
	echo "<td>";
	?>
	
	<a href="lihatdetails.php?id=<?php echo $data['id_lokasi']; ?> " target='_BLANK'>Cetak Pdf</a>
	<?php
	echo "</td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table><br>
</div>
</body>
</html>

<div id="footer">
			<p>copyright; <?php echo date("Y");?></p>
		</div>