<?php include '../../../include/all_include.php';

if (!isset($_POST['id_pembagian_gaji']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_pembagian_gaji=$_POST['id_pembagian_gaji'];
$jabatan=$_POST['jabatan'];
$sistem_perhitungan_gaji=$_POST['sistem_perhitungan_gaji'];
$gaji=$_POST['gaji'];
$potongan_uang_makan_harian=$_POST['potongan_uang_makan_harian'];

$potongan_tidak_masuk_kerja=$_POST['potongan_tidak_masuk_kerja'];

$query=mysql_query("update data_pembagian_gaji set 
jabatan='$jabatan',
sistem_perhitungan_gaji='$sistem_perhitungan_gaji',
gaji='$gaji',
potongan_uang_makan_harian='$potongan_uang_makan_harian',

potongan_tidak_masuk_kerja='$potongan_tidak_masuk_kerja'
where id_pembagian_gaji='$id_pembagian_gaji' ") or die (mysql_error());

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