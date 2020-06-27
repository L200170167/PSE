<?php 

$url = "home/data/tmp/tmp 3/Fortune-Template/";
$komponen = "home/data/tmp/tmp 3/";
include 'home/include/all_include.php';
?>
<!DOCTYPE html>
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/html"> 
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo $url;?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo $url;?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/style.css" media="screen" data-name="skins">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/switcher.css" media="screen" />
    <link rel="stylesheet" href="<?php echo $url;?>css/fractionslider.css"/>
    <link rel="stylesheet" href="<?php echo $url;?>css/style-fraction.css"/>
    <link rel="stylesheet" href="<?php echo $url;?>css/animate.css"/>
</head>


<body>
<section class="wrapper container">
<header id="header">

  <div class="navbar navbar-default navbar-static-top col-sm-12" role="navigation">
        <h2 align="right"><b>SELAMAT DATANG DI <b> <font color="orange"><br>WEBSITE <?php echo  strtoupper($judul) ;?></font></h2>
       
        <div class="navbar-collapse collapse">
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
    </div>
</header>

<section id="page_head" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="page_title">
                    <h2><?php echo $_GET['p'];?></h2>
                    <span class="sub_heading"><?php echo  ucwords($judul) ;?></span>
                </div>
                <nav id="breadcrumbs">
                    <ul>
                        <li>You are here:</li>
                        <li><a href="#">Page</a></li>
                        <li><?php echo $_GET['p'];?></li>
                    </ul>
                </nav>
            </div>
        </section>
				    <?php include 'halaman.php';?>	
 
				</section>	
   


<section class="footer_bottom row">
    <div class="col-sm-6">
        <p class="copyright"><?php echo $copyright;?></p>
    </div>

    <div class="col-sm-6 ">
        <div class="footer_social">
            <ul class="footbot_social">
                <li><a class="fb" href="<?php echo $facebook;?>" data-placement="top" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a class="twtr" href="<?php echo $twitter;?>" data-placement="top" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a class="rss" href="<?php echo $google;?>" data-placement="top" data-toggle="tooltip" title="RSS"><i class="fa fa-rss"></i></a></li>
            </ul>
        </div>
    </div>
</section>


<script type="text/javascript" src="<?php echo $url;?>/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo $url;?>/js/bootstrap.min.js"></script>
<script src="<?php echo $url;?>/js/jquery.easing.1.3.js"></script>
<script src="<?php echo $url;?>/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.cookie.js"></script> 
<script src="<?php echo $url;?>js/jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.smartmenus.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.smartmenus.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jflickrfeed.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.easypiechart.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/swipe.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/wow.min.js"></script>
<script src="<?php echo $url;?>js/main.js"></script>
<div class="switcher"></div>
<script>
    new WOW().init();
</script>
</body>
</html>
