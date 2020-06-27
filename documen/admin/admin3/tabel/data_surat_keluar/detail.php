
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
			$sql=mysql_query("SELECT * FROM data_surat_keluar where id_surat_keluar = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;surat&nbsp;keluar</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_surat_keluar']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">pembuat&nbsp;surat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['pembuat_surat']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "nama", " select * from data_pegawai=NIP where pembuat_surat ='$data[pembuat_surat]'") ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">no&nbsp;surat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['no_surat']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">sifat&nbsp;surat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['sifat_surat']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">tanggal&nbsp;surat&nbsp;keluar</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (format_indo($data['tanggal_surat_keluar'])); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">sumber&nbsp;surat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['sumber_surat']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">tujuan&nbsp;surat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['tujuan_surat']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">kategori</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['kategori']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">lampiran</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (substr($data['lampiran'],0,100)); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">perihal</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (substr($data['perihal'],0,100)); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">keterangan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (substr($data['keterangan'],0,100)); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">file&nbsp;surat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><a href='../../../upload/<?php echo $data['file_surat']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='250'  src='../../../upload/<?php echo $data['file_surat']; ?>'></a></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>