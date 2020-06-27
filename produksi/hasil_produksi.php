<h2>Hasil Seluruh Produksi Kain Yang Dihasilkan Pada PT Textile Sejahtera</h2>

<table class="table table-bordered">
<head>
    <tr>
        <td>No</td>
        <td>Jenis Kain</td>
        <td>Panjang Kain</td>
        <td>Lebar Kain</td>
        <td>Tanggal</td>
        <td>Jumlah</td>
        <td>Satuan</td>
        <td>Aksi</td>
    </tr>
</head>
<body>
<?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM hasil_produksi");?>
    <?php while($pecah = $ambil->fetch_assoc()){
        ?>
    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $pecah['kain']; ?></td>
        <td><?php echo $pecah['panjang']; ?></td>
        <td><?php echo $pecah['lebar']; ?></td>
        <td><?php echo $pecah['tanggal']; ?></td>
        <td><?php echo $pecah['jumlah']; ?></td>
        <td><?php echo $pecah['satuan']; ?></td>
        <td>
            <a href="index.php?halaman=hapushasil_produksi&id=<?php echo $pecah['id_hasil']; ?>" class='btn btn-danger'>hapus</a>
            <a href="index.php?halaman=ubahhasil_produksi&id=<?php echo $pecah['id_hasil']; ?>" class='btn btn-warning'>ubah</a>
        </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
</body>
</table>
<a href='index.php?halaman=tambahhasil_produksi' class='btn btn-primary'>Tambah Data</a>