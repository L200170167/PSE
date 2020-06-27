<?php include '../../../include/all_include.php';

if (!isset($_POST['id_karyawan']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_karyawan=$_POST['id_karyawan'];
$nik=$_POST['nik'];
$kpj=$_POST['kpj'];
$nama=$_POST['nama'];
$status_perkawinan=$_POST['status_perkawinan'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$periode_kepesertaan=$_POST['periode_kepesertaan'];
$jabatan=$_POST['jabatan'];
$username=$_POST['username'];
$password= md5($_POST['password']);



$query=mysql_query("insert into data_karyawan values (
'$id_karyawan'
 ,'$nik'
 ,'$kpj'
 ,'$nama'
 ,'$status_perkawinan'
 ,'$tanggal_lahir'
 ,'$periode_kepesertaan'
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