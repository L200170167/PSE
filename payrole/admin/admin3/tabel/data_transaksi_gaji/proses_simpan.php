<?php include '../../../include/all_include.php';

if (!isset($_POST['id_transaksi_gaji']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


$id_transaksi_gaji=$_POST['id_transaksi_gaji'];
$tanggal_penggajian=$_POST['tanggal_penggajian'];
$nik=$_POST['nik'];
$nama=$_POST['nama'];
$jabatan=$_POST['jabatan'];
$gaji=$_POST['gaji'];
$sistem_perhitungan_penggajian=$_POST['sistem_perhitungan_penggajian'];
$jumlah_perhitungan=$_POST['jumlah_perhitungan'];
$jumlah_gaji=$_POST['jumlah_gaji'];
$jumlah_makan=$_POST['jumlah_makan'];
$potongan_uang_makan_harian=$_POST['potongan_uang_makan_harian'];
$tidak_masuk_kerja=$_POST['tidak_masuk_kerja'];
$potongan_tidak_masuk_kerja=$_POST['potongan_tidak_masuk_kerja'];



error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
$tanggal_penggajian=strtotime($_POST['tanggal_penggajian']);
$format = (date('Y-m',$tanggal_penggajian));
$ada = "";
				$querytabel="SELECT * FROM data_transaksi_gaji where tanggal_penggajian like '%$format%'";
				$proses = mysql_query($querytabel);
				while ($data = mysql_fetch_array($proses))
				  { 
			    
	 $ada =  cek_database("","","","select * from data_transaksi_gaji where nik='$nik'");
				  }
				  
				
if ($ada == "ada")
{
	    ?>
	<script>
	alert("AKSES DITOLAK, TUNJANGAN TELAH DIBERIKAN PADA BULAN INI");
	location.href = "index.php?input=tambah";
	</script>
	<?php
	die();
} 

$id_transaksi_gaji=$_POST['id_transaksi_gaji'];
$tanggal_penggajian=$_POST['tanggal_penggajian'];
$nik=$_POST['nik'];
$nama=$_POST['nama'];
$jabatan=$_POST['jabatan'];
$gaji=$_POST['gaji'];
$sistem_perhitungan_penggajian=$_POST['sistem_perhitungan_penggajian'];
$jumlah_perhitungan=$_POST['jumlah_perhitungan'];
$jumlah_gaji=$_POST['jumlah_gaji'];
$jumlah_makan=$_POST['jumlah_makan'];
$potongan_uang_makan_harian=$_POST['potongan_uang_makan_harian'];
$tidak_masuk_kerja=$_POST['tidak_masuk_kerja'];
$potongan_tidak_masuk_kerja=$_POST['potongan_tidak_masuk_kerja'];	

$query=mysql_query("insert into data_transaksi_gaji values (
'$id_transaksi_gaji'
 ,'$tanggal_penggajian'
 ,'$nik'
 ,'$nama'
 ,'$jabatan'
 ,'$gaji'
 ,'$sistem_perhitungan_penggajian'
 ,'$jumlah_perhitungan'
 ,'$jumlah_gaji'
,'$jumlah_makan'
 ,'$potongan_uang_makan_harian'
 ,'$tidak_masuk_kerja'
 ,'$potongan_tidak_masuk_kerja'
)");




$id_telah_digaji=$id_transaksi_gaji;
$nama=$_POST['nama'];
$jumlah_gaji=$_POST['jumlah_gaji'];
$jumlah_tunjangan=0;
$total=$jumlah_gaji + $jumlah_tunjangan;



$query=mysql_query("insert into data_telah_digaji values (
'$id_telah_digaji'
 ,'$nama'
 ,'$jumlah_gaji'
 ,'$jumlah_tunjangan'
 ,'$total'

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