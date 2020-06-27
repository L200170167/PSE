<?php include '../../../include/all_include.php';

if (!isset($_POST['id_kritik_dan_saran']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_kritik_dan_saran=$_POST['id_kritik_dan_saran'];
$nama_karyawan=$_POST['nama_karyawan'];

$kritik_dan_saran=$_POST['kritik_dan_saran'];

$query=mysql_query("update data_kritik_dan_saran set 
nama_karyawan='$nama_karyawan',

kritik_dan_saran='$kritik_dan_saran'
where id_kritik_dan_saran='$id_kritik_dan_saran' ") or die (mysql_error());

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