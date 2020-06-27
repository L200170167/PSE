 <?php
include '../include/all_include.php'; 

if(isset($_POST["login"])){ 
$username = $_POST['username'];
$password = $_POST['password'];
$username = mysql_real_escape_string($username);
$password = md5(mysql_real_escape_string($password));
$r = mysql_query("select * from data_pegawai where $field_password_login='$password' and $field_username_login='$username'");
$data = mysql_fetch_array ($r);
if (empty($username) && empty($password)) {
	echo "<script>alert('$pesan_gagal');</script>";	
	?><script>location.href = "<?php index();?>";</script><?php
} else if (empty($username)) {
	echo "<script>alert('$pesan_gagal');</script>";	
	?><script>location.href = "<?php index();?>";</script><?php
} else if (empty($password)) {
	echo "<script>alert('$pesan_gagal');</script>";	
	?><script>location.href = "<?php index();?>";</script><?php
}else
if (mysql_num_rows($r) == 1) 
{
		$jenenge=encrypt($data["username"]);
		setcookie('jenenge', $jenenge, time() + (6000 * 6000), '/');
		
		
		$nip=encrypt($data["NIP"]);
		setcookie('nip', $nip, time() + (6000 * 6000), '/');
		
		
		$ip = $_SERVER['REMOTE_ADDR']; 
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$token = sha1($ip.$useragent.$key);
		$token = crypt($token, $key);
		setcookie('token', $token, time() + (6000 * 6000), '/');
		echo "<script> window.location = '../'</script>";		
} 
else 
{
	echo "<script>alert('$pesan_gagal');</script>";	
	?><script>location.href = "<?php index();?>";</script><?php
}
}
 ?>