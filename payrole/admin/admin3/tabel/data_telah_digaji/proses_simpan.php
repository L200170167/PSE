<?php include '../../../include/all_include.php';

if (!isset($_POST['id_telah_digaji']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_telah_digaji=$_POST['id_telah_digaji'];
$nama=$_POST['nama'];
$jumlah_gaji=$_POST['jumlah_gaji'];
$jumlah_tunjangan=$_POST['jumlah_tunjangan'];
$total=$_POST['total'];



$query=mysql_query("insert into data_telah_digaji values (
'$id_telah_digaji'
 ,'$nama'
 ,'$jumlah_gaji'
 ,'$jumlah_tunjangan'
 ,'$total'

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