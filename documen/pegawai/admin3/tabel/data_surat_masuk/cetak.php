<link
    rel="stylesheet"
    type="text/css"
    href="../../../data/cssjs/cetak/style_new.css">
<link
    rel="stylesheet"
    type="text/css"
    href="../../../data/cssjs/cetak/style_new2.css">

<?php 
if (isset($_GET['input']))
{   
	echo "<h3> Cetak Laporan "; tabelnomin(); echo "</h3>";
	action_cetak("data_surat_masuk"); 
}
else
{
	include '../../../include/all_include.php';
	proses_action_cetak("data_surat_masuk");
?>

<!-- HEADER -->
<table border="0" style="width: 100%">
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

    <tr>
        <td class="auto-style2">
            <center>
                <strong>LAPORAN

                    <?php
			$tabelnya = "data_surat_masuk";
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
<table width="100%" class="tblcms2">
    <tr>
        <th class="th_border cell">No</th>
        <th class="th_border cell">id&nbsp;surat&nbsp;masuk</th>
        <th class="th_border cell"  >no&nbsp;surat</th>
<th class="th_border cell"  >tanggal&nbsp;surat&nbsp;masuk</th>
<th class="th_border cell"  >sumber&nbsp;surat</th>
<th class="th_border cell"  >tujuan&nbsp;surat</th>
<th class="th_border cell"  >kategori</th>
<th class="th_border cell"  >lampiran</th>
<th class="th_border cell"  >prihal</th>
<th class="th_border cell"  >keterangan</th>
<th class="th_border cell"  >file&nbsp;surat</th>

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
					$querytabel="SELECT * FROM data_surat_masuk where $Berdasarkan like '%$isi%'";
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
					$querytabel="SELECT * FROM data_surat_masuk where ($Berdasarkan BETWEEN '$tanggal1' AND '$tanggal2')";
				
				}
				else
				{
					//SEMUA
					$querytabel="SELECT * FROM data_surat_masuk";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses)) 
			{
			?>
        <tr class="event2">
            <td align="center" width="50"><?php $no = $no +1; echo $no; ?></td>
            <td align="center"><?php echo $data['id_surat_masuk']; ?></td>

            <td align="center"><?php echo $data['no_surat']; ?></td>
<td align="center"><?php echo $data['tanggal_surat_masuk']; ?></td>
<td align="center"><?php echo $data['sumber_surat']; ?></td>
<td align="center"><?php echo $data['tujuan_surat']; ?></td>
<td align="center"><?php echo $data['kategori']; ?></td>
<td align="center"><?php echo $data['lampiran']; ?></td>
<td align="center"><?php echo $data['prihal']; ?></td>
<td align="center"><?php echo $data['keterangan']; ?></td>
<td align="center"><a href='../../../upload/<?php echo $data['file_surat']; ?>'><img onerror="<?php echo $imageerror; ?>'" width='50' height='30' src='../../../upload/<?php echo $data['file_surat']; ?>'></a></td>

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