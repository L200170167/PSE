<?php
//Meta
$charset="utf-8";
$keywords="Aplikasi,Software,Program";
$description="Jasa Pembuatan Aplikasi";
$Author="PT.RIDIKC INDUSTRI INDONESIA";
$icon="../../../data/image/logo/logo.png";
$situs="www.ridikc.com";

//setting aplikasi
$logo = '../../../data/image/logo/logo.png';
$imageerror = '../../../data/image/error/file.png';
$avatar = '../../../data/image/avatar/avatar1.png';
$background = '../../../data/image/background/background1.png';
$bg_login = '../data/image/background/bglogin.png';

$slide1 = 'admin/data/image/background/background1.png';
$slide2 = 'admin/data/image/background/background1.png';
$slide3 = 'admin/data/image/background/background1.png';

$judul = 'E-Office PT. Textile Sejahtera ';
$objek = 'PT. Textile Sejahtera ';
$alamat = 'Jl. A Yani Pabelan Kartasura Surakarta 57102 Jawa Tengah - Indonesia ';
$telepon = '0271345677';
$email ='textilesejahtera@gmail.com';

$facebook = '#';
$google = '#';
$twitter = '#';
$instagram = '#';
$linkedin = '#';
$youtube = '#';
$maps_x = "";
$maps_y = "";

$nama_aplikasi = 'E-Office PT. Textile Sejahtera';
$keterangan_aplikasi = '';
$tahun = '2020';
$copyright = 'CopyRight © 2020 - E-Office PT. Textile Sejahtera';

if (empty($_COOKIE['jenenge']))
{
	$siapa = "Pegawai";
}
else
{
	$siapa = $_COOKIE['jenenge'];
}
	$siapa =  decrypt($siapa);

$sambutan = 'Selamat Datang '.$siapa.' Di Website <br>E-Office PT. Textile Sejahtera ';
function sambutan(){ 
	global $sambutan;
	echo $sambutan;};

//Setting Tampilan
$combosearch = 1;
$grafik = 1;
$kata_sambutan = 1; // x
$gambar_background = 1; // x
$menu_setting = 1; // x
$menu_admin = 1; // x
$ckeditor = 1;
$popup = 1;
$seo = 1;
$ekstensi_dilarang	= array('php','asp','sql','js','css','py','php4');



//setting laporan
$status_pakaiperperiode = "tidak";
$logo_laporan1 = "../../../data/image/logo/logo.png";
$logo_laporan2 = "../../../data/image/logo/logo.png";
$periode = "";
$ttd = "TTD&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
$array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
$hari = $array_hari[date("N")];
$tanggal = date ("j");
$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $array_bulan[date("n")];
$tahun = date("Y");
$formatwaktu = "Surakarta, " . $hari . " " . $tanggal . " " . $bulan . " " . $tahun; 

//settings Halaman
$s_tmp = '212';
$v_tmp = 'Setting';
$l_tmp = 'index.php?tmp=x';
$url_desain = "desain-bootstrap.php";


function index(){
	global $url_index;
	$url_index = "index.php";
	echo $url_index;
	};
	
function admin(){
	global $url_admin;
	$url_admin = "admin3";
	echo $url_admin;
	};
	
function home(){
	echo "../home/index.php";
	};
	
function template(){
	global $template;
	$template = "tmp 8";
	echo $template;
	};
	
function logout(){
	echo "../../../login/logout.php";
	};

//login	
$tabel_login = "data_admin";
$field_username_login = "username";
$field_password_login = "password";
$pesan_gagal = "Username/Password yang anda masukan salah..!";


//HALAMAN
function index_halaman(){
	echo "index2.php";
	};
	
function go_index_halaman(){
	?>
<script>
    location.href = "<?php index_halaman();?>";
</script>
<?php
	};
	
?>