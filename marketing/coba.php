<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();


include "config/koneksi.php";
include "library/oop.php";
$perintah = new oop();
@$table = "tbl_user";

@$username = $_POST['username'];
@$password = $_POST['password'];

@$redirect = "dashboard_user.php?menu=home";

if (isset($_POST['login'])) {
    $perintah->login($con, $table, $username, $password, $redirect);
}

    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>EithreeShop</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="logo span3">
						
					<a class="brand" href="#"><img src="img/logo2.png" alt="Logo"></a>
						
				</div>
				<div class="span9">
					
					<div class="navbar navbar-inverse">
			    		<div class="navbar-inner">
			          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			          		</a>
			          		<div class="nav-collapse collapse">
			            		<ul class="nav">
			              			<li class="active"><a href="index.php">Home</a></li>
			              			<li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori<b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                  				<li><a href="index.html">Makanan Ringan</a></li>
			                  				<li><a href="index.php">Frozen Food</a></li>
			                			</ul>
			              			</li>
			              			<li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                  				<li><a href="loginadmin.php">Admin</a></li>
			                  				<li><a href="loginuser.php">Konsumen</a></li>
			                			</ul>
			              			</li>
			            		</ul>
			          		</div>
			        	</div>
			      	</div>
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="row">
		<div class="panel panel-default">
      <form action="dashboard_user.php" method="post">
        <div class="panel-body">
        <div class="col-md-4 col-md-offset-5 kotak">
          <br>
          <br>
          <center><h3>Silahkan Login ..</h3>  </center>
          <div class="input-group">
            <center><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" class="form-control" placeholder="Username" name="username"> </center>
          </div>
          <div class="input-group">
            <center><span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" class="form-control" placeholder="Password" name="password"> </center>
          </div>
          <div class="input-group">     
            <center><input type="submit" class="btn btn-primary" value="Login" name="login"></center>
            <center><a href="daftarakun.php"><h4>ingin daftar?<h4></a>  </center>
          </div>
        </div>
          </div>
      </form>
    </div>
	</div>
		

	<div id="copyright">

		<div class="container">
		
			<p>
				Copyright &copy; <a href="http://www.niqoweb.com">DistroIT 2015</a> <a href="http://bootstrapmaster.com" alt="Bootstrap Themes">Bootstrap Themes</a> designed by BootstrapMaster
			</p>
	
		</div>
</div>
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script defer="defer" src="js/custom.js"></script>

</body>
</html>