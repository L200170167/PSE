<?php require_once("../config/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
        
    if(empty($_SESSION['username'])){
	echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
	}

    }
    error_reporting(0); 
include "../config/koneksi.php";
include "library/controllers.php";

$perintah = new oop();
if (isset($_POST['cari'])) {
	$foto = $perintah->tampil($con,"tbl_struk WHERE kode_penjualan='$_POST[kode]';");
	foreach ($foto as $foto) {
		$f = $foto['gambar'];
	}
	if (empty($f)) {
		echo "<script>alert('Pelanggan belum upload foto')</script>";
	}
}

    ?>
<!DOCTYPE html>
<html lang="en">
<form method="post">
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

			                  				
			                			</ul>
			              			</li>
			              			<li class="dropdown active">
			                			<a href="#" style="color: blue;" class="dropdown-toggle" data-toggle="dropdown">Pelanggan<b class="caret"></b></a>
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

	</div>
	<div style="margin-top: 20px;" class="container" align="center">
		<select name="kode">
			<option>Pilih Kode Penjualan</option>
			<?php 
				$data1 = $perintah->tampil($con,"tbl_penjualan group by kode_penjualan");
				foreach ($data1 as $data1) {
			 ?>
			<option value="<?=$data1['kode_penjualan']?>"><?="P00".$data1['kode_penjualan']?></option>
			<?php } ?>
		</select>
		<input style="margin-top: -10px;" type="submit" name="cari" value="CARI" class="btn btn-info">
		<table align="center">
            <tr>
                <td colspan="2" align="center">
           			<h1>Foto Struk</h1><br>
           		 	<img style="width: 400px;height: 400px;" src="../gambar/struk/<?php echo $f ?>">
      			</td>
            </tr>
        </table>
	</div>
	

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
</form>