<?php include '../../../include/all_include.php';

if (!isset($_POST['id_surat_keluar']))
{
	    ?>
	<script>
	alert("AKSES DITOLAK");
	location.href = "index.php";
	</script>
	<?php
	die();
} 


function upload1($namafile)
	{
	$time = time();
	$acak = rand(10000, 99999);
	$foto = $time."-".$acak."-".$_FILES[$namafile]['name'];
	$tmp_file = $_FILES[$namafile]['tmp_name'];
	$path = "../../../../admin/upload/".$foto;
	global $ekstensi_dilarang;
	$nama = $_FILES[$namafile]['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));	
	if(in_array($ekstensi, $ekstensi_dilarang) === false)
	{
		move_uploaded_file($tmp_file, $path);
		return $foto;
	}
	else
	{
		?>
		<script>
		alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
		window.history.back(); 
		</script>
		<?php
		die();
	}
	}

$id_surat_keluar=$_POST['id_surat_keluar'];
$pembuat_surat=$_POST['pembuat_surat'];
$no_surat=$_POST['no_surat'];
$sifat_surat=$_POST['sifat_surat'];
$tanggal_surat_keluar=$_POST['tanggal_surat_keluar'];
$sumber_surat=$_POST['sumber_surat'];
$tujuan_surat=$_POST['tujuan_surat'];
$kategori=$_POST['kategori'];
$lampiran=$_POST['lampiran'];
$perihal=$_POST['perihal'];
$keterangan=$_POST['keterangan'];
$file_surat= upload1('file_surat');



$query=mysql_query("insert into data_surat_keluar values (
'$id_surat_keluar'
 ,'$pembuat_surat'
 ,'$no_surat'
 ,'$sifat_surat'
 ,'$tanggal_surat_keluar'
 ,'$sumber_surat'
 ,'$tujuan_surat'
 ,'$kategori'
 ,'$lampiran'
 ,'$perihal'
 ,'$keterangan'
 ,'$file_surat'

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