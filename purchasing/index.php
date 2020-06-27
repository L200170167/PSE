<?php 	
include "config/koneksi.php";
if (isset($_POST['beli'])) {
	echo "<script>alert('Login Terlebih Dahulu!!!!!!');document.location.href='user/login.php'</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PT Textile Sejahtera</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
</head>
<form method="post">
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="span3">

					
				</div>
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
			              			<li class="active"><a href="index.php">Home</a></li>
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
			              			<li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                  				<li><a href="adminn/loginadmin.php">Admin</a></li>
			                  				<li><a href="user/login.php">Konsumen</a></li>
			                			</ul>
			              			</li>
			            		</ul>
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
		<img src="img/bg.jpg" width="1500">
	</div>
		
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		<div class="hero-unit">
        		<p>
					Kami adalah sebuah perusahaan yang bergerak dibidang textile. Mengutamakan mutu dan kualitas.			</p>
        		
                                
      		</div>
            
      		<div class="row">
	                <?php
	                include "config/koneksi.php";
                    $sql = "SELECT * FROM tbl_stok ORDER BY kode_barang DESC limit 9";
					$query = mysqli_query($con, $sql);
                    while($data = mysqli_fetch_array($query)){
                    ?>
        		<div class="span4">
          			<div class="icons-box">
                        <div class="title"><h3><?php echo $data['nama_barang']; ?></h3></div>
                        <img style="width: 300px; height: 300px;" src="gambar/<?php echo $data['gambar']; ?>" />
						<div><h3>Rp.<?php echo number_format($data['harga'],2,",",".");?></h3></div>
						<div class="clear">
							<a class="btn btn-lg btn-primary" href="detail_produk.php?kd=<?php echo $data['kode_barang']?>">Detail</a>
							<input type="submit" name="beli" class="btn btn-lg btn-success" value="Beli &raquo;">
						</div>
					
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
      			  <div id="intro">
	  
			<div class="intro-text">
				<div class="container">
					<div class="row">
					
						
					<div class="col-md-12">
						
						<div class="brand">
							<font size="10" face="Broadway" color="white"><b>PT Textile Sejahtera</b></font><br>
							<center><img src='img/1.png' width="500" height="300"></center>
							<center><h1><a href="../spk_pegawai/index.php">Lowongan Kerja PT Textile Sejahtera<br></a></h1>
							
							<p><span>Bergabung bersama kami untuk mendapatkan karir yang lebih baik</span></p></center><br>
							
						</div>
					</div>
					</div>
				</div>
		 	</div>
			
	 </div>
<?php include "footer.php";  ?>	
	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<p>
				Copyright &copy; Novi 2020
			</p>
	
		</div>
		<!-- end: Container  -->
		
	</div>	
	<!-- end: Copyright -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script defer="defer" src="js/custom.js"></script>
<!-- end: Java Script -->

</body>
</form>
</html>