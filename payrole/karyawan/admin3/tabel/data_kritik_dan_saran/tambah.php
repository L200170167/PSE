<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_kritik_dan_saran");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_kritik_dan_saran = mysqli_query($con_mysqli,"SELECT max(id_kritik_dan_saran) as id_kritik_dan_saran FROM data_kritik_dan_saran");
	$data_kritik_dan_saran = mysqli_fetch_array($id_kritik_dan_saran);
	$id_kritik_dan_saran_akhir = $data_kritik_dan_saran['id_kritik_dan_saran'];
	$id_kritik_dan_saran_otomatis = autonumber($id_kritik_dan_saran_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_kritik_dan_saran');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_kritik_dan_saran_otomatis = $kodedepan."001";	
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
				<label >id&nbsp;kritik&nbsp;dan&nbsp;saran <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_kritik_dan_saran_otomatis;?>" name="id_kritik_dan_saran" placeholder="id_kritik_dan_saran" id="id_kritik_dan_saran" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama&nbsp;Karyawan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="text" name="nama_karyawan" id="nama_karyawan" placeholder="Nama&nbsp;Karyawan" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kritik&nbsp;Dan&nbsp;Saran <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea  class=''  type="text" name="kritik_dan_saran" id="kritik_dan_saran" placeholder="Kritik&nbsp;Dan&nbsp;Saran" required="required">

</textarea>		
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
