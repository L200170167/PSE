<?php require_once("../config/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
        
    if(empty($_SESSION['username'])){
	echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
	}

    } 


    ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>PT Textile Sejahtera</title> 

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">	
				<div class="span9">
					
					<div class="navbar navbar-inverse">
			    		<div class="navbar-inner">
			          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			          		</a>
			          		<div class="nav-collapse collapse">
			            		<ul class="nav">
			            			<li class="active"><a href="dashboard_admin.php">Home</a></li>
			              			<li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Input<b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                  				<li><a href="input_kategori.php">Input Kategori</a></li>
			                  				<li><a href="input_barang.php">Input Barang</a></li>
			                				<li><a href="input_bukti_kirim.php">Input Bukti kirim</a></li>
			                			</ul>
			              			</li>
			              			<li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan<b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                  				<li><a href="laporan_kategori.php">Laporan Kategori</a></li>
			                  				<li><a href="laporan_barang.php">Laporan Barang</a></li>

			                  				
			                  				
			                			</ul>
			              			</li>
			              			<li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelanggan<b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                				<li><a href="bukti_kirim.php">Bukti Transfer Pelanggan</a></li>

			                  				<li><a href="daftar_pembeli.php">Barang Pelanggan</a></li>
			                			</ul>
			              			</li>
			              			<li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tambah<b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                  				<li><a href="tambah_barang.php">Tambah Barang</a></li>
			                			</ul>
			              			</li>
                                 	<li><a href="logout.php" onclick="return confirm('Yakin mau keluar?')">Logout</a></li>
			            		</ul>
			          		</div>
			        	</div>
			      	</div>
					
				</div>
				</div>
			</div>
		</div>
	</header>
 	<style>
	.da-slider .da-slide .da-img img{
		width: 500px;
		height: 400px;
		border-radius: 10px;
	}
</style>
<style type="text/css">
	img{
		position: relative;
		z-index: 1;
		top: 0px;
	}
	ww{
		position: absolute;
		top: 20px;
		z-index: 2;
		color: #fff;
	}
	</style>
	<div>
		<ww><font size="5">PT Textile Sejahtera</font></ww>
		<img src="../img/bg.jpg" width="1500">
	</div>
	<div id="wrapper">
    	<div class="container">
      		<div class="hero-unit">
        		<p>
					Kami adalah sebuah perusahaan yang bergerak dibidang textile. Mengutamakan mutu dan kualitas.</p>
        		
                                
      		</div>

      		<div class="row">
	                <?php
	                $koneksi = "../config/koneksi.php";
                    $sql = "SELECT * FROM tbl_stok ORDER BY kode_barang DESC limit 9
                    ";
					$query = mysqli_query($con, $sql);
                    while($data = mysqli_fetch_array($query)){
                    ?>
        		<div class="span4">
          			<div class="icons-box">
                        <div class="title"><h3><?php echo $data['nama_barang']; ?></h3></div>
                        <img style="width: 300px;height: 300px;" src="../gambar/<?php echo $data['gambar']; ?>" />
						<div><h3>Rp.<?php echo number_format($data['harga'],2,",",".");?></h3></div>
					
					
                    </div>
        		</div>
                <?php   
              }
              
              
              ?>
      		</div>
			<hr>
			<hr>
			<div class="hero-unit">
        		<p>
					Untuk melihat produk lainnya silahkan klik kategori di bagian atas		
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				</p>              
      		</div>
			<<?php include '../footer.php'; ?>

	<div id="copyright"> -->
		<div class="container">
		
			<p>
				Copyright &copy; Novi 2020
			</p>
	
		</div>
	</div>	
<script src="../js/jquery-1.8.2.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/flexslider.js"></script>
<script src="../js/carousel.js"></script>
<script src="../js/jquery.cslider.js"></script>
<script src="../js/slider.js"></script>
<script defer="defer" src="../js/custom.js"></script>
</body>
</html>