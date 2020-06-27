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

$file_surat=$_POST['file_surat'];

$query=mysql_query("update data_surat_masuk set 
no_surat='$no_surat',
tanggal_surat_masuk='$tanggal_surat_masuk',
sumber_surat='$sumber_surat',
tujuan_surat='$tujuan_surat',
kategori='$kategori',
lampiran='$lampiran',
prihal='$prihal',
keterangan='$keterangan',

file_surat='$file_surat'
where id_surat_masuk='$id_surat_masuk' ") or die (mysql_error());

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