
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
			Detail data&nbsp;disposisi
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
			$sql=mysql_query("SELECT * FROM data_disposisi where id_pegawai = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;pegawai</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_pegawai']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">nomor&nbsp;surat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nomor_surat']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Tujuan Surat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "tujuan_surat", " select * from data_surat_masuk=no_surat where nomor_surat ='$data[nomor_surat]'") ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">disposisikan&nbsp;kepada</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['disposisikan_kepada']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "nama", " select * from data_pegawai=NIP where disposisikan_kepada ='$data[disposisikan_kepada]'") ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">catatan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['catatan']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">status</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['status']; ?></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>