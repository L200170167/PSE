<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$url = "home/data/tmp/tmp 14/bootstrap basic/";
$komponen = "home/data/tmp/tmp 14/";
include 'home/include/all_include.php';
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo $url;?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $url;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $url;?>plugins/cubeportfolio/css/cubeportfolio.min.css">
  <link href="<?php echo $url;?>css/nivo-lightbox.css" rel="stylesheet" />
  <link href="<?php echo $url;?>css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo $url;?>css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="<?php echo $url;?>css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="<?php echo $url;?>css/animate.css" rel="stylesheet" />
  <link href="<?php echo $url;?>css/style.css" rel="stylesheet">
  <link id="bodybg" href="<?php echo $url;?>bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <link id="t-colors" href="<?php echo $url;?>color/default.css" rel="stylesheet">

  <script src="<?php echo $url;?>js/jquery.min.js"></script>
  <script src="<?php echo $url;?>js/bootstrap.min.js"></script>
  <script src="<?php echo $url;?>js/jquery.easing.min.js"></script>
  <script src="<?php echo $url;?>js/wow.min.js"></script>
  <script src="<?php echo $url;?>js/jquery.scrollTo.js"></script>
  <script src="<?php echo $url;?>js/jquery.appear.js"></script>
  <script src="<?php echo $url;?>js/stellar.js"></script>
  <script src="<?php echo $url;?>plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
  <script src="<?php echo $url;?>js/owl.carousel.min.js"></script>
  <script src="<?php echo $url;?>js/nivo-lightbox.min.js"></script>
  <script src="<?php echo $url;?>js/custom.js"></script>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <div id="wrapper">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left">Selamat Datang Diwebsite Kami</p>
            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">Date : <?php echo date('d-M-Y');?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
          
                    <img src="admin/data/image/logo/logo.png" alt="" width="50" />
                    <b><?php echo ucwords($judul);?></b>
        </div>

        
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
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
    </nav>

<br>
<br>
<br>
<section id="service" class="home-section nopadding paddingtop-60">

      <div class="container">

        <div class="row">
<?php include 'halaman.php';?>
</div>
</div>

</section>

<div class="content">
	<div class="container">

</div>
</div>


<footer>

<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4">
      <div class="wow fadeInDown animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">
        <div class="widget">
          <h5>Tentang</h5>
          <p><?php echo ucwords($judul);?></p>
        </div>
      </div>
      
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="wow fadeInDown animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">
        <div class="widget">
          <h5>Contact</h5>
          
          <ul>
            
            <li>
              <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
          </span><?php echo ucwords($telepon);?> 
            </li>
            <li>
              <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
          </span> <?php echo ucwords($email);?>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="wow fadeInDown animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">
        <div class="widget">
          <h5>Alamat</h5>
          <p><?php echo ucwords($alamat);?></p>

        </div>
      </div>
      <div class="wow fadeInDown animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">
        <div class="widget">
          <h5>Follow us</h5>
          <ul class="company-social">
            <li class="social-facebook"><a href="<?php echo ($facebook);?>"><i class="fa fa-facebook"></i></a></li>
            <li class="social-twitter"><a href="<?php echo ($twitter);?>"><i class="fa fa-twitter"></i></a></li>
            <li class="social-google"><a href="<?php echo ($google);?>"><i class="fa fa-google-plus"></i></a></li>
            <li class="social-dribble"><a href="<?php echo ($instagram);?>"><i class="fa fa-instagram"></i></a></li>
            
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="sub-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="wow fadeInLeft animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
          <div class="text-left">
            <p><?php echo $copyright;?></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="wow fadeInRight animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">
          <div class="text-right">
            <div class="credits">
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</footer>
</body>

</html>
