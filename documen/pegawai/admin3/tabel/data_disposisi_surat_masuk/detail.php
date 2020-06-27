
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
	

$query=mysql_query("update data_disposisi_surat_masuk set 
status='dibaca'
where nomor_surat='$proses' ") or die (mysql_error());


			
			$sql=mysql_query("SELECT * FROM data_disposisi_surat_masuk where nomor_surat = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			

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
				<td class="clleft"><?php echo $nip= $data['disposisi_dari']; ?></td>
			   </tr>
<tr>
				<td class="clleft" width="25%">Nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php



if ($nip=="ADM001")
{echo "admin";}
				echo baca_database("", "nama", " select * from data_pegawai where NIP ='$nip'") ?></td>
			   </tr>
<tr>
				<td class="clleft" width="25%">disposisikan&nbsp;kepada</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['disposisikan_kepada']; ?></td>
			   </tr>
<tr>
				<td class="clleft" width="25%">Nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "nama", " select * from data_pegawai where NIP ='$data[disposisikan_kepada]'") ?></td>
			   </tr>
<tr>
				<td class="clleft" width="25%">catatan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (substr($data['catatan'],0,100)); ?></td>
			   </tr>
			   
			   
				 <tr>
				 				<td class="clleft" width="25%">File Surat</td>
				 				<td class="clleft" width="2%">:</td>
				 				<td class="clleft"><?php  $file = baca_database("", "file_surat", " select * from data_surat_masuk where no_surat='$data[nomor_surat]'") ?>
								
								<a href='../../../../admin/upload/<?php echo $file; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='100'  src='../../../../admin/upload/<?php echo $file; ?>'></a>
								
								</td>
				 			   </tr>





</tbody>
</table>
</div>
</div>
