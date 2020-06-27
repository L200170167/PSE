<?php
include '../include/function/login.php';
$default_url = '../data/tmp/tmp 7';
$tema = '7-binary-Admin-v1.1';
$url = $default_url.'/'.$tema;
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo $url ?>/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo $url ?>/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo $url ?>/assets/css/custom.css" rel="stylesheet" />
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style type="text/css">
    body{
    	background-image: url('../data/image/background/background1.png');
    	background-repeat:no-repeat;
 		background-size:cover;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
               
               
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <center>    <h4> LOGIN ADMINISTRATOR</h4></center>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="username" class="form-control" placeholder="Your Username " />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" class="form-control"  placeholder="Your Password" />
                                        </div>
                                   
                                     <center>
                                     <button type ="submit" class="btn btn-warning btn-lg " value="login" name="login">&nbsp;
									 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 Login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
									 <br>
									 <br><a  href="../../" class="btn btn-warning btn-lg " > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cancel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									 </center>

                                    <hr />
                                    
                                    </form> 
									<center>
									
									</center>
                            </div>
                          
                        </div>
                    </div>
                
                
        </div>
    </div>

    <script src="<?php echo $url ?>/assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo $url ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $url ?>/assets/js/jquery.metisMenu.js"></script>
    <script src="<?php echo $url ?>/assets/js/custom.js"></script>
   
</body>
</html>
