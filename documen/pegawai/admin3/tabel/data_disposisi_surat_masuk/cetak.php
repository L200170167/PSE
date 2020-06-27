<?php 
if (isset($_GET['input']))
{   
	echo "<h3> Cetak Laporan "; tabelnomin(); echo "</h3>";
	?>
	<link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new.css">
	<link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new2.css">
	<?php
	action_cetak("data_disposisi_surat_masuk"); 
}
else
{
	include '../../../include/all_include.php';
	proses_action_cetak("data_disposisi_surat_masuk");
?>
	<link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new.css">
	<link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new2.css">
	

<!-- HEADER -->
<table border="0" style="width: 100%">
	<?php if (isset($_GET['export']))
	{
	}
	else
	{	
	?>
    <tr>
        <td class="auto-style1" rowspan="3" width="101">
            <img alt="" height="100" src="<?php echo $logo_laporan1; ?>" width="100"></td>

        <td class="auto-style1">
            <center>
                <h2 class="auto-style1"><?php echo $judul; ?></h2>
            </center>
        </td>

        <td class="auto-style1" rowspan="3" width="101">
            <img alt="" height="100" src="<?php echo $logo_laporan2; ?>" width="100"></td>
    </tr>
	<?php } ?>

    <tr>
        <td class="auto-style2">
            <center>
                <strong>LAPORAN

                    <?php
			$tabelnya = "data_disposisi_surat_masuk";
			$tabelnya = str_replace("_"," ",$tabelnya);
			$tabelnya = str_replace("data","",$tabelnya);
			$tabelnya = strtoupper($tabelnya);
			echo $tabelnya; ?>

                </strong>
            </center>
        </td>
    </tr>

    <tr>
        <td class="auto-style2"><?php echo $alamat ; ?></td>
    </tr>
</table>
<!-- HEADER -->

<!-- BODY -->
<table width="100%"  class="tblcms2">
    <tr>
        <th class="th_border cell">No</th>
        <th class="th_border cell">id&nbsp;pegawai</th>
        <th class="th_border cell"  >nomor&nbsp;surat</th>
<th class="th_border cell"  >Prihal</th>
<th class="th_border cell"  >disposisi&nbsp;dari</th>
<th class="th_border cell"  >disposisikan&nbsp;kepada</th>
<th class="th_border cell"  >Nama</th>
<th class="th_border cell"  >catatan</th>
<th class="th_border cell"  >status</th>

    </tr>

    <tbody>
    <?php
				$no = 0;
				if (isset($_GET['isi']) && !empty($_GET['isi']))
				{
					//BERDASARKAN
					$Berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
					$isi =  mysql_real_escape_string($_GET['isi']);
					echo '<center> Cetak berdasarkan <b>'.$Berdasarkan.'</b> : <b>'.$isi.'</b></center>';
					$querytabel="SELECT * FROM data_disposisi_surat_masuk where $Berdasarkan like '%$isi%'";
				}
				else if (isset($_GET['tanggal1']) && !empty($_GET['tanggal1']))
				{
					//PERIODE
					$Berdasarkan =  mysql_real_escape_string($_GET['Berdasarkan']);
					$tanggal1 =  mysql_real_escape_string($_GET['tanggal1']);
					$tanggal2 =  mysql_real_escape_string($_GET['tanggal2']);
					$tanggal1_indo = format_indo($tanggal1);
					$tanggal2_indo = format_indo($tanggal2);
					echo '<center> Cetak Berdasarkan <b>'.$Berdasarkan.'</b> Dari Tanggal <b>'.$tanggal1_indo.'</b> s/d <b>'.$tanggal2_indo.'</b></center>';
					$querytabel="SELECT * FROM data_disposisi_surat_masuk where ($Berdasarkan BETWEEN '$tanggal1' AND '$tanggal2')";
				
				}
				else
				{
					//SEMUA
					$querytabel="SELECT * FROM data_disposisi_surat_masuk";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses)) 
			{
			?>
        <tr class="event2">	
				  
				  <td align="center" width="50"><?php $no = (($no +1) ) ; echo $no;  ?></td>
				  <td align="center"><?php echo $data['id_pegawai']; ?></td>

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
<!-- BODY -->

<!-- FOOTER -->
<p class="auto-style3"><?php echo $formatwaktu; ?>
</p>
<p class="auto-style3"><?php echo $ttd; ?></p>
<p class="auto-style3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</p>
<p class="auto-style3"><?php echo $siapa ; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p>
<p class="auto-style3"></p>

<?php } ?>