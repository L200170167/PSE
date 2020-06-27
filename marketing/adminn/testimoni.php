<?php require_once("../config/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
        
    if(empty($_SESSION['username'])){
	echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
	}

    } 

    include "config/koneksi.php";
    include "library/controllers.php";

    $perintah = new oop();

    $table = "tbl_testimoni";
    @$where = "id_testi = '$_GET[id]'"; 
    $form = "?menu=testimoni";	
    if (isset($_GET['hapus'])) {
		$perintah->hapus($con, $table, $where, $form);
	}
    ?>
    <!-- navnya belum diganti -->
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>EithreeShop</title> 
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
				<div class="logo span3">
						
					<a class="brand" href="#"><img src="../img/logoy.png" alt="Logo"></a>
						
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
			            			<li><a href="dashboard_admin.php">Home</a></li>
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
			                  				<li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
			                  				
			                			</ul>
			              			</li>
			              			<li class="dropdown active">
			                			<a href="#" style="color: blue;" class="dropdown-toggle" data-toggle="dropdown">Pelanggan<b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                				<li><a href="bukti_kirim.php">Bukti Transfer Pelanggan</a></li>
			                				<li><a href="testimoni.php">Testimoni Pelanggan</a></li>
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
	
	<div id="page-title">

		<div id="page-title-inner">
			<div class="container">
				<h2><i class="ico-stats ico-white"></i>Testimoni</h2>
			</div>
		</div>
	<div id="wrapper">
    	<div class="container"> 

<style type="text/css">
	.jud_testi{
	color: #0089E6;
	text-decoration-color: #0089E6;
	}
	.komentar{
	background-color: white;
	color: black;
	font-family: Consolas;
    font-size: 14px;
    font-weight: none;	
    border: 1px solid #;
    width: 100%;
    height: 400px;
    overflow: scroll;
	}
	.name_testi{
		color: red;
		font-family: Arial Rounded MT Bold;
		font-size: 40px;
		border-bottom: 10px solid black;
		margin-top: 10px;
		height: 7%;
	}
	.mail_testi{
		font-family: Microsoft Tai Le;
		margin-top: 0.0001%;
	}

</style>
	<div class="row">
		<div class="panel">
			<div class="jud_testi"><h3><center>Testimoni Para Pelanggan</center></h3></div>
			<div class="komentar">
				<?php 
					$sql = "select * from tbl_testimoni";
					$query = mysqli_query($con, $sql);
					while($data = mysqli_fetch_array($query)){
				?>
				<div class="title">
					<h3><?php echo $data['nama']; ?></h3>
					<a class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')" href="?menu=form&hapus&id=<?php echo $data['id_testi'] ?>">HAPUS</a>		
				</div>
				<br>
				<div class="mail_testi"><a href="#"><?php echo $data['email']; ?></a></div>
				<div class="testimoninya">"<?php echo $data['komentar']; ?>"</div>
				<hr style="border-bottom: 1px solid black;">
				<?php } ?>
			</div>
		</div>
	</div>	
</div>

</div>
	<div id="wrapper">
		<br><hr><hr>
		<div class="container">
			<div class="row">
				<div class="icons-box-vert-container">
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ok ico-color circle-color big"></i>
							<div class="icons-box-vert-info">
								<h3>Kemudahan Berbelanja</h3>
								<p>Dapatkan kemudahan berbelanja di EithreeShop Bogor, Kami menyediakan berbagai makanan ringan dan frozen food.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-cup  ico-white circle-color-full big-color"></i>
							<div class="icons-box-vert-info">
								<h3>Juara Pengiriman Delivery</h3>
								<p>Dapatkan kemudahan pengiriman barang ke rumah anda dengan minimal belanja 300 ribu radius 10km dari kantor kami.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ipad ico-color circle-color big"></i>
							<div class="icons-box-vert-info">
								<h3>Berbelanja Dengan Gadget</h3>
								<p>Anda bisa memesan produk kami melalui gadget kesayangan anda, belanja di EithreeShop Bogor praktis dan mudah.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-thumbs-up  ico-white circle-color-full big-color"></i>
							<div class="icons-box-vert-info">
								<h3>Sosial Media</h3>
								<p>Follow twitter dan fan page facebook kami untuk mendapatkan update promo special setiap harinya.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<hr>
		</div>
	</div>
</div>
<div id="footer">
		<div class="container">
			<div class="row">
				<div class="span3">
					
					<h3>Tentang EithreeShop</h3>
					<p>
						EithreeShop adalah toko makanan ringan terlengkap di Bogor, dengan kualitas makanan yang sangat baik dan melalui proses pembuatan yang terjamin kebersihannya.
					</p>
						
				</div>
				<div class="span3">
					
					<h3>Alamat Kami</h3>
					Kp.KotaBatu Ds.Cilember Kec.Cisarua Kab.Bogor<br />
                    Telp : 083819041553<br />
                    Email : <a href="mailto:Eithreeshopbogor@gmail.com">Eithreeshopbogor@gmail.com</a> / <a href="mailto:Eithreeshopindo@gmail.com">Eithreeshopindo@gmail.com</a>
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
				Copyright &copy; <a href="http://eithree.000webhostapp.com">EithreeShop 2018</a> <a href="http://bootstrapmaster.com" alt="Bootstrap Themes">Bootstrap Themes</a> designed by BootstrapMaster
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
<!-- end: Java Script -->
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
    
    <script type="text/javascript">
    x=0;
    $(document).ready(function(){
       $(".komentar").scroll(function(){
        $("span").text(x+=1);
       }); 
    });
    </script>

</body>
</html>