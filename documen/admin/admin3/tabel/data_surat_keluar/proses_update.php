<?php include '../../../include/all_include.php';

if (!isset($_POST['id_surat_keluar']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
}

$id_surat_keluar=$_POST['id_surat_keluar'];
$pembuat_surat=$_POST['pembuat_surat'];
$no_surat=$_POST['no_surat'];
$sifat_surat=$_POST['sifat_surat'];
$tanggal_surat_keluar=$_POST['tanggal_surat_keluar'];
$sumber_surat=$_POST['sumber_surat'];
$tujuan_surat=$_POST['tujuan_surat'];
$kategori=$_POST['kategori'];
$lampiran=$_POST['lampiran'];
$perihal=$_POST['perihal'];
$keterangan=$_POST['keterangan'];



$file_surat = $_FILES['file_surat']['name'];
$file_surat1=$_POST['file_surat1'];
if (empty($file_surat))
{
	$file_surat = $file_surat1;
}
else
{
$file_surat=upload('file_surat');
}

$query=mysql_query("update data_surat_keluar set
pembuat_surat='$pembuat_surat',
no_surat='$no_surat',
sifat_surat='$sifat_surat',
tanggal_surat_keluar='$tanggal_surat_keluar',
sumber_surat='$sumber_surat',
tujuan_surat='$tujuan_surat',
kategori='$kategori',
lampiran='$lampiran',
perihal='$perihal',
keterangan='$keterangan',

file_surat='$file_surat'
where id_surat_keluar='$id_surat_keluar' ") or die (mysql_error());

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
