<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_pembagian_gaji");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_pembagian_gaji = mysqli_query($con_mysqli,"SELECT max(id_pembagian_gaji) as id_pembagian_gaji FROM data_pembagian_gaji");
	$data_pembagian_gaji = mysqli_fetch_array($id_pembagian_gaji);
	$id_pembagian_gaji_akhir = $data_pembagian_gaji['id_pembagian_gaji'];
	$id_pembagian_gaji_otomatis = autonumber($id_pembagian_gaji_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_pembagian_gaji');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_pembagian_gaji_otomatis = $kodedepan."001";	
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
				<label >id&nbsp;pembagian&nbsp;gaji <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_pembagian_gaji_otomatis;?>" name="id_pembagian_gaji" placeholder="id_pembagian_gaji" id="id_pembagian_gaji" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jabatan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				
<select  class=' selectpicker' data-live-search='true'  type="text" name="jabatan" id="jabatan" placeholder="Jabatan" required="required">
<option></option><?php combo_database('data_jabatan','jabatan',''); ?>
</select>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Sistem&nbsp;Perhitungan&nbsp;Gaji <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea  class=''  type="text" name="sistem_perhitungan_gaji" id="sistem_perhitungan_gaji" placeholder="Sistem&nbsp;Perhitungan&nbsp;Gaji" required="required">

</textarea>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Gaji <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="gaji" id="gaji" placeholder="Gaji" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Potongan&nbsp;Uang&nbsp;Makan&nbsp;Harian <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="potongan_uang_makan_harian" id="potongan_uang_makan_harian" placeholder="Potongan&nbsp;Uang&nbsp;Makan&nbsp;Harian" required="required">/Hari

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Potongan&nbsp;Tidak&nbsp;Masuk&nbsp;Kerja <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="potongan_tidak_masuk_kerja" id="potongan_tidak_masuk_kerja" placeholder="Potongan&nbsp;Tidak&nbsp;Masuk&nbsp;Kerja" required="required">/Hari

		
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
