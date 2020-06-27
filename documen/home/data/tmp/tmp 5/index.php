<?php 
$url = "home/data/tmp/tmp 5/interior_show-web/";
$komponen = "home/data/tmp/tmp 5/";
include 'home/include/all_include.php';
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	<link href="<?php echo $url;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo $url;?>css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<!-- header and footer stylesheet -->
	<link href="<?php echo $url;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //header and footer stylesheet -->
	<!-- lightbox css file -->
	<link href="<?php echo $url;?>css/lightcase.css" rel="stylesheet" type="text/css" />
	<!-- css file -->

	<!-- Testimonials-slider-css-files -->
	<link rel="stylesheet" href="<?php echo $url;?>css/owl.carousel.css" type="text/css" media="all">
	<link href="<?php echo $url;?>css/owl.theme.css" rel="stylesheet">
<!-- //Testimonials-slider-css-files -->
	<!-- online fonts -->
	<link href="<?php echo $url;?>//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?php echo $url;?>//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //online fonts -->
</head>

<body>
	<!-- banner -->
	<div class="banner jarallax">
			<div class="w3layouts-header-top">
				<div class="container">
					<div class="w3-header-top-grids">
						<div class="w3-header-top-left">
							<p><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <?php echo $telepon;?></p>
						</div>
						<div class="w3-header-top-right">
							<div class="agileinfo-social-grids">
								<ul>
									<li><a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a></li>
									<li><a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a></li>
									<li><a href="<?php echo $google;?>"><i class="fa fa-google"></i></a></li>
									
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<div class="head">
				<div class="container">
					<div class="navbar-top">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
								 <div class="navbar-brand logo ">
									<h3><a href="index.php"><font color="white"><br><img width="30" src="admin/data/image/logo/logo.png" alt=" " />&nbsp;<?php echo ucwords($judul);?></font></a></h3>
								</div>

							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							 <ul class="nav navbar-nav link-effect-4">
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
							</div><!-- /.navbar-collapse -->
						</div>
				</div>
			</div>
	</div>
	<!-- //banner -->


	<div id="about" class="banner-bottom">
		<div class="container">
			<div class="col-12">
			<?php include 'halaman.php';?>	
			</div>
		</div>
</div>


	
	

<!-- footer -->
	<footer>
		<div class="agileits-w3layouts-footer">
			<div class="container">
				<div class="col-md-4 w3-agile-grid">
					<h5>Alamat</h5>
					<p><?php echo $alamat;?></p>
					<div class="footer-agileinfo-social">
						<ul>
							<li><a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a></li>
							<li><a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?php echo $google;?>"><i class="fa fa-google"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 w3-agile-grid">
					<h5>Sosial Media</h5>
					<div class="w3ls-post-grids">
					<ul>
							<li><a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i> Facebook</a></li>
							<li><a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i> Twitter</a></li>
							<li><a href="<?php echo $google;?>"><i class="fa fa-google"> Google</i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 w3-agile-grid">
					<h5>Contact</h5>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Telepon</h6>
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
								<p>Email :<a href="mailto:<?php echo $email;?>"> <?php echo $email;?></a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<p><?php echo $copyright;?></p>
			</div>
		</div>
	</footer>
	<!-- //footer -->


	<!-- js -->
	<script src="<?php echo $url;?>js/jquery-2.2.3.min.js"></script>
	<!-- //js-->

	<!-- banner-responsive-slider -->
	<script src="<?php echo $url;?>js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
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
	<!-- //banner-responsive-slider -->
	
	<!-- light-case -->
	<script src="<?php echo $url;?>js/lightcase.js"></script>
	<script>
		$('.showcase').lightcase();
	</script>
	<!-- //light-case -->

	<!-- for testimonials slider-js-file-->
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

	<!-- smooth-scrolling -->
	<script src="<?php echo $url;?>js/move-top.js"></script>
	<script src="<?php echo $url;?>js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<script src="<?php echo $url;?>js/SmoothScroll.min.js"></script>
	<!-- //smooth-scrolling -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- smooth-scrolling-of-move-up -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo $url;?>js/bootstrap.js"></script>
</body>

</html>