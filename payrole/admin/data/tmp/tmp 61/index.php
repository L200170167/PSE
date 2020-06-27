<?php 
    $url = '../../../data/tmp/tmp 61/CoolAdmin-master/';
    include '../../../include/all_include.php';
    include '../../../include/function/session.php'; 
	?>


    <!-- Fontfaces CSS-->
    <link href="<?php echo $url; ?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo $url; ?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo $url; ?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo $url; ?>css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        
		

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                
                    <img src="<?php echo $logo; ?>" width="50" alt="Cool Admin" />&nbsp;&nbsp;<?php echo ucwords($siapa);?>
                
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        

 <!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
                <li class="treeview">
                    <a href="<?php echo $i->l;?>">
                        <i class="<?php echo $i->i;?>"></i>
                        <span><?php echo $i->n;?></span>

                    </a>
                </li>
                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->

              
			
			<li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="<?php echo $i->i;?>"></i><?php echo $i->n;?> &nbsp;&nbsp;<i class="fa fa-angle-down"></i></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
 <?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
                        <li>
                            <a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
                                <?php echo $i1->n;?></a>
                        </li>
                        <?php }} ?>
                            </ul>
                        </li>
                        

            <!-- /MULTI -->
            <?php }} ?>
 <!-- /MENU -->
						</ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                              <?php echo ucwords($judul); ?>
							  
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                               </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo $avatar; ?>" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo ucwords($siapa);?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?php echo $avatar; ?>" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo ucwords($siapa);?></a>
                                                    </h5>
                                                    <span class="email"><?php echo ucwords($judul);?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?php home(); ?>">
                                                        <i class="zmdi zmdi-account"></i>Home</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?php logout(); ?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                        </div>
                       
                       
                      <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('<?php echo $url; ?>images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i> Halaman : Menu <?php tabelnomin(); ?></h3>
                                        <button class="au-btn-plus">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task__title">
                                           <?php include 'halaman.php'; ?>
                                        </div>
                                       
                                       
                                    </div>
                                </div>
                            </div>
                       </div>
					   
					    
                      
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo $url; ?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo $url; ?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo $url; ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo $url; ?>vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo $url; ?>vendor/wow/wow.min.js"></script>
    <script src="<?php echo $url; ?>vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo $url; ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo $url; ?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo $url; ?>vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo $url; ?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo $url; ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo $url; ?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo $url; ?>vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?php echo $url; ?>js/main.js"></script>

</body>

</html>
<!-- end document-->
