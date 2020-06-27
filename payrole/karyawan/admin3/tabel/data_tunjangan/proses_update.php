<?php include '../../../include/all_include.php';

if (!isset($_POST['id_tunjangan']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_tunjangan=$_POST['id_tunjangan'];
$nik=$_POST['nik'];
$nama_tunjanagn=$_POST['nama_tunjanagn'];

$jumlah_tunjangan=$_POST['jumlah_tunjangan'];

$query=mysql_query("update data_tunjangan set 
nik='$nik',
nama_tunjanagn='$nama_tunjanagn',

jumlah_tunjangan='$jumlah_tunjangan'
where id_tunjangan='$id_tunjangan' ") or die (mysql_error());

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