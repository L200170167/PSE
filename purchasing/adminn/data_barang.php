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

  $a = date('d-m-Y');
  $b = date('H:i:s');

$perintah = new oop();

@$table = "query_barang";

?>


<h1 align="center">Laporan Barang</h1>
<table border="1" align="center" cellpadding="10" cellspacing="0">
	<tr>
		<td>No</td>
		<td>Kode Barang</td>
		<td>Nama Barang</td>
		<td>Harga</td>
		<td>Id Kategori</td>
		<td>Deskripsi</td>
		<td>Jumlah</td>
		
	</tr>
	<?php 
		$sql = mysqli_query($con, "SELECT * FROM tbl_stok ORDER BY kode_barang ASC");
		$no = 0;
		while ($data = mysqli_fetch_assoc($sql)){
			$no++
	 ?>
	 <tr>
	 	<td><?php echo $no ?></td>
	 	<td><?php echo $data['kode_barang'] ?></td>
	 	<td><?php echo $data['nama_barang'] ?></td>
	 	<td><?php echo $data['harga'] ?></td>
	 	<td><?php echo $data['id_kategori'] ?></td>
	 	<td><?php echo $data['deskripsi'] ?></td>
	 	<td><?php echo $data['jumlah'] ?></td>
	 	
	 </tr>
	 <?php } ?>
</table>
 <?php 

	

	$a = date('d-m-Y');
	$b = date('H:i:s');

	echo "Tanggal : $a </br>";
	echo "Jam : $b";

 ?>


<script>
	window.print();
</script>	