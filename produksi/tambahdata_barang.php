<h2>Tambah Barang</h2>
<?php
$koneksi = mysqli_connect('localhost','root','','produksi');
?>
<form method="post" action='tambahdata_barang.php' enctype="multipart/form-data">
    <div class="form-group">

        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
        <label>Berat</label>
        <input type="text" class="form-control" name="berat">
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="text" class="form-control" name="jumlah">
    </div>
    <div class="form-group">
        <label>Satuan</label>
        <input type="text" class="form-control" name="satuan">
    </div>
    <button class='btn btn-primary' name='save' type='submit'>Submit</button>
</form>
    <?php
    if (isset($_POST['save']))
    {
        $koneksi->query("INSERT INTO data_barang(nama,berat,jumlah,satuan) values ('$_POST[nama]','$_POST[berat]','$_POST[jumlah]','$_POST[satuan]')");
        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data_barang'>";
    }
    ?>