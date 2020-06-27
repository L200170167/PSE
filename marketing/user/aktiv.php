<?php 
session_start(); 
$kode=$_GET['ref']; 
include"../config/koneksi.php"; 
$sql=mysqli_query("UPDATE tbl_user SET status='1' WHERE kode='$kode' "); 
if($sql){ 
 echo "Akun Telah di Aktivkan"; 
}else{ 
 echo"Aktivasi Gagal"; 
} 
?> 