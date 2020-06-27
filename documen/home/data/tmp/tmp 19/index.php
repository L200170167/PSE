<?php 
$url = "home/data/tmp/tmp 19/vacayhome/";
$komponen = "home/data/tmp/tmp 19/";
include 'home/include/all_include.php';
?>


<!--Template Name: vacayhome
File Name: home.html
Author Name: ThemeVault
Author URI: http://www.themevault.net/
License URI: http://www.themevault.net/license/-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?php echo $url;?>images/icons/favicon.png"/>
        <title>vacayhome</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo $url;?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $url;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Custom styles for this template -->
        <link href="<?php echo $url;?>css/style.css" rel="stylesheet">
        <link href="<?php echo $url;?>fonts/antonio-exotic/stylesheet.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $url;?>css/lightbox.min.css">
        <link href="<?php echo $url;?>css/responsive.css" rel="stylesheet">
        <script src="<?php echo $url;?>js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo $url;?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo $url;?>js/lightbox-plus-jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo $url;?>js/instafeed.min.js" type="text/javascript"></script>
        <script src="<?php echo $url;?>js/custom.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="page">
            <!---header top---->
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <!--                            <a href="#"> </a>
                                                        <div class="info-block"><i class="fa fa-map"></i>701 Old York Drive Richmond USA.</div>-->
                        </div>
                        <div class="col-md-6">
                            <div class="social-grid">
                                <ul class="list-unstyled text-right">
                                    <li><a><i class="fa fa-facebook"></i></a></li>
                                    <li><a><i class="fa fa-twitter"></i></a></li>
                                    <li><a><i class="fa fa-linkedin"></i></a></li>
                                    <li><a><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header--->
            <header class="header-container">
                <div class="container">
                    <div class="top-row">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div id="logo">
                                    <!--<a href="home.html"><img src="images/logo.png" alt="logo"></a>-->
                                    <a href="#"><span><img src="admin/data/image/logo/logo.png" width="50" alt=" " /> &nbsp;<?php echo $judul;?></span></a>
                                </div>                       
                            </div>
                            <div class="col-sm-6 visible-sm">
                                <div class="text-right"><button type="button" class="book-now-btn"><?php echo $judul;?></button></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 remove-padd">
                                <nav class="navbar navbar-default">
                                    <div class="navbar-header page-scroll">
                                        <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                    </div>
                                    <div class="collapse navigation navbar-collapse navbar-ex1-collapse remove-space">
                                        <ul class="list-unstyled nav1 cl-effect-10">
                                            
                                         
										 
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
                                </nav>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </header>


         
<?php include 'halaman.php';?>
	

            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 width-set-50">
                            <div class="footer-details">
                                <h4><?php echo $judul;?></h4>
                                <ul class="list-unstyled footer-contact-list">
                                    <li>
                                        <i class="fa fa-map-marker fa-lg"></i>
                                        <p><?php echo $alamat;?></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone fa-lg"></i>
                                        <p><a href="tel:+1-202-555-0100"> <?php echo $telepon;?></a></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o fa-lg"></i>
                                        <p><a href="mailto:demo@info.com"> <?php echo $email;?></a></p>
                                    </li>
                                </ul>
                                <div class="footer-social-icon">
                                    <a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a>
                                    <a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a>                           
                                    <a href="<?php echo $instagram;?>"><i class="fa fa-instagram"></i></a>
                                    <a href="<?php echo $google;?>"><i class="fa fa-google-plus"></i></a>
                                    <a href="<?php echo $youtube;?>"><i class="fa fa-youtube-play"></i></a>
                                </div>
                             
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            
                        </div>
                    </div>

                    <div class="copyright">
                       <?php echo $copyright;?>
                    </div>

                </div>
            </footer>

            <!--back to top--->
            <a style="display: none;" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
                <span><i aria-hidden="true" class="fa fa-angle-up fa-lg"></i></span>
                <span>Top</span>
            </a>

        </div>
    </body>
</html>

