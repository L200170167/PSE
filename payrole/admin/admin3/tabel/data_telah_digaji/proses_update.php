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

$query=mysql_query("update data_telah_digaji set 
nama='$nama',
jumlah_gaji='$jumlah_gaji',
jumlah_tunjangan='$jumlah_tunjangan',

total='$total'
where id_telah_digaji='$id_telah_digaji' ") or die (mysql_error());

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