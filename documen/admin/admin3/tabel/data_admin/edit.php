
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
			$sql=mysql_query("SELECT * FROM data_admin where id_admin = '$proses'");
			$data=mysql_fetch_array($sql);
			?>
			   <tr>
				<td width="25%" class="leftrowcms">
				<label >id&nbsp;admin <font color="red">*</font></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input type="%typepertama%" name="id_admin" value="<?php echo $data['id_admin']; ?>" readonly  id="id_admin" required="required">
				</td>
			   </tr>

			   <tr>
				<td width="25%" class="leftrowcms">
				<label >Hak&nbsp;Akses <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<select class='ckeditor'   required="required" type="enum" name="hak_akses" id="hak_akses" placeholder="Hak&nbsp;Akses" value="<?php echo $data['hak_akses']; ?>">
<option value='<?php echo $data[hak_akses];?>'>- <?php echo $data[hak_akses];?> -</option>
<option>admin</option>
</select>

				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">
				<label >Username <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="text" name="username" id="username" placeholder="Username" value="<?php echo $data['username']; ?>">



				</td>
			   </tr>
			   <tr>
				<td width="25%" class="leftrowcms">
				<label >Password <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input  required="required" type="password" name="password" id="password" placeholder="Password" value="<?php echo $data['password']; ?>">



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
