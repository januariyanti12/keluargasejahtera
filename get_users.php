<?php
include 'administrator/config.php';
//$query = mysqli_query("select * from lokasi");
$query = ("select * from lokasi");
			$sql = mysqli_query($connections,$query);

$rows = array();
while($data = mysqli_fetch_array($sql))
{
    $rows[] = $data;
}

print json_encode($rows);
$db = NULL;
?>