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
$foto=$_FILES['foto']['name']; upload('foto'); if (empty($foto)){$foto = $_POST['foto1'];};

$isi=$_POST['isi'];

$query=mysql_query("update data_berita set 
tanggal='$tanggal',
judul='$judul',
foto='$foto',

isi='$isi'
where id_berita='$id_berita' ") or die (mysql_error());

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