<?php 
    $url = '../../../data/tmp/tmp 45/pacificonis-material-design/';
    include '../../../include/all_include.php';
    include '../../../include/function/session.php'; 
	?>


  <link rel="stylesheet" href="<?php echo $url;?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/animate.css/animate.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/metisMenu/dist/metisMenu.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/Waves/dist/waves.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/toastr/toastr.css">


<link rel="stylesheet" href="<?php echo $url;?>bower_components/datatables/media/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>css/style.css">



</head>

<body class="icon-menu menu-alt">
  <!--Preloader-->
<div id="preloader">
      <div class="refresh-preloader"><div class="preloader"><i>.</i><i>.</i><i>.</i></div></div>
</div>


  <div class="wrapper">
   <nav class="navbar">
 <div class="navbar-header container">
<a href="#" class="page-title text-uppercase"><img src="<?php echo $logo;?>" width="50"></a>

 </div>
  <div class="navbar-container clearfix">
    <div class="pull-left">

      <a href="#" class="page-title text-uppercase"><?php echo ucwords($judul);?></a>
    </div>

    <div class="pull-right">
      

      <ul class="nav pull-right right-menu">
        <li class="more-options dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">
            <i class="zmdi zmdi-account-circle"></i>
          </a>

          <div class="more-opt-container dropdown-menu">
            <a href="<?php home();?>"><i class="zmdi zmdi-account-o"></i>Home</a>
           
            <a href="<?php logout();?>"><i class="zmdi zmdi-run"></i>Logout</a>
          </div>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
<aside class="sidebar">
  <ul class="nav metismenu">
   
	
	 <!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE
                <li class="treeview">
                    <a href="<?php echo $i->l;?>">
                        <i class="<?php echo $i->i;?>"></i>
                        <span><?php echo $i->n;?></span>

                    </a>
                </li>
				
				-->
				
				<li>
      <a href="<?php echo $i->l;?>"><i class="zmdi zmdi-home"></i><?php echo $i->n;?></a>
    </li>
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->
<li>
      <a href="<?php echo $url;?>#"><i class="zmdi zmdi-view-dashboard"></i><?php echo $i->n;?><span class="zmdi arrow"></span></a>
      <ul class="nav nav-inside collapse">
        <li class="inside-title"><?php echo $i->n;?></li>
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
</aside>

<div class="side-panel">
    <ul class="nav nav-tabs nav-justified m-0">
      <li class="active">
        <a href="<?php echo $url;?>#tab-side-1" data-toggle="tab"><i class="zmdi zmdi-comment-text"></i></a>
      </li>
      <li>
        <a href="<?php echo $url;?>#tab-side-2" data-toggle="tab"><i class="zmdi zmdi-settings"></i></a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade in active" id="tab-side-1">
       <div class="side-title">Activities</div>
        <div class="p-15"> 
          <ul class="timeline">
              <li>
                  <div class="timeline-icon primary-bg"><i class="zmdi zmdi-plus"></i></div>
                  <div class="timeline-body">
                      <div class="timeline-header">
                          <span class="author">Jana Pena is now Follwing you</span>
                          <span class="date">2 min ago</span>
                      </div>
                  </div>
              </li>
              <li>
                  <div class="timeline-icon success-bg"><i class="zmdi zmdi-favorite"></i></div>
                  <div class="timeline-body">
                      <div class="timeline-header">
                          <span class="author">Helen likes your photo</span>
                          <span class="date">23 min ago</span>
                      </div>
                  </div>
              </li>
              <li>
                  <div class="timeline-icon warning-bg"><i class="zmdi zmdi-email"></i></div>
                  <div class="timeline-body">
                      <div class="timeline-header">
                          <span class="author">Colin send email</span>
                          <span class="date">34 min ago</span>
                      </div>
                  </div>
              </li>
              <li>
                  <div class="timeline-icon success-bg"><i class="zmdi zmdi-coffee"></i></div>
                  <div class="timeline-body">
                      <div class="timeline-header">
                          <span class="author">Starbucks invites you</span>
                          <span class="date">44 min ago</span>
                      </div>
                  </div>
              </li>
              <li>
                  <div class="timeline-icon info-bg"><i class="zmdi zmdi-videocam"></i></div>
                  <div class="timeline-body">
                      <div class="timeline-header">
                          <span class="author">Peter added new video</span>
                          <span class="date">56 min ago</span>
                      </div>
                  </div>
              </li>
          </ul>
        </div>
         
          <div class="side-title">Contacts</div>
          <div class="p-15"> 
          <ul class="media-list side-contacts">
              <li class="media notification-message">
                  <div class="media-left">
                      <img class="img-circle avatar" src="<?php echo $url;?>img/contacts/3.png" alt="user">
                  </div>
                  <div class="media-body">
                    <span>Katerina Dankovich</span><br>
                      <span class="contact-status text-success">Online</span>
                  </div>
              </li>
              <li class="media notification-message">
                  <div class="media-left">
                      <img class="img-circle avatar" src="<?php echo $url;?>img/contacts/4.png" alt="user">
                  </div>
                  <div class="media-body">
                    <span>Helen Doe</span><br>
                      <span class="contact-status text-warning">Away</span>
                  </div>
              </li>
              <li class="media notification-message">
                  <div class="media-left">
                      <img class="img-circle avatar" src="<?php echo $url;?>img/contacts/2.png" alt="user">
                  </div>
                  <div class="media-body">
                    <span>Phil Simons</span><br>
                      <span class="contact-status text-success">Online</span>
                  </div>
              </li>
              <li class="media notification-message">
                  <div class="media-left">
                      <img class="img-circle avatar" src="<?php echo $url;?>img/contacts/1.png" alt="user">
                  </div>
                  <div class="media-body">
                    <span>Peter Johnson</span><br>
                      <span class="contact-status text-muted">Offline</span>
                  </div>
              </li>
              <li class="media notification-message">
                  <div class="media-left">
                      <img class="img-circle avatar" src="<?php echo $url;?>img/contacts/5.png" alt="user">
                  </div>
                  <div class="media-body">
                    <span>Kate Owl</span><br>
                      <span class="contact-status text-danger">Busy</span>
                  </div>
              </li>
          </ul>
        </div>
      </div>
      <div class="tab-pane fade" id="tab-side-2">
         <table class="table table-settings">
            <tbody><tr>
                    <td>
                        <h5>Alerts</h5>
                        <p>Sets alerts to get notified when changes occur to get new alerming items</p>
                    </td>
                    <td><div class="checkbox checkbox-primary">
                        <label><input type="checkbox">
                          <i></i></label>
                      </div></td>
                </tr>
                <tr>
                    <td>
                        <h5>Notifications</h5>
                        <p>You will receive notification email for any notifications if you set notification</p>
                    </td>
                    <td>
                    <div class="checkbox checkbox-primary">
                      <label><input type="checkbox" checked>
                        <i></i></label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Messages</h5>
                        <p>You will receive notification on email after setting messages notifications</p>                            
                    </td>
                    <td>
                    <div class="checkbox checkbox-primary">
                      <label><input type="checkbox">
                        <i></i></label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Warnings</h5>
                        <p>You will get warnning only some specific setttings or alert system</p>
                    </td>
                    <td>
                    <div class="checkbox checkbox-primary">
                      <label><input type="checkbox" checked>
                        <i></i></label>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Sidebar</h5>
                        <p>You can hide/show use with sidebar collapsw settings</p>
                    </td>
                    <td>
                    <div class="checkbox checkbox-primary">
                      <label><input type="checkbox" checked>
                        <i></i></label>
                    </div>
                    </td>
                </tr>

        </tbody></table>
      </div>
    </div>
</div>

    <div class="container-fluid">
      <div class="row">
	  
	  
	  <div class="col-md-12">
          <div class="content-box">
            <div class="head success-bg clearfix">
              <h5 class="content-title pull-left"><?php tabelnomin(); ?></h5>
              <div class="functions-btns pull-right">
                <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                <a class="close-btn" href="<?php home();?>"><i class="zmdi zmdi-close"></i></a>
              </div>
            </div>

            <div class="content">
             <?php include 'halaman.php'; ?>
            </div>
          </div>
        </div>
	  
	  </div>
    </div>
    <footer class="page-footer"><?php echo $copyright; ?></footer>
  </div>


   
  <script src="<?php echo $url;?>bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo $url;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo $url;?>bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="<?php echo $url;?>bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js"></script>
  <script src="<?php echo $url;?>bower_components/Waves/dist/waves.min.js"></script>
  


  <script src="<?php echo $url;?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo $url;?>bower_components/datatables.net-responsive/js/dataTables.responsive.js"></script>
  <script src="<?php echo $url;?>bower_components/moment/min/moment.min.js"></script>

  <script src="<?php echo $url;?>bower_components/Chart.js/Chart.js"></script>
  <script src="<?php echo $url;?>bower_components/flot/jquery.flot.js"></script>
  <script src="<?php echo $url;?>bower_components/flot/jquery.flot.resize.js"></script>
  <script src="<?php echo $url;?>bower_components/flot.tooltip/js/jquery.flot.tooltip.js"></script>
  <script src="<?php echo $url;?>bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.js"></script>

    <script src="<?php echo $url;?>js/common.js"></script>
  

</body>
</html>