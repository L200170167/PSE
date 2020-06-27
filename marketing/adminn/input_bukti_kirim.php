<?php require_once("../config/koneksi.php");
	include ("library/controllers.php");
    if (!isset($_SESSION)) {
        session_start();
        
    if(empty($_SESSION['username'])){
	echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
	}

    } 
    $table = "tbl_bukti";
    $form = "input_bukti_kirim.php";
    $perintah = new oop();
    if (isset($_POST['input'])) {
    	if ($_POST['kode']==""||$_POST['nama']==""||$_POST['resi']==""||$_POST['resi2']=="") {
    		echo "<script>alert('Masih ada yang kosong!!!!')</script>";
    	}else{
    		if ($_POST['resi']==$_POST['resi2']) {
    // 			$nama_file = $_FILES['foto']['name'];
			 //    $tmp = $_FILES['foto']['tmp_name'];
			     $isi = "kode_penjualan='$_POST[kode]',nama_user='$_POST[nama]',no_resi='$_POST[resi]'";
				// move_uploaded_file($tmp, "../gambar/bukti/$nama_file");
    			$perintah->simpan($con, $table, $isi,$form);
    			//$perintah->ubah($con, "tbl_penjualan", "status='terkirim'", "", $form);
    		}else{
    			echo "<script>alert('Nomor resi tidak sama!!!!')</script>";
    		}
    	}
    }
    @$where = "id = $_GET[id]";
    if (isset($_GET['hapus'])) {
    	$perintah->hapus($con, $table, $where, $form);
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
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">	
				<div class="logo span3">
						<br>
					<a class="brand" href="#"><font size="20" face="Comic sans MS" color="white">FoodShop</font></a>
						
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
			              			<li class="dropdown active">
			                			<a href="#" style="color: blue;" class="dropdown-toggle" data-toggle="dropdown">Input<b class="caret"></b></a>
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
		</div>
	</header>
	<div id="wrapper">
    	<div class="container">	
    		<div class="row">
				<form method="post" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">
							<center><h2 class="panel-title">INPUT BUKTI KIRIM</h2></center>
						</div>
						<div class="panel-body" align="center">
							<div class="col-md-12 col-md-offset-4">	
							<label><h3>Kode Pelanggan</h3></label>
							<?php 
								if (empty($p)) {
									$p="";
								}else{

								}
								if (isset($_POST['cari'])) {
									$dati = $perintah->tampil($con,"tbl_penjualan WHERE kode_penjualan='$_POST[kode]' GROUP BY username");
									foreach ($dati as $dati) {
										$datii = $dati['username'];
										$e = $dati['kode_penjualan'];
										$p = "P00".$e;
									}
									$date = $perintah->tampil($con,"tbl_user WHERE username='$datii'");
									foreach ($date as $date) {
										$datee = $date['nama_user'];
									}
								}
							 ?>
							 <?php 
							 if (isset($_GET['edit'])) {
								$dataa = $perintah->tampil($con, "tbl_bukti WHERE id='$_GET[id]'");
								foreach ($dataa as $dataa) {
									$e = $dataa['kode_penjualan'];
									$p = "P00".$e;
									$datee = $dataa['nama_user'];
								}
    						}
    						if (isset($_POST['ubah'])) {
    							if ($_POST['kode']==""||$_POST['nama']==""||$_POST['resi']==""||$_POST['resi2']=="") {
						    		echo "<script>alert('Masih ada yang kosong!!!!')</script>";
						    	}else{
						    		if ($_POST['resi']==$_POST['resi2']) {
						    // 			$nama_file = $_FILES['foto']['name'];
									 //    $tmp = $_FILES['foto']['tmp_name'];
									     $isi = "kode_penjualan='$_POST[kode]',nama_user='$_POST[nama]',no_resi='$_POST[resi]'";
										// move_uploaded_file($tmp, "../gambar/bukti/$nama_file");
						    			$perintah->ubah($con, "tbl_bukti",$isi, "id = $_GET[id]", $form);
						    		}else{
						    			echo "<script>alert('Nomor resi tidak sama!!!!')</script>";
						    		}
						    	}
    						}

							 ?>
							<select class="form-group" required name="kode" style="width: 45%; height: 30px;">
								<option value="<?php echo $e; ?>"><?php echo $p; ?></option>
								<?php 
									$data = $perintah->tampil($con,"tbl_penjualan GROUP by kode_penjualan DESC");
									foreach ($data as $data) {
										$d = $data['kode_penjualan']
								 ?>
								<option value="<?php echo $d?>"><?php echo "P00".$d; ?></option>
								<?php } ?>
							</select>
							<input class="btn btn-success" style="margin-top: -9px;" type="submit" name="cari" value="CARI">
						</div>
						<div class="col-md-12 col-md-offset-4">
							<input type="text" name="nama" placeholder="Nama User" class="form-group" readonly style="width: 45%; height: 20px; background-color: white;" value="<?php echo @$datee?>">
						</div>
						<div class="col-md-12 col-md-offset-4">	
							<label><h3>Nomor Resi</h3></label>
							<input type="text" name="resi" placeholder="No Resi" class="form-group" style="width: 45%; height: 20px;" value="<?php echo @$dataa['no_resi']?>"><br>
							<input type="text" name="resi2" placeholder="Input Ulang No Resi" class="form-group" style="width: 45%; height: 20px;" value="<?php echo @$dataa['no_resi']?>" >
						</div>
						<!-- <div class="col-md-12 col-md-offset-4">
							<label><h3>Foto Bukti</h3></label>
							<h3><input type="file" name="foto"></h3>
						</div> -->
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
			<div class="container">
				<div class="panel-body">
				<div class="col-md-16">
				<table class="table table-stripped table-hover">
			 	<tr>
			 		<th class="text-center">No</th>
			 		<th class="text-center">Kode Penjualan</th>
			 		<th class="text-center">Nama User</th>
			 		<th class="text-center">No Resi</th>
			 		<!-- <th class="text-center">Gambar</th> -->
          			<th colspan="2">AKSI</th>
			 	</tr>
			 	<?php 
			 	$tampil = $perintah->tampil($con, $table, @$isi);
			 	$no = 0;
			 	foreach($tampil as $field) {
			 		$no++
			 	 ?>
			 	 <tr>
			 	 	<td><?php echo $no; ?></td>
			 	 	<td><?php echo "P00".$field['kode_penjualan']; ?></td>
			 	 	<td><?php echo $field['nama_user']; ?></td>
			 	 	<td><?php echo $field['no_resi']; ?></td>
			 	 	<!-- <td><img style="width: 200px; height:200px;" src="../gambar/bukti/<?php echo $field['gambar'];?>"></td> -->
			 	 	<td><center><a class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')" href="?menu=form&hapus&id=<?php echo $field['id'] ?>">HAPUS</a>
			 	 	<a class="btn btn-primary" href="?menu=form&edit&id=<?php echo $field['id'] ?>">EDIT</a></center></td>
			 	 </tr>
			 	 <?php 	} ?>
			 </table>
			</div>
			</div>
			</div>	
			
			</div>
		</div>
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