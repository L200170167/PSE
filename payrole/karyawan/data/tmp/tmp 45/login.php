
	<?php
$default_url = '../data/tmp/tmp 45';
$tema = 'pacificonis-material-design/';
$url = $default_url.'/'.$tema;
?>
<?php include '../include/function/login.php';?>





  <link rel="stylesheet" href="<?php echo $url;?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/animate.css/animate.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/metisMenu/dist/metisMenu.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/Waves/dist/waves.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>bower_components/toastr/toastr.css">


<link rel="stylesheet" href="<?php echo $url;?>bower_components/datatables/media/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo $url;?>css/style.css">

<div class="row">

<br>
<br>
<br><div class="col-md-4">
</div>
        <div class="col-md-4">
          <div class="content-box">
            <div class="head success-bg clearfix">
              <h5 class="content-title pull-left">FORM LOGIN</h5>
              <div class="functions-btns pull-right">
                
                <a class="close-btn" href="../../"><i class="zmdi zmdi-close"></i></a>
              </div>
            </div>

            <div class="content">
               <center><p><?= ucwords($judul);?></p></center>
			   <hr>
                <form action='' method='POST'>
                  <div class="form-group">
                    <label class="control-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password">
                  </div>
                  <div class="form-group">
                    
                  </div>
                   <div class="form-group">
                   <button type="submit" type='submit' name="login" class="btn btn-block btn-success">
                                LOGIN
                            </button>
							
							<a href="../../" class="btn btn-block btn-success"><font color="white">CANCEL</font></a>
                  </div>
				   <br>
				  <center><?php echo $copyright; ?></center>
				  <br>
                </form>
            </div>
          </div>
        </div>

		</div>