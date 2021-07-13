<?php
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
<style type="text/css">
.laporan {
            position:absolute;left:250; top:10px;
			height: 50px;
			width:400px;	
        }
.gambar {
            position:fixed;left:0px; top:120px;
				
        }
.logo {
            position:absolute;left:0px; top:0px;
				
        }
.logoteks {
            position:absolute;left:0px; top:15px;
			height: 50px;
			width:700px;	
        }
	.ttd {
            position:absolute;left:450px; top:550px;
				z-index: -1;
        }
</style>
<script>
		window.print();
</script>
<?php
include "config.php";

$id = (int)$_GET['id'];

//$query = ($connections,"SELECT * FROM penduduk WHERE id = $id"); // query hapus data
$sql = "select * from penduduk p inner join jenis_kb b on p.id_jenis_kb=b.id_jenis_kb inner join jenis_rt c on p.id_jenis_rt=c.id_jenis_rt inner join jenis_ks d on p.id_jenis_ks=d.id_jenis_ks inner join lokasi l on p.id_lokasi=l.id_lokasi";
// tampilkan query
$result = mysqli_query($connections,$sql);
$row = mysqli_fetch_array($result);

    ?>
   <div class="logo">
   <?php
    ?>
   <div class="logoteks">
   <?php
   echo "<center>";
   echo "<b>LAPORAN DATA KELUARGA SEJAHTERA</b><BR>";
   echo "Kelurahan Desa Kapur<BR>";
   echo "<br>";
   echo "<hr>";
   echo "<br>";
      echo "<br>";
   echo "</center>";
   ?>
   <div class="gambar">
   <?php
   echo "<img src='images/imageks.png' width='160' height='180'>";
   ?>
   <div class="laporan">
   <?php
   echo "Nomor KK : ";
   echo $row['nomor_kk']."<br><br> ";
   echo "NIK : ";
   echo $row['nik']." <br><br> ";
   echo "Nama : ";
   echo $row['nama']." <br><br> ";
   echo "Jenis Kelamin : <br>";
   echo $row['jenis_kelamin']."<br><br>";
   echo "Tanggal Lahir : ";
   echo $row['tanggal_lahir']."<br><br>";
   echo "Alamat : <br>";
   echo $row['alamat']."<br><br>";
   echo "Jenis KB : <br>";
   echo $row['nama_kb']."<br><br>";
   echo "Jenis RT : ";
   echo $row['rt_rw']."<br><br>";
   echo "Jenis Golongan KS : <br>";
   echo $row['nama_ks'];
   echo "</div>";
   ?>
   <div class="ttd">
   <?php
    echo "<br />";


?>