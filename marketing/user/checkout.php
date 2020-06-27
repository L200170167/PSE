<?php
	error_reporting(0);
	require_once("../config/koneksi.php");
	include "library/controllers.php"; 
	if (!isset($_SESSION)) {
        session_start();
        
    	if(empty($_SESSION['username'])){
			echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
		}
    }
	$perintah = new oop();
	$table = "tbl_penjualan";
	
    $foto = $perintah->tampil($con,"tbl_struk WHERE kode_penjualan='$_GET[kode]'");
    foreach ($foto as $foto) {
    	$f = $foto['gambar'];
    }
    $status = "";	
    if (isset($_POST['upload'])) {
    	$nama_file = $_FILES['gambar']['name'];
    	if ($f==$nama_file) {
    		$status = "Nama gambar sudah ada silahkan ganti nama gambar!";
    	}else{
			$tmp = $_FILES['gambar']['tmp_name'];
			$form = "checkout.php?kode=$_GET[kode]";
			move_uploaded_file($tmp, "../gambar/struk/$nama_file");
			$isi = "kode_penjualan='$_GET[kode]',username='$_SESSION[username]',gambar='$nama_file'";
			$perintah->simpan($con,"tbl_struk", $isi, $form);	
    	}
    }
 ?>
<?php require_once("cart.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>FoodShop</title> 

	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
	<!-- end: Facebook Open Graph -->

    <!-- start: CSS --> 
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
	<!--start: Header -->
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">	
				<div class="logo span2">
						
					<br>
					<a class="brand" href="#"><font size="20" face="Comic sans MS" color="white">FoodShop</font></a>
						
				</div>
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
			              			<li><a href="dashboard_user.php">Home</a></li>
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
                                    <li class="dropdown active">
			                			<a style="color: blue" href="#" class="dropdown-toggle" data-toggle="dropdown">Struk Anda<b class="caret"></b></a>
			                			<ul class="dropdown-menu">
											<?php 
												$sql = mysqli_query($con,"SELECT * FROM tbl_penjualan WHERE username = '$_SESSION[username]' GROUP by kode_penjualan");
												foreach ($sql as $data) {
											 ?>
											<li><a href="checkout.php?kode=<?php echo $data['kode_penjualan']; ?>"><?php echo "p000".$data['kode_penjualan']; ?></a></li>
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
	<!--end: Header-->
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-usd ico-white"></i>Checkout Keranjang</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">
			<h3>Stuk No : <?="P00".$_GET['kode'] ?></h3>
			<!-- start: Table -->
                 <div class="table-responsive">
                 <div class="title"><h3>Form Checkout</h3></div>
                 <div class="container">
				<table class="table table-hover table-condensed">
				<tr>
                    <th><center>Kode Barang</center></th>
					<th><center>Nama Barang</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Harga Satuan</center></th>
					<th><center>Sub Total</center></th>
					<th><center>Status</center></th>
				</tr>
 			    <?php
 			    $total = 0;
            $query = mysqli_query($con, "select * from tbl_penjualan where username = '$_SESSION[username]' AND kode_penjualan='$_GET[kode]' ORDER BY status ASC");
            while ($data = mysqli_fetch_array($query)){
            $subtotal = $data['jumlah']*$data['harga'];
            $total = $total + $subtotal;
            ?>
                <tr>
                <td><center><?php echo $data['kode_barang']; ?></center></td>
                <td><center><?php echo $data['nama_barang']; ?></center></td>
                <td><center><?php echo $data['jumlah']; ?></center></td>
                <td><center><?php echo "Rp.".number_format($data['harga'],2,",","."); ?></center></td>
                <td><center><?php $subtotal = $data['jumlah']*$data['harga'];  echo "Rp.".number_format($subtotal,2,",","."); ?></center></td>
                <td><center><?php echo $data['status']; ?></center></td>
                <td>
                	<style type="text/css">
                		#popup{
                			width: 100%;
                			height: 100%;
                			position: fixed;
                			background-color: rgba(0,0,0,.7);
                			top: 0;
                			left: 0;
                			z-index: 9999;
                			visibility: hidden;
                		}
                		.window{
                			width: 50%;
                			height: 20%;
                			background: #fff;
                			border-radius: 10px;
                			position: relative;
                			padding: 10px;
                			text-align: center;
                			margin: 15% auto;
                		}
                		#popup:target{
                			visibility: visible;
                		}
                	</style>
                </td>
                </tr>
                <?php 	}?>
                <?php
				if($total == 0){
					echo '<tr><td colspan="4" align="center">Ups, Keranjang kosong!</td></tr></table>';
					echo '<p><div align="right">
						<a href="dashboard_user.php" class="btn btn-info btn-lg">&laquo; Continue Shopping</a>
						</div></p>';
				} else {
					echo '
						<tr style="background-color: #DDD;"><td colspan="4"><b>Total :</b></td><td><b><center>Rp. '.number_format($total,2,",",".").'</center></b></td></td></td><td></td><td></td></tr></table>
						<p><div align="right">
						
						<a href="#popup" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart icon-white"></i>UPLOAD BUKTI PEMBAYARAN &raquo;</a>
						</div></p>
					';
				}
				?>
                </div>
                <div class="hero-unit">Total Belanja Anda Rp. <?php echo number_format($total,2,",","."); ?>,-</div>
                <div class="hero-unit">Silahkan melakukan pembayaran  ke <br>
				<strong>BANK MANDIRI 127-001923 AN. Novi Tristanti</div>  
                </div>
                <table align="center">
                	<tr>
                		<td colspan="2" align="center">
                			<h1>No Resi Anda</h1><br>
                			<?php 
                				$r = $perintah->tampil($con,"tbl_bukti where kode_penjualan='$_GET[kode]'");
                				foreach ($r as $r) {
                					echo "<h3>$r[no_resi]</h3><br>";
                				}
                			 ?>
       	 				</td>
                	</tr>
                </table>
                <table align="center">
                	<tr>
                		<td colspan="2" align="center">
                			<h1>Foto Struk Anda</h1><br>
                		 	<img style="width: 200px;height: 200px;" src="../gambar/struk/<?php echo $f ?>">
       	 				</td>
                	</tr>
                </table>
                   <center>
                   		<div id="popup">
                		 	<div class="window">
                		 		<a href="#">TUTUP</a>
                		 		<br>
                		 		<?php echo $status; ?>
                		 		<br>
                		 		Harap hati-hati saat mengupload foto karena anda hanya bisa mengupload satu kali saja!
                		 		<form method="post"  enctype="multipart/form-data">
                		 		<table align="center">
                		 			<tr>
                		 				<td><h4>FOTO STRUK TRANSFER</h4></td>
                		 				<td><input required type="file" name="gambar"></td>
                		 			</tr>
                		 			<tr>
                		 				<td colspan="2" align="center">
                		 					<input class="btn btn-success" type="submit" name="upload" value="UPLOAD">
                		 				</td>
                		 			</tr>
                		 		</table>
                		 		</form>
                		 	</div>
                		 </div>
                   </center>
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<!-- start: Footer -->
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="span3">
					
					<h3>Tentang FoodShop</h3>
					<p>
						FoodShop adalah toko makanan ringan terlengkap di Surakarta, dengan kualitas makanan yang sangat baik dan melalui proses pembuatan yang terjamin kebersihannya.
					</p>
						
				</div>
				<div class="span3">
					
					<h3>Alamat Kami</h3>
					Jl. Ahmad Yani, Gonilan, Kartasura, Gonilan, Kec. Kartasura, Kabupaten Sukoharjo, Jawa Tengah 57169<br />
                    Telp : 081817041553<br />
                    Email : <a href="mailto:Eithreeshopbogor@gmail.com">FoodShopSurakarta@gmail.com</a> / <a href="mailto:FoodShopSurakarta@gmail.com">FoodShopSurakarta2@gmail.com</a>
				</div>

				<div class="span6">
					<h3>Follow Us!</h3>
					<ul class="social-grid">
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-twitter">
											<a href="http://twitter.com"></a>
										</div>
										<div class="social-info-back social-twitter-hover">
											<a href="http://twitter.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-facebook">
											<a href="http://facebook.com"></a>
										</div>
										<div class="social-info-back social-facebook-hover">
											<a href="http://facebook.com"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-dribbble">
											<a href="http://dribbble.com"></a>
										</div>
										<div class="social-info-back social-dribbble-hover">
											<a href="http://dribbble.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-flickr">
											<a href="http://flickr.com"></a>
										</div>
										<div class="social-info-back social-flickr-hover">
											<a href="http://flickr.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="copyright">
		<div class="container">
		
			<p>
				Copyright &copy; Novi 2020
			</p>
	
		</div>
	</div>	
	<!-- end: Copyright -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.8.2.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/flexslider.js"></script>
<script src="../js/carousel.js"></script>
<script src="../js/jquery.cslider.js"></script>
<script src="../js/slider.js"></script>
<script def src="../js/custom.js"></script>

<script src="jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
    
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
    </style>
<!-- end: Java Script -->

</body>
</html>