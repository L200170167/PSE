<?php
$default_url = '../../../data/tmp/tmp 7';
$tema = '7-binary-Admin-v1.1';
$url = $default_url.'/'.$tema;
include '../../../include/all_include.php';        
include '../../../include/function/session.php'; 
?>
<link href="<?php echo $url; ?>/assets/css/bootstrap.css" rel="stylesheet"/>
<link href="<?php echo $url; ?>/assets/css/font-awesome.css" rel="stylesheet"/>
<link href="<?php echo $url; ?>/assets/css/custom.css" rel="stylesheet"/>
<link
    href='http://fonts.googleapis.com/css?family=Open+Sans'
    rel='stylesheet'
    type='text/css'/>
</head>
<body>
<div id="wrapper">
    <nav
        class="navbar navbar-default navbar-cls-top "
        role="navigation"
        style="margin-bottom: 0">
        <div class="navbar-header">
            <button
                type="button"
                class="navbar-toggle"
                data-toggle="collapse"
                data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php index(); ?>">PEGAWAI</a>
        </div>

        <div
            style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
            <?php echo $formatwaktu; ?>
            &nbsp;
            <a href="<?php logout(); ?>" class="btn btn-danger square-btn-adjust">Logout</a>
        </div>
    </nav>
    <!-- /. NAV TOP -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?php echo $avatar; ?>" class="user-image img-responsive"/>
                </li>

                <!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
                <li>
                    <a href="<?php echo $i->l;?>">
                        <i class="<?php echo $i->i;?> fa-3x"></i>
                        <?php echo $i->n;?>
                    </a>
                </li>

                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->

                <li>
                    <a href="#">
                        <i class="<?php echo $i->i;?> fa-3x"></i>
                        <?php echo $i->n;?>
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
                        <li>
                            <a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
                                <i class="<?php echo $i1->i;?>"></i>
                                <?php echo $i1->n;?></a>
                        </li>
                        <?php }} ?>
                    </ul>
                </li>

                <!-- /MULTI -->
                <?php }} ?>
                <!-- /MENU -->

            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE -->
    <div id="page-wrapper">
        <div id="page-inner">

            <hr/>

            <?php include 'halaman.php'; ?>

            <br>

        </div>
    </div>

</div>
<script src="<?php echo $url; ?>/assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo $url; ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/jquery.metisMenu.js"></script>
<script src="<?php echo $url; ?>/assets/js/custom.js"></script>
</body>
</html>