
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>PT Textile Sejahtera</title> 

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
</head>
<body>
	<header>
		<div class="container">
			<div class="row">

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
			              			<li class="dropdown active">
			                			<a href="#" style="color: blue;" class="dropdown-toggle" data-toggle="dropdown">Laporan<b class="caret"></b></a>
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

<?php
	if (!isset($_SESSION)) {
        session_start();
        
    if(empty($_SESSION['username'])){
	echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
	}

    }
    include "config/koneksi.php";
    include "library/controllers.php";

    $perintah = new oop();

    $table = "tbl_stok";
    @$isi = "kode_barang  = '$_POST[kode_barang]', nama_barang = '$_POST[nama_barang]', harga = '$_POST[harga]', id_kategori = '$_POST[id_kategori]', deskripsi = '$_POST[deskripsi]', jumlah = '$_POST[jumlah]', gambar_produk = '$_POST[gambar_produk]'";
$form = "?menu=input_barang";

if (isset($_POST['input'])) {
      $perintah->simpan($con, $table, $isi, $form);
}

    


    ?>
    <div class="container">
    	<div class="row">
	<div class="content-wrapper">
    <section class="content">
      <div class="row">
      			<div class="col-md-12">
      				<br>
      							<center><h1>LAPORAN BARANG</h1></center>	
      				<br>	<br>	
      			</div>
			<div class="col-md-12">
				<a href="data_barang.php">PRINT</a> / <a href="export.php">EXPORT EXEL</a>
				<table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
					<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Id Kategori</th>
						<th>Deskripsi</th>
						<th>Jumlah</th>
						<th>Gambar</th>
					</tr>
					</thead>
					<?php 
			 	$tampil = $perintah->tampil($con, $table);
			 	$no = 0;
			 	foreach($tampil as $field) {
			 		$no++
			 	 ?>
					
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $field['kode_barang']; ?></td>
							<td><?php echo $field['nama_barang']; ?></td>
							<td><?php echo $field['harga']; ?></td>
							<td><?php echo $field['id_kategori']; ?></td>
							<td><?php echo $field['deskripsi']; ?></td>
							<td><?php echo $field['jumlah']; ?></td>
							<td><img style="width: 50px; height: 50px;" src="../gambar/<?php echo $field['gambar']; ?>"></td>
			 	 		</tr>
					
							 	 <?php 	} ?>
				</table>
			</div>
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
<script type="text/javascript" src="bootstrap/js/jquery-1.12.4.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
 		   $('#example').DataTable();
		} );
	</script>
	<script type="text/javascript" src="bootstrap/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>