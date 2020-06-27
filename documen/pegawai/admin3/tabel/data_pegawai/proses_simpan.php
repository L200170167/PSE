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
$password= md5($_POST['password']);



$query=mysql_query("insert into data_pegawai values (
'$id_pegawai'
 ,'$NIP'
 ,'$nama'
 ,'$alamat'
 ,'$tempat_lahir'
 ,'$tanggal_lahir'
 ,'$jenis_kelamin'
 ,'$jabatan'
 ,'$username'
 ,'$password'

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