
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
			Detail data&nbsp;pembagian&nbsp;gaji
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
			$sql=mysql_query("SELECT * FROM data_pembagian_gaji where id_pembagian_gaji = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;pembagian&nbsp;gaji</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_pembagian_gaji']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">jabatan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jabatan']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">sistem&nbsp;perhitungan&nbsp;gaji</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['sistem_perhitungan_gaji']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">gaji</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['gaji']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">potongan&nbsp;uang&nbsp;makan&nbsp;harian</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['potongan_uang_makan_harian']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">potongan&nbsp;tidak&nbsp;masuk&nbsp;kerja</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['potongan_tidak_masuk_kerja']; ?></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>