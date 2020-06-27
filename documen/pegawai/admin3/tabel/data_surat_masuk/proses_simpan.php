<?php include '../../../include/all_include.php';

if (!isset($_POST['id_surat_masuk']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_surat_masuk=$_POST['id_surat_masuk'];
$no_surat=$_POST['no_surat'];
$tanggal_surat_masuk=$_POST['tanggal_surat_masuk'];
$sumber_surat=$_POST['sumber_surat'];
$tujuan_surat=$_POST['tujuan_surat'];
$kategori=$_POST['kategori'];
$lampiran=$_POST['lampiran'];
$prihal=$_POST['prihal'];
$keterangan=$_POST['keterangan'];
$file_surat= upload('file_surat');



$query=mysql_query("insert into data_surat_masuk values (
'$id_surat_masuk'
 ,'$no_surat'
 ,'$tanggal_surat_masuk'
 ,'$sumber_surat'
 ,'$tujuan_surat'
 ,'$kategori'
 ,'$lampiran'
 ,'$prihal'
 ,'$keterangan'
 ,'$file_surat'

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