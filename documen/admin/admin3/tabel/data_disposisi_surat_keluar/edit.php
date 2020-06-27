
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
			$sql=mysql_query("SELECT * FROM data_disposisi_surat_keluar where id_pegawai = '$proses'");
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
				<label >Nomor&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!-- -->
<select  class=' selectpicker' data-live-search='true'   required="required" type="text" name="nomor_surat" id="nomor_surat" placeholder="Nomor&nbsp;Surat" value="<?php echo ($data['nomor_surat']); ?>">
<option value='<?php echo $data[nomor_surat];?>'>- <?php echo $data[nomor_surat];?> -</option><?php combo_database2('data_surat_keluar','no_surat','perihal',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Disposisi&nbsp;Dari <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!-- -->
<select  class=' selectpicker' data-live-search='true'   required="required" type="text" name="disposisi_dari" id="disposisi_dari" placeholder="Disposisi&nbsp;Dari" value="<?php echo ($data['disposisi_dari']); ?>">
<option value='<?php echo $data[disposisi_dari];?>'>- <?php echo $data[disposisi_dari];?> -</option><?php combo_database2('data_pegawai','NIP','nama',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Disposisikan&nbsp;Kepada <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!-- -->
<select  class=' selectpicker' data-live-search='true'   required="required" type="text" name="disposisikan_kepada" id="disposisikan_kepada" placeholder="Disposisikan&nbsp;Kepada" value="<?php echo ($data['disposisikan_kepada']); ?>">
<option value='<?php echo $data[disposisikan_kepada];?>'>- <?php echo $data[disposisikan_kepada];?> -</option><?php combo_database2('data_pegawai','NIP','nama',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Catatan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'    required="required" type="text" name="catatan" id="catatan" placeholder="Catatan" value="<?php echo ($data['catatan']); ?>">
<?php echo $data['catatan']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Status <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<select  class=' selectpicker' data-live-search='true'    required="required" type="enum" name="status" id="status" placeholder="Status" value="<?php echo ($data['status']); ?>">
<option value='<?php echo $data[status];?>'>- <?php echo $data[status];?> -</option><?php combo_enum('data_disposisi_surat_keluar','status',''); ?>
</select>
		
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
