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
		<td>Id Kategori</td>
		<td>Nama Kategori</td>
	</tr>
	<?php 
		$sql = mysqli_query($con, "SELECT * FROM tbl_kategori ORDER BY id_kategori ASC");
		$no = 0;
		while ($data = mysqli_fetch_assoc($sql)){
			$no++
	 ?>
	 <tr>
	 	<td><?php echo $no ?></td>
	 	<td><?php echo $data['id_kategori'] ?></td>
	 	<td><?php echo $data['kategori'] ?></td>
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