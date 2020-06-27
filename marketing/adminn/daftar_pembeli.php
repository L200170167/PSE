<?php
if (!isset($_SESSION)) {
        session_start();
        
    if(empty($_SESSION['username'])){
	echo "<script>alert('harap login terlebih dahulu!!! ?');window.location.href='../index.php'</script>";
	}

    }
include "config/koneksi.php";
include "library/controllers.php";

//error_reporting(0);
$perintah = new oop();

$table = "tbl_penjualan";
@$where = "kode_penjualan = '$_GET[id]'";
@$isi = "status = 'terkirim'";
$form = "?menu=daftar_pembeli";
// if (isset($_GET['kirim'])) {
// 	$perintah->ubah($con, $table,$isi, $where, $form);
// }
// if (isset($_GET['kirims'])) {
// 	$kode = $perintah->tampil($con,$table." WHERE username='$_GET[id]'");
// 	foreach ($kode as $kode) {
// 		$perintah->ubah($con, $table,$isi, "username = '$_GET[id]'", $form);
// 	}
// }
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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http:/fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
</head>
<form method="post">
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
	</header>
	<div class="container">
		<br>
		<table>
			<tr>
				<td><h5>Dari Tanggal</h5></td>
				<td><h5>Sampai Tanggal</h5></td>
			</tr>
			<tr>
				<td><input type="date" name="tgl1"></td>
				<td><input type="date" name="tgl2"></td>
				<td>
					<input style="margin-top: -10px" class="btn btn-info btn-lg" type="submit" name="caritgl" value="CARI">
					<a style="margin-top: -10px" class="btn btn-success btn-lg" href="daftar_pembeli.php">RESET</a>
				</td>
			</tr>
		</table>
		<?php 
			if (isset($_POST['caritgl'])) {
				if (empty($_POST['tgl1'])||empty($_POST['tgl2'])) {
					echo "<script>alert('Silahkan Pilih Tanggal !')</script>";
				}else{
					$pecah=explode("-", $_POST['tgl2']);
					$t = intval($pecah[2]);
					$t = intval($t+1);
					if ($t < 10) {
						$t = "0".$t;
					}
					$t = $pecah[0]."-".$pecah[1]."-".$t."<br>";
					$tanggal = "WHERE tgl_pesan BETWEEN '$_POST[tgl1]' AND '$t'";  
				}
			}
		 ?>
	</div>
			<div class="container">
				<div class="row">
					<div class="panel panel-default">
						<div class="panel-heading">
							<center><h2 class="panel-title">Daftar Barang Pelanggan</h2></center><br>
						</div>
					</div>	
				</div>

			<div class="row">

		<div class="container">
			<table class="table table-hover table-condensed table-resposive">
				<a href="data_penjualan.php">PRINT</a> / <a href="export2.php">EXPORT EXEL</a>
				<tr>
					<th><center>Kode Pembelian</center></th>
					<th><center>Nama User</center></th>
                    <th><center>Kode Barang</center></th>
					<th><center>Nama Barang</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Harga Satuan</center></th>
					<th><center>Sub Total</center></th>
					<th><center>Tangal Pesan</center></th>
					<th><center>Status</center></th>
				</tr>
 			    <?php
 			    $total = 0;
            $query = mysqli_query($con, "select * from tbl_penjualan ".@$tanggal." ORDER BY kode_penjualan DESC");
            while ($data = mysqli_fetch_array($query)){
            $subtotal = $data['jumlah']*$data['harga'];
            $total = $total + $subtotal;
            $sq = mysqli_query($con, "select * from tbl_user where username='$data[username]'");
            while ($dat = mysqli_fetch_array($sq)){
            	$nama = $dat['nama_user'];
            }
            ?>
                <tr>
                <td><center><?php echo "P00".$data['kode_penjualan'];?></center></td>
                <td><center><?php echo $nama; ?></center></td>
                <td><center><?php echo $data['kode_barang']; ?></center></td>
                <td><center><?php echo $data['nama_barang']; ?></center></td>
                <td><center><?php echo $data['jumlah']; ?></center></td>
                <td><center><?php echo "Rp.".number_format($data['harga'],2,",","."); ?></center></td>
                <td><center><?php $subtotal = $data['jumlah']*$data['harga']; echo "Rp.".number_format($subtotal,2,",","."); ?></center></td>
                <td><center><?php echo $data['tgl_pesan']; ?></center></td>
                <td><center><?php echo $data['status']; ?></center></td>
                </tr>
                <?php 	}?>
                <?php
				if($total == 0){
					echo '<tr><td colspan="5" align="center">Ups, Kosong !</td></tr></table>';
					
				} else {?>
						<tr>
						<td colspan="8"></td></td></td>
						
					</tr>
						<tr style="background-color: #DDD;">
							<td colspan="4">
								<b>Total :</b>
							</td><td></td><td>
								<b>
									<center><?php echo "Rp.".number_format($total,2,",","."); ?></center>
								</b>
							</td></td></td><td colspan="2"></td><td></td></tr></table>
			<?php } ?>
			</table>
			
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
</form>
</html>