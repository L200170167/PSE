<?php include '../../../include/all_include.php';

if (!isset($_POST['id_admin']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$id_admin=$_POST['id_admin'];
$hak_akses=$_POST['hak_akses'];
$username=$_POST['username'];

$password=$_POST['password'];

$query=mysql_query("update data_admin set 
hak_akses='$hak_akses',
username='$username',

password='$password'
where id_admin='$id_admin' ") or die (mysql_error());

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