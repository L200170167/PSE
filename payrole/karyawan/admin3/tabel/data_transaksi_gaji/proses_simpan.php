<?php include '../../../include/all_include.php';

if (!isset($_POST['id_transaksi_gaji']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_transaksi_gaji=$_POST['id_transaksi_gaji'];
$tanggal_penggajian=$_POST['tanggal_penggajian'];
$nik=$_POST['nik'];
$nama=$_POST['nama'];
$jabatan=$_POST['jabatan'];
$gaji=$_POST['gaji'];
$sistem_perhitungan_penggajian=$_POST['sistem_perhitungan_penggajian'];
$jumlah_perhitungan=$_POST['jumlah_perhitungan'];
$jumlah_gaji=$_POST['jumlah_gaji'];



$query=mysql_query("insert into data_transaksi_gaji values (
'$id_transaksi_gaji'
 ,'$tanggal_penggajian'
 ,'$nik'
 ,'$nama'
 ,'$jabatan'
 ,'$gaji'
 ,'$sistem_perhitungan_penggajian'
 ,'$jumlah_perhitungan'
 ,'$jumlah_gaji'

)");

$id_telah_digaji=$id_transaksi_gaji;
$nama=$_POST['nama'];
$jumlah_gaji=$_POST['jumlah_gaji'];
$jumlah_tunjangan=0;
$total=$jumlah_gaji + $jumlah_tunjangan;



$query=mysql_query("insert into data_telah_digaji values (
'$id_telah_digaji'
 ,'$nama'
 ,'$jumlah_gaji'
 ,'$jumlah_tunjangan'
 ,'$total'

)");

if($query){
?>
<script>location.href = "<?php index(); ?>?input=popup_tambah"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>