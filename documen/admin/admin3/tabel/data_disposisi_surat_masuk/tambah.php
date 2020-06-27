<?php

//KODE OTOMATIS
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_disposisi_surat_masuk");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_pegawai = mysqli_query($con_mysqli,"SELECT max(id_pegawai) as id_pegawai FROM data_disposisi_surat_masuk");
	$data_disposisi_surat_masuk = mysqli_fetch_array($id_pegawai);
	$id_pegawai_akhir = $data_disposisi_surat_masuk['id_pegawai'];
	$id_pegawai_otomatis = autonumber($id_pegawai_akhir, 3, 3);
	}else{
	$kodedepan = strtoupper('data_disposisi_surat_masuk');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_pegawai_otomatis = $kodedepan."001";
}

?>

<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>
<form action="index.php" method="get">
		NOMOR SURAT :

		<input type="hidden" id="input" name="input" value="tambah">
<select  class=' selectpicker' data-live-search='true'  type="text" name="nomor_surat" id="nomor_surat" placeholder="Nomor&nbsp;Surat" required="required">
<option></option><?php combo_database2('data_surat_masuk','no_surat','prihal',''); ?>
</select>		<button type="submit" value="Preview">PREVIEW</button>
</form>
<br>
		<?php
		error_reporting(0);

		 $nomor =  $_GET['nomor_surat'];
		 $gambar = baca_database("data_surat_masuk","file_surat","select * from data_surat_masuk where no_surat='$nomor'");

if ($_GET['nomor_surat'])
{
		?>


		<a href="../../../upload/<?php echo $gambar; ?>">
<img width="400"  onerror="this.src='<?php echo $imageerror; ?>'" src="../../../upload/<?php echo $gambar; ?>">
<br>
<br>
<button class="btn btn-primary">Buka / Download File </button>
</a>

<?php } ?>
<div class="content-box">
<div class="content-box-header" style="height: 39px"><h3></h3></div>
<form action="proses_simpan.php" enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">
<table <?php tabel_in(100,'%',0,'center');  ?>>
	<tbody>

				<input type="hidden" readonly value="<?php echo $id_pegawai_otomatis;?>" name="id_pegawai" placeholder="id_pegawai" id="id_pegawai" required="required">

			   <tr>
				<td width="25%" class="leftrowcms">
				<label >Nomor&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>

<input  class=' selectpicker' value="<?php echo $nomor;?>" readonly data-live-search='true'  type="text" name="nomor_surat" id="nomor_surat" placeholder="Nomor&nbsp;Surat" required="required">

				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">
				<label >Disposisi&nbsp;Dari <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<?php
$id = $_COOKIE['jenenge'];
echo decrypt("$id")?>
<input value="<?php
$id = $_COOKIE['id_admin'];
echo decrypt("$id")?>"  class=' selectpicker' data-live-search='true'  type="hidden" name="disposisi_dari" id="disposisi_dari" placeholder="Disposisi&nbsp;Dari" required="required">

				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">
				<label >Disposisikan&nbsp;Kepada <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>

<select  class=' selectpicker' data-live-search='true'  type="text" name="disposisikan_kepada" id="disposisikan_kepada" placeholder="Disposisikan&nbsp;Kepada" required="required">
<option></option><?php combo_database2('data_pegawai','NIP','nama',''); ?>
</select>

				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">
				<label >Catatan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'  type="text" name="catatan" id="catatan" placeholder="Catatan" required="required">

</textarea>
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">
				<label >Status <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>

<input value="belum_dibaca" readonly class=' selectpicker' data-live-search='true'  type="h" name="status" id="status" placeholder="Status" required="required">

				</td>
			   </tr>

	</tbody>
</table>
<div class="content-box-content">
<center>
<?php btn_simpan(' SIMPAN'); ?>
</center>
</div>
</div>
</div>
	</form>
