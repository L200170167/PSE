
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
			Detail data&nbsp;karyawan
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
			$sql=mysql_query("SELECT * FROM data_karyawan where id_karyawan = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td class="clleft" width="25%">id&nbsp;karyawan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['id_karyawan']; ?></td>	
			   </tr>
			   
			   <tr>
				<td class="clleft" width="25%">nik</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nik']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">kpj</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['kpj']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">nama</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['nama']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">status&nbsp;perkawinan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['status_perkawinan']; ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">tanggal&nbsp;lahir</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo (format_indo($data['tanggal_lahir'])); ?></td>	
			   </tr>
<tr>
				<td class="clleft" width="25%">periode&nbsp;kepesertaan</td>
				<td class="clleft" width="2%">:</td>
				<td class="clleft"><?php echo $data['periode_kepesertaan']; ?></td>	
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