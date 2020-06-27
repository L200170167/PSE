<?php 

session_start();
include "../config/koneksi.php";
include "library/controllers.php";
$perintah = new oop();
@$table = "tbl_user";

@$username = $_GET[username];
@$kode = $_POST[kode];

@$redirect = "login.php";


 
$kode=$_GET['kode']; 
include"../config/koneksi.php"; 
$sql=mysqli_query($con,"UPDATE $table SET status='S' WHERE kode='$_GET[kode]' "); 
if($sql){ 
 echo "Akun Telah di Aktivkan"; 
}else{ 
 echo"Aktivasi Gagal"; 
}


// $sql = mysqli_query($con, "SELECT * FROM $table WHERE kode = '$_GET[kode]'");
//     while($data = mysqli_fetch_array($sql)){
//         $data['kode'] = $kode;
//     }
// if (isset($_GET['kode'])) {
//     if ($_GET['kode']=$kode) {
//         //$perintah->verifikasi($con, $table, $username, $kode, $redirect);
//         $sql = "UPDATE $table SET status = 'S' WHERE kode = '$_GET[kode]'";
//         $query = mysqli_query($con, $sql);
//     }
// }


// echo "Username Anda = $_GET[username] <br>";
// echo "Silahkan Masukan Kode yang telah dikirim ke Email Anda ";

?>	


<!DOCTYPE html>
<html>
<head>
	<title>Verifikasi Email</title>
</head>
<body>

<a href="https://eithree.000webhostapp.com/user/login.php">Klik Disini</a>

</body>
</html>

