<h2>Bahan Produksi Pada PT Textile Sejahtera</h2>

<table class="table table-bordered">
<head>
    <tr>
        <td>no</td>
        <td>nama barang</td>
        <td>berat</td>
        <td>satuan</td>
        <td>jumlah</td>
        <td>aksi</td>
    </tr>
</head>
<body>
<?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM data_barang");?>
    <?php while($pecah = $ambil->fetch_assoc()){
        ?>
    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $pecah['nama']; ?></td>
       <td><?php echo $pecah['berat']; ?></td>
        <td><?php echo $pecah['satuan']; ?></td>
        <td><?php echo $pecah['jumlah']; ?></td>
        <td>
            <a href="index.php?halaman=hapusdata_barang&id=<?php echo $pecah['id_barang']; ?>" class='btn-danger btn'>hapus</a>
            <a href="index.php?halaman=ubahdata_barang&id=<?php echo $pecah['id_barang']; ?>" class='btn btn-warning'>ubah</a>
        </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
</body>
</table>
<a href='index.php?halaman=tambahdata_barang' class='btn btn-primary'>Tambah Data</a>