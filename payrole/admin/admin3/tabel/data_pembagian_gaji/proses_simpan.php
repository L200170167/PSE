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



$query=mysql_query("insert into data_pembagian_gaji values (
'$id_pembagian_gaji'
 ,'$jabatan'
 ,'$sistem_perhitungan_gaji'
 ,'$gaji'
 ,'$potongan_uang_makan_harian'
 ,'$potongan_tidak_masuk_kerja'

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