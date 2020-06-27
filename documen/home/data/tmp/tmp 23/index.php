<?php 
$url = "home/data/tmp/tmp 23/fc-transport/";
$komponen = "home/data/tmp/tmp 23/";
include 'home/include/all_include.php';
?>


<!DOCTYPE html>

    <head>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,900,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto:500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo $url;?>css/slicknav.css" />
        <link href="<?php echo $url;?>rs-plugin/css/settings.css" rel="stylesheet">
        <link href="<?php echo $url;?>css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo $url;?>style.css" rel="stylesheet">
        <link href="<?php echo $url;?>css/responsive.css" rel="stylesheet">
    </head>
    <body>

       
        
        <!--Start Header area  -->
        <div class="header_area">
             <div class="header_top_area">
                <div class="container">
                    <div class="row">  
                        <div class="col-md-4 col-lg-4">
                            <div class="header_top_menu">
                                <ul>
                                    <li><a href="#">Selamat Datang Di website <?php echo $judul;?></a></li>
                                   
                                </ul>
                            </div>
                        </div>  
                        <div class="col-md-2 col-lg-2 col-md-offset-6 col-lg-offset-6">
                            <div class="header_social_bookmark">
                                <ul>
                                    <li><a href="<?php echo $facebok;?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?php echo $google;?>"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="<?php echo $instagram;?>"><i class="fa fa-instagram"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="logo">
                                <a href="#"><img width="50" src="admin/data/image/logo/logo.png" alt="">
								<h2><?php echo ucwords($judul);?></h2>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-md-offset-1 col-lg-offset-1">
                            <div class="opening_time s_header">
                                <div><i class="fa fa-home"></i></div>
                                <p class="contact_title">Alamat</p>
                                <p class="uppercase"><?php echo $alamat;?></p>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <div class="call_us s_header">
                                <div><i class="fa fa-phone"></i></div>
                                <p class="contact_title">Telepon</p>
                                <p class="uppercase"><?php echo $telepon;?></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="email_us s_header">
                                <div><i class="fa fa-envelope-o"></i></div>
                               <p class="contact_title">Email</p>
                                <p class="uppercase"><?php echo $email;?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Area-->
        <!--Start Slider Area -->
        <section class="slider_area">
            <div class="tp-banner-container">
               
               <br>
            </div>
            <div class="mainmenu_area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="mainmenu nav">
									<nav>
										<ul id="nav">
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
							
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        <!--End Slider Area-->
         
  <?php include 'halaman.php';?>
  
  <h2>&nbsp;</h2>
        <!-- Footer Area  -->
        <footer class="footer_area">
            <div class="footer_top_area  section_dark">
                <div class="container">
                    <div class="row footer_padding_top">
                        <div class="col-md-4 col-lg-4">
                            <div class="footer_adddress s_footer">
                                <div><i class="fa fa-home"></i></div>
                                <p class="uppercase">Alamat</p>
                                <p><?php echo $alamat;?></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="footer_call_us s_footer">
                                <div><i class="fa fa-phone"></i></div>
                                <p class="uppercase">Telepon</p>
                                <p><?php echo $telepon;?></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="footer_email_us s_footer">
                                <div><i class="fa fa-envelope-o"></i></div>
                                <p class="uppercase">Email</p>
                                <p><?php echo $email;?></p>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="footer_border"></div>
                        </div>
                    </div>
                    <div class="row footer_padding_bottom">
                        <div class="col-md-3 col-lg-3">
                            <div class="footer_discription">
                                <h3>About Us</h3>
                                <p><?php echo $judul;?> </p>
                                <div class="footer_social_bookmark">
                                    <ul>
                                        <li><a href="<?php echo $facebook;?>#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?php echo $twitter;?>#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?php echo $google;?>#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="<?php echo $instagram;?>#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
            <div class="footer_bottom_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="footer_copyright">
                               <?php echo $copyright;?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="<?php echo $url;?>rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script src="<?php echo $url;?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo $url;?>js/owl.carousel.min.js"></script>
        <script src="<?php echo $url;?>js/jquery.slicknav.min.js"></script>
        <script src="<?php echo $url;?>js/main.js"></script>
    </body>
</html>