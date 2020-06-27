<!DOCTYPE html>
<html>
<head>
	<title>Sistem Enterprise</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/tampilan.css">
</head>
<body>
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
        <li><a href="#intro">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#penerimaan">Penerimaan</a></li>
        <li><a href="#galeri">Galeri</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="admin/login.php">Administrator</a></li>
    </ul>

    <div id="intro">
	  
			<div class="intro-text">
				<div class="container">
					<div class="row">
					
						
					<div class="col-md-12">
						
						<div class="brand">
							<h1><a href="index.html">Sistem Enterprise<br></a></h1>
							<img src='img/2.png' width="500" height="300"><br><br><br>
							<font size="10" face="Broadway" color="white"><b>PT Textile Sejahtera</b></font><br>
							<?php
								if(isset($_SESSION['user'])){
							?>
								<button type="button" class="btn btn-success btn-lg">My Profile</button>
							<?php
								}else{
							?>
							<?php
								}
							?>
						</div>
					</div>
					</div>
				</div>
		 	</div>
			
	 </div>
	 <div class="container">
		<div class="badan">
 
        <div class="list-produk">
        	<br>
            <img src="img/logo1.png">
 			<br>
            <h4>Purchasing</h4>
            <a class="tombol tombol-detail" href="purchasing/index.php">User</a> 
            <a class="tombol tombol-beli" href="purchasing/adminn/loginadmin.php">Admin</a>
        </div>
 
        <div class="list-produk">
        	<br>
            <img src="img/logo2.png">
            <h4>Human Resource</h4>
 
            <a class="tombol tombol-detail" href="humanresource/index.php">User</a> 
            <a class="tombol tombol-beli" href="humanresource/admin/index.php">Admin</a>
        </div>
 
        <div class="list-produk">
            <br>
            <img src="img/logo3.png">
            <br>
            <h4>Production</h4>
			<a class="tombol tombol-detail" href="produksi/login.php">Admin</a> 

        </div>
 
        <div class="list-produk">
            <br>
            <img src="img/logo4.png">
            <br>
            <h4>Accounting</h4>
			<a class="tombol tombol-detail" href="SIkeuangan/index.php">Admin</a> 
        </div>
         <div class="list-produk">
            <br>
            <img src="img/logo5.png">
            <br>
            <h4>Pay Roll</h4>
			<a class="tombol tombol-detail" href="payrole/Karyawan/index.php">User</a>
			<a class="tombol tombol-beli" href="payrole/admin/index.php">Admin</a> 
        </div>
        <div class="list-produk">
            <br>
            <img src="img/logo6.png">
            
            <h4>Document Management</h4>
			<a class="tombol tombol-detail" href="documen/pegawai/index.php">Pegawai</a>
			<a class="tombol tombol-beli" href="documen/admin/index.php">Admin</a> 
        </div>
        <div class="list-produk">
            <br>
            <img src="img/logo7.png">
            <br>
            <h4>Marketing</h4>
			<a class="tombol tombol-detail" href="Marketing/index.php">Masuk</a>
        </div>
        <div class="list-produk">
            <br>
            <img src="img/logo8.jpg">
            <br>
            <h4>Sales</h4>
			<a class="tombol tombol-detail" href="sales/index.php">Masuk</a> 
        </div>
        <div class="list-produk">
            <br>
            <img src="img/logo9.png">
            
            <h4>Inventory Control</h4>
			<a class="tombol tombol-beli" href="purchasing/adminn/tambah_barang.php">Admin</a> 
        </div>
    </div>
      </div>

</nav>

</body>
</html>