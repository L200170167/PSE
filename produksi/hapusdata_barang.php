<?php
$ambil = $koneksi->query("SELECT * FROM data_barang WHERE id_barang='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


$koneksi->query("DELETE FROM data_barang WHERE id_barang='$_GET[id]'");

echo "<script>alert('barang terhapus');</script>";
echo "<script>location='index.php?halaman=data_barang';</script>";
?>