
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
			$sql=mysql_query("SELECT * FROM data_pegawai where id_pegawai = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;pegawai <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_pegawai" value="<?php echo $data['id_pegawai']; ?>" readonly  id="id_pegawai" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nip <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="text" name="NIP" id="NIP" placeholder="Nip" value="<?php echo $data['NIP']; ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Nama <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo $data['nama']; ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Alamat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'   required="required" type="textarea" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $data['alamat']; ?>">
<?php echo $data['alamat']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tempat&nbsp;Lahir <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'   required="required" type="textarea" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat&nbsp;Lahir" value="<?php echo $data['tempat_lahir']; ?>">
<?php echo $data['tempat_lahir']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Lahir <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal&nbsp;Lahir" value="<?php echo $data['tanggal_lahir']; ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jenis&nbsp;Kelamin <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<select class='ckeditor'   required="required" type="enum" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis&nbsp;Kelamin" value="<?php echo $data['jenis_kelamin']; ?>">
<option value='<?php echo $data[jenis_kelamin];?>'>- <?php echo $data[jenis_kelamin];?> -</option><?php combo_enum('data_pegawai','jenis_kelamin',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Jabatan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="text" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $data['jabatan']; ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Username <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="text" name="username" id="username" placeholder="Username" value="<?php echo $data['username']; ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Password <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="password" name="password" id="password" placeholder="Password" value="<?php echo $data['password']; ?>">


		
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
