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

$password_validasi=decrypt($_POST['password_validasi']); 
$password_lama=MD5($_POST['password_lama']);
$password=($_POST['password']);
if ($password_lama=="" or $password=="")
{
		$password=decrypt($_POST['password_validasi']);
}
else
{
		if ($password_lama==$password_validasi)
		{
			$password=MD5($_POST['password']);
		}
		else
		{
			?>
				<script>
				alert("password Lama tidak sesuai, Gagal Mengganti password.");
				window.history.back(); </script>
			<?php
			die();
		}
}

$query=mysql_query("update data_karyawan set 
nik='$nik',
kpj='$kpj',
nama='$nama',
status_perkawinan='$status_perkawinan',
tanggal_lahir='$tanggal_lahir',
periode_kepesertaan='$periode_kepesertaan',
jabatan='$jabatan',
username='$username',

password='$password'
where id_karyawan='$id_karyawan' ") or die (mysql_error());

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