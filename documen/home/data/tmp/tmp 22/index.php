<?php 
$url = "home/data/tmp/tmp 22/zNewsPaper/";
$komponen = "home/data/tmp/tmp 22/";
include 'home/include/all_include.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?php echo $url;?>css/bootstrap.min.css"  type="text/css">
    <link href="<?php echo $url;?>owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $url;?>owl-carousel/owl.theme.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url;?>css/style.css">
	 <link href="<?php echo $url;?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo $url;?>font-awesome-4.4.0/css/font-awesome.min.css"  type="text/css">
	<script src="<?php echo $url;?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo $url;?>js/bootstrap.min.js"></script>
</head>

<body>

<header>
	<!--Top-->
	<nav id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<strong><?php echo $judul;?></strong>
				</div>
				<div class="col-md-6">
					<ul class="list-inline top-link link">
						<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
						<li><a href="#"><i class="fa fa-comments"></i> Contact</a></li>
						<li><a href="#"><i class="fa fa-question-circle"></i> FAQ</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	
	<div class="featured container">
		<div id="owl-demo" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
			<div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3648px; left: 0px; display: block; transition: all 1000ms ease; transform: translate3d(0px, 0px, 0px);"><div class="owl-item" style="width: 228px;"><div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">						
						
					</div>
					<img src="<?php echo $url;?>images/logo.png">
				</div>
			</div></div></div></div>
			
			
			
			
			
			
			
		</div>
	</div>
	
	<!--Navigation-->
    <nav id="menu" class="navbar container">
		<div class="navbar-header">
			<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
			<a class="navbar-brand" href="#">
				<div class="logo"><span><img src="admin/data/image/logo/logo.png" width="20"></span></div>
			</a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
			<!-- MENU -->
<?php
$m = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
<!-- SINGLE -->
		<?php $apa = $i->n;
		if ($apa=="Login")
		{
			 if ((isset($_COOKIE["kodene"])) && (isset($_COOKIE["token_user"])))
			{
				$kodene = decrypt($_COOKIE["kodene"]);
				$ip = $_SERVER['REMOTE_ADDR']; 
				$useragent = $_SERVER['HTTP_USER_AGENT'];
				$token = sha1($ip.$useragent.$key);
				$token = crypt($token, $key);
				if ($_COOKIE['token_user'] == $token)
				{
					$token = "ada";
				}
				else
				{
					$token = "";
				}
				$kode = cek_database("","","","select * from data_pelanggan where id_pelanggan='$kodene'");
			}
			else
			{
				$token = "";
				$kode ="";
			}
			if ($kode=="ada" && $token=="ada")
			{
			?>
			<!--
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=akun">Akun</a> </li>
			-->
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout">Logout</a> </li>
			<?php	 
			}
			else
			{
			?>
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout"><?php echo $i->n;?></a> </li>
			<?php
			}
		}
		else
		{
		?>
		 <li class="nav-item"> <a class="nav-link" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
		<?php } ?>
<!-- /SINGLE -->
<?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
<!-- MULTI -->
		<li  class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden"></b></a>
		<ul class="dropdown-menu agile_short_dropdown">
		<?php
		$m1 = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
			<li><li>
			<a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
			<?php echo $i1->n;?></a>
			</li></li>
		<?php }} ?>
		</ul>
		</li>
<!-- /MULTI -->
		<?php }} ?>
<!-- /MENU -->
			</ul>
			<ul class="list-inline navbar-right top-social">
				<li><a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a></li>
				<li><a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a></li>
				<li><a href="<?php echo $instagram;?>"><i class="fa fa-instagram"></i></a></li>
				<li><a href="<?php echo $google;?>"><i class="fa fa-google-plus-square"></i></a></li>
			</ul>
		</div>
	</nav>
</header>	
<div class="featured container">
		<div class="row">
			<div class="col-sm-12">
			
			
			<?php include 'halaman.php';?>
</div>
</div>
</div>


	<footer>
		<div class="wrap-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-footer footer-1">
						<div class="footer-heading"><h1><span style="color: #fff;">Alamat</span></h1></div>
						<div class="content">
							<?php echo $alamat;?>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-1">
						<div class="footer-heading"><h1><span style="color: #fff;">Email</span></h1></div>
						<div class="content">
							<?php echo $email;?>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-1">
						<div class="footer-heading"><h1><span style="color: #fff;">Telepon</span></h1></div>
						<div class="content">
							<?php echo $telepon;?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copy-right">
			<p><?php echo $copyright;?></p>
		</div>
	</footer>
	<!-- Footer -->
	
	<!-- JS -->
	<script src="<?php echo $url;?>owl-carousel/owl.carousel.js"></script>
    <script>
    $(document).ready(function() {
      $("#owl-demo-1").owlCarousel({
        autoPlay: 3000,
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [400,1]
      });
	  $("#owl-demo-2").owlCarousel({
        autoPlay: 3000,
        items : 3,
        
      });
    });
    </script>
	
	
	<script type="text/javascript" src="<?php echo $url;?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="<?php echo $url;?>js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</body>
</html>
