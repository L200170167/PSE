<?php 

//KODE OTOMATIS	 	
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
	$kode = substr($id_terakhir, 0, $panjang_kode);
	$angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
	$angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
	$id_baru = $kode.$angka_baru;
	return $id_baru;
}
$cek = mysqli_query($con_mysqli,"SELECT * FROM data_transaksi_gaji");
$rowcek = mysqli_num_rows($cek);
if ($rowcek > 0) {
	$id_transaksi_gaji = mysqli_query($con_mysqli,"SELECT max(id_transaksi_gaji) as id_transaksi_gaji FROM data_transaksi_gaji");
	$data_transaksi_gaji = mysqli_fetch_array($id_transaksi_gaji);
	$id_transaksi_gaji_akhir = $data_transaksi_gaji['id_transaksi_gaji'];
	$id_transaksi_gaji_otomatis = autonumber($id_transaksi_gaji_akhir, 3, 3); 
	}else{
	$kodedepan = strtoupper('data_transaksi_gaji');
	$kodedepan = str_replace("DATA_","",$kodedepan);
	$kodedepan = str_replace("DATA","",$kodedepan);
	$kodedepan = str_replace("TABEL_","",$kodedepan);
	$kodedepan = str_replace("TABEL","",$kodedepan);
	$kodedepan = str_replace("TABLE_","",$kodedepan);
	$kodedepan = strtoupper(substr($kodedepan,0,3));
	$id_transaksi_gaji_otomatis = $kodedepan."001";	
}

?>

<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>	



<br><br>
 </tr>
			   				
<?php 

if (!(isset($_GET['proses'])))
{
	
	?>
			<form name="formcari" id="formcari" action="" method="get">
				<fieldset> 
					<table>
						<tbody>
						<tr>
							<td>Berdasarkan</td>	
							<td>:</td>	
							<td>
							<!-- <input value="" name="Berdasarkan" id="Berdasarkan" > --> <select class="form-control selectpicker" data-live-search="true" name="Berdasarkan" id="Berdasarkan">
								<?php
								$sql = "desc data_karyawan";
								$result = @mysql_query($sql);
								while($row = @mysql_fetch_array($result)){
									echo "<option name='berdasarkan' value=$row[0]>$row[0]</option>";
								}
								?>
							</select>							
							</td>
						</tr>

						<tr>
							<td>Pencarian</td>	
							<td>:</td>	
							<td>							
								<!--<input class="form-control" type="text" name="isi" value="" >--> <input  type="text" name="isi" value="" >
								<?php btn_cari('Cari'); ?>
							</td>
						</tr>
					</tbody>
					</table>									
				</fieldset>
			</form>

<div style="overflow-x:auto;">
<table <?php tabel(100,'%',1,'left');  ?> >
			<tr>								  
			   
			   <th>No</th>
			   
			   <th align="center" class="th_border cell"  >Nik</th>
<th align="center" class="th_border cell"  >Nama</th>
<th align="center" class="th_border cell"  >Jabatan</th>
<th align="center" class="th_border cell"  >Tindakan</th>


			</tr>
							 
			<tbody>
			<?php
				$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
				{
				$berdasarkan =  mysql_real_escape_string($_GET['Berdasarkan']);
				$isi =  mysql_real_escape_string($_GET['isi']);
				$querytabel="SELECT * FROM data_karyawan where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM data_karyawan where $berdasarkan like '%$isi%'";
				}
				else
				{
				$querytabel="SELECT * FROM data_karyawan  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM data_karyawan";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { ?>
               <tr class="event2">	
				
				  <td align="center" width="50"><?php $no = (($no +1) ) ; echo $no;  ?></td>
				  

                 <td align="center"><?php echo ($data['nik']); ?></td>

<td align="center"><?php echo ($data['nama']); ?></td>
<td align="center"><?php echo ($data['jabatan']); ?></td>

  <td class="th_border cell" align="center" width="200">
						<table border="0">
							<tr>
								<td>
									<a class="btn btn-info" href="<?php index(); ?>?input=tambah&proses=<?= encrypt($data['nik']); ?>">
									PROSES PENGGAJIAN</a>
								</td>
								
							</tr>
						</table>
				  </td>
               </tr>
			<?php } ?>
			</tbody>
</table>
</div>


<?php }

else
{
	$tanggal = date('Y-m-d');
	$ada = cek_database("data_transaksi_gaji","tanggal_penggajian","$tanggal");
	if ($ada="ada")
	{
		echo "<center>PERHATIAN..!!!, <br>Karyawan Dibawah Telah Melakukan Peggajian Hari ini</center>";
	}
}	?>
				
<div class="content-box">
<div class="content-box-header" style="height: 39px">Tambah<h3></h3></div>
<form action="proses_simpan.php" enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">	
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;transaksi&nbsp;gaji <span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="readonly" readonly value="<?php echo $id_transaksi_gaji_otomatis;?>" name="id_transaksi_gaji" placeholder="id_transaksi_gaji" id="id_transaksi_gaji" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Penggajian <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  class='' value="<?php echo tanggal_otomatis(); ?>"  type="date" name="tanggal_penggajian" id="tanggal_penggajian" placeholder="Tanggal&nbsp;Penggajian" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nik <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='form-control selectpicker' data-live-search='true' -->
<input readonly value="<?php

if (isset($_GET['proses']))
{
echo $nik = decrypt($_GET['proses']);
}
 ?>" class='form-control selectpicker' data-live-search='true' type="text" name="nik" id="nik" placeholder="Nik" required="required">
	
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' readonly value="<?php echo baca_database("data_karyawan","nama","select * from data_karyawan where nik='$nik'")?>" type="text" name="nama" id="nama" placeholder="Nama" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jabatan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' readonly value="<?php echo $jabatan = baca_database("data_karyawan","jabatan","select * from data_karyawan where nik='$nik'")?>" type="text" name="jabatan" id="jabatan" placeholder="Jabatan" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Gaji <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' readonly value="<?php echo baca_database("data_pembagian_gaji","gaji","select * from data_pembagian_gaji where jabatan='$jabatan'")?>" type="hidden" name="gaji" id="gaji" placeholder="Gaji" required="required">
<?php echo rupiah(baca_database("data_pembagian_gaji","gaji","select * from data_pembagian_gaji where jabatan='$jabatan'"))?>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Sistem&nbsp;Perhitungan&nbsp;Penggajian <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input value="<?php echo (baca_database("data_pembagian_gaji","sistem_perhitungan_gaji","select * from data_pembagian_gaji where jabatan='$jabatan'"))?>"  readonly class=''  type="hidden" name="sistem_perhitungan_penggajian" id="sistem_perhitungan_penggajian" placeholder="Sistem&nbsp;Perhitungan&nbsp;Penggajian" required="required">

<?php echo (baca_database("data_pembagian_gaji","sistem_perhitungan_gaji","select * from data_pembagian_gaji where jabatan='$jabatan'"))?>
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jumlah&nbsp;Perhitungan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' onclick="hitung()" onkeydown="hitung()" onkeypress="hitung()" onchange="hitung()" onkeyup="hitung()" type="text" name="jumlah_perhitungan" id="jumlah_perhitungan" placeholder="Jumlah&nbsp;Perhitungan" required="required">

		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jumlah&nbsp;Gaji <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class='' type="hidden" name="jumlah_gaji" id="jumlah_gaji" placeholder="Jumlah&nbsp;Gaji" required="required">

		<input class='' readonly type="text" name="jumlah_gaji1" id="jumlah_gaji1" placeholder="Jumlah&nbsp;Gaji" required="required">
				</td>
			   </tr>
			   
	</tbody>
</table>


<script src="../../../data/cssjs/jquery/jquery.js"></script>
	<script>
	
				 function hitung() { 
				 var gaji = $("#gaji").val();
				 var jumlah_perhitungan = $("#jumlah_perhitungan").val();
				 var total = gaji*jumlah_perhitungan;
				 
				  $("#jumlah_gaji").val(total);
				  $("#jumlah_gaji1").val(convertToRupiah(total));
				 }
				
				function convertToRupiah(angka){
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    return rupiah.split('',rupiah.length-1).reverse().join('');
}
				
				// var input = $("#nama_gas").val();
				
				 // $.ajax({ url: 'admin/include/function/ajax.php', 
				 // type: 'POST', 
				 // dataType: 'json', 
				 // data: {'isi': input,'tabel':'data_gas','field':'nama_gas'}, success: function (proses) 
					// {

					 // $("#harga").val(proses['harga']);
					
					// } }); 
				// }
	 </script>
	 
	 
<div class="content-box-content">
<center>
<?php btn_simpan(' SIMPAN'); ?>
</center>
</div>		
</div>
</div>
</form>
