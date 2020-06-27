<?php 
@session_start();
session_destroy();
echo "<script>alert('Selamat Tinggal'); window.location.href='../index.php'</script>";
?>