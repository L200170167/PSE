<?php 
$url = "home/data/tmp/tmp 21/margo-free-lite/";
$komponen = "home/data/tmp/tmp 21/";
include 'home/include/all_include.php';
?>
<!doctype html>
<html lang="en">
<head>
  <link rel="stylesheet" href="<?php echo $url;?>asset/css/bootstrap.min.css" type="text/css" media="screen">
  <link rel="stylesheet" href="<?php echo $url;?>css/settings.css" type="text/css" media="screen">
  <link rel="stylesheet" href="<?php echo $url;?>css/font-awesome.min.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/slicknav.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/style.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/responsive.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/animate.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/colors/red.css" media="screen" />

  <script type="text/javascript" src="<?php echo $url;?>js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/jquery.migrate.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/modernizrr.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/jquery.appear.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/count-to.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/jquery.textillate.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/jquery.lettering.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/smooth-scroll.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/skrollr.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/jquery.parallax.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/mediaelement-and-player.js"></script>
  <script type="text/javascript" src="<?php echo $url;?>js/jquery.slicknav.js"></script>    
</head>

<body>
  <div id="container">
    <header class="clearfix">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <ul class="contact-details">
                <li><a href="<?php echo $url;?>#"><i class="fa fa-map-marker"></i> <?php echo $alamat;?></a>
                </li>
                <li><a href="<?php echo $url;?>#"><i class="fa fa-envelope-o"></i> <?php echo $email;?></a>
                </li>
                <li><a href="<?php echo $url;?>#"><i class="fa fa-phone"></i> <?php echo $telepon;?></a>
                </li>
              </ul>
            </div>
            <div class="col-md-5">
              <ul class="social-list">
                <li>
                  <a class="facebook itl-tooltip" data-placement="bottom" title="Facebook" href="<?php echo $url;?>#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a class="twitter itl-tooltip" data-placement="bottom" title="Twitter" href="<?php echo $url;?>#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a class="google itl-tooltip" data-placement="bottom" title="Google Plus" href="<?php echo $url;?>#"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                  <a class="dribbble itl-tooltip" data-placement="bottom" title="Dribble" href="<?php echo $url;?>#"><i class="fa fa-dribbble"></i></a>
                </li>
                <li>
                  <a class="instgram itl-tooltip" data-placement="bottom" title="Instagram" href="<?php echo $url;?>#"><i class="fa fa-instagram"></i></a>
                </li>
              </ul>
             
            </div>
            <!-- .col-md-6 -->
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
      </div>
      <!-- .top-bar -->
      <!-- End Top Bar -->


      <!-- Start  Logo & Naviagtion  -->
      <div class="navbar navbar-default navbar-top" role="navigation" data-spy="affix" data-offset-top="50">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand" href="index.php">
              <h3><img src="admin/data/image/logo/logo.png" width="30" alt=" " />&nbsp;&nbsp;<?php echo ucwords($judul);?></h3>
            </a>
          </div>
          <div class="navbar-collapse collapse">
          
            <!-- Start Navigation List -->
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
			<li><a data-hover="<?php echo $i->n;?>" href="index.php?p=login&action=logout"><span>Logout</span></a></li>
			<?php	 
			}
			else
			{
			?>
			
			<li><a data-hover="<?php echo $i->n;?>" href="index.php?p=login&action=logout"><span><?php echo $i->n;?></span></a></li>
			<?php
			}
		}
		else
		{
		?>
		<li><a data-hover="<?php echo $i->n;?>" href="<?php echo $i->l;?>"><span><?php echo $i->n;?></span></a></li>
		
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
          </div>
        </div>      
      </div>

    </header>
   
   <div class="page-banner" style="padding:30px 0; background: url(<?php echo $url;?>images/slide-02-bg.jpg) center #f9f9f9;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2><?php echo $_GET['p'];?></h2>
            <p><?php echo $email;?></p>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="#">Page</a></li>
              <li><?php echo $_GET['p'];?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
   

   
   <?php include 'halaman.php';?>
<h2>&nbsp;</h2>
    <!-- Start Footer Section -->
    <footer>
      <div class="container">
        <div class="row footer-widgets">


          <!-- Start Subscribe & Social Links Widget -->
          <div class="col-md-3 col-xs-12">
            <div class="footer-widget mail-subscribe-widget">
              <h4><?php echo $judul;?><span class="head-line"></span></h4>
              <p><?php echo $alamat;?></p>
            
            </div>
            <div class="footer-widget social-widget">
             
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Subscribe & Social Links Widget -->


          <!-- Start Twitter Widget -->
          <div class="col-md-3 col-xs-12">
            <div class="footer-widget twitter-widget">
               <h4>Follow Us<span class="head-line"></span></h4>
              <ul class="social-icons">
                <li>
                  <a class="facebook" href="<?php echo $url;?>#"><i class="fa fa-facebook"></i></a>  Facebook
                </li>
                <li>
                  <a class="twitter" href="<?php echo $url;?>#"><i class="fa fa-twitter"></i></a>  twitter
                </li>
                <li>
                  <a class="google" href="<?php echo $url;?>#"><i class="fa fa-google-plus"></i></a>  Google
                </li>
               
                <li>
                  <a class="instgram" href="<?php echo $url;?>#"><i class="fa fa-instagram"></i></a>  Instagram
                </li>
                
              </ul>
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Twitter Widget -->


          <!-- Start Flickr Widget -->
          <div class="col-md-3 col-xs-12">
            <div class="footer-widget flickr-widget">
              <h4>Email<span class="head-line"></span></h4>
			  <?php echo $email;?>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Flickr Widget -->


          <!-- Start Contact Widget -->
           <div class="col-md-3 col-xs-12">
            <div class="footer-widget flickr-widget">
              <h4>Telepon<span class="head-line"></span></h4>
			  <?php echo $telepon;?>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Contact Widget -->


        </div>
        <!-- .row -->

        <!-- Start Copyright -->
        <div class="copyright-section">
          <div class="row">
            <div class="col-md-6">
              <p><?php echo $copyright;?></p>
            </div>
            <!-- .col-md-6 -->
            <div class="col-md-6">
              <ul class="footer-nav">
               
              </ul>
            </div>
            <!-- .col-md-6 -->
          </div>
          <!-- .row -->
        </div>
        <!-- End Copyright -->

      </div>
    </footer>
    <!-- End Footer Section -->


  </div>
  <!-- End Full Body Container -->

  <!-- Go To Top Link -->
  <a href="<?php echo $url;?>#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <div id="loader">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo $url;?>js/script.js"></script>

</body>

</html>