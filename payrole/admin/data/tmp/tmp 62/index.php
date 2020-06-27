<?php 
    $url = '../../../data/tmp/tmp 62/materialize-material/';
    include '../../../include/all_include.php';
    include '../../../include/function/session.php'; 
	?>


    <link href="<?php echo $url; ?>css//bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo $url; ?>css//materialize.css" type="text/css" rel="stylesheet">
    
    <link href="<?php echo $url; ?>css//style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="<?php echo $url; ?>css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?php echo $url; ?>vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="<?php echo $url; ?>vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="" class="brand-logo darken-1">
                    <img src="<?php echo $logo; ?>" alt="materialize logo">
                    <span class="logo-text hide-on-med-and-down"><?php echo ucwords($siapa);?></span>
                  </a>
                </h1>
              </li>
            </ul>
            <div class="header-search-wrapper hide-on-med-and-down">
              
            </div>
            <ul class="right hide-on-med-and-down">
              
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="<?php echo $avatar; ?>" alt="avatar">
                    <i></i>
                  </span>
                </a>
              </li>
            
            </ul>
        
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="<?php home(); ?>" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Home</a>
              </li>
            
              <li>
                <a href="<?php logout(); ?>#" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
              <div class="row">
                <div class="col col s4 m4 l4">
                  <img src="<?php echo $avatar; ?>" alt="" class="circle responsive-img valign profile-image cyan">
                </div>
                <div class="col col s8 m8 l8">
                  <ul id="profile-dropdown-nav" class="dropdown-content">
                    <li>
                <a href="<?php home(); ?>" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Home</a>
              </li>
            
              <li>
                <a href="<?php logout(); ?>#" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
                  </ul>
                  <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?php echo $siapa;?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <p class="user-roal">Management Menu</p>
                </div>
              </div>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
             
			 
				
				
				 <!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
               
				
				 <li class="bold">
                  <a href="<?php echo $i->l;?>" class="waves-effect waves-cyan">
                      <i class="material-icons">assignment_ind</i>
                      <span class="nav-text"><?php echo $i->n;?></span>
                    </a>
                </li>
                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->

				<li>
                  <a href="#" data-activates="<?php echo $i->id;?>" class="dropdown-button waves-effect white-text" >
                      <i class="material-icons">assignment</i>
                      <font color="#212121"><?php echo $i->n;?></font>
                    </a>
                </li>
			 
				
				 <ul id="<?php echo $i->id;?>" class="dropdown-content">
				 
				 
				 <?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
                         <li>
                      <a href="<?php echo $i1->l;?>" class="grey-text text-darken-1">
                        <i class="material-icons">assignment_turned_in</i> <?php echo $i1->n;?></a>
                    </li>
                        <?php }} ?>
                   
                  
                  </ul>
				  
				  
	
               
                            
              

            <!-- /MULTI -->
            <?php }} ?>
 <!-- /MENU -->
				
               
              </ul>
            </li>
          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
            <i class="material-icons">menu</i>
          </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
          <!--start container-->
          <div class="container">
           
            <!--card widgets start-->
            <div id="card-widgets">
              <div class="row">
              <div class="col-12">
                  <div id="profile-card" class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="<?php echo $url; ?>images/gallary/12.png" alt="user bg">
                    </div>
                    <div class="card-content">
                      <img src="<?php echo $logo; ?>" alt="" class="circle responsive-img activator card-profile-image blue lighten-1 padding-2">
                     <span class="card-title activator grey-text text-darken-4">
<?php tabelnomin(); ?></span>
                      
                     <?php include 'halaman.php'; ?>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
           
		   
		   
		   
          </div>
          <!--end container-->
        </section>
        
		
      </div>
      <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    
    <!-- END FOOTER -->
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo $url; ?>vendors/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo $url; ?>js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo $url; ?>vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo $url; ?>js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo $url; ?>js/custom-script.js"></script>
  </body>
</html>