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



$query=mysql_query("insert into data_tunjangan values (
'$id_tunjangan'
 ,'$nik'
 ,'$nama_tunjanagn'
 ,'$jumlah_tunjangan'

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