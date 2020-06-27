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

$query=mysql_query("update data_transaksi_gaji set 
tanggal_penggajian='$tanggal_penggajian',
nik='$nik',
nama='$nama',
jabatan='$jabatan',
gaji='$gaji',
sistem_perhitungan_penggajian='$sistem_perhitungan_penggajian',
jumlah_perhitungan='$jumlah_perhitungan',

jumlah_gaji='$jumlah_gaji'
where id_transaksi_gaji='$id_transaksi_gaji' ") or die (mysql_error());

if($query){
?>
<script>location.href = "<?php index(); ?>?input=popup_edit"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>