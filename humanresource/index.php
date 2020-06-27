<?php

	session_start();
	include "include/koneksi.php";
	$lowongan = new Lowongan();
	if(isset($_SESSION['user'])){
		echo "<script language='javascript'> window.location.href='user/index.php'</script>";
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Lowongan Kerja</title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet" media="screen">
	<script src="js/modernizr.custom.js"></script>
	</head>
  <body>
<div>
	<style type="text/css">
    a{text-decoration: none; font-size: 20px;font-family: sans-serif;padding: 14px 10px}
    ul{padding: 14px}
    li{list-style: none; display: inline;}
    li a{background: #222; color:#d4d4d4;}
    li a:hover{background: #4da4ff; color:#fff;}
    .navi{background: #222; height: 50px}
</style>
 
<nav class="navi">
    <ul>
        <li><a href="#intro">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#penerimaan">Penerimaan</a></li>
        <li><a href="#galeri">Galeri</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="admin/login.php">Administrator</a></li>
    </ul>
</nav>
</div>
	  <!-- intro area -->	  
	  <div id="intro">
	  
			<div class="intro-text">
				<div class="container">
					<div class="row">
					
						
					<div class="col-md-12">
						
						<div class="brand">
							<font size="10" face="Broadway" color="white"><b>PT Textile Sejahtera</b></font><br>
							<img src='img/2.png' width="500" height="300">
							<h1><a href="index.html">Lowongan Kerja<br></a></h1>
							
							<p><span>Bergabung bersama kami untuk mendapatkan karir yang lebih baik</span></p>
							<?php
								if(isset($_SESSION['user'])){
							?>
								<button type="button" class="btn btn-success btn-lg">My Profile</button>
							<?php
								}else{
							?>
							<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalRegister">Register</button>
							<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalLogin">Login</button>
							<?php
								}
							?>
						</div>
					</div>
					</div>
				</div>
		 	</div>
			
	 </div>
	  

	  
	  
	  <!-- About -->
	  <section id="about" class="home-section bg-white">
		<div class="container">
			  <div class="row">
				  <div class="col-md-offset-2 col-md-8">
				<h2>ABOUT</h3>		  
						PT. Textile Sejahtera merupakan sebuah perusahaan yang bergerang dibindang textile<br>
			  	yang beralamatkan di Jl. Ahmad Yani, Pabelan, Kartasura, Surakarta 57162, Jawa Tengah, Indonesia
			  	</div>	
			  	</div>  
		  </div>	  
	  </section>
	  
		<!-- spacer -->	  
		<section id="spacer1" class="home-section spacer">	
           <div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="color-light">
						<h2 class="wow bounceInDown" data-wow-delay="1s">Partnership, Leadership</h2>
						<?php
							if(isset($_SESSION['user'])){
						?>
							<button type="button" class="btn btn-success btn-lg lead wow bounceInUp" data-wow-delay="1s">My Profile</button>
						<?php
							}else{
						?>
						<button type="button" class="btn btn-primary btn-lg lead wow bounceInUp" data-wow-delay="1s" data-toggle="modal" data-target="#myModalRegister">Register</button>
						<button type="button" class="btn btn-info btn-lg lead wow bounceInUp" data-wow-delay="1s" data-toggle="modal" data-target="#myModalLogin">Login</button>
						<?php
							}
						?>
						</div>
					</div>				
				</div>
            </div>
		</section>	  
	  
	  <!-- Services -->
	 <section id="penerimaan" class="home-section bg-white">
		<div class="container">
			  <div class="row">
				  <div class="col-md-offset-2 col-md-8">
					<div class="section-heading">
					 <h2>Penerimaan Pegawai</h2>
					 <p>Sistem Pendukung Keputusan Penerimaan Pegawai</p>
					</div>

					<table class="table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Penerimaan</th>
								<th>Kuota</th>
							</tr>
						</thead>

					<?php
						$get= $lowongan->GetData("where status='1'");
						$no = 1;
						while($row = $get->fetch()){
							echo "<tr>
								<td>$no</td>
								<td>$row[lowongan]</td>
								<td>$row[kuota]</td>
								<td><a href='#' class='show_rincian' data-id='$row[id_lowongan]' data-wow-delay='1s' data-toggle='modal' data-target='#myModalSyarat'>Syarat</a></td>
								</tr>";
						}
					?>
					</table>
				  </div>
			  </div>
			  <div class="row">
			  </div>	
		</div>
	</section>
	
	 <!-- Works -->
	
	
		<!-- spacer 2 -->	  
		<section id="spacer2" class="home-section spacer">	
           <div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="color-light">
						<h2 class="wow bounceInDown" data-wow-delay="1s">Come Join to Our Team</h2>
						<p class="lead wow bounceInUp" data-wow-delay="2s"></p>
						<?php
							if(isset($_SESSION['user'])){
						?>
							<button type="button" class="btn btn-success btn-lg lead wow bounceInUp" data-wow-delay="1s">My Profile</button>
						<?php
							}else{
						?>
						<button type="button" class="btn btn-primary btn-lg lead wow bounceInUp" data-wow-delay="1s" data-toggle="modal" data-target="#myModalRegister">Register</button>
						<button type="button" class="btn btn-info btn-lg lead wow bounceInUp" data-wow-delay="1s" data-toggle="modal" data-target="#myModalLogin">Login</button>
						<?php
							}
						?>
						</div>
					</div>				
				</div>
            </div>
		</section>	
	  
	 <!-- Contact -->
	  <section id="contact" class="home-section bg-white">
	  	<div class="container">
			  <div class="row">
				  <div class="col-md-offset-2 col-md-8">
					<div class="section-heading">
					 <h2>Hubungi Kami</h2>
					 <p>Contact via form below and we will be get in touch with you within 24 hours. </p>
					</div>
				  </div>
			  </div>

	  		<div class="row">
	  			<div class="col-md-offset-1 col-md-10">

				<form class="form-horizontal" role="form">
				  <div class="form-group">
					<div class="col-md-offset-2 col-md-8">
					  <input type="text" class="form-control" id="inputName" placeholder="Name">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-offset-2 col-md-8">
					  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-offset-2 col-md-8">
					  <input type="text" class="form-control" id="inputSubject" placeholder="Subject">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-offset-2 col-md-8">
					  <textarea name="message" class="form-control" rows="3" placeholder="Message"></textarea>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-offset-2 col-md-8">
					 <button type="button" class="btn btn-theme btn-lg btn-block">Send message</button>
					</div>
				  </div>
				</form>
	
	  			</div>
			
				
	  		</div>
			<div class="row mar-top30 ">
				<div class="col-md-offset-2 col-md-8">
					<h5>We're on social networks</h5>
					<ul class="social-network">
						<li><a href="#">
						<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
						</span></a>
						</li>
						<li><a href="#">
						<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-dribbble fa-stack-1x fa-inverse"></i>
						</span></a>
						</li>
						<li><a href="#">
						<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
						</span></a>
						</li>
						<li><a href="#">
						<span class="fa-stack fa-2x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
						</span></a>
						</li>
					</ul>
				</div>				
			</div>

	  	</div>
	  </section>  

<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Login</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="login_user.php">
					<div class="form-group">
                        <input type="text" name="username" class="form-control input-lg" placeholder="Username" tabindex="1">
					</div>
					<div class="form-group">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" tabindex="1">
					</div>
				
			</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Login">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Register</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="register.php">
					<div class="form-group">
                        <input type="text" name="nama_lengkap" class="form-control input-lg" placeholder="Nama Lengkap" tabindex="1">
					</div>
					<div class="form-group">
                        <input type="email" name="email" class="form-control input-lg" placeholder="Email" tabindex="1">
					</div>
					<div class="form-group">
                        <input type="text" name="username" class="form-control input-lg" placeholder="Username" tabindex="1">
					</div>
					<div class="form-group">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" tabindex="1">
					</div>
			</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" value="Register">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="myModalSyarat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Syarat Penerimaan</h4>
			</div>
			<div class="modal-body-syarat">
			</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>Copyright &copy; Novi 2020
				</div>
                <!-- 
                    All links in the footer should remain intact. 
                    Licenseing information is available at: http://bootstraptaste.com/license/
                    You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Mamba
                -->
			</div>		
		</div>	
	</footer>
	 
	 <!-- js -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.smooth-scroll.min.js"></script>
	<script src="js/jquery.dlmenu.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/custom.js"></script>

	<script>
        $(function(){
            $(document).on('click','.show_rincian',function(e){
                e.preventDefault();
                $("#myModalSyarat").modal('show');
                $.post('syarat_lamaran.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body-syarat").html(html);
                    }   
                );
            });
        });
    </script>
  	
</html>