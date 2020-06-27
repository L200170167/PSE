<?php 
	require_once("../config/koneksi.php");
	include "library/controllers.php";
	$perintah = new oop(); 
	$table = "tbl_penjualan";
	@$where = "id = '$_GET[id]'";
	$form = "#"; 
    if (!isset($_SESSION)) {
        session_start();
    	if(empty($_SESSION['username'])){
			echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
		}
    }
    if(isset($_GET['hapus'])){
    	$perintah->hapus($con, $table, $where, $form);
    }
    $data = $perintah->tampil($con,$table." ORDER BY kode_penjualan ASC");
	foreach ($data as $data) {
		$kode = $data['kode_penjualan']+1;
	}
    if (isset($_GET['ubah'])) {
    	$isi = "kode_penjualan = '$kode'";
		$where = "username = '$_SESSION[username]' AND kode_penjualan='0'";
		$form = "checkout.php?kode=$kode";
    	$perintah->ubah($con, $table,$isi, $where, $form);
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PT Textile Sejahtera</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>

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

                                    <li class="active"><a href="detail.php">Keranjang</a></li>
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

	</div>
	<div id="page-title">

		<div id="page-title-inner">

			<div class="container">

				<h2><i class="ico-usd ico-white"></i>Keranjang</h2>

			</div>
		</div>	

	</div>
	<div id="wrapper">
		<div class="container">
            <div class="title"><h3>Detail Keranjang Belanja</h3></div>
				<table class="table table-hover table-condensed">
				<tr>
                    <th><center>Kode Barang</center></th>
					<th><center>Nama Barang</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Harga Satuan</center></th>
					<th><center>Sub Total</center></th>
					<th><center>Status</center></th>
					<th><center>Aksi</center></th>
				</tr>
 			    <?php
 			    $total = 0;
            $query = mysqli_query($con, "select * from tbl_penjualan where username = '$_SESSION[username]' AND kode_penjualan='0' ORDER BY status ASC");
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
                		/*.a{
                			width: 100px;
                			height: 30px;
                			vertical-align: middle;
                			background-color: #f00;
                			color: #fff;
                			text-decoration: none;
                			padding: 10px;
                			border-radius: 10px;
                			border-radius: 1px solid transparent;
                		}*/
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
                			width: 400px;
                			height: 100px;
                			background: #fff;
                			border-radius: 10px;
                			position: relative;
                			padding: 10px;
                			text-align: center;
                			margin: 15% auto;
                		}
                		.window h2{
                			margin: 30px 0 0 0;
                			text-align: top right;
                		}
                		#popup:target{
                			visibility: visible;
                		}
                	</style>
                	<center>
                		<?php 
                			if (isset($_POST['jbaru'])) {
                				$z = $perintah->tampil($con,"tbl_stok where kode_barang='$_GET[k]'");
                				foreach ($z as $z) {
                					$zz = $z['jumlah'];
                				}
                				$q = $_POST['jbarua'] - $data['jumlah'];
                				$zz = $zz - $q;
						    	$where = "id = '$_GET[id]'";
						    	$isi = "jumlah ='$_POST[jbarua]'";
						    	$form = "detail.php";
								$perintah->ubah($con, $table,$isi, $where, "");
								$perintah->ubah($con, "tbl_stok","jumlah = '$zz'", "kode_barang='$_GET[k]'", $form);
    						}
                			if ($data['status']=="terkirim") {}else{
                		 ?>
                		 <a href="?id=<?php echo $data['id']; ?>&k=<?php echo $data['kode_barang'] ?>#popup" class="a btn btn-danger">Ubah Jumlah</a>
                		 <div id="popup">
                		 	<div class="window">
                		 		<a href="#">TUTUP</a>
                		 		<br>
                		 		<form method="post">
                		 		<table align="center">
                		 			<tr>
                		 				<td><h4>Jumlah baru</h4></td>
                		 				<td>:</td>
                		 				<td><input required type="number" name="jbarua"></td>
                		 			</tr>
                		 			<tr>
                		 				<td colspan="2"></td>
                		 				<td><input class="btn btn-success" type="submit" name="jbaru" value="UBAH"></td>
                		 			</tr>
                		 		</table>
                		 		</form>
                		 	</div>
                		 </div>
                		 <a onclick="return confirm('Yakin mau dihapus?')" href="?menu=form&hapus&id=<?php echo $data['id'] ?>" class="btn btn-danger">BATAL BELI</a>
                		 <?php } ?>	
                	</center>
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
						<a href="dashboard_user.php" class="btn btn-info">&laquo; CONTINUE SHOPPING</a>
						<a onclick="return confirm(Yakin mau dihapus?)" href="?ubah" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT &raquo;</a>
						</div></p>
					';
				}
				?>
		</div>
	</div>

		<div id="footer">
		<div class="container">
			<div class="row">
				<div class="span3">
					
					<h3>Tentang</h3>
					<p>
						PT Textile Sejahtera adalah sebuah perusahaan yang bergerak dibidang textile
					</p>	
				</div>
				<div class="span3">
					
					<h3>Alamat Kami</h3>
					Jl. Ahmad Yani, Pabelan, Kartasura, Surakarta 57162, Jawa Tengah, Indonesia<br />
                    Telp : 081817041553<br />
                    Email : <a href="mailto:TextileSejahtera@gmail.com">TextileSejahtera@gmail.com</a>
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
<script def src="js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>