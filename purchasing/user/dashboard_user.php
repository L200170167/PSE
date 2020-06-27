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

				<div class="span10">
					
					<div class="navbar navbar-inverse">
			    		<div class="navbar-inner">
			          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			          		</a>
			          		<div class="nav-collapse collapse">
			            		<ul class="nav">
			              			<li class="active"><a href="dashboard_user.php">Home</a></li>
			              			<li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori<b class="caret"></b></a>
			                			<ul class="dropdown-menu">
											<?php 
												$sql = mysqli_query($con,"SELECT * FROM tbl_kategori");
												foreach ($sql as $data) {
											 ?>
											<li><a href="tampil_barang.php?id=<?php echo $data['id_kategori']; ?>"><?php echo $data['kategori']; ?></a></li>
											 <?php 	} ?>			    
			                			</ul>
			              			</li>

                                    <li><a href="detail.php">Keranjang</a></li>
                                    <li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Struk Anda<b class="caret"></b></a>
			                			<ul class="dropdown-menu">
											<?php 
												$sql = mysqli_query($con,"SELECT * FROM tbl_penjualan WHERE username = '$_SESSION[username]' AND kode_penjualan!='0' GROUP by kode_penjualan");
												foreach ($sql as $data) {
											 ?>
											<li><a href="checkout.php?kode=<?php echo $data['kode_penjualan']; ?>"><?php echo "P000".$data['kode_penjualan']; ?></a></li>
											 <?php 	} ?>			    
			                			</ul>
			              			</li>
                                 	<li><a onclick="return confirm('Yakin mau keluar?')" href="logout.php">Logout</a></li>
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
		
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		<div class="hero-unit">
        		<p>
					Kami adalah sebuah perusahaan yang bergerak dibidang textile. Mengutamakan mutu dan kualitas.</p>
        		
                                
      		</div>
	<div id="wrapper">
    	<div class="container">

      		<div class="row">
	                <?php
	                $koneksi = "../config/koneksi.php";
                    $sql = "SELECT * FROM tbl_stok ORDER BY kode_barang DESC limit 9";
					$query = mysqli_query($con, $sql);
                    while($data = mysqli_fetch_array($query)){
                    ?>
        		<div class="span4">
          			<div class="icons-box">
                        <div class="title"><h3><?php echo $data['nama_barang']; ?></h3></div>
                        <img style="width: 300px;height: 300px;" src="../gambar/<?php echo $data['gambar']; ?>" />
						<div><h3>Rp.<?php echo number_format($data['harga'],2,",",".");?></h3></div>
						<div class="clear"><a href="detailproduk.php?kd=<?php echo $data['kode_barang'];?>" class="btn btn-lg btn-primary">Detail</a> <a href="detailproduk.php?kd=<?php echo $data['kode_barang'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div>
					
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

<<?php include "../footer.php"; ?>
	<div id="copyright">
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