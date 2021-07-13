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
 
	#header2{
		
			height: 10px;
			width:1350px;
			text-align: center;
			color: #ffffff;
			line-height: 50px;
		    position:absolute;left:0px; top:70px;
				z-index: -1
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
		    position:absolute;center: 00px; ;
		}
		.picture2 {
            position:relative;left:0px; top:0px;
				width:650px;
				align : justify;
				z-index: -1;
        }
		.picture {
            position:absolute;left: 660px; top:80px;
		
				z-index: -1;
        }
		.text2 {
				padding: 0px 20px;
            	margin: 5px 0;
				text-align : justify;
				font-size : 30px;
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
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="administrator/dist/leaflet.css" />
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js">    </script>
</head>
</div>
<body>
<?php
			include "navigasi.php";	
		?>
		 <div class="text2">
         <h3>Selamat Datang </h3> <br>
		 <p>di Sistem Pemetaan Tingkat Kemiskinan Menggunakan Model Kesejahteraan Keluarga <br></br>
			 Kelurahan Desa Kapur  </P>
    </div>		
	<div id="header2"></div>
<div id="map" style="width: 100%; height:750px; " ></div>
<div id="footer">
			<p>copyright 2021; <?php echo date("Y");?></p>
		</div>
</body>
</html>