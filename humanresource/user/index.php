<?php

	session_start();
	include "../include/koneksi.php";
	if(isset($_SESSION['user'])){

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Lowongan Kerja</title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- css -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/style.css" rel="stylesheet" media="screen">
	<link href="../color/default.css" rel="stylesheet" media="screen">
	<script src="../js/modernizr.custom.js"></script>
	</head>
  <body>
	<div>
	<style type="text/css">
    a{text-decoration: none; font-size: 20px;font-family: sans-serif;padding: 14px 10px}
    ul{padding: 14px}
    li{list-style: none; display: inline;}
    li a{background: #222; color:#d4d4d4;}
    li a:hover{background: #4da4ff; color:#fff;}
    .navi{background: #222; height: 50px}
</style>
 
<nav class="navi">
    <ul>
        <li><a href="index.php">Profil</a></li>
		<li><a href="?page=download">Download</a></li>
		<li><a href="?page=penerimaan">Penerimaan</a></li>
		<li><a href="?page=pengumuman">Pengumuman</a></li>
		<li><a href="logout_user.php">Logout</a></li>
    </ul>
</nav>
</div>	

	<?php
		include "page.php";


	}else{

		echo "<script language='javascript'> window.location.href='../index.php'</script>";

	}
	?>
	  
	</body>

	<!-- js -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.smooth-scroll.min.js"></script>
	<script src="../js/jquery.dlmenu.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/custom.js"></script>
</html>
