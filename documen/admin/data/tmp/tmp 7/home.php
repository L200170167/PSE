
	<center><h3><?php sambutan(); ?></h3>
	<br>
	<img width="700" src="<?php echo $background; ?>">
	</center>
	
<!--
			   <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">0</p>
                    <p class="text-muted">Menu</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">0</p>
                    <p class="text-muted">Menu</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">0</p>
                    <p class="text-muted">Menu</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">0</p>
                    <p class="text-muted">Menu</p>
                </div>
             </div>
		     </div>
			</div>
			
			
			                     
                   
<?php $sql = "select table_name from information_schema.tables where table_schema='$database'"; $result = @mysql_query($sql); while($row = @mysql_fetch_array($result)) { $tabel = $row[0]; 
?>
		
                        <div class="col-md-3 col-sm-12 col-xs-12">  
						 <div class="panel panel-primary text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="fa fa-edit fa-5x"></i>
                            <h3><?php total($tabel,""); ?></h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            <?php echo $tabel;?>
							<br>
							<a href="<?php echo "../".$tabel."/"; index();?>">Detail</a>
                        </div>
						</div>
						</div>   
<?php } ?>

		
      <br> 
-->	  
                       
			