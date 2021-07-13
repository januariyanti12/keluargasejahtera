<?php
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
<?php
// Load file koneksi.php
include "config.php";

// Ambil Data yang Dikirim dari Form

$id_lokasi=$_POST['id_lokasi'];
$nomor_kk = $_POST['nomor_kk'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];

      // Proses simpan ke Database
      $query = "INSERT INTO penduduk(id_penduduk,id_lokasi,nomor_kk,nik,nama,jenis_kelamin,tanggal_lahir,alamat) VALUES('".$id_penduduk."','".$id_lokasi."','".$nomor_kk."','".$nik."','".$nama."','".$jenis_kelamin."','".$tanggal_lahir."','".$alamat."')";
      $sql = mysqli_query($connections, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
		?>
		<div class="container">
	<?php
	echo "<center><b><br><br><br><br>DATA BERHASIL DISIMPAN<br><br><br><br></b></center>"
?>
	</div>
	<script>
			setTimeout(function() {
						window.location.href = "lokasi_tambah.php";
				}, 2000);
</script>
<?php
        //header("location:index.php"); // Redirectke halaman index.php
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
     
}
?>