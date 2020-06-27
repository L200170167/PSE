<?php 
$url = "home/data/tmp/tmp 16/trans_load-we/";
$komponen = "home/data/tmp/tmp 16/";
include 'home/include/all_include.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link rel="stylesheet" href="<?php echo $url;?>css/bootstrap.css"> 
	<link href="<?php echo $url;?>css/style.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo $url;?>css/simpleLightbox.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo $url;?>css/popup-box.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo $url;?>css/fontawesome-all.css" rel="stylesheet">
	<link href="<?php echo $url;?>//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="<?php echo $url;?>//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
</head>

<body>
<header>
	<div class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="#"><span><i class="fab fa-empire"></i> <?php echo ucwords($judul);?></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
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
    <div class="navbar-text">
     <p class="right-p"><i class="fas fa-phone" aria-hidden="true"></i><?php echo $telepon;?></p>
    </div>
  </div>
</nav>
		</div>
</header>

	
	<?php include 'halaman.php';?>
	


<section class="newsletter text-center py-5">
	<div class="container py-md-3">
		<h3 class="heading text-center text-uppercase mb-5"><?php echo $judul;?> </h3>
		<div class="w3l_header_contact_details_agile">
												<a class="w3l_header_contact_details_agile-info_inner"> <span><i class="fas fa-phone"></i></span><?php echo $telepon;?></a>
											</div>

		<div class="subscribe_inner">
			<p class="mb-4"><?php echo $alamat;?></p>
			<div class="social mt-sm-5 mt-3">
				<h4>Follow us</h4>
				<ul class="d-flex mt-3 justify-content-center">
					<li class="mx-2"><a href="<?php echo $facebook;?>"><span class="fab fa-facebook"></span></a></li>
					<li class="mx-2"><a href="<?php echo $twitter;?>"><span class="fab fa-twitter-square"></span></a></li>
					
					<li class="mx-2"><a href="<?php echo $instagram;?>"><span class="fab fa-instagram"></span></a></li>
					<li class="mx-2"><a href="<?php echo $google;?>"><span class="fab fa-google-plus-square"></span></a></li>
				</ul>
			</div>
		</div>
		
	</div>
</section>	
<footer>
	<div class="container py-3 py-md-4">
		<div class="footer">
				<p class="text-center"><?php echo $copyright;?></p>
			</div>
	</div>
</footer>
<!-- footer -->



				</div>
			</div>
</div>
</div>
<!-- //magnific-popup -->

<!-- js -->
	<script type="text/javascript" src="<?php echo $url;?>js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="<?php echo $url;?>js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->


<!-- stats -->
	<script src="<?php echo $url;?>js/jquery.waypoints.min.js"></script>
	<script src="<?php echo $url;?>js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
<!-- bars.js -->   
	<script src="<?php echo $url;?>js/bars.js"></script>
	<!-- //bars.js -->

	<!-- flexSlider (for testimonials) -->
	<link rel="stylesheet" href="<?php echo $url;?>css/flexslider.css" type="text/css" media="screen" property="" />
	<script defer src="<?php echo $url;?>js/jquery.flexslider.js"></script>
	<script>
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<!-- //flexSlider (for testimonials) -->
	<!-- simpleLightbox -->
	<script src="<?php echo $url;?>js/simpleLightbox.js"></script>
	<script>
		$('.proj_gallery_grid a').simpleLightbox();
	</script>
	<!-- //simpleLightbox -->
<!--popup-js-->
<script src="<?php echo $url;?>js/jquery.magnific-popup.js" type="text/javascript"></script>
 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
</script>
<!--//popup-js-->
<!-- start-smooth-scrolling -->
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
	<!-- //end-smooth-scrolling -->
	
	<!-- smooth-scrolling-of-move-up -->
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
	<!-- //smooth-scrolling-of-move-up -->
	
	
	<!-- smooth scrolling js -->
	<script src="<?php echo $url;?>js/SmoothScroll.min.js"></script>
	<!-- //smooth scrolling js -->
 </body>
</html>
