<h2>Data Yang Harus di Produksi</h2>

<table class="table table-bordered">
<head>
    <tr>
        <td>no</td>
        <td>Jenis Kain</td>
        <td>Panjang Kain</td>
        <td>Lebar Kain</td>
        <td>tanggal</td>
        <td>jumlah</td>
        <td>satuan</td>
        <td>aksi</td>
    </tr>
</head>
<body>
<?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM data_produksi");?>
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
            <a href="index.php?halaman=hapusdata_produksi&id=<?php echo $pecah['id_produksi']; ?>" class='btn btn-danger'>hapus</a>
            <a href="index.php?halaman=ubahdata_produksi&id=<?php echo $pecah['id_produksi']; ?>" class='btn btn-warning'>ubah</a>
        </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
</body>
</table>
<a href='index.php?halaman=tambahdata_produksi' class='btn btn-primary'>Tambah Data</a>