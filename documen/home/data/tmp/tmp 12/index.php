<?php 
$url = "home/data/tmp/tmp 12/buy_shop-web/";
$komponen = "home/data/tmp/tmp 12/";
include 'home/include/all_include.php';
?>	
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo $url;?>css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="<?php echo $url;?>css/style.css" rel='stylesheet' type='text/css' />
<script src="<?php echo $url;?>js/simpleCart.min.js"> </script>
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<link href="<?php echo $url;?>css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo $url;?>js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
</head>
<body>
<div class="header_top">
	<div class="container">
		<div class="one-fifth column row_1">
			<span class="selection-box"></span>
         </div>
         <div class="cssmenu">
			<ul>
			    
			</ul>
		 </div>
	</div>
</div>	
<div class="wrap-box"></div>
<div class="header_bottom">
	    <div class="container">
			<div class="col-xs-12 header-bottom-left">
				<div class="col-xs-2 logo">
				
					<h1><img width="30" src="admin/data/image/logo/logo.png" alt=" " />&nbsp;<a href="index.html"><span><?php echo $judul;?></span></a></h1>
				</div>
				<div class="col-xs-6 menu">
		            <ul class="megamenu skyblue">
				     
					 
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
	    
        <div class="clearfix"></div>
	 </div>
</div>
<div class="header_top">
	<div class="container">
		<div class="one-fifth column row_1">
			<span class="selection-box"><select class="domains valid" name="domains">
		     
		      
		    </select></span>
         </div>
         <div class="cssmenu">
			<ul>
			   <li class="active"><a href="#">Page : <?php echo $_GET['p'];?></a></li> 
			</ul>
		 </div>
	</div>
</div>

	<?php include 'halaman.php';?>
		
	<hr>	
	

<div class="footer">
	<div class="container">
	   <div class="footer_top">
		<div class="col-md-4 box_3">
			<h3>Social Media</h3>
			
           <ul class="footer_social">
			  <li><a href="<?php echo $facebook;?>"> <i class="fb"> </i> </a></li>
			  <li><a href="<?php echo $twitter;?>"><i class="tw"> </i> </a></li>
			  <li><a href="<?php echo $google;?>"><i class="google"> </i> </a></li>
			  <li><a href="<?php echo $instagram;?>"><i class="instagram"> </i> </a></li>
		   </ul>
		</div>
		<div class="col-md-4 box_3">
			 <h3>Contact</h3>
			 <dl>
                 <dt></dt>
                 <dd>Telephone:<span> <?php echo $telepon;?></span></dd>
                 <dd>E-mail:&nbsp; <a href="<?php echo $email;?>"><?php echo $email;?></a></dd>
              </dl>
		</div>
		<div class="col-md-4 box_3">
			<h3>Alamat</h3>
			<ul class="list_1">
				<li><a href="#"><?php echo $alamat;?></a></li>
			
			</ul>
			
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
		</div>
		<div class="footer_bottom">
			<div class="copy">
                <p><?php echo $copyright;?> </p>
	        </div>
	    </div>
	</div>
</div>
</body>

</html>		