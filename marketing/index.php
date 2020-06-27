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
	<title>PT. Textile Sejahtera</title> 
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
				<div class="logo span3">
						<br>
					<a class="brand" href="#"><font size="20" face="Comic sans MS" color="white">Textile</font></a>
						
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
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                  				<li><a href="adminn/loginadmin.php">Admin</a></li>
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
		<div class="slider-wrapper">

		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2>PT. Textile Sejahtera</h2>
				<br>
				<div class="da-img"><img style="width: 400px; height: 400px; border-radius: 10px;" src="img/pabrik.jpg" alt="image01" /></div>
			</div>
			<div class="da-slide">
			<h2>Selamat Datang ! </h2>
				
				<div class="da-img"><img style="width: 400px; height: 400px; border-radius: 10px;" src="img/pabrik2.jpg" alt="image02" /></div>
			</div>
			<div class="da-slide">
				<p>Kami adalah perusahaan textile terbesar di Indonesia dengan hasil produksi textile kami yang sangat bagus dan memiliki kualitas premium</p>
				
				<div class="da-img"><img style="width: 400px; height: 300px; border-radius: 10px;"  src="img/pabrik3.jpg" alt="image04" /></div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>
		
	</div>
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		<div class="hero-unit">
        		<p>
					Kami adalah perusahaan textile terbaik di Surakarta. Kami menghasilkan kualitas textile yang bagus dan premium.				</p>
        		
                                
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
					
                    </div>
        		</div>
                <?php   
              }
              
              
              ?>
      		</div>
      		
			<hr>
		
			<hr>
			
		<!--end: Container-->
	
	</div>

		<div id="footer">
		<div class="container">
			<div class="row">
				<div class="span3">
					
					<h3>Hubungi Kami</h3>
					Jl. Ahmad Yani, Pabelan, Kartasura, Surakarta  57162, Jawa Tengah<br />
                    Telp : 0271 345677<br />
                    Email : <a href="mailto:textilesejahtera@gmail.com">textilesejahtera@gmail.com</a>
				</div>
			</div>
		</div>
	</div>

	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<p>
				Copyright &copy; Yarin 2020
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