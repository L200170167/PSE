
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
			Detail data&nbsp;disposisi&nbsp;surat&nbsp;masuk
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
			$sql=mysql_query("SELECT * FROM data_disposisi_surat_masuk where id_pegawai = '$proses'");
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
				<td class="clleft" width="25%">Prihal</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "prihal", " select * from data_surat_masuk where no_surat ='$data[nomor_surat]'") ?></td>
			   </tr>
<tr>
				<td class="clleft" width="25%">disposisi&nbsp;dari</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['disposisi_dari']; ?></td>
			   </tr>
<tr>
				<td class="clleft" width="25%">Nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "nama", " select * from data_pegawai=NIP where disposisi_dari ='$data[disposisi_dari]'") ?></td>
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
				<td class="clleft"><?php echo (substr($data['catatan'],0,100)); ?></td>
			   </tr>
				 <tr>
				 				<td class="clleft" width="25%">Nama</td>
				 				<td class="clleft" width="2%">:</td>
				 				<td class="clleft"><?php echo baca_database("", "file_surat", " select * from data_surat_masuk where no_surat ='$data[nomor_surat]'") ?></td>
				 			   </tr>



</tbody>
</table>
</div>
</div>
