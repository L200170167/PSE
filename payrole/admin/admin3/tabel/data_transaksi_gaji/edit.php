
<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Edit<h3></h3></div>
<form action="proses_update.php"  enctype="multipart/form-data"  method="post">
<div class="content-box-content">
<div id="postcustom">	
<table <?php tabel_in(100,'%',0,'center');  ?>>	
	<tbody>
	<?php

if (!isset($_GET['proses']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 
			$proses = decrypt(mysql_real_escape_string($_GET['proses']));
			$sql=mysql_query("SELECT * FROM data_transaksi_gaji where id_transaksi_gaji = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;transaksi&nbsp;gaji <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_transaksi_gaji" value="<?php echo $data['id_transaksi_gaji']; ?>" readonly  id="id_transaksi_gaji" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Penggajian <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="date" name="tanggal_penggajian" id="tanggal_penggajian" placeholder="Tanggal&nbsp;Penggajian" value="<?php echo ($data['tanggal_penggajian']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nik <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='form-control selectpicker' data-live-search='true' -->
<select  class='form-control selectpicker' data-live-search='true'  required="required" type="text" name="nik" id="nik" placeholder="Nik" value="<?php echo ($data['nik']); ?>">
<option value='<?php echo $data[nik];?>'>- <?php echo $data[nik];?> -</option><?php combo_database2('data_karyawan','nik','nama',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo ($data['nama']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jabatan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo ($data['jabatan']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Gaji <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="gaji" id="gaji" placeholder="Gaji" value="<?php echo ($data['gaji']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Sistem&nbsp;Perhitungan&nbsp;Penggajian <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class=''    required="required" type="text" name="sistem_perhitungan_penggajian" id="sistem_perhitungan_penggajian" placeholder="Sistem&nbsp;Perhitungan&nbsp;Penggajian" value="<?php echo ($data['sistem_perhitungan_penggajian']); ?>">
<?php echo $data['sistem_perhitungan_penggajian']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jumlah&nbsp;Perhitungan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="jumlah_perhitungan" id="jumlah_perhitungan" placeholder="Jumlah&nbsp;Perhitungan" value="<?php echo ($data['jumlah_perhitungan']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jumlah&nbsp;Gaji <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="jumlah_gaji" id="jumlah_gaji" placeholder="Jumlah&nbsp;Gaji" value="<?php echo ($data['jumlah_gaji']); ?>">


		
				</td>
			   </tr>
			   
	</tbody>
</table>
<div class="content-box-content">
<center>
<?php btn_update(' UPDATE'); ?>
</center>
</div>		
</div>
</div>
</form>
