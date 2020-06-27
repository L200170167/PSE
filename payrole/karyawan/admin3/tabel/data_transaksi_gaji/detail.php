
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
			Detail data&nbsp;transaksi&nbsp;gaji
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
			$sql=mysql_query("SELECT * FROM data_transaksi_gaji where id_transaksi_gaji = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;transaksi&nbsp;gaji</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_transaksi_gaji']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">tanggal&nbsp;penggajian</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (format_indo($data['tanggal_penggajian'])); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">nik</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nik']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">Nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo baca_database("", "nama", " select * from data_karyawan where nik ='$data[nik]'") ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nama']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">jabatan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jabatan']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">gaji</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['gaji']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">sistem&nbsp;perhitungan&nbsp;penggajian</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['sistem_perhitungan_penggajian']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">jumlah&nbsp;perhitungan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jumlah_perhitungan']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">jumlah&nbsp;gaji</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jumlah_gaji']; ?></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>