<?php 
$url = "home/data/tmp/tmp 15/hotel_deluxe-web/";
$komponen = "home/data/tmp/tmp 15/";
include 'home/include/all_include.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="<?php echo $url;?>css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="<?php echo $url;?>css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo $url;?>js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo $url;?>js/login.js"></script>
<script src="<?php echo $url;?>js/jquery.easydropdown.js"></script>
<script src="<?php echo $url;?>js/wow.min.js"></script>
<link href="<?php echo $url;?>css/animate.css" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>
</head>
<body>
<div class="header">
		   <div class="col-sm-8 header-left">
					 <div class="logo">
						<a href="#"><img src="<?php echo $url;?>images/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						 
						    <ul class="nav" id="nav">
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
								<div class="clearfix"></div>
							</ul>
							<script type="text/javascript" src="<?php echo $url;?>js/responsive-nav.js"></script>
				    </div>	
				    				
	    		   
	    	    </div>
				<div class="col-sm-4 header_right">
	    		      <div id="loginContainer">&nbsp; <font color="white"><?php echo ucwords($judul);?> - Page : <?php echo $_GET['p'];?></font>
						    <div id="loginBox">                
						        
				              </div>
			             </div>
		                 <div class="clearfix"></div>
	                 </div>
	                <div class="clearfix"></div>
   </div>

   
  
  <?php include 'halaman.php';?>
  <center><h2> <?php echo $judul;?> </h2></center>
   <div class="footer">
   	<div class="container">
   	
		 
			<h1><font color="white">Sosial Media</h1>
			<ul class="footer_social wow fadeInLeft" data-wow-delay="0.4s">
			  <li><a href=""> <i class="fb"> </i> </a></li>
			  <li><a href=""><i class="tw"> </i> </a></li>
			  <li><a href=""><i class="google"> </i> </a></li>
			  <li><a href=""><i class="u_tube"> </i> </a></li>
		 	</ul>
		 	<div class="copy wow fadeInRight" data-wow-delay="0.4s">
              <p> <?php echo $copyright;?></p>
	        </div>
		 
		  
	 
   </div>
</body>
</html>		