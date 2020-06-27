<?php 
	if (!isset($_SESSION)) {
        session_start();
        
    	if(empty($_SESSION['username'])){
			echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
		}
    }
    include "../config/koneksi.php";
    include "library/controllers.php";
    $perintah = new oop();
    $table = "tbl_penjualan";
    $form = "detail.php"; 
    if (isset($_POST['beli'])) {
    	$query = mysqli_query($con, "SELECT * FROM tbl_stok WHERE kode_barang='$_GET[kd]'");
		$data  = mysqli_fetch_array($query);
		$sql = mysqli_query($con, "SELECT * FROM tbl_penjualan WHERE kode_barang='$_GET[kd]' AND username='$_SESSION[username]' AND kode_penjualan='0'");
		$dati  = mysqli_fetch_array($sql);
		$where = "id = '$dati[id]'";
		if ($data['kode_barang']==$dati['kode_barang']) {
			$jumlah = $_POST['jumlah_beli']+$dati['jumlah'];
			$isi = "jumlah ='$jumlah'";
			$perintah->ubah($con, $table,$isi, $where, $form);
		}else{
			$total = $data['harga'] * $_POST['jumlah_beli'];
			$isi = "kode_penjualan='0',kode_barang='$data[kode_barang]',nama_barang='$data[nama_barang]',username='$_SESSION[username]',jumlah='$_POST[jumlah_beli]',harga='$data[harga]',status='Belum dikirim'";
	    	$perintah->simpan($con, $table, $isi,$form);
	    }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>FoodShop</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
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
									<li><a href="testimoni.php">Testimoni</a></li>
                                    <li><a href="detail.php">Keranjang</a></li>
                                    <li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Struk Anda<b class="caret"></b></a>
			                			<ul class="dropdown-menu">
											<?php 
												$sql = mysqli_query($con,"SELECT * FROM tbl_penjualan WHERE username = '$_SESSION[username]'  AND kode_penjualan!='0' GROUP by kode_penjualan");
												foreach ($sql as $data) {
											 ?>
											<li><a href="checkout.php?kode=<?php echo $data['kode_penjualan']; ?>"><?php echo "p000".$data['kode_penjualan']; ?></a></li>
											 <?php 	} ?>			    
			                			</ul>
			              			</li>
                                 	<li><a onclick="return confirm('Yakin mau dihapus?')" href="logout.php">Logout</a></li>
			            		</ul>
			          		</div>
			        	</div>
			      	</div>
					
				</div>
				</div>
			</div>
			</div>
	</header>

	<div id="page-title">
		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Produk Detail Produk</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">              
      		<!-- start: Row -->
            
      		<div class="row">
            <div class="col-sm-6">
                    <?php                  
$query = mysqli_query($con, "SELECT * FROM tbl_stok WHERE kode_barang='$_GET[kd]'");
$data  = mysqli_fetch_array($query);
?>
        		<!--<div class="span4">-->
          			<!--<div class="icons-box">-->
                    <div class="hero-unit" style="margin-left: 20px;">
                    <table>
                    <tr>
                        <td rowspan="7"><img style="width: 300px; height: 300px;" src="../gambar/<?php echo $data['gambar']; ?>" /></td>
                        </tr>
                        <tr>
                        <td colspan="4"><div class="title"><h3><?php echo $data['nama_barang']; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td size="200"><h3>Harga</h3></td>
                        <td><h3>:</h3></td>
						<td><div><h3>Rp.<?php echo number_format($data['harga'],2,",",".");?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Stock</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php if ($data['jumlah'] >= 1){
	                            echo '<strong style="color: blue;">In Stock</strong>';
	                            $button="";	
                                } else {
                                $button="disabled";
	                            echo '<strong style="color: red;">Out Of Stock</strong>';	
                                };
                                 ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><h3>Deskripsi</h3></td>
                        <td><h3>:</h3></td>
                        <td><div><h3><?php echo $data['deskripsi']; ?></h3></div></td>
                        </tr>
					<!--	<p>
						
						</p> -->
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
						<td>
							<input placeholder="Jumlah Beli" required type="number" name="jumlah_beli">
							<div class="clear">	
								<input <?php echo $button ; ?> type="submit"  name="beli" value="BELI" class="btn btn-lg btn-danger">
							</div>
						</td>
                        </tr>
     
                    </table>
                    </div>
                    <!--</div> -->
        		<!--</div> -->
<!---->
      		</div>
			<!-- end: Row -->
					
					
				</div>	
				
					
				</div>
				
                </div>
			</div>
			<!--end: Row-->
	
		</div>
		<!--end: Container-->


	</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Back To Top -->
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

	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<p>
				Copyright &copy; Novi 2020
	
		</div>
		<!-- end: Container  -->
		
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
<!-- end: Java Script -->

</body>
</form>
</html>	