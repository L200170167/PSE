<?php 
@session_start();
session_destroy();
echo "<script>alert('GOOD BYE');window.location.href='../index.php'</script>";
?>