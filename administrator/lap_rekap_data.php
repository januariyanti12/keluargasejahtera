<?php
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
<style type="text/css">
.logo {
            position:absolute;left:0px; top:0px;
				
        }
.logoteks {
            position:absolute;left:0px; top:15px;
			height: 50px;
			width:700px;	
        }
	.ttd {
            position:absolute;left:450px; top:350px;
				z-index: -1;
        }
</style>
<html>
<head>
  <title>Laporan Rekap Data Keluarga Sejahtera</title>
</head>
<body>
<script>
		window.print();
</script>
    <div class="logo">
   <?php
   echo "<img src='images/imageks.png' width='120' height='140'>";
    ?>
   
   <div class="logoteks">
   <?php
   echo "<center>";
   echo "<b>DATA KELUARGA SEJAHTERA</b><BR>";
  
   echo "Kelurahan Desa Kapur<BR>";
   echo "<br>";
   echo "<hr>";
   echo "<br>";
    echo "<b>LAPORAN REKAP DATA KELUARGA SEJAHTERA</b><BR>";
      echo "<br>";
   echo "</center>";
   ?>

<div class=""><br>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="750">
<tr>
	<th width='5'>No</th>
  <th width='50'>Nomor KK</th>
  <th width='50'>NIK</th>
  <th width='30'>Nama</th>
  <th width='50'>Jenis Kelamin</th>
  <th width='10'>Tanggal Lahir</th>
  <th width='50'>Alamat</th>
  <th width='50'>Jenis KB</th>
  <th width='10'>Jenis RT</th>
  <th width='50'>Jenis Golongan KS</th>
</tr>

<?php
// Load file koneksi.php
include "config.php";
$query ="select * from penduduk p inner join jenis_kb b on p.id_jenis_kb=b.id_jenis_kb inner join jenis_rt c on p.id_jenis_rt=c.id_jenis_rt inner join jenis_ks d on p.id_jenis_ks=d.id_jenis_ks inner join lokasi l on p.id_lokasi=l.id_lokasi";
$sql = mysqli_query($connections, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
$no=1;
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
	echo "<td>".$no."</td>";
    echo "<td>".$data['nomor_kk']."</td>";
    echo "<td>".$data['nik']."</td>";
    echo "<td >".$data['nama']."</td>";
    echo "<td>".$data['jenis_kelamin']."</td>";
	  echo "<td>".$data['tanggal_lahir']."</td>";
    echo "<td>".$data['alamat']."</td>";
    echo "<td>".$data['nama_kb']."</td>";
	  echo "<td>".$data['rt_rw']."</td>";
    echo "<td>".$data['nama_ks']."</td>";
    echo "</tr>";
	 $no++;
  }
 
}else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>

</table><br>
</body>
</html>