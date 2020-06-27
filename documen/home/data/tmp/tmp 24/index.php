<?php 
$url = "home/data/tmp/tmp 24/fc-gybo/";
$komponen = "home/data/tmp/tmp 24/";
include 'home/include/all_include.php';
?>


<!DOCTYPE html>
<html>
<head>
<link href="<?php echo $url;?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo $url;?>css/revolution-slider.css" rel="stylesheet">
<link href="<?php echo $url;?>css/style.css" rel="stylesheet">
<link href="<?php echo $url;?>css/bootstrap-margin-padding.css" rel="stylesheet">
<link href="<?php echo $url;?>css/responsive.css" rel="stylesheet">
</head>

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- #topbar -->
    <section id="topbar" class="construct header-top">
        <div class="container">
            <div class="row">
                <div class="social pull-right">
                   
                </div> <!-- /.social -->
                <div class="contact-info pull-left">
                    <ul>
                        <li><a href="#"><img src="admin/data/image/logo/logo.png" width="20" alt=" " /> &nbsp;  <?php echo $judul;?> </a></li>
                        <li><a href="#">|<i class="fa fa-map-marker"></i>  <?php echo $alamat;?> </a></li>
                        <li><a href="#">|<i class="fa fa-envelope"></i> <?php echo $email;?></a></li>
                        <li><a href="#">|<i class="fa fa-phone"></i> <?php echo $telepon;?></a></li>
                    </ul>
                </div> <!-- /.contact-info -->
            </div>
        </div>
    </section> <!-- /#topbar -->

    <!-- header -->
    <header class="construct header-curvy">
        <div class="search-box">
            <div class="container">
                <div class="pull-right search  col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <form action="#">
                        <input type="text" placeholder="Search Here"> <button type="submit"><i class="icon icon-Search"></i></button>
                    </form>
                </div>
            </div>
        </div>
      
        <div class="container">
            <div class="clearfix">
                <div class="pull-left logo">
                    <a href="index.php">
                        
                    </a>
                </div>
                <nav class="pull-right mainmenu-container clearfix">
                   
                    <button class="mainmenu-toggler">
                        
                    </button>
                    <ul class="mainmenu pull-right">
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
        </div>
    </header>
    <!--End Main Header -->  
    
  
  <?php include 'halaman.php';?>
	
	<h2>&nbsp;</h2>

    <!--Main Footer-->
    <footer class="main-footer bg-image theme-overlay overlay-deep-black" data-img-bg="images/parallax/image-2.jpg">
    	
        <!--Footer Upper-->
    	<div class="footer-upper xs-width4-center">
        	<div class="container">
                <div class="row clearfix">
                   <div class="col-md-4 col-sm-6 col-xs-12">
                    	<div class="footer-widget links-widget">
                        	<div class="widget-title"><h3>Alamat</h3></div>
                        	 <?php echo $alamat;?>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    	<div class="footer-widget links-widget">
                        	<div class="widget-title"><h3>Email</h3></div>
                        	 <?php echo $email;?>
                        </div>
                    </div>
                    
                     <div class="col-md-4 col-sm-6 col-xs-12">
                    	<div class="footer-widget links-widget">
                        	<div class="widget-title"><h3>Telepon</h3></div>
                        	 <?php echo $telepon;?>
                        </div>
                    </div>

                   
                    
                </div>
            </div>
        </div>
        
        <!--Footer bootom-->
        <div class="footer-bottom">
        	<div class="auto-container text-center fs-13">
                 <?php echo $copyright;?>

            </div>
        </div>
        
    </footer>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top"><span class="fa fa-arrow-up"></span></div>

<script src="<?php echo $url;?>js/jquery.js"></script>
<script src="<?php echo $url;?>js/bootstrap.min.js"></script>
<script src="<?php echo $url;?>js/revolution.min.js"></script>
<!-- MixIt UP JS -->
<script src="<?php echo $url;?>js/jquery.mixitup.min.js"></script> 

<!-- FancyBox -->
<script src="<?php echo $url;?>js/jquery.fancybox.pack.js"></script>
<script src="<?php echo $url;?>js/owl.carousel.min.js"></script>
<script src="<?php echo $url;?>js/jquery.plugin.min.js"></script>
<script src="<?php echo $url;?>js/jquery.datepick.min.js"></script>
<script src="<?php echo $url;?>js/wow.js"></script>

<script src="<?php echo $url;?>js/validate.js"></script>
<script src="<?php echo $url;?>js/script.js"></script>

</body>
</html>