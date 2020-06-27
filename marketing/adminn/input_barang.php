<?php
	if (!isset($_SESSION)) {
        session_start();
        
    if(empty($_SESSION['username'])){
	echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
	}

    }
	error_reporting(0);
    include "config/koneksi.php";
    include "library/controllers.php";
    $perintah = new oop();
    $table = "tbl_stok";
	$form = "?menu=input_barang";
	@$where = "kode_barang = '$_GET[id]'";
	$id = $perintah->tampil($con,$table);
	$e=1;
foreach ($id as $id ) {
	$e= intval($id['id'])+1;
}
$edit['id_kategori']=="";
if ($edit['id_kategori']=="") {
	$edit['id_kategori']="belum";
	$q = "Pilih kategori";
}
if (isset($_POST['input'])) {
	if ($_POST['id_kategori']=="belum") {
		echo "<script>alert('Anda belum memilih barang')</script>";
	}else{
		$d = "b00".$e;
		$nama_file = $_FILES['gambar']['name'];
	    $tmp = $_FILES['gambar']['tmp_name'];
		move_uploaded_file($tmp, "../gambar/$nama_file");
		$isi = "id='$e', kode_barang = '$d', nama_barang = '$_POST[nama_barang]', harga = '$_POST[harga]', id_kategori = '$_POST[id_kategori]', deskripsi = '$_POST[deskripsi]', jumlah = '$_POST[jumlah]', gambar= '$nama_file'";
	    $perintah->simpan($con, $table, $isi, $form);
	}
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
	$d = "b00".$e;
	$nama_file = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
	move_uploaded_file($tmp, "../gambar/$nama_file");
	@$isi = "kode_barang = '$d', nama_barang = '$_POST[nama_barang]', harga = '$_POST[harga]', id_kategori = '$_POST[id_kategori]', deskripsi = '$_POST[deskripsi]', jumlah = '$_POST[jumlah]', gambar= '$nama_file'";
  	$perintah->ubah($con, $table,$isi, $where, $form);
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
	</header>



    <div class="container">
    	<div class="row">
					<div class="panel panel-default">
						<div class="panel-heading">
							<center><h2 class="panel-title">INPUT BARANG</h2></center>
						</div>
						<div class="panel-body" align="center">
						<form method="post" enctype="multipart/form-data">
						<div class="col-md-12 col-md-offset-4">
							<input type="text" name="kode_barang" readonly class="form-group" value="<?php echo "b00".$e;?>" required style="width: 400px; height: 20px;" placeholder="Kode Barang" >
						</div>
						<div class="col-md-12 col-md-offset-4">	
							<input type="text" name="nama_barang" class="form-group" value="<?php echo @$edit['nama_barang'] ?>" required style="width: 400px;" placeholder="Nama Barang">
						</div>
						<div class="col-md-12 col-md-offset-4">	
							<input type="number" name="harga" class="form-group" value="<?php echo @$edit['harga'] ?>" required style="width: 400px;" placeholder="Harga Barang">
						</div>
						<div class="col-md-12 col-md-offset-4">	
							 <select required name="id_kategori" class="form-group" style="width: 400px;">
							 	<?php
							 		$kat = $perintah->tampil($con,"tbl_kategori where id_kategori = '$edit[id_kategori]'");
							 		foreach ($kat as $kat) {
							 			$q = $kat['kategori'];
							 		}
							 	 ?>
							 	<option value="<?php echo @$edit['id_kategori'] ;?>"><?php echo @$q ;?></option>
							 	<?php 
								$kate = $perintah->tampil($con,"tbl_kategori");
								foreach ($kate as $kate) {
							 	?>
							 	<option value="<?php echo $kate['id_kategori'] ?>"><?php echo $kate['kategori'] ?></option>
							 	<?php } ?>
							 </select>
						</div>
						<div class="col-md-12 col-md-offset-4">	
							<textarea type="text" name="deskripsi" class="form-group" required style="width: 400px;" placeholder="Deskripsi"><?php echo @$edit['deskripsi'] ?></textarea> 
						</div>
						<div class="col-md-12 col-md-offset-4">	
							<input type="number" name="jumlah" class="form-group" value="<?php echo @$edit['jumlah'] ?>" required style="width: 400px;" placeholder="Jumlah Barang">
						</div>
						<div class="col-md-12 col-md-offset-4">
							<?php if (@$_GET[id] == ""){?>	
								<input type="file" name="gambar" required>
							<?php }else{ ?>
								<h4>Ingin ganti gambar ?</h4>
								<a class="btn btn-success" href="?menu=form&edit&id=<?=$_GET['id']?>&jawab=Y">YA</a>
								<a class="btn btn-danger" href="?menu=form&edit&id=<?=$_GET['id']?>&jawab=T">Tidak</a><br><br>
								<?php if($_GET['jawab']=="Y"){ ?>
									<input type="file" name="gambar" required><br><br>
								<?php } ?>
							<?php } ?>
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
			<h3 class="panel-title">BARANG</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-16">
				<table class="table table-stripped table-hover">
			 	<tr>
			 		<th class="text-center">No</th>
			 		<th class="text-center">Kode Barang</th>
			 		<th class="text-center">Nama Barang</th>
			 		<th class="text-center">Harga</th>
			 		<th class="text-center">Id Kategori</th>
			 		<th class="text-center">Deskripsi</th>
					<th class="text-center">Jumlah</th>
					<th class="text-center">Gambar</th>
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
			 	 	<td><?php echo $field['kode_barang']; ?></td>
			 	 	<td><?php echo $field['nama_barang']; ?></td>
			 	 	<td><?php echo $field['harga']; ?></td>
			 	 	<td><?php echo $field['id_kategori']; ?></td>
			 	 	<td><?php echo $field['deskripsi']; ?></td>
			 	 	<td><?php echo $field['jumlah']; ?></td>
			 	 	<td><img style="width: 50px; height:50px;" src="../gambar/<?php echo $field['gambar'];?>"></td>
			 	 	<td><center><a class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')" href="?menu=form&hapus&id=<?php echo $field[kode_barang] ?>">HAPUS</a>
			 	 	<a class="btn btn-primary" href="?menu=form&edit&id=<?php echo $field['kode_barang'] ?>">EDIT</a></center></td>
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