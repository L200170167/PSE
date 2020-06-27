<?php require_once("../config/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
        
    	if(empty($_SESSION['username'])){
			echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
		}
    } 

    include "../config/koneksi.php";
    include "library/controllers.php";

    $perintah = new oop();
    $email = $perintah->tampil($con,"tbl_user WHERE username='$_SESSION[username]'");
    foreach ($email as $email) {
    	$e = $email['email'];
    }
    $table = "tbl_testimoni";
    @$isi = "nama = '$_POST[nama]',email = '$_POST[email]', komentar = '$_POST[komentar]'";
	$form = "?menu=testimoni.php";

	if (isset($_POST['kirim'])) {
		if (empty($_POST['nama']) or empty($_POST['email']) or empty($_POST['komentar'])) {
			echo "<script>alert('Harap Lengkapi!!!');document.location.href='$form'</script>";
		}
		$perintah->simpan($con, $table, $isi,$form);
	}

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
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
									<li class="active"><a style="color: blue;" href="testimoni.php">Testimoni</a></li>
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
	
	<div id="page-title">

		<div id="page-title-inner">
			<div class="container">
				<h2><i class="ico-stats ico-white"></i>Testimoni</h2>
			</div>
		</div>
	<div id="wrapper">
    	<div class="container"> 
        <center><div class="title" style="margin-left: ;"><h3>Berikan masukan untuk kami, Agar kami bisa melayani anda lebih baik lagi...</h3></div></center>
        <center>
            <form id="formku" method="post" onsubmit="return formCheck(this);">

      	<form class="form-signin">
      		<label for="nama">Nama</label>
      		<input type="input" name="nama" readonly value="<?php echo $_SESSION['nama_user']?>" class="reqiured" placeholder="Nama Anda"  /><br>
      		<label for="email">Email</label>
      		<input type="text" class="required email" name="email" readonly value="<?php echo $e?>" />
      		<label for="komentar">Testimoni Anda</label>
      		<textarea name="komentar" class="required" placeholder="Testimoni Anda"></textarea>
      		
      	</form>
</center>
<br><br><br>
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
		color: navy;
		font-family: Arial Rounded MT Bold;
		font-size: 40px;
		border-bottom: 1px solid black;
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
				<div class="title"><h3><?php echo $data['nama']; ?></h3></div><br>
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
								<p>Dapatkan kemudahan berbelanja di FoodShop Bogor, Kami menyediakan berbagai makanan ringan dan frozen food.</p>
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
								<p>Anda bisa memesan produk kami melalui gadget kesayangan anda, belanja di FoodShop Bogor praktis dan mudah.</p>
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