<?php
if (!isset($_SESSION)) {
        session_start();
        
    if(empty($_SESSION['username'])){
	echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
	}

    }
include "config/koneksi.php";
include "library/controllers.php";

error_reporting(0);
$perintah = new oop();

$table = "tbl_kategori";
$where = "id_kategori = '$_GET[id]'";
$form = "?menu=input_kategori";
$id = $perintah->tampil($con,$table);
$e=1;
foreach ($id as $id ) {
$e= intval($id['id'])+1;
}
if (isset($_POST['input'])) {
	$d = "k00".$e;
	$isi = "id='$e', id_kategori = '$d', kategori = '$_POST[kategori]'";
    $perintah->simpan($con, $table, $isi,$form);
}

if (isset($_GET['hapus'])) {
	$perintah->hapus($con, $table, $where, $form);
}

if (isset($_GET['edit'])) {
	$edit = $perintah->edit($con, $table, $where);
	foreach ($edit as $edit) {}
	$e = $edit['id'];
}

if (isset($_POST['ubah'])){
	$d = "k00".$e;
	$isi = "id_kategori = '$d', kategori = '$_POST[kategori]'";
	$perintah->ubah($con, $table,$isi, $where, $form);
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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http:/fonts.googleapis.com/css?family=Droid+Serif">
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
			              			<li class="dropdown active">
			                			<a href="#" style="color:blue;" class="dropdown-toggle" data-toggle="dropdown">Input<b class="caret"></b></a>
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
			<div class="container">
				<div class="row">
				<form method="post">
					<div class="panel panel-default">
						<div class="panel-heading">
							<center><h2 class="panel-title">INPUT KATEGORI</h2></center>
						</div>
						<div class="panel-body" align="center">
						<div class="col-md-12 col-md-offset-4">	
							<label><h3>Id Kategori</h3></label>
							<input type="text" name="id_kategori" class="form-group" disabled value="<?php echo 'k00'.$e ?>" required style="width: 400px; height: 20px; background-color: white;" >
						</div>
						<div class="col-md-12 col-md-offset-4">	
							<label><h3>Kategori</h3></label>
							<input type="text" name="kategori" class="form-group" value="<?php echo @$edit['kategori'] ?>" required style="width: 400px;">
						</div>
						<div class="col-md-12 col-md-offset-4">	
							<?php if (@$_GET[id] == ""){?>
          						<input class="btn btn-success" type="submit" name="input" value="INPUT">
        					<?php }else{ ?>
          						<input class="btn btn-success" type="submit" name="ubah" value="UBAH">
        					<?php } ?> 
						</div>
						</div>
					</div>
				</form>	
				</div>

				      <div class="row">

		<div class="container">
			<div class="panel-heading" >	
			<h3 class="panel-title">BARANG</h3>
			</div>
			<div class="panel-body">
				<table id="table1" class="table table-stripped table-hover table-responsive" style="width: 100%">
			 	<tr>
			 		<th><center><h4>No</h4></center></th>
			 		<th><center><h4>Id Kategori</h4></center></th>
			 		<th><center><h4>Kategori</h4></center></th>
         			<th><center><h4>AKSI</h4></center></th>
			 	</tr>
			 	<?php 
			 	$tampil = $perintah->tampil($con, $table);
			 	$no = 0;
			 	foreach($tampil as $field) {
			 		$no++
			 	 ?>
			 	 <tr>
			 	 	<td><center><?php echo $no; ?></center></td>
			 	 	<td><center><?php echo $field['id_kategori']; ?></center></td>
			 	 	<td><center><?php echo $field['kategori']; ?></center></td>
			 	 	<td><center><a onclick="return confirm('Yakin mau dihapus?')" href="?menu=form&hapus&id=<?php echo $field[id_kategori] ?>" class="btn btn-danger">HAPUS</a>
			 	 	<a  class="btn btn-primary" href="?menu=form&edit&id=<?php echo $field[id_kategori] ?>">EDIT</a></center></td>
			 	 </tr>
			 	 <?php 	}
			 	  ?>
			 </table>
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
			</p>
	
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
<script defer="defer" src="../js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>