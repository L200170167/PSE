
<a href="<?php index(); ?>">
<?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
<div class="content-box-header" style="height: 39px">Detail
<h3 style="cursor: s-resize;"></h3></div>
<div class="content-box-content">
<table <?php tabel_in(100,'%',0,'center');  ?>>		
	<tbody>
	<tr class="event3">
		<td class="clleft" colspan="3">
			Detail data&nbsp;surat&nbsp;keluar
		</td>
	</tr>	
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
			
			 $nip = decrypt($_COOKIE['id_admin']);
	

$query=mysql_query("update data_disposisi_surat_keluar set 
status='dibaca'
where nomor_surat='$proses' ") or die (mysql_error());
			
			$sql=mysql_query("SELECT * FROM data_disposisi_surat_keluar where nomor_surat = '$proses' and disposisikan_kepada='$nip'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;surat&nbsp;keluar</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_pegawai']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">no&nbsp;surat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $no = $data['nomor_surat']; ?></td>	
			   </tr>

<tr>
				<td class="clleft" width="25%">Catatan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['catatan']; ?></td>	
			   </tr>
			   
			  <?php  $file_surat =  baca_database("","file_surat","select * from data_surat_keluar where no_surat='$no'"); ?>
<tr>
				<td class="clleft" width="25%">file&nbsp;surat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><a href='../../../../admin/upload/<?php echo $file_surat; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='100' height='60' src='../../../../admin/upload/<?php echo $file_surat; ?>'></a></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>