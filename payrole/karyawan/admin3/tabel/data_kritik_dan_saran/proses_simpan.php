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



$query=mysql_query("insert into data_kritik_dan_saran values (
'$id_kritik_dan_saran'
 ,'$nama_karyawan'
 ,'$kritik_dan_saran'

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