<?php 
$url = "home/data/tmp/tmp 13/infirmary/";
$komponen = "home/data/tmp/tmp 13/";
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
<link rel="stylesheet" href="<?php echo $url;?>css/jquery-ui.css" />
<link href="<?php echo $url;?>css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo $url;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo $url;?>js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/numscroller-1.0.js"></script>
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="<?php echo $url;?>js/move-top.js"></script>
		<script type="text/javascript" src="<?php echo $url;?>js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<script src="<?php echo $url;?>js/jquery-ui.js"></script>
		<script>
			$(function() {
				$( "#datepicker,#datepicker1" ).datepicker();
			});
		</script>
<script src="<?php echo $url;?>js/responsiveslides.min.js"></script>
<link href="<?php echo $url;?>css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php echo $url;?>js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
</head>
<body>
<div class="header wow zoomIn">
	<div class="container">
		<div class="header_left" data-wow-duration="2s" data-wow-delay="0.5s">
			<ul>
				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><?php echo $telepon;?></li>
				<li><a href="mailto:<?php echo $email;?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><?php echo $email;?></a></li>
			</ul>
		</div>
		<div class="header_right">
			<div class="login">
				
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header -->
<div class="header-bottom ">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo grid">
						<div class="grid__item color-3">
							<h4><img width="30" src="admin/data/image/logo/logo.png" alt=" " />&nbsp;<a class="link link--nukun" href="index.html"><i></i><font color="orange">WEBSITE </font><span> <?php echo $judul;?></span></a></h4>
						</div>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--horatio">
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
			<li class="menu__item menu"> <a class="menu__link" href="index.php?p=login&action=logout">Logout</a> </li>
			<?php	 
			}
			else
			{
			?>
			<li class="menu__item menu"> <a class="menu__link" href="index.php?p=login&action=logout"><?php echo $i->n;?></a> </li>
			<?php
			}
		}
		else
		{
		?>
		 <li class="menu__item menu"> <a class="menu__link" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
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
					</nav>
				</div>
			</nav>
		</div>
	</div>
<hr>	
	<?php include 'halaman.php';?>
<div class="content">
	<div class="container">

</div>
</div>

<div class="contact">
	<div class="container">
		
		<div class="col-md-6 contact-right wow fadeIn animated animated" data-wow-delay="0.1s" data-wow-duration="2s">
			<h3>Contact Us</h3>
			<div class="strip"></div>
			<ul class="con-icons">
				<li><span class="glyphicon glyphicon-phone" aria-hidden="true"></span><?php echo $telepon;?></li>
				<li><a href="mailto:<?php echo $email;?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><?php echo $email;?></a></li>
			</ul>
			<ul class="fb_icons">
				<li class="hvr-rectangle-out"><a class="fb" href="<?php echo $facebook;?>"></a></li>
				<li class="hvr-rectangle-out"><a class="twit" href="<?php echo $twitter;?>"></a></li>
				<li class="hvr-rectangle-out"><a class="goog" href="<?php echo $google;?>"></a></li>
				<li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
				<li class="hvr-rectangle-out"><a class="drib" href="#"></a></li>
			</ul>
			
		</div>
		<div class="col-md-6 contact-left wow fadeIn animated animated" data-wow-delay="0.1s" data-wow-duration="2s">
			<h2>Alamat</h2>
			<div class="strip"></div>
			<p class="para"><?php echo $alamat;?>.</p>
			<p class="copy-right"><?php echo $copyright;?></p>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //contact -->


<script type="text/javascript" src="<?php echo $url;?>js/bootstrap-3.1.1.min.js"></script>
</body>
</html>

