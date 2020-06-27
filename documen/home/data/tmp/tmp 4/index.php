<?php 
$url = "home/data/tmp/tmp 4/e_services-web/";
$komponen = "home/data/tmp/tmp 4/";
include 'home/include/all_include.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $url;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $url;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo $url;?>css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="<?php echo $url;?>css/lightbox.css"> <!-- lightbox css -->
<script src="<?php echo $url;?>js/jquery-1.11.1.min.js"></script>
<link href="<?php echo $url;?>css/font-awesome.css" type="text/css" rel="stylesheet"> 
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default ">
  <div class="container-fluid header-section w3l">
    <div class="navbar-header w3">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	 <a >
	  <h3><span class="head w3l"><font color="#F69323"><img width="50" src="admin/data/image/logo/logo.png" alt=" " />&nbsp; <?php echo $judul;?></font></h3>
	 </a>
	 </div>
	 <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse header" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav list w3">
			
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

				<div class="w3ls-social-icons">
					<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
					<li><a href="<?php echo $facebook;?>" class="facebook">
						  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
					<li><a href="<?php echo $twitter;?>" class="twitter"> 
						  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
					<li><a href="<?php echo $instagram;?>" class="instagram">
						  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
					<li><a href="<?php echo $google;?>" class="pinterest">
						  <div class="front"><i class="fa fa-google" aria-hidden="true"></i></div>
						  <div class="back"><i class="fa fa-google" aria-hidden="true"></i></div></a></li>
														</ul>
				</div>
  </div>
   </div>

</nav>

	<div class="test" id="test">
	
		<div class="">
			<?php include 'halaman.php';?>	
		</div>
		<div class="clearfix"> </div>
	</div>

<script src="js/responsiveslides.min.js"></script>
<script>
// You can also use "$(window).load(function() {"
$(function () {
  // Slider◘
  $("#slider4").responsiveSlides({
	auto:false,
	pager: false,
	nav: true,
	speed: 500,
	namespace: "callbacks",
	before: function () {
	  $('.events').append("<li>before event fired.</li>");
	},
	after: function () {
	  $('.events').append("<li>after event fired.</li>");
	}
  });

});
</script>
<!-- //Banner-plugin -->
<!-- flexSlider -->
	<script defer src="<?php echo $url;?>js/jquery.flexslider.js"></script>
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
<!-- footer -->
<div class="footer">
	<div class="container">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-4 footer-right">
		<div class="sign-gd">
			<h4>Alamat </h4>
			<p><?php echo $alamat;?></p>
			
		</div>
		</div>

		

		
				<div class="col-md-4 sign-gd-two">
					<h4>Contact</h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>No Telepon</h6>
								<p><?php echo $telepon;?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p><?php echo $email;?></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						
					</div>
				</div>


				<div class="col-md-4 footer-right">
			<div class="sign-grds">
				<div class="sign-gd">
					<h4>Social Media </h4>
					<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
					<li><a href="<?php echo $facebook;?>" class="facebook">
						  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
					<li><a href="<?php echo $twitter;?>" class="twitter"> 
						  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
					<li><a href="<?php echo $instagram;?>" class="instagram">
						  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
					<li><a href="<?php echo $google;?>" class="pinterest">
						  <div class="front"><i class="fa fa-google" aria-hidden="true"></i></div>
						  <div class="back"><i class="fa fa-google" aria-hidden="true"></i></div></a></li>
														</ul>
				</div>
				</div>
			</div>
				<div class="clearfix"> </div>
				
		
		<div class="clearfix"></div>
			
		<p class="copy-right"><?php echo $copyright;?></p>
	</div>
</div>
</div>
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
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<script src="<?php echo $url;?>js/bootstrap.js"></script>
<script src="<?php echo $url;?>js/SmoothScroll.min.js"></script>
</body>
</html>