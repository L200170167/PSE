
<body>
	<a href="<?php index(); ?>?input=tambah">
	<?php btn_tambah('Tambah'); ?>
	</a>
	
	<a target="blank" href="cetak.php?berdasarkan=data_surat_masuk&jenis=xls&pakaiperperiode=<?php echo $status_pakaiperperiode;?>">
	<?php btn_export('Export Excel'); ?>
	</a>
	
	<a target="blank" href="cetak.php?berdasarkan=data_surat_masuk&jenis=print&pakaiperperiode=<?php echo $status_pakaiperperiode;?>">
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
								$sql = "desc data_surat_masuk";
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
			   <th>Id&nbsp;surat&nbsp;masuk</th>
			   <th align="center" class="th_border cell"  >No&nbsp;surat</th>
<th align="center" class="th_border cell"  >Sifat&nbsp;surat</th>
<th align="center" class="th_border cell"  >Tanggal&nbsp;surat&nbsp;masuk</th>
<th align="center" class="th_border cell"  >Sumber&nbsp;surat</th>
<th align="center" class="th_border cell"  >Tujuan&nbsp;surat</th>
<th align="center" class="th_border cell"  >Kategori</th>
<th align="center" class="th_border cell"  >Lampiran</th>
<th align="center" class="th_border cell"  >Prihal</th>
<th align="center" class="th_border cell"  >Keterangan</th>
<th align="center" class="th_border cell"  >File&nbsp;surat</th>

			</tr>
							 
			<tbody>
			<?php
				$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				
				if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
				{
				$berdasarkan =  mysql_real_escape_string($_GET['Berdasarkan']);
				$isi =  mysql_real_escape_string($_GET['isi']);
				$querytabel="SELECT * FROM data_surat_masuk where $berdasarkan like '%$isi%' order by id_surat_masuk DESC LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM data_surat_masuk where $berdasarkan like '%$isi%'";
				}
				else
				{
				$querytabel="SELECT * FROM data_surat_masuk order by id_surat_masuk DESC  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM data_surat_masuk";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { ?>
               <tr class="event2">	
				  <td class="th_border cell" align="center" width="200">
						<table border="0">
							<tr>
								<td>
									<a href="<?php index(); ?>?input=detail&proses=<?= encrypt($data['id_surat_masuk']); ?>">
									<?php btn_detail('Detail'); ?></a>
								</td>
								<td>
									<a href="<?php index(); ?>?input=edit&proses=<?= encrypt($data['id_surat_masuk']); ?>">
									<?php btn_edit('Edit'); ?></a>
								</td>
								<td>
									<a href="<?php index(); ?>?input=hapus&proses=<?= encrypt($data['id_surat_masuk']); ?>">
									<?php btn_hapus('Hapus'); ?></a>
								</td>
							</tr>
						</table>
				  </td>
				  <td align="center" width="50"><?php $no = (($no +1) ) ; echo $no;  ?></td>
				  <td align="center"><?php echo $data['id_surat_masuk']; ?></td>

                 <td align="center"><?php echo ($data['no_surat']); ?></td>
<td align="center"><?php echo ($data['sifat_surat']); ?></td>
<td align="center"><?php echo (format_indo($data['tanggal_surat_masuk'])); ?></td>
<td align="center"><?php echo ($data['sumber_surat']); ?></td>
<td align="center"><?php echo ($data['tujuan_surat']); ?></td>
<td align="center"><?php echo ($data['kategori']); ?></td>
<td align="center"><?php echo (substr($data['lampiran'],0,100)); ?></td>
<td align="center"><?php echo (substr($data['prihal'],0,100)); ?></td>
<td align="center"><?php echo (substr($data['keterangan'],0,100)); ?></td>
<td align="center"><a href='../../../upload/<?php echo $data['file_surat']; ?>'><img onerror="this.src='<?php echo $imageerror; ?>'" width='50' height='30' src='../../../upload/<?php echo $data['file_surat']; ?>'></a></td>

               </tr>
			<?php } ?>
			</tbody>
</table>
</div>

<?php Pagination($page,$dataPerPage,$querypagination); ?>

</body>