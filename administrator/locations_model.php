<?php

if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
<?php
require("config.php");

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}


function add_location(){
	/*
    $con=mysqli_connect ("localhost", 'root', '','test');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
	*/
	include 'config.php';
	
	$namain = $_GET['namain'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
	
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO lokasi " .
        " (id,nama_penduduk, lat, lng) " .
        " VALUES (NULL,'$namain','$lat', '$lng');",
		mysqli_real_escape_string($connections,$namain),
        mysqli_real_escape_string($connections,$lat),
        mysqli_real_escape_string($connections,$lng));
		
		
    $result = mysqli_query($connections,$query);
    echo json_encode("Data Berhasil disimpan !");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}
function get_saved_locations(){
	/*
    $con=mysqli_connect ("localhost", 'root', '','test');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
	*/
	
	include 'config.php';
    // update lokasi with location_status if admin location_status.
	
	//$sqldata = mysqli_query($connections,"select lng,lat from lokasi ");
    $sqldata = mysqli_query($connections,"select lng,lat from lokasi ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);

    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}

?>