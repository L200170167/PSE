<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_surat_masuk");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_surat_masuk = mysqli_query($con_mysqli,"SELECT max(id_surat_masuk) as id_surat_masuk FROM data_surat_masuk");
	$data_surat_masuk = mysqli_fetch_array($id_surat_masuk);
	$id_surat_masuk_akhir = $data_surat_masuk['id_surat_masuk'];
	$id_surat_masuk_otomatis = autonumber($id_surat_masuk_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_surat_masuk');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_surat_masuk_otomatis = $kodedepan."001";	
}

?>

<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>	

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Tambah<h3></h3></div>
<form action="proses_simpan.php" enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">	
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;surat&nbsp;masuk <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_surat_masuk_otomatis;?>" name="id_surat_masuk" placeholder="id_surat_masuk" id="id_surat_masuk" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >No&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text" name="no_surat" id="no_surat" placeholder="No&nbsp;Surat" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Surat&nbsp;Masuk <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input value="<?php echo tanggal_otomatis(); ?>"  type="date" name="tanggal_surat_masuk" id="tanggal_surat_masuk" placeholder="Tanggal&nbsp;Surat&nbsp;Masuk" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Sumber&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text" name="sumber_surat" id="sumber_surat" placeholder="Sumber&nbsp;Surat" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tujuan&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text" name="tujuan_surat" id="tujuan_surat" placeholder="Tujuan&nbsp;Surat" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kategori <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='form-control selectpicker' data-live-search='true' -->
<select  type="text" name="kategori" id="kategori" placeholder="Kategori" required="required">
<option></option><?php combo_database('data_kategori','kategori',''); ?>
</select>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Lampiran <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'  type="textarea" name="lampiran" id="lampiran" placeholder="Lampiran" required="required">

</textarea>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Prihal <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'  type="textarea" name="prihal" id="prihal" placeholder="Prihal" required="required">

</textarea>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Keterangan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'  type="textarea" name="keterangan" id="keterangan" placeholder="Keterangan" required="required">

</textarea>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >File&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="file" name="file_surat" id="file_surat" placeholder="File&nbsp;Surat" required="required">

		
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
