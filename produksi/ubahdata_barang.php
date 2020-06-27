<h2>Ubah Data Barang</h2>
<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
$koneksi = mysqli_connect('localhost','root','','produksi');
$id_barang = $_GET['id_barang'];
$ambil=$koneksi->query("SELECT * FROM data_barang WHERE id_barang='$id_barang'");
$pecah=$ambil->fetch_assoc();


//echo "<pre>";
//print_r($pecah);
//echo "</pre>";
?>

<form method="post" action='ubahdata_barang.php'>
<input type="hidden" name="id" class="form-control" value="<?php echo $pecah['id_barang']; ?>">

<div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama']; ?>">
    </div>
    <div class="form-group">
        <label>Berat</label>
        <input type="text" name="berat" class="form-control" value="<?php echo $pecah['berat']; ?>">
    </div>
    <div class="form-group">
        <label>Jumlah</label>
        <input type="text" class="form-control" name="jumlah" value="<?php echo $pecah['jumlah']; ?>">
    </div>
    <div class="form-group">
        <label>Satuan</label>
        <input type="date" name="satuan" class="form-control" value="<?php echo $pecah['satuan']; ?>">
    </div>
    <button class='btn btn-primary' type='submit' name='ubah'>Ubah</button>
    </form>

    <?php
    if (isset($_POST['ubah']))
        {
            $id_p = $_POST['id'];

            $query = "UPDATE data_barang SET nama='$_POST[nama]',berat='$_POST[berat]',jumlah='$_POST[jumlah]',satuan='$_POST[satuan]' WHERE id_barang='$_POST[id]'";
            mysqli_query($koneksi, $query);
       
            #echo "<script>alert('data barang telah diubah');</script>";
            echo "<script>location='index.php?halaman=data_barang';</script>";
        
        }
        
    ?>

    