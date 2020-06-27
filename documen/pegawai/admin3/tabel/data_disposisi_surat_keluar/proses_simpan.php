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
$disposisi_dari=$_POST['disposisi_dari'];
$disposisikan_kepada=$_POST['disposisikan_kepada'];
$catatan=$_POST['catatan'];
$status=$_POST['status'];



$query=mysql_query("insert into data_disposisi_surat_keluar values (
'$id_pegawai'
 ,'$nomor_surat'
 ,'$disposisi_dari'
 ,'$disposisikan_kepada'
 ,'$catatan'
 ,'$status'

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