
<body>

	<br><br>
	
<div style="overflow-x:auto;">
<table <?php tabel(100,'%',1,'left');  ?> >
			<tr>
			   <th>Action</th>
			   <th>No</th>
			   
			   <th align="center" class="th_border cell"  >Nomor&nbsp;surat</th>
<th align="center" class="th_border cell"  >Prihal</th>
<th align="center" class="th_border cell"  >Disposisi&nbsp;dari</th>
<th align="center" class="th_border cell"  >Disposisikan&nbsp;kepada</th>
<th align="center" class="th_border cell"  >Nama</th>
<th align="center" class="th_border cell"  >Catatan</th>
<th align="center" class="th_border cell"  >Status</th>

			</tr>

			<tbody>
			<?php
				$no = 0;
				$startRow=($page-1)*$dataPerPage;
				$no = $startRow;
				$id= $_COOKIE['nip'];
				 $id =  decrypt("$id");


				if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi']))
				{
				$berdasarkan =  mysql_real_escape_string($_GET['Berdasarkan']);
				$isi =  mysql_real_escape_string($_GET['isi']);
				$querytabel="SELECT * FROM data_disposisi_surat_masuk where $berdasarkan like '%$isi%' and disposisikan_kepada='$id'  order by id_pegawai DESC  LIMIT $startRow ,$dataPerPage";
				$querypagination="SELECT COUNT(*) AS total FROM data_disposisi_surat_masuk where $berdasarkan like '%$isi%' and disposisikan_kepada='$id'";
				}
				else
				{
				$querytabel="SELECT * FROM data_disposisi_surat_masuk where disposisikan_kepada='$id'  order by id_pegawai DESC  ";
				$querypagination="SELECT COUNT(*) AS total FROM data_disposisi_surat_masuk where disposisikan_kepada='$id'";
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
									<?php btn_detail('Baca Surat'); ?></a>
								</td>
								
								


							</tr>
						</table>
				  </td>
				  <td align="center" width="50"><?php $no = (($no +1) ) ; echo $no;  ?></td>
				 

                 <td align="center"><?php echo $nomor_surat = ($data['nomor_surat']); ?></td>
<td align="center"><?php echo baca_database("","prihal","select * from data_surat_masuk where no_surat ='$nomor_surat'") ?></td>
<td align="center"><?php echo ($data['disposisi_dari']); ?></td>
<td align="center"><?php echo ($data['disposisikan_kepada']); ?></td>
<td align="center"><?php echo baca_database("", "nama", " select * from data_pegawai where NIP ='$data[disposisikan_kepada]'") ?></td>
<td align="center"><?php echo (substr($data['catatan'],0,100)); ?></td>
<td align="center"><?php echo ($data['status']); ?></td>

               </tr>
			<?php } ?>
			</tbody>
</table>
</div>


<?php Pagination($page,$dataPerPage,$querypagination); ?>

</body>