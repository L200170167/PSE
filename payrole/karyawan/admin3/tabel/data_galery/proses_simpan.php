<?php include '../../../include/all_include.php';

if (!isset($_POST['id_galery']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_galery=$_POST['id_galery'];
$judul=$_POST['judul'];
$foto= upload('foto');
$keterangan=$_POST['keterangan'];



$query=mysql_query("insert into data_galery values (
'$id_galery'
 ,'$judul'
 ,'$foto'
 ,'$keterangan'

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