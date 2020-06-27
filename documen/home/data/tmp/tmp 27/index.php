<?php 
$url = "home/data/tmp/tmp 26/construction/";
$komponen = "home/data/tmp/tmp 26/";
include 'home/include/all_include.php';
?>

<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="<?php echo $url;?>custom-font/fonts.css" />
        <link rel="stylesheet" href="<?php echo $url;?>css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo $url;?>css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo $url;?>css/bootsnav.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/jquery.fancybox.css?v=2.1.5" media="screen" />	
        <link rel="stylesheet" href="<?php echo $url;?>css/custom.css" />
    </head>
    <body>

        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                    <div class="object"></div>
                </div>
            </div>
        </div>

        <!--End off Preloader -->

        <!-- Header -->
        <header>
            <!-- Top Navbar -->
            <div class="top_nav">
                <div class="container">
                    <ul class="list-inline info">
                        <li><a href="#"><span class="fa fa-phone"></span> <?php echo $telepon;?></a></li>
                        <li><a href="#"><span class="fa fa-envelope"></span> <?php echo $email;?></a></li>
                        <li><a href="#"><span class="fa fa-home"></span> <?php echo $alamat;?></a></li>
                    </ul>
                    <ul class="list-inline social_icon">
                        <li><a href="<?php echo $facebook;?>"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="<?php echo $twitter;?>"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="<?php echo $instagram;?>"><span class="fa fa-instagram"></span></a></li>
                        <li><a href="<?php echo $google;?>"><span class="fa fa-google"></span></a></li>
                        <li><a href="<?php echo $google;?>"><span class="fa fa-youtube"></span></a></li>
                    </ul>			
                </div>
            </div><!-- Top Navbar end -->

            <!-- Navbar -->
            <nav class="navbar bootsnav">
               

                <div class="container">
                 
                    <!-- Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                       
                    </div>
                    <!-- Navigation -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav menu">
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
                </div>   
            </nav><!-- Navbar end -->
        </header><!-- Header end -->



<?php include 'halaman.php';?>
<h2>&nbsp;</h2>
	
	
        <!-- Footer -->
        <footer>
            <!-- Footer top -->
            <div class="container footer_top">
                <div class="row">
                    <div class="col-lg-4 col-sm-7">
                        <div class="footer_item">
                            <h4>About</h4>
                            
                            <p><?php echo $judul;?>	</p>

                            <ul class="list-inline footer_social_icon">
                                 <li><a href="<?php echo $facebook;?>"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="<?php echo $twitter;?>"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="<?php echo $instagram;?>"><span class="fa fa-instagram"></span></a></li>
                        <li><a href="<?php echo $google;?>"><span class="fa fa-google"></span></a></li>
                        <li><a href="<?php echo $google;?>"><span class="fa fa-youtube"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-5">
                        <div class="footer_item">
                            <h4>Alamat</h4>
                            <ul class="list-unstyled footer_menu">
                               <?php echo $alamat;?>
                             
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-7">
                        <div class="footer_item">
                            <h4>Email</h4>
                            <ul class="list-unstyled post">
                                <?php echo $email;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-5">
                        <div class="footer_item">
                            <h4>Contact us</h4>
                            <ul class="list-unstyled footer_contact">
                                <?php echo $telepon;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- Footer top end -->

            <!-- Footer bottom -->
            <div class="footer_bottom text-center">
                <p class="wow fadeInRight">
                    <?php echo $copyright;?>
                </p>
            </div><!-- Footer bottom end -->
        </footer><!-- Footer end -->

        <!-- JavaScript -->
        <script src="<?php echo $url;?>js/jquery-1.12.1.min.js"></script>
        <script src="<?php echo $url;?>js/bootstrap.min.js"></script>
        <script src="<?php echo $url;?>js/bootsnav.js"></script>
        <script src="<?php echo $url;?>js/isotope.js"></script>
        <script src="<?php echo $url;?>js/isotope-active.js"></script>
        <script src="<?php echo $url;?>js/jquery.fancybox.js?v=2.1.5"></script>
        <script src="<?php echo $url;?>js/jquery.scrollUp.min.js"></script>
        <script src="<?php echo $url;?>js/main.js"></script>
    </body>	
</html>	