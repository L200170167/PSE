
<body>
	<a href="<?php index(); ?>?input=tambah">
	<?php btn_tambah('Tambah'); ?>
	</a>
	
	<a target="blank" href="cetak.php?berdasarkan=data_disposisi_surat_keluar&jenis=xls&pakaiperperiode=<?php echo $status_pakaiperperiode;?>">
	<?php btn_export('Export Excel'); ?>
	</a>
	
	<a target="blank" href="cetak.php?berdasarkan=data_disposisi_surat_keluar&jenis=print&pakaiperperiode=<?php echo $status_pakaiperperiode;?>">
	<?php btn_cetak('Cetak'); ?>
	</a>
	
	<a href="<?php index(); ?>">
	<?php btn_refresh('Refresh'); ?>
	</a>
	
	<br><br>
	
			<form name="formcari" id="formcari" action="" method="get">
				<fieldset> 
					<table>
						<tbody>
						<tr>
							<td>Berdasarkan</td>	
							<td>:</td>	
							<td>
							<!-- <input value="" name="Berdasarkan" id="Berdasarkan" > --> <select class="form-control selectpicker" data-live-search="true" name="Berdasarkan" id="Berdasarkan">
								<?php
								$sql = "desc data_disposisi_surat_keluar";
								$result = @mysql_query($sql);
								while($row = @mysql_fetch_array($result)){
									echo "<option name='berdasarkan' value=$row[0]>$row[0]</option>";
								}
								?>
							</select>							
							</td>
						</tr>

						<tr>
							<td>Pencarian</td>	
							<td>:</td>	
							<td>							
								<!--<input class="form-control" type="text" name="isi" value="" >--> <input  type="text" name="isi" value="" >
								<?php btn_cari('Cari'); ?>
							</td>
						</tr>
					</tbody>
					</table>									
				</fieldset>
			</form>

<div style="overflow-x:auto;">
<table <?php tabel(100,'%',1,'left');  ?> >
			<tr>								  
			   <th>Action</th>
			   <th>No</th>
			   <th>Id&nbsp;pegawai</th>
			   <th align="center" class="th_border cell"  >Nomor&nbsp;surat</th>
<th align="center" class="th_border cell"  >Prihal</th>
<th align="center" class="th_border cell"  >Disposisi&nbsp;dari</th>
<th align="center" class="th_border cell"  >Disposisikan&nbsp;kepada</th>

<th align="center" class="th_border cell"  >Catatan</th>
<th align="center" class="th_border cell"  >Status</th>

			</tr>
							 
			<tbody>
			<?php
				$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				$id= $_COOKIE['id_admin'];
				$id =  decrypt("$id");
				if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
				{
				$berdasarkan =  mysql_real_escape_string($_GET['Berdasarkan']);
				$isi =  mysql_real_escape_string($_GET['isi']);
				$querytabel="SELECT * FROM data_disposisi_surat_keluar where $berdasarkan like '%$isi%' and disposisi_dari='$id'  order by id_pegawai DESC   LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM data_disposisi_surat_keluar where $berdasarkan like '%$isi%' and disposisi_dari='$id'";
				}
				else
				{
				$querytabel="SELECT * FROM data_disposisi_surat_keluar where disposisi_dari='$id' or disposisikan_kepada='$id'  order by id_pegawai DESC   LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM data_disposisi_surat_keluar where disposisi_dari='$id' or disposisikan_kepada='$id'";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { ?>
               <tr class="event2">	
				  <td class="th_border cell" align="center" width="200">
						<table border="0">
							<tr>
								<td>
									<a href="<?php index(); ?>?input=detail&proses=<?= encrypt($data['nomor_surat']); ?>">
									<?php btn_detail('Baca'); ?></a>
								</td>
								<td>
									<a href="<?php index(); ?>?input=edit&proses=<?= encrypt($data['id_pegawai']); ?>">
									<?php btn_edit('Edit'); ?></a>
								</td>
								<td>
									<a href="<?php index(); ?>?input=hapus&proses=<?= encrypt($data['id_pegawai']); ?>">
									<?php btn_hapus('Hapus'); ?></a>
								</td>
							</tr>
						</table>
				  </td>
				  <td align="center" width="50"><?php $no = (($no +1) ) ; echo $no;  ?></td>
				  <td align="center"><?php echo $data['id_pegawai']; ?></td>

                 <td align="center"><?php echo $nomor_surat = ($data['nomor_surat']); ?></td>
<td align="center"><?php echo baca_database("","perihal","select * from data_surat_keluar where no_surat='$nomor_surat'") ?></td>
<td align="center"><?php echo ($data['disposisi_dari']); ?></td>
<td align="center"><?php echo ($data['disposisikan_kepada']); ?></td>

<td align="center"><?php echo (substr($data['catatan'],0,100)); ?></td>
<td align="center"><?php echo ($data['status']); ?></td>

               </tr>
			<?php } ?>
			</tbody>
</table>
</div>

<?php Pagination($page,$dataPerPage,$querypagination); ?>

</body>