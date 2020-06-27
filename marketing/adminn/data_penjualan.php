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
					<td>Kode Pembelian</td>
					<td>Nama User</td>
                    <td>Kode Barang</td>
					<td>Nama Barang</td>
					<td>Jumlah</td>
					<td>Harga Satuan</td>
					<td>Sub Total</td>
					<td>Tangal Pesan</td>
					<td>Status</td>
				</tr>
	</tr>
	<?php 
		$sql = mysqli_query($con, "select * from tbl_penjualan ".@$tanggal." ORDER BY kode_penjualan DESC");
		$no = 0;
		while ($data = mysqli_fetch_assoc($sql)){
			$no++
	 ?>
	 <tr>
	 	 <td><center><?php echo "P00".$data['kode_penjualan'];?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $data['kode_barang']; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo "Rp.".number_format($data['harga'],2,",","."); ?></td>
                <td><?php $subtotal = $data['jumlah']*$data['harga']; echo "Rp.".number_format($subtotal,2,",","."); ?></td>
                <td><?php echo $data['tgl_pesan']; ?></td>
                <td><?php echo $data['status']; ?></td>
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