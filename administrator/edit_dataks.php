<?php
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
?>
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
            position:absolute;left: 730px; top:80px;
		z-index: -1;
		}
		 .container {
            border-radius: 9px;
            background-color: #f2f2f2;
            padding: 20px;
            margin-left: 20%;
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

<?php
// Load file koneksi.php
include "config.php";
$id = (int) $_GET['id'];

//"select * from product p inner join buku b on p.id_produk=b.id_produk where p.id_produk='$idProduk'";
$sql = "select * from lokasi p inner join penduduk b on p.id_lokasi=b.id_lokasi where p.id_lokasi='{$id}'";
$result = mysqli_query($connections,$sql);
$hasil = mysqli_fetch_array($result);
?>
 <div class="container">
 <center> Update Data Keluarga Sejahtera </center>
<form action="proses_dataks.php" method="post">
    <dl>
		<dt></dt>
        <dd><input type="hidden" name="id" value="<?php echo $hasil['id_lokasi'];?>"  size='5'/></dd>
        <dt>Nomor KK</dt>
        <dd><input type="text" name="nomor_kk" value="<?php echo $hasil['nomor_kk'];?>" disabled="disabled"/></dd>
        <dt>NIK : </dt>
        <dd> <textarea name="nik" rows="3" cols="95"><?php echo $hasil['nik']; ?></textarea></dd>
        <dt>Nama : </dt>
        <dd> <textarea name="nama" rows="3" cols="95"><?php echo $hasil['nama']; ?></textarea></dd>
        <dt>Jenis Kelamin : </dt>
        <dd> <textarea name="jenis_kelamin" rows="3" cols="95"><?php echo $hasil['jenis_kelamin']; ?></textarea></dd>
        <dt>Tanggal Lahir : </dt>
        <dd> <textarea name="tanggal_lahir" rows="3" cols="95"><?php echo $hasil['tanggal_lahir']; ?></textarea></dd>
        <dt>Alamat : </dt>
        <dd> <textarea name="alamat" rows="3" cols="95"><?php echo $hasil['alamat']; ?></textarea></dd>      
        <dt></dt>
        <dd><input type="submit" value="Kirim Perubahan"/></dd>
    </dl>
    
</form>
</div>

