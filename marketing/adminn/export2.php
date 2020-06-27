
<?php 

	$tanggal = date('d-m-Y');

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename= $tanggal-data_kategori.xls");

	include 'data_kategori.php';

 ?>