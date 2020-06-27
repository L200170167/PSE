<?php 

$url = "home/data/tmp/tmp 11/mooroodool-web/";
$komponen = "home/data/tmp/tmp 11/";
include 'home/include/all_include.php';
?>	
<html>
<head>
<link href="<?php echo $url;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="<?php echo $url;?>js/jquery.min.js"></script>
<link href="<?php echo $url;?>css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Vollkorn:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo $url;?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/easing.js"></script>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
					</script>

</head>
<body>
	<div class="header">
		<div class="container">
		<!---->
				<div class="logo">
				<a href="index.php?p=home"><img width="120" src="admin/data/image/logo/logo.png" alt=" " /></a>
				</div>
				<div class="header-right">
				<br>
			<div class="header-bottom">
				<div class="top-nav">
					<span class="menu"> </span>
					<ul>
						
						
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
					<!--script-->
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
			</script>				
		</div>
		
		</div>
		</div>
	</div>
</div>
<div class="content">	
		<div class="container">
		
		<br>
		<br>
	<?php include 'halaman.php';?>
	<br>
	<br>
	<br>
	<br>
	<br>
		</div>
</div>
	<div class="content">	
		<div class="container">
			
			
				
				<!---->
				<div class="grid-top-in">
				<div class="grid-top">
					<div class="col-md-4 top-grid ">
						<h5>Alamat</h5>
						<p class="sed"><?php echo $alamat;?>.</p>
					</div>
					<div class="col-md-4 top-grid">
						<h5>Contact</h5>
							<div class="house">
								<i class="in-house in-on"> </i>
								
								<?php echo $telepon;?>
								
							<div class="clearfix"> </div>
							</div>
					</div>
					<div class="col-md-4 top-grid">
						<h5>GET SOCIAL WITH US!</h5>
							<ul class="social-in">
								<li><a href="<?php echo $facebook;?>"><i> </i></a></li>						
								<li><a href="www.thumblr.com"><i class="thumblr"> </i></a></li>
								
								
							</ul>
							<ul class="social-in">
								<li><a href="<?php echo $twitter;?>"><i class="twitter"> </i></a></li>
								<li><a href="<?php echo $google;?>"><i class="dot"> </i></a></li>
							</ul>
							<div class="clearfix"> </div>
				</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	
			<div class="footer">
				<div class="container">
					 <p class="footer-grid"><?php echo $copyright;?></a> </p>
					
				</div> 	
				 <script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

			</div>

</body>
</html>