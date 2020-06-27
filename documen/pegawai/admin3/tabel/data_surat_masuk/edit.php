
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
			$sql=mysql_query("SELECT * FROM data_surat_masuk where id_surat_masuk = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;surat&nbsp;masuk <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_surat_masuk" value="<?php echo $data['id_surat_masuk']; ?>" readonly  id="id_surat_masuk" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >No&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="text" name="no_surat" id="no_surat" placeholder="No&nbsp;Surat" value="<?php echo $data['no_surat']; ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Surat&nbsp;Masuk <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="date" name="tanggal_surat_masuk" id="tanggal_surat_masuk" placeholder="Tanggal&nbsp;Surat&nbsp;Masuk" value="<?php echo $data['tanggal_surat_masuk']; ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Sumber&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="text" name="sumber_surat" id="sumber_surat" placeholder="Sumber&nbsp;Surat" value="<?php echo $data['sumber_surat']; ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tujuan&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="text" name="tujuan_surat" id="tujuan_surat" placeholder="Tujuan&nbsp;Surat" value="<?php echo $data['tujuan_surat']; ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kategori <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!--<select  class='form-control selectpicker' data-live-search='true' -->
<select   required="required" type="text" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $data['kategori']; ?>">
<option value='<?php echo $data[kategori];?>'>- <?php echo $data[kategori];?> -</option><?php combo_database('data_kategori','kategori',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Lampiran <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'   required="required" type="textarea" name="lampiran" id="lampiran" placeholder="Lampiran" value="<?php echo $data['lampiran']; ?>">
<?php echo $data['lampiran']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Prihal <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'   required="required" type="textarea" name="prihal" id="prihal" placeholder="Prihal" value="<?php echo $data['prihal']; ?>">
<?php echo $data['prihal']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Keterangan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'   required="required" type="textarea" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $data['keterangan']; ?>">
<?php echo $data['keterangan']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >File&nbsp;Surat<span class="highlight">*</span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<a href='../../../upload/<?php echo $data['file_surat']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='100' height='60' src='../../../upload/<?php echo $data['file_surat']; ?>'></a>
				<br>
				<?php echo $data['file_surat']; ?>
				<input type="hidden" name="file_surat1" value="<?php echo $data['file_surat']; ?>">
				<br>
				<input   type="file" name="file_surat" id="file_surat" placeholder="File&nbsp;Surat" value="<?php echo $data['file_surat']; ?>">


		
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
