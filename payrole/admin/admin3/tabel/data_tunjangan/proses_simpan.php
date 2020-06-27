<?php include '../../../include/all_include.php';

if (!isset($_POST['id_tunjangan']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
$nik=$_POST['nik'];
$tanggal=strtotime($_POST['tanggal']);
$format = (date('Y-m',$tanggal));
$ada = "";
				$querytabel="SELECT * FROM data_tunjangan where tanggal like '%$format%'";
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { 
			    
	$ada =  cek_database("","","","select * from data_tunjangan where nik='$nik'");
				  }
if ($ada == "ada")
{
	    ?>
	<script>
	alert("AKSES DITOLAK, TUNJANGAN TELAH DIBERIKAN PADA BULAN INI");
	location.href = "index.php";
	</script>
	<?php
	die();
} 

$nik=$_POST['nik'];
$tanggal=$_POST['tanggal'];
$id_tunjangan=$_POST['id_tunjangan'];
$nama_tunjanagn=$_POST['nama_tunjanagn'];
$jumlah_tunjangan=$_POST['jumlah_tunjangan'];



$query=mysql_query("insert into data_tunjangan values (
'$id_tunjangan'
 ,'$tanggal'
 ,'$nik'
 ,'$nama_tunjanagn'
 ,'$jumlah_tunjangan'

)");

if($query){
?>
<script>location.href = "<?php index(); ?>?input=popup_tambah"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>