<?php
include ('config.php');    // BUKA KONEKSI DENGAN DATABASE MYSQL
// host : localhost - user : root - password : kosong

//$db = mysql_select_db('lokasi'); // TENTUKAN NAMA DATABASE

$id = $_POST['id']; // Menerima NPM dari JQuery Ajax dari form

//$s = mysql_query("select * from lokasi where id='$id' LIKE '".mysql_real_escape_string ($id)."'"); 

// Ambil nama penduduk berdasarkan npm yang dikirim dari jquery ajax



//while ($data = mysql_fetch_array($s)) {       
 //echo $data[1]; // Print nama hasil perolehan dari query database
//}

$result = mysql_query('SELECT * FROM lokasi WHERE id='$id' LIKE '$id'');

if( $result === FALSE ) {
   trigger_error('Query failed returning error: '. mysql_error(),E_USER_ERROR);
} else {
   while( $row = mysql_fetch_array($result) ) {
      echo $row['nama_penduduk'];
   }
}




?>