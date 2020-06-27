
<?php 

	$tanggal = date('d-m-Y');

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename= $tanggal-data_barang.xls");

	include 'data_barang.php';

 ?>