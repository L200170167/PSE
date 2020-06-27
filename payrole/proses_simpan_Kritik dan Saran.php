<?php include 'admin/include/all_include.php';


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
<script>location.href = "<?php index(); ?>?p=home"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>