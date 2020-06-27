<?php 
$url = "home/data/tmp/tmp 37/bs-speak-multipager/";
$komponen = "home/data/tmp/tmp 37/";
include 'home/include/all_include.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo $url;?>assets/css/bootstrap.css" rel="stylesheet" />
     <!--  Font-Awesome Style -->
    <link href="<?php echo $url;?>assets/css/font-awesome.min.css" rel="stylesheet" />
     <!--  Font-Awesome Animation Style -->
    <link href="<?php echo $url;?>assets/css/font-awesome-animation.css" rel="stylesheet" />
     <!--  Pretty Photo Style -->
    <link href="<?php echo $url;?>assets/css/prettyPhoto.css" rel="stylesheet" />
        <!--  Google Font Style -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!--  Custom Style -->
    <link href="<?php echo $url;?>assets/css/style.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
 
<body>

   <div class="navbar navbar-default navbar-fixed-top menu-back">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

              
                   <img width="200" src="admin/data/image/logo/logo.png" alt=""></a>&nbsp;&nbsp;<font color="white"><?php echo  ucwords($judul);?></font>
              
            </div>
			
            <div class="navbar-collapse collapse" >
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
			<li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout">Logout<i class="fa fa-bars"></i></a> </li>
			<?php	 
			}
			else
			{
			?>
			

<li class="dropdown">
                        <a href="#">Login <i class="fa fa-bars"></i>
                        
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left" style="display: none;">

                            <li>
                                <a href="admin">
                                    <i class="fa fa-user"></i>Admin
              <span>Click untuk Login</span>
                                </a>

                            </li>
                             
                           
                           <li>
                                <a href="karyawan">
                                    <i class="fa fa-users"></i>Karyawan
             <span>Click untuk Login</span>
                                </a>

                            </li>
                             
                           
                        </ul>
                    </li>
					
			<?php
			}
		}
		else
		{
		?>
		 <li class="nav-item"> <a class="nav-link" href="<?php echo $i->l;?>"><?php echo $i->n;?><i class="fa fa-bars"></i></a> </li>
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
    </div>
    <!--./ Top Menu End -->
    
   
   
   <?php include 'halaman.php';?>
<h2>&nbsp;</h2>
   <div id="welocme-note">

        <div class="welcome-div">
            <i class="fa fa-paper-plane-o fa-2x"></i><span>Website <?php echo ucwords($judul);?></span>
        </div>

    </div>
   

    <!--./ footer-sec  End -->
    <div id="footser-end">
        <div class="container">

            <div class="row">
              
            </div>

        </div>
    </div>
    <!--./ footer-end End -->
    <!--  Jquery Core Script -->
    <script src="<?php echo $url;?>assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="<?php echo $url;?>assets/js/bootstrap.js"></script>
        <!--  Custom Scripts -->
    <script src="<?php echo $url;?>assets/js/custom.js"></script>
   
</body>
</html>
