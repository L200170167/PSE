<?php
$ambil = $koneksi->query("SELECT * FROM data_produksi WHERE id_produksi='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM data_produksi WHERE id_produksi='$_GET[id]'");

echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=data_produksi';</script>";
?>