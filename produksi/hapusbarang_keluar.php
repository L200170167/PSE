<?php
$ambil = $koneksi->query("SELECT * FROM barang_keluar WHERE id_keluar='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


$koneksi->query("DELETE FROM barang_keluar WHERE id_keluar='$_GET[id]'");

echo "<script>alert('barang terhapus');</script>";
echo "<script>location='index.php?halaman=barang_keluar';</script>";
?>