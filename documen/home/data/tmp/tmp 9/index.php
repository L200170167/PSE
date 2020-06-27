	<?php 

$url = "home/data/tmp/tmp 9/elite_shoppy/";
$komponen = "home/data/tmp/tmp 9/";
include 'home/include/all_include.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo $url;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $url;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $url;?>css/font-awesome.css" rel="stylesheet"> 
<link href="<?php echo $url;?>css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		
			<li><i class="fa fa-phone" aria-hidden="true"></i> Telepon : <?php echo $telepon;?></li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="">Email : <?php echo $email;?></a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		
		<!-- header-bot -->
			<div class="col-md-6 logo_agile">
				<h1><a href="index.php?p=home"><img width="50" src="admin/data/image/logo/logo.png" alt=" " /> <?php echo ucwords($judul);?> </a></h1>
			</div>
        <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
						<ul class="social-nav model-3d-0 footer-social w3_agile_social">
						   <li class="share">Sosial Media : </li>
							<li><a href="<?php echo $facebook;?>" class="facebook">
								  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
							<li><a href="<?php echo $twitter;?>" class="twitter"> 
								  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
							<li><a href="<?php echo $instagram;?>" class="instagram">
								  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
							<li><a href="<?php echo $google;?>" class="google">
								  <div class="front"><i class="fa fa-google" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-google" aria-hidden="true"></i></div></a></li>
						</ul>



		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					
					
					
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
		 <li class="nav-item"> <a class="menu__link" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
		<?php } ?>
<!-- /SINGLE -->
<?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
<!-- MULTI -->
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
			  </div>
			</nav>	
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>

	</div>
	 <?php include 'halaman.php';?>	


	<!-- //we-offer -->
<!--/grids-->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		
		<!-- header-bot -->
			
        <!-- header-bot -->
		
		<div class="clearfix"></div>
	</div>
</div>
<!--grids-->
<!-- footer -->
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-4 footer-left">
			<h2><a href="index.html"><span>SOSIAL</span> MEDIA </a></h2>
			
			<ul class="social-nav model-3d-0 footer-social w3_agile_social">
						   
							<li><a href="<?php echo $facebook;?>" class="facebook">
								  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
							<li><a href="<?php echo $twitter;?>" class="twitter"> 
								  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
							<li><a href="<?php echo $instagram;?>" class="instagram">
								  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
							<li><a href="<?php echo $google;?>" class="google">
								  <div class="front"><i class="fa fa-google" aria-hidden="true"></i></div>
								  <div class="back"><i class="fa fa-google" aria-hidden="true"></i></div></a></li>
						</ul>
		</div>
		<div class="col-md-8 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Contact </h4>
					<ul>
					<div class="w3-address-right">
								<h6><?php echo $telepon;?></h6>
							</div>	
					</ul>
				</div>
				
				<div class="col-md-5 sign-gd-two">
					<h4>Alamat</h4>
					<div class="w3-address">
					<div class="w3-address-right">
								<h6><?php echo $alamat;?></h6>
							</div>
					</div>
				</div>
				<div class="col-md-3 sign-gd flickr-post">
					
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
			
		<p class="copy-right"><?php echo $copyright;?></p>
	</div>
</div>
<!-- //footer -->



<script type="text/javascript" src="<?php echo $url;?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo $url;?>js/modernizr.custom.js"></script>
<script src="<?php echo $url;?>js/minicart.min.js"></script>
<script>
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
			
<script src="<?php echo $url;?>js/easy-responsive-tabs.js"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
	<script src="<?php echo $url;?>js/jquery.waypoints.min.js"></script>
	<script src="<?php echo $url;?>js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
<script type="text/javascript" src="<?php echo $url;?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.easing.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
	<script type="text/javascript">
		$(document).ready(function() {
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<script type="text/javascript" src="<?php echo $url;?>js/bootstrap.js"></script>
</body>
</html>
