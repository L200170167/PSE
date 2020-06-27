
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
			$sql=mysql_query("SELECT * FROM data_karyawan where id_karyawan = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;karyawan <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>" readonly  id="id_karyawan" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nik <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="nik" id="nik" placeholder="Nik" value="<?php echo ($data['nik']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kpj <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="kpj" id="kpj" placeholder="Kpj" value="<?php echo ($data['kpj']); ?>">


		
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
				<label >Status&nbsp;Perkawinan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="status_perkawinan" id="status_perkawinan" placeholder="Status&nbsp;Perkawinan" value="<?php echo ($data['status_perkawinan']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Lahir <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal&nbsp;Lahir" value="<?php echo ($data['tanggal_lahir']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Periode&nbsp;Kepesertaan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="periode_kepesertaan" id="periode_kepesertaan" placeholder="Periode&nbsp;Kepesertaan" value="<?php echo ($data['periode_kepesertaan']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jabatan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='form-control selectpicker' data-live-search='true' -->
<select   required="required" type="text" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo ($data['jabatan']); ?>">
<option value='<?php echo $data[jabatan];?>'>- <?php echo $data[jabatan];?> -</option><?php combo_database('data_jabatan','jabatan',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Username <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="username" id="username" placeholder="Username" value="<?php echo ($data['username']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >password Lama<span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   type="password" name="password_lama" id="password_lama" placeholder="password lama" value="">
				<input  type="hidden" name="password_validasi" id="password_validasi" placeholder="password_validasi" value="<?php echo encrypt($data['password']);?>">
				<br>Masukkan password Lama untuk Validasi, Kosongkan jika tidak ingin mengganti password
				</td>
			   </tr>
			   
			    <tr>
				<td width="25%" class="leftrowcms">					
				<label >password Baru<span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''    type="password" name="password" id="password" placeholder="password baru" value="">
				<br>Kosongkan jika tidak ingin mengganti password
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
