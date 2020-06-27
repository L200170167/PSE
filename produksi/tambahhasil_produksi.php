<h2>Tambah Hasil Produksi<h2>

<form method='post' enctype='multipart/form-data'>
    <div class='form-group'>
        <label>Jenis Kain</label>
        <input type='text' class='form-control' name='kain'>
    </div>
    <div class='form-group'>
        <label>Panjang Kain</label>
        <input type='text' class='form-control' name='panjang'>
    </div>
    <div class='form-group'>
        <label>Lebar Kain</label>
        <input type='text' class='form-control' name='lebar'>
    </div>
    <div class='form-group'>
        <label>tanggal</label>
        <input type='date' class='form-control' name='tanggal'>
    </div>
    <div class='form-group'>
        <label>Jumlah</label>
        <input type='text' class='form-control' name='jumlah'>
    </div>
    <div class='form-group'>
        <label>Satuan</label>
        <input type='text' class='form-control' name='satuan'>
    </div>
    <button class='btn btn-primary' name='save'>Simpan</button>
    </form>
    <?php
    if (isset($_POST['save']))
    {
        $koneksi->query("INSERT INTO hasil_produksi(kain,panjang,lebar,tanggal,jumlah,satuan) values ('$_POST[kain]','$_POST[panjang]','$_POST[lebar]','$_POST[tanggal]','$_POST[jumlah]','$_POST[satuan]')");
        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=hasil_produksi'>";
    }
    ?>