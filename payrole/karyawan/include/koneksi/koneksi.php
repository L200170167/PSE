<?php
//database
$db_server	= "localhost";
$db_username	= "root";
$db_password	= "";
$database	= "databases_2020_penggajian_pt_textile_sejahtera";
mysqli_connect($db_server, $db_username, $db_password) or die ("Gagal konek ke server.");
mysql_select_db($database) or die ("Gagal membuka database.");
$con_mysqli = mysqli_connect($db_server,$db_username,$db_password,$database);
$dbh = new PDO('mysql:host='.$db_server.';dbname='.$database, $db_username, $db_password);
?>