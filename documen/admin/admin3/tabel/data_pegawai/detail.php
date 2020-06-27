
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
			Detail data&nbsp;pegawai
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
			$sql=mysql_query("SELECT * FROM data_pegawai where id_pegawai = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;pegawai</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_pegawai']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">NIP</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['NIP']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nama']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">alamat</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['alamat']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">tempat&nbsp;lahir</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['tempat_lahir']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">tanggal&nbsp;lahir</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['tanggal_lahir']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">jenis&nbsp;kelamin</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jenis_kelamin']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">jabatan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['jabatan']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">username</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['username']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">password</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['password']; ?></td>	
			   </tr>

				
	
</tbody>
</table>
</div>
</div>