<?php include '../../../include/all_include.php';

if (!isset($_POST['id_pegawai']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_pegawai=$_POST['id_pegawai'];
$nomor_surat=$_POST['nomor_surat'];
$disposisikan_kepada=$_POST['disposisikan_kepada'];
$catatan=$_POST['catatan'];

$status=$_POST['status'];

$query=mysql_query("update data_disposisi set 
nomor_surat='$nomor_surat',
disposisikan_kepada='$disposisikan_kepada',
catatan='$catatan',

status='$status'
where id_pegawai='$id_pegawai' ") or die (mysql_error());

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