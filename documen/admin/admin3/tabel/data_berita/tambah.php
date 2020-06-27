<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_berita");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_berita = mysqli_query($con_mysqli,"SELECT max(id_berita) as id_berita FROM data_berita");
	$data_berita = mysqli_fetch_array($id_berita);
	$id_berita_akhir = $data_berita['id_berita'];
	$id_berita_otomatis = autonumber($id_berita_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_berita');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_berita_otomatis = $kodedepan."001";	
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
				<label >id&nbsp;berita <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_berita_otomatis;?>" name="id_berita" placeholder="id_berita" id="id_berita" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input value="<?php echo tanggal_otomatis(); ?>"  type="date" name="tanggal" id="tanggal" placeholder="Tanggal" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Judul <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text" name="judul" id="judul" placeholder="Judul" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Foto <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="file" name="foto" id="foto" placeholder="Foto" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Isi <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="text" name="isi" id="isi" placeholder="Isi" required="required">

		
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
