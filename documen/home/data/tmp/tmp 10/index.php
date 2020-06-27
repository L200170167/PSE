<?php 

$url = "home/data/tmp/tmp 10/negotiation-web/";
$komponen = "home/data/tmp/tmp 10/";
include 'home/include/all_include.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo $url;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $url;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo $url;?>js/jquery-2.1.4.min.js"></script>
<script src="<?php echo $url;?>js/main.js"></script>
<link rel="stylesheet" href="<?php echo $url;?>css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo $url;?>css/flexslider.css" type="text/css" media="screen" property="" />
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet">
 </head>
<body>


	<div class="w3ls-banner-info-bottom">
		<div class="container">
			<div class="banner-address">
				<div class="col-md-2 banner-address-left">
				<p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $telepon;?></p>
				</div>
				<div class="col-md-3 banner-address-left">
					<p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></p>
				</div>
				<div class="col-md-3 banner-address-left">
					
					<p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $alamat;?></p>
				</div>
					<div class="col-md-3 agile_banner_social">
						<ul class="agileits_social_list">
							<li><a href="<?php echo $facebook;?>" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="<?php echo $twitter;?>" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="<?php echo $google;?>" class="w3_agile_dribble"><i class="fa fa-google" aria-hidden="true"></i></a></li>
							<li><a href="<?php echo $instagram;?>" class="w3_agile_vimeo"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<div class="clearfix"> <img width="30" src="admin/data/image/logo/logo.png" alt=" " /></div>
			</div>
		</div>
	</div>
	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h4><a class="navbar-brand" href="index.php"><?php echo ucwords($judul);?></a></h4>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-13" id="cl-effect-13">
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
						
					</nav>
				</div>
			</nav>
		</div>
	</div>
	
	<hr>
	<?php include 'halaman.php';?>
	
		<!-- flexSlider -->
		<script defer="" src="<?php echo $url;?>js/jquery.flexslider.js"></script>
				<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				</script>
			<!-- //flexSlider -->


	<div class="services">
		<div class="container">
		</div>
	</div>	
	<div class="footer">
		<div class="container">
			<div class="agile-footer-grids">
				<div class="col-md-4 agile-footer-grid">
					<h4>Alamat</h4>
					<p><?php echo $alamat;?></p>
				</div>

				<div class="col-md-4 agile-footer-grid">
					<h4>Telepon</h4>
					<p><?php echo $telepon;?></p>
				</div>

				<div class="col-md-4 agile-footer-grid">
					<h4>About</h4>
					<p><?php echo $judul;?></p>
				</div>

				
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	
	
	<div class="agileits-w3layouts-copyright">
		<div class="container">
			<p><?php echo $copyright;?></p>
		</div>
	</div>
<script src="<?php echo $url;?>js/bootstrap.js"></script>
</body>
</html>