<?php
session_start();
///koneksi ke database 
$koneksi = new mysqli('localhost','root','','produksi');

if(!isset($_SESSION['admin'])){
    echo "<script>alert('anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PT Textile Sejahtera</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 26 Juni 2020 &nbsp; <a href="login.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li><a href="index.php?halaman=home"><i class="fa fa-dashboard fa-3x"></i> Home</a></li>
                    <li><a href="index.php?halaman=data_barang"><i class="fa fa-dashboard fa-3x"></i> Data Barang</a></li>
                    <li><a href="index.php?halaman=data_produksi"><i class="fa fa-dashboard fa-3x"></i> Data Produksi</a></li>
                    <li><a href="index.php?halaman=hasil_produksi"><i class="fa fa-dashboard fa-3x"></i> Hasil Produksi</a></li>
                    <li><a href="index.php?halaman=barang_keluar"><i class="fa fa-dashboard fa-3x"></i> Barang Keluar</a></li>
                    <li><a href="index.php?halaman=logout"><i class="fa fa-dashboard fa-3x"></i> Logout</a></li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">  
                <?php
                if (isset($_GET['halaman'])){
                    if ($_GET['halaman']=="data_barang"){
                        include 'data_barang.php';
                    }elseif($_GET['halaman']=="data_produksi"){
                        include 'data_produksi.php';
                }elseif($_GET['halaman']=="hasil_produksi"){
                    include 'hasil_produksi.php';
                }elseif($_GET['halaman']=="barang_keluar"){
                    include 'barang_keluar.php';
                }elseif($_GET['halaman']=="tambahbarang_keluar"){
                    include 'tambahbarang_keluar.php';
                }elseif($_GET['halaman']=="hapusbarang_keluar"){
                    include 'hapusbarang_keluar.php';
                }elseif($_GET['halaman']=="ubahbarang_keluar"){
                    include 'ubahbarang_keluar.php';
                }elseif($_GET['halaman']=="tambahdata_barang"){
                    include 'tambahdata_barang.php';
                }elseif($_GET['halaman']=="hapusdata_barang"){
                    include 'hapusdata_barang.php';
                }elseif($_GET['halaman']=="ubahdata_barang"){
                    include 'ubahdata_barang.php';
                }elseif($_GET['halaman']=="tambahdata_produksi"){
                    include 'tambahdata_produksi.php';
                }elseif($_GET['halaman']=="hapusdata_produksi"){
                    include 'hapusdata_produksi.php';
                }elseif($_GET['halaman']=="ubahdata_produksi"){
                    include 'ubahdata_produksi.php';
                }elseif($_GET['halaman']=="tambahhasil_produksi"){
                    include 'tambahhasil_produksi.php';
                }elseif($_GET['halaman']=="hapushasil_produksi"){
                    include 'hapushasil_produksi.php';
                }elseif($_GET['halaman']=="ubahhasil_produksi"){
                    include 'ubahhasil_produksi.php';
                }elseif($_GET['halaman']=="logout"){
                        include 'logout.php';
                }else{
                    include 'home.php';
                }
                }
                ?>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    </body>
    </html>