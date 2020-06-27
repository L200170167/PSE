<?php 

$url = "home/data/tmp/tmp 7/medically-web/";
$komponen = "home/data/tmp/tmp 7/";
include 'home/include/all_include.php';
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	<link href="<?php echo $url;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo $url;?>css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $url;?>css/chocolat.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $url;?>css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo $url;?>css/flexslider.css" type="text/css" media="screen" />
	<link href="<?php echo $url;?>css/style.css" rel='stylesheet' type='text/css' media="all">
	<link href="//fonts.googleapis.com/css?family=Barlow+Condensed:300,400,500,600" rel="stylesheet">
</head>

<body>
	<div class="" id="home">
		<div class="w3-agile-logo">
			<div class=" head-wl">
				<div class="agileinfo-social-grids">
					<ul>
						<li><a href="<?php echo $facebook;?>"><span class="fa fa-facebook"></span></a></li>
						<li><a href="<?php echo $twitter;?>"><span class="fa fa-twitter"></span></a></li>
						<li><a href="<?php echo $google;?>"><span class="fa fa-google"></span></a></li>
					</ul>
				</div>
				<div class="w3-header-top-right">
					
						<p><span class="fa fa-envelope" aria-hidden="true"></span> <a href="mailto:<?php echo $email;?>" class="info"> Email</a> : <?php echo $email;?></p>

					
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="header-w3layouts">

			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<h2><a class="navbar-brand " href="#"><font color="white"><img width="30" src="admin/data/image/logo/logo.png" alt=" " />&nbsp;<?php echo ucwords($judul);?></font></a></h2>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
						<li class="hidden"><a class="page-scroll" href="#page-top"></a> </li>
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
<!-- MULTI 
		<li  class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden-phone"></b></a>
		<ul class="dropdown-menu">
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
				</div>
				<!-- /.navbar-collapse -->
			</nav>
		</div>


		
		<div class="clearfix"> </div>
		</div>

<br>
<br>
<br>
<br>
	<div class="about" id="about">
		<div class="container">
			 <?php include 'halaman.php';?>	
		</div>
	</div>
	
	

	<div class="footer">
		
		<div class="container">
		<div class="colr-row col-md-4  ">
		
			
			<div class="col-md-6 ">
				<h3>Follow us</h3>
				<div class="icons">
					<ul>
						<li><a href="<?php echo $facebook;?>"><span class="fa fa-facebook"></span></a></li>
						<li><a href="<?php echo $twitter;?>"><span class="fa fa-twitter"></span></a></li>
						<li><a href="<?php echo $google;?>"><span class="fa fa-google"></span></a></li>
					</ul>

				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
			</div>
			<div class="colr-row  col-md-8">
			<div class="col-md-6 col-sm-6 col-xs-6 one bottm-grid">
				<h3>Alamat</h3>
				<p> <?php echo $alamat;?> </p>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 three bottm-grid">
				<h3>Contact</h3>
				<div class="addres up-out">
					
					<p><span class="fa fa-phone icons-left" aria-hidden="true"></span>Call us:<?php echo $telepon;?></p>

				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //Copyright -->
			<div class="clearfix"> </div>
		</div>
		</div>
	</div>
	<footer>
		<p><?php echo $copyright;?></p>
	</footer>
	<script type='text/javascript' src='<?php echo $url;?>js/jquery-2.2.3.min.js'></script>
	<script src="<?php echo $url;?>js/bootstrap.js"></script>
	

	<script defer src="<?php echo $url;?>js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<script src="<?php echo $url;?>js/jquery.waypoints.min.js"></script>
	<script src="<?php echo $url;?>js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<script src="<?php echo $url;?>js/jquery.chocolat.js"></script>
	<script type="text/javascript">
		$(function () {
			$('.w3_agile_gallery_grid a').Chocolat();
		});
	</script>
	<script src="<?php echo $url;?>js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$("#owl-demo").owlCarousel({
				items: 1,
				itemsDesktop: [768, 1],
				itemsDesktopSmall: [414, 1],
				lazyLoad: true,
				autoPlay: true,
				navigation: true,

				navigationText: false,
				pagination: true,

			});

		});
	</script>
	<script type="text/javascript" src="<?php echo $url;?>js/move-top.js"></script>
	<script type="text/javascript" src="<?php echo $url;?>js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
</body>

</html>