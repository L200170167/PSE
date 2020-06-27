
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
			$sql=mysql_query("SELECT * FROM data_surat_keluar where id_surat_keluar = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >id&nbsp;surat&nbsp;keluar <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_surat_keluar" value="<?php echo $data['id_surat_keluar']; ?>" readonly  id="id_surat_keluar" required="required">		
				</td>
			   </tr>
			   
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Pembuat&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<!-- -->
<select  class=' selectpicker' data-live-search='true'   required="required" type="text" name="pembuat_surat" id="pembuat_surat" placeholder="Pembuat&nbsp;Surat" value="<?php echo ($data['pembuat_surat']); ?>">
<option value='<?php echo $data[pembuat_surat];?>'>- <?php echo $data[pembuat_surat];?> -</option><?php combo_database2('data_pegawai','NIP','nama',''); ?>
</select>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >No&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="no_surat" id="no_surat" placeholder="No&nbsp;Surat" value="<?php echo ($data['no_surat']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Sifat&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="sifat_surat" id="sifat_surat" placeholder="Sifat&nbsp;Surat" value="<?php echo ($data['sifat_surat']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tanggal&nbsp;Surat&nbsp;Keluar <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="date" name="tanggal_surat_keluar" id="tanggal_surat_keluar" placeholder="Tanggal&nbsp;Surat&nbsp;Keluar" value="<?php echo ($data['tanggal_surat_keluar']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Sumber&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="sumber_surat" id="sumber_surat" placeholder="Sumber&nbsp;Surat" value="<?php echo ($data['sumber_surat']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Tujuan&nbsp;Surat <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input class=''   required="required" type="text" name="tujuan_surat" id="tujuan_surat" placeholder="Tujuan&nbsp;Surat" value="<?php echo ($data['tujuan_surat']); ?>">


		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Kategori <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<select class=''   required="required" type="text" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo ($data['kategori']); ?>">
<?php combo_database('data_kategori','kategori',''); ?>
</select
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Lampiran <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'    required="required" type="text" name="lampiran" id="lampiran" placeholder="Lampiran" value="<?php echo ($data['lampiran']); ?>">
<?php echo $data['lampiran']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Perihal <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'    required="required" type="text" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo ($data['perihal']); ?>">
<?php echo $data['perihal']?>
</textarea>
		
				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">					
				<label >Keterangan <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<textarea class='ckeditor'    required="required" type="text" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo ($data['keterangan']); ?>">
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
				<input class=''    type="file" name="file_surat" id="file_surat" placeholder="File&nbsp;Surat" value="<?php echo ($data['file_surat']); ?>">


		
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
