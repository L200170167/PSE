
<!DOCTYPE html>
<html lang="zxx">
<?php 

$url = "home/data/tmp/tmp 2/grocery_shoppy-web/";
$komponen = "home/data/tmp/tmp 2/";
include 'home/include/all_include.php';
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="<?php echo $url;?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo $url;?>css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo $url;?>css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo $url;?>css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/jquery-ui1.css">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<div class="header-most-top">
		<p>Selamat Datang Di aplikasi <?php echo $judul;?></p>
	</div>
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<div class="col-md-4 logo_agile">
				<h2>
					<a href="#">
						<img width="50" src="admin/data/image/logo/logo.png" alt=" " />&nbsp;<span></span> <?php echo ucwords($judul);?>
					</a>
				</h2>
			</div>
			<div class="col-md-8 header">
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
		 <li class="nav-item"> <a class="nav-link" href="<?php echo $i->l;?>"><span class="fa fa-pencil-square-o" aria-hidden="true"></span><?php echo $i->n;?></a> </li>
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
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="#">PAGE</a>
						<i>/</i>
					</li>
					<li><?php echo $_GET['p'];?></li>
				</ul>
			</div>
		</div>
	</div>
	
	<?php include 'halaman.php';?>	
	

	
			<div class="w3l-grids-footer">
					<div class="clearfix"></div>
			</div>
	<center>
		<div class="copy-right">
		<div class="container">
			<p><?php echo $copyright;?></a>
			</p>
		</div>
	</div>	
		
			</center>
	

	
	<script src="<?php echo $url;?>js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo $url;?>js/jquery.magnific-popup.js"></script>
	<script src="<?php echo $url;?>js/minicart.js"></script>
	<script src="<?php echo $url;?>js/jquery-ui.js"></script>
	<script src="<?php echo $url;?>js/jquery.flexisel.js"></script>
	<script src="<?php echo $url;?>js/SmoothScroll.min.js"></script>
	<script src="<?php echo $url;?>js/move-top.js"></script>
	<script src="<?php echo $url;?>js/easing.js"></script>
	<script src="<?php echo $url;?>js/bootstrap.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	
</body>
</html>