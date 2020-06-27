<?php 

$url = "home/data/tmp/tmp 6/curative-web/";
$komponen = "home/data/tmp/tmp 6/";
include 'home/include/all_include.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link href="<?php echo $url;?>css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo $url;?>css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
<link href="<?php echo $url;?>css/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $url;?>css/jquery-ui.css" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo $url;?>css/cm-overlay.css" />
<link href="<?php echo $url;?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Abel" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<!-- Header -->
	<div class="header-top">
		<div class="container">
			<div class="bottom_header_left">
			<div class="w3_fr">
				<a href="#">Selamat Datang diwebsite kami</a>
				
				&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="facebook" href="<?php echo $facebook;?>">
						<span class="fa fa-facebook"></span>
					</a>
					<a class="twitter" href="<?php echo $twitter;?>">
						<span class="fa fa-twitter"></span>
					</a>
					<a class="google" href="<?php echo $google;?>">
						<span class="fa fa-google"></span>
					</a>
			</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="header">
		<div class="content white">
			<nav class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">
						
							<h1>
							<?php echo ucwords($judul);?>
							</h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav navbar-right">
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
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
	<div class="headerdown">
	<div class="container">
	<div class="col-md-4 col-sm-4 w3_hl">
	<div class="w3l_l">
	<i class="fa fa-phone-square" aria-hidden="true"></i>
	</div>
	<div class="w3l_r">
	<h3>Telepon</h3>
	<h5><?php echo $telepon;?></h5>
	</div>
	
	</div>
	
	<div class="col-md-4 col-sm-4 w3_hc">
	<div class="w3l_cl">
	<i class="fa fa-table" aria-hidden="true"></i>
	</div>
	<div class="w3l_cr">
	<h3>Email</h3>
	<h5><?php echo $email;?></h5>
	</div>
	
	</div>
	
	<div class="col-md-4 col-sm-4 w3_hr">
	<div class="w3l_rl">
	<i class="fa fa-book" aria-hidden="true"></i>
	</div>
	<div class="w3l_rr">
	<a href="#appointmentform" class="scroll">
	<h3>Alamat</h3>
	<h5><?php echo $alamat;?></h5>
	</a>
	</div>
	
	</div>
	<div class="clearfix"></div>
	</div>
	</div>



<div class="container">
<div class="row">
	<div class="col-12">
	<?php include 'halaman.php';?>	
	</div>
</div>
</div>

	<div class="contact" id="contact">
	<div class="container">	
	<div class="col-md-4  w3layouts_footer_grid">
					
				</div>
				<div class="clearfix"> </div>
				<center>
				<ul class="social_agileinfo">
						<li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
					</ul>
					</center>
					<p class="copyright"><?php echo $copyright;?></p>
			</div>
	</div>
	
<script src="<?php echo $url;?>js/jquery.min.js"></script>
<script src="<?php echo $url;?>js/bootstrap.min.js"></script>
<script  src="<?php echo $url;?>js/move-top.js"></script>
<script  src="<?php echo $url;?>js/easing.js"></script>
<script  src="<?php echo $url;?>js/SmoothScroll.min.js"></script>	


			<script src="<?php echo $url;?>js/owl.carousel.js"></script>
	<!-- //for testimonials slider-js-file-->
		<script>
		$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
 
			autoPlay: 3000, //Set AutoPlay to 3 seconds
			autoPlay:true,
			items : 3,
			itemsDesktop : [640,5],
			itemsDesktopSmall : [414,4]
		});
		}); 
</script>
<!-- for testimonials slider-js-script-->

 <!--script-->
<script src="<?php echo $url;?>js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
				
</script>
<!--script-->
<!-- Calendar -->
<script src="<?php echo $url;?>js/jquery-ui.js"></script>
	<script>
		$(function() {
		$( "#datepicker,#datepicker1" ).datepicker();
		});
	</script>
<!-- //Calendar -->
<!-- /gallery -->
    <script src="<?php echo $url;?>js/jquery.tools.min.js"></script>
    <script src="<?php echo $url;?>js/jquery.mobile.custom.min.js"></script>
    <script src="<?php echo $url;?>js/jquery.cm-overlay.js"></script>

    <script>
        $(document).ready(function () {
            $('.cm-overlay').cmOverlay();
        });
    </script>
    <!-- //gallery -->
<!-- start-smoth-scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
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
<!-- scrolling script -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //scrolling script -->
<!--//start-smoth-scrolling -->

</body>
</html>