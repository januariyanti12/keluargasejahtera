<?php
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
<html>
<head>
  <title>Data User SIG</title>
</head>
<style type="text/css">
.logo {
            position:absolute;left:0px; top:0px;
				
        }
.logoteks {
            position:relative;left:-100px; top:15px;
			height: 50px;
			width:1350px;	
        }
	
</style>
<body>

<div class="logo">
   <?php
   
    ?>
 </div>  
   <div class="logoteks">
   <?php
   echo "<center>";
   echo "<b>PEMETAAN KEMISKINAN MENGGUNAKAN MODEL KESEJAHTERAAN KELUARGA</b><BR>";
  
   echo "Di Kelurahan Desa Kapur<BR>";
   echo "<br>";
   echo "<hr>";
   echo "<br>";
    echo "<b>LAPORAN REKAP DATA USER SISTEM INFORMASI GEOGRAFIS</b><BR>";
      echo "<br>";
   echo "</center>";
   ?>
 </div> 

<div class="parallax_background parallax-window"><br><br><br><br><br><br>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="1050">
<tr>
   
  <th >No</th>
  <th >Nama</th>
  <th >Email</th>
  <th >Username</th>
  <th >Password</th>
  
</tr>

<?php
// Load file koneksi.php
include "config.php";

$query = "select * from users "; // Tampilkan semua data gambar
$sql = mysqli_query($connections, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
$no=1;
if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
   echo "<td align='center'>".$no."</td>";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['email']."</td>";
    echo "<td>".$data['username']."</td>";
    echo "<td>****************</td>";
	
	
	?>
	
	
	<?php
	
    echo "</tr>";
	$no++;
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
}
?>
</table><br>
</div>
</body>
</html>
<script>
		window.print();
</script>
