<?php 

$url = "home/data/tmp/tmp 8/electronic_store/";
$komponen = "home/data/tmp/tmp 8/";
include 'home/include/all_include.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo $url;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $url;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $url;?>css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $url;?>css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $url;?>css/font-awesome.css" rel="stylesheet"> 
<script src="<?php echo $url;?>js/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo $url;?>css/jquery.countdown.css" />
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
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
	<script type="text/javascript" src="<?php echo $url;?>js/bootstrap-3.1.1.min.js"></script>
	<div class="header" id="home1">
		<div class="container">
			
			<div>
				<Center><h1><img width="50" src="admin/data/image/logo/logo.png" alt=" " /><a href="index.php"><?php echo ucwords($judul);?><span><?php echo $keterangan_aplikasi;?></span></a></h1>Selamat Datang Diwebsite Kami</center>
				
			</div>
			<div class="agileits_social_button">
						<ul>
						<li><a href="<?php echo $facebook;?>" class="facebook"> </a></li>
							<li><a href="<?php echo $twitter;?>" class="twitter"> </a></li>
							<li><a href="<?php echo $google;?>" class="google"> </a></li>
							<li><a href="#" class="pinterest"> </a></li>
						</ul>
					</div>

					
		</div>
	</div>
	
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
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
			</nav>
		</div>
	</div>

	 <?php include 'halaman.php';?>	



	
	<script src="<?php echo $url;?>js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
</body>
</html>