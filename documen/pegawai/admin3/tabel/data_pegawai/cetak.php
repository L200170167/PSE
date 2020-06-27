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
	action_cetak("data_pegawai"); 
}
else
{
	include '../../../include/all_include.php';
	proses_action_cetak("data_pegawai");
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
			$tabelnya = "data_pegawai";
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
        <th class="th_border cell">id&nbsp;pegawai</th>
        <th class="th_border cell"  >NIP</th>
<th class="th_border cell"  >nama</th>
<th class="th_border cell"  >alamat</th>
<th class="th_border cell"  >tempat&nbsp;lahir</th>
<th class="th_border cell"  >tanggal&nbsp;lahir</th>
<th class="th_border cell"  >jenis&nbsp;kelamin</th>
<th class="th_border cell"  >jabatan</th>
<th class="th_border cell"  >username</th>
<th class="th_border cell"  >password</th>

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
					$querytabel="SELECT * FROM data_pegawai where $Berdasarkan like '%$isi%'";
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
					$querytabel="SELECT * FROM data_pegawai where ($Berdasarkan BETWEEN '$tanggal1' AND '$tanggal2')";
				
				}
				else
				{
					//SEMUA
					$querytabel="SELECT * FROM data_pegawai";
				}
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses)) 
			{
			?>
        <tr class="event2">
            <td align="center" width="50"><?php $no = $no +1; echo $no; ?></td>
            <td align="center"><?php echo $data['id_pegawai']; ?></td>

            <td align="center"><?php echo $data['NIP']; ?></td>
<td align="center"><?php echo $data['nama']; ?></td>
<td align="center"><?php echo $data['alamat']; ?></td>
<td align="center"><?php echo $data['tempat_lahir']; ?></td>
<td align="center"><?php echo $data['tanggal_lahir']; ?></td>
<td align="center"><?php echo $data['jenis_kelamin']; ?></td>
<td align="center"><?php echo $data['jabatan']; ?></td>
<td align="center"><?php echo $data['username']; ?></td>
<td align="center"><?php echo $data['password']; ?></td>

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