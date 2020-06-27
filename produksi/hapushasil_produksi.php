<?php
$ambil = $koneksi->query("SELECT * FROM hasil_produksi WHERE id_hasil='$_GET[id]'");
$pecah = $ambil->fetch_assoc();


$koneksi->query("DELETE FROM hasil_produksi WHERE id_hasil='$_GET[id]'");

echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=hasil_produksi';</script>";
?>