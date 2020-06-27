<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_pegawai");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_pegawai = mysqli_query($con_mysqli,"SELECT max(id_pegawai) as id_pegawai FROM data_pegawai");
	$data_pegawai = mysqli_fetch_array($id_pegawai);
	$id_pegawai_akhir = $data_pegawai['id_pegawai'];
	$id_pegawai_otomatis = autonumber($id_pegawai_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_pegawai');
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

<div class="content-box">
<div class="content-box-header" style="height: 39px">Tambah<h3></h3></div>
<form action="proses_simpan.php" enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">	
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;pegawai <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_pegawai_otomatis;?>" name="id_pegawai" placeholder="id_pegawai" id="id_pegawai" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nip <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text" name="NIP" id="NIP" placeholder="Nip" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text" name="nama" id="nama" placeholder="Nama" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Alamat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'  type="textarea" name="alamat" id="alamat" placeholder="Alamat" required="required">

</textarea>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tempat&nbsp;Lahir <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'  type="textarea" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat&nbsp;Lahir" required="required">

</textarea>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Lahir <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input value="<?php echo tanggal_otomatis(); ?>"  type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal&nbsp;Lahir" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jenis&nbsp;Kelamin <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='form-control selectpicker' data-live-search='true' -->
<select  type="enum" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis&nbsp;Kelamin" required="required">
<option></option><?php combo_enum('data_pegawai','jenis_kelamin',''); ?>
</select>		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jabatan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Username <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text" name="username" id="username" placeholder="Username" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Password <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="password" name="password" id="password" placeholder="Password" required="required">

		
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
