<?php
//Meta
$charset="utf-8";
$keywords= decryptIt("a7q2t/8Zu40WenRvhLId9cFbEn8HOp9E8ociVLS/oJq7RPuOiKaN/DVrLQn7N8fgP0bbq/Q7TWDRuq61O7eh6exzO9vGgtbR/4gT28yHD23IxsnN3SyGotU3u2LscVoA");
$description= decryptIt("2FM7SRWt0uvdB7Ryoj4TJH4NSuNMWGERXrtfSCga3fJeKPK4cTc8WgpgR0GxQI8BspkHbSPRnhzYF8lzPPV6l3FVfdri5+0s9AyxoGAa1jV45HToNJFWQUPC8wHnBquAtnxqfzszFHaTfYXWu47BAQYROfMxdvpZROn68Q/Q4osYAh/9+HCwkmzq7+werr0SP0y2v1xMlPdkUFEa0cLQ6Q==");
$Author= decryptIt("ntivp4ixhpeSIUmQdRHlS3EhWXG9WWCXzrY9aI1hTLs=");
$icon="../../../data/image/logo/logo.png";
$situs= decryptIt("8LcYgfAGW1OxDfULtYEvRTh0BajF1R3FTR70tSj51TE=");

//setting aplikasi
$logo = '../../../data/image/logo/logo.png';
$imageerror = '../../../data/image/error/file.png';
$avatar = '../../../data/image/avatar/avatar20.png';
$background = '../../../data/image/background/background1.png';
$bg_login = '../data/image/background/bglogin.png';

$slide1 = 'admin/data/image/background/background1.png';
$slide2 = 'admin/data/image/background/background1.png';
$slide3 = 'admin/data/image/background/background1.png';

$judul = 'Penggajian Pt Carpotama Anugrah Sejati';
$objek = 'Penggajian Pt Carpotama Anugrah Sejati';
$alamat = 'Jl. Lingkar Barat 1 No.338, Kenali Asam Bawah, Kota Baru, Kota Jambi, Jambi 36129';
$telepon = '(0741) 7550664';
$email ='penggajian_pt_carpotama_anugrah_sejati@gmail.com';

$facebook = '#';
$google = '#';
$twitter = '#';
$instagram = '#';
$linkedin = '#';
$youtube = '#';
$maps_x = "";
$maps_y = "";

$nama_aplikasi = 'Penggajian Pt Carpotama Anugrah Sejati';
$keterangan_aplikasi = '';
$tahun = '2019';
$copyright = 'CopyRight © 2019 - penggajian pt carpotama anugrah sejati';

if (empty($_COOKIE['jenenge']))
{
	$siapa = "Administrator";
}
else
{
	$siapa = $_COOKIE['jenenge'];
}
	$siapa =  decrypt($siapa);

$sambutan = 'Selamat Datang '.$siapa.' Di Aplikasi <br>Penggajian Pt Carpotama Anugrah Sejati';
function sambutan(){ 
	global $sambutan;
	echo $sambutan;};

//Setting Tampilan
$combosearch = 0;
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
$formatwaktu = "Jambi, " . $hari . " " . $tanggal . " " . $bulan . " " . $tahun; 

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
	$template = "tmp 61";
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