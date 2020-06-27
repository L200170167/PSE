<h2>Ubah Hasil Produksi</h2>
<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
$koneksi = mysqli_connect('localhost','root','','produksi');
$id_hasil = $_GET['id_hasil'];
$ambil=$koneksi->query("SELECT * FROM hasil_produksi WHERE id_hasil='$id_hasil'");
$pecah=$ambil->fetch_assoc();


//echo "<pre>";
//print_r($pecah);
//echo "</pre>";
?>

<form method="post" action='ubahhasil_produksi.php'>
<input type="hidden" name="id" class="form-control" value="<?php echo $pecah['id_hasil']; ?>">

    <div class="form-group">
        <label>Jenis Kain</label>
        <input type="text" name="kain" class="form-control" value="<?php echo $pecah['kain']; ?>">
    </div>
    <div class="form-group">
        <label>Panjang Kain</label>
        <input type="text" name="panjang" class="form-control" value="<?php echo $pecah['panjang']; ?>">
    </div>
    <div class="form-group">
        <label>Lebar Kain</label>
        <input type="text" class="form-control" name="lebar" value="<?php echo $pecah['lebar']; ?>">
    </div>
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?php echo $pecah['tanggal']; ?>">
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="text" name="jumlah" class="form-control" value="<?php echo $pecah['jumlah']; ?>">
    </div>
    <div class="form-group">
        <label>Satuan</label>
        <input type="text" class="form-control" name="satuan" value="<?php echo $pecah['satuan']; ?>">
    </div>
    <button class='btn btn-primary' type='submit' name='ubah'>Ubah</button>
    </form>

    <?php
    if (isset($_POST['ubah']))
        {
            $id_p = $_POST['id'];

            $query = "UPDATE hasil_produksi SET kain='$_POST[kain]',panjang='$_POST[panjang]',lebar='$_POST[lebar]',tanggal='$_POST[tanggal]',jumlah='$_POST[jumlah]',satuan='$_POST[satuan]' WHERE id_hasil='$_POST[id]'";
            mysqli_query($koneksi, $query);
       
            #echo "<script>alert('data hasil produksi telah diubah');</script>";
            echo "<script>location='index.php?halaman=hasil_produksi';</script>";
        
        }
        
    ?>

    