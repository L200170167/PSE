<?php 
$url = "home/data/tmp/tmp 25/fame-free/";
$komponen = "home/data/tmp/tmp 25/";
include 'home/include/all_include.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="<?php echo $url;?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url;?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $url;?>css/animate.css" rel="stylesheet" >
    <link rel="stylesheet" href="<?php echo $url;?>css/owl.carousel.css" >
    <link rel="stylesheet" href="<?php echo $url;?>css/owl.theme.css" >
    <link rel="stylesheet" href="<?php echo $url;?>css/owl.transitions.css" >
    <link href="<?php echo $url;?>css/style.css" rel="stylesheet">
    <link href="<?php echo $url;?>css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/color/green.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/color/green.css" title="green">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/color/light-red.css" title="light-red">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/color/blue.css" title="blue">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/color/light-blue.css" title="light-blue">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/color/yellow.css" title="yellow">
    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/color/light-green.css" title="light-green">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <script src="<?php echo $url;?>js/modernizr.custom.js"></script>
</head>

<body class="index">
    
    
    <!-- Styleswitcher
================================================== -->
        <div class="colors-switcher">
            <a id="show-panel" class="hide-panel"><i class="fa fa-tint"></i></a>        
                <ul class="colors-list">
                    <li><a title="Light Red" onClick="setActiveStyleSheet('light-red'); return false;" class="light-red"></a></li>
                    <li><a title="Blue" class="blue" onClick="setActiveStyleSheet('blue'); return false;"></a></li>
                    <li class="no-margin"><a title="Light Blue" onClick="setActiveStyleSheet('light-blue'); return false;" class="light-blue"></a></li>
                    <li><a title="Green" class="green" onClick="setActiveStyleSheet('green'); return false;"></a></li>
                    
                    <li class="no-margin"><a title="light-green" class="light-green" onClick="setActiveStyleSheet('light-green'); return false;"></a></li>
                    <li><a title="Yellow" class="yellow" onClick="setActiveStyleSheet('yellow'); return false;"></a></li>
                    
                </ul>

        </div>  
<!-- Styleswitcher End
================================================== -->

     
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href=""> &nbsp;<?php echo ucwords($judul);?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
		 <li class="nav-item"> <a class="btn w3ls-hover" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
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
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
 
 
 <section class="call-to-action">
    </section>
  
  <?php include 'halaman.php';?>
	
	<h2>&nbsp;</h2>
    

    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h3>About</h3>
                        <p class="white-text"><?php echo $judul;?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-contact-info">
                        <h4>Contact info</h4>
                        <ul>
                            <li><strong>E-mail :</strong> <?php echo $email;?></li>
                            <li><strong>telephone :</strong> <?php echo $telepon;?></li>
                           
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="footer-contact-info">
                        <h4>Alamat</h4>
                        <ul>
                            <li><strong>Alamat :</strong> <?php echo $alamat;?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <footer class="style-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <span class="copyright"></span>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="footer-social text-center">
                            <ul>
                                <li><a href="<?php echo $twitter;?>#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?php echo $facebook;?>#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?php echo $instagram;?>#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="<?php echo $google;?>#"><i class="fa fa-google-plus"></i></a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="footer-link">
                            <ul class="pull-right">
                               
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>


    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>

    

    <!-- jQuery Version 2.1.1 -->
    <script src="<?php echo $url;?>js/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $url;?>asset/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo $url;?>js/jquery.easing.1.3.js"></script>
    <script src="<?php echo $url;?>js/classie.js"></script>
    <script src="<?php echo $url;?>js/count-to.js"></script>
    <script src="<?php echo $url;?>js/jquery.appear.js"></script>
    <script src="<?php echo $url;?>js/cbpAnimatedHeader.js"></script>
    <script src="<?php echo $url;?>js/owl.carousel.min.js"></script>
	<script src="<?php echo $url;?>js/jquery.fitvids.js"></script>
	<script src="<?php echo $url;?>js/styleswitcher.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo $url;?>js/jqBootstrapValidation.js"></script>
    <script src="<?php echo $url;?>js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $url;?>js/script.js"></script>

</body>

</html>
