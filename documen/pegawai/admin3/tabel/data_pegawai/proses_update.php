<?php include '../../../include/all_include.php';

if (!isset($_POST['id_pegawai']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_pegawai=$_POST['id_pegawai'];
$NIP=$_POST['NIP'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$jabatan=$_POST['jabatan'];
$username=$_POST['username'];

$password=$_POST['password'];

$query=mysql_query("update data_pegawai set 
NIP='$NIP',
nama='$nama',
alamat='$alamat',
tempat_lahir='$tempat_lahir',
tanggal_lahir='$tanggal_lahir',
jenis_kelamin='$jenis_kelamin',
jabatan='$jabatan',
username='$username',

password='$password'
where id_pegawai='$id_pegawai' ") or die (mysql_error());

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