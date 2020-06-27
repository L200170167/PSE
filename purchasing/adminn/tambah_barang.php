<?php
	if (!isset($_SESSION)) {
        session_start();
        
    if(empty($_SESSION['username'])){
	echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
	}

    }

    include "../config/koneksi.php";
    include "library/controllers.php";

	error_reporting(0);

    $perintah = new oop();

    $table = "tbl_pembelian";
    @$isi = "kode_pemasukan ='$_POST[kode_pemasukan]',id = '$_POST[kode_barang]',jumlah = '$_POST[jumlah]'";
	$form = "?menu=tambah_barang";
	$where = "kode_pemasukan = '$_GET[id]'";
	$id = $perintah->tampil($con,$table);
	$e=1;
	foreach ($id as $id ) {
		$e= intval($id['id_pemasukan'])+1;
	}


if (isset($_POST['input'])) {
	if($_POST['kode_barang']=="belum"){
      	echo "<script>alert('Pilih barang terlebih dahulu !')</script>";
	}else{
		$d = "p00".$e;
		$perintah->simpan($con, $table, $isi, $form);
	}
}


if (isset($_GET['hapus'])) {
	$perintah->hapus($con, $table, $where, $form);
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
			              			<li class="dropdown active">
			                			<a href="#" style="color: blue;" class="dropdown-toggle" data-toggle="dropdown">Tambah<b class="caret"></b></a>
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
					<div class="panel panel-default">
						<div class="panel-heading">
							<center><h2 class="panel-title">TAMBAH STOK</h2></center>
						</div>
						<div class="panel-body" align="center">
						<form method="post">
						<div class="col-md-12 col-md-offset-4">
							<input value="<?php echo "p00".$e;?>" type="text" readonly name="kode_pemasukan" class="form-group" required style="width: 400px; height: 20px;" placeholder="Kode Pemasukan" >
						</div>
						<div class="col-md-12 col-md-offset-4">
							<select name="kode_barang" class="form-group" required style="width: 400px;">
								<option value="belum">Pilih barang</option>
								<?php 
									$data = $perintah->tampil($con,"tbl_stok");
									foreach ($data as $data) {
								 ?>
								 <option value="<?php echo $data['id']?>"><?php echo $data['nama_barang']; ?></option>
								 <?php } ?>
							</select>	
						</div>
						<div class="col-md-12 col-md-offset-4">	
							<input type="number" name="jumlah" class="form-group" placeholder="Jumlah barang" required style="width: 400px;">
						</div>
						<div class="col-md-12 col-md-offset-4">	
							<?php if (@$_GET[id] == ""){?>
          						<input class="btn btn-success" type="submit" name="input" value="INPUT">
        					<?php }else{ ?>
          						<input class="btn btn-success" type="submit" name="ubah" value="UBAH">
        					<?php } ?> 
						</div>
						</form>	
						</div>
					</div>
				</div>
			<div class="row">
					<div class="panel panel-default">
			<div class="panel-heading">	
			<h3 class="panel-title">TAMBAH STOK</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-16">
				<table class="table table-stripped table-hover">
			 	<tr>
			 		<th class="text-center">No</th>
			 		<th class="text-center">Kode Pemasukan</th>
			 		<th class="text-center">Kode Barang</th>
			 		<th class="text-center">Nama Barang</th>
			 		<th class="text-center">Jumlah</th>
			 		<th class="text-center">Jumlah Total</th>
					<th class="text-center">Tanggal</th>
          			<th colspan="2">AKSI</th>
			 	</tr>
			 	<?php 
			 	$tampil = $perintah->tampil($con, $table, $isi);
			 	$no = 0;
			 		$tanggal = 'tanggal_masuk';
			 	foreach($tampil as $field) {
			 		$no++

			 	 ?>
			 	 <tr>
			 	 	<td><?php echo $no; ?></td>
			 	 	<td><?php echo $field['kode_pemasukan']; ?></td>
			 	 	<td><?php echo 'b00'.$field['id']; ?></td>
			 	 	<?php 
			 	 		$sql = "select nama_barang ,jumlah from tbl_stok where id = '$field[id]'";
			 	 		$query = mysqli_query($con, $sql);
			 	 		while ($data = mysqli_fetch_array($query)) {
			 	 			$a = $data['nama_barang'];
			 	 			$b = $data['jumlah'];
			 	 		}
			 	 	 ?>
			 	 	<td><?php echo $a; ?></td>
			 	 	<td><?php echo $field['jumlah']; ?></td>
			 	 	<td><?php echo $b; ?></td>
			 	 	<td><?php echo $field['tgl_masuk'] ?></td>
			 	 	<td><center><a class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')" href="?menu=form&hapus&id=<?php echo $field[kode_pemasukan] ?>">HAPUS</a></center></td>
			 	 </tr>
			 	 <?php 	} ?>
			 </table>
		</div>
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