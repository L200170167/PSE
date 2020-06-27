<?php include '../../../include/all_include.php';

if (!isset($_POST['id_berita']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_berita=$_POST['id_berita'];
$tanggal=$_POST['tanggal'];
$judul=$_POST['judul'];
$foto= upload('foto');
$isi=$_POST['isi'];



$query=mysql_query("insert into data_berita values (
'$id_berita'
 ,'$tanggal'
 ,'$judul'
 ,'$foto'
 ,'$isi'

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