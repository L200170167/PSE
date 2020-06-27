<?php if(empty($p)) { header("Location: index.php?p=home"); die(); } ?>
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

<br>
<center><h2> KRITIK DAN SARAN </h2></center>
<br>

<div class="container">
<div class="col-md-12">

<div class="content-box">
<form action="proses_simpan_Kritik dan Saran.php" enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">	
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody><font color="black"><style> 
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #3CBC8D;
  color: white;
}
</style>
			   
				<input type="hidden" readonly value="<?php echo $id_kritik_dan_saran_otomatis;?>" name="id_kritik_dan_saran" placeholder="id_kritik_dan_saran" id="id_kritik_dan_saran" required="required">		
				
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama&nbsp; <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<font color="black"><input type="text"  name="nama_karyawan" id="nama_karyawan" placeholder="Nama&nbsp;" required="required"></font>

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kritik&nbsp;Dan&nbsp;Saran <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'  type="textarea" name="kritik_dan_saran" id="kritik_dan_saran" placeholder="Kritik&nbsp;Dan&nbsp;Saran" required="required">

</textarea>		
				</td>
			   </tr>
			   
	</tbody>
</table>
<div class="content-box-content">
<center>
<?php btn_simpan(' PROSES'); ?>
</center>
</div>		
</div>
</div>
</form>
</div>		
</div>
</div>