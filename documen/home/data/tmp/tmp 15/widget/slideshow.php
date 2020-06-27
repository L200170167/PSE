<?php 
function slideshow()
{
	include_once "home/include/settings/settings.php";
	?>

 <div class="banner">
   	  <div class="container_wrap">
   		<h1><b>SELAMAT DATANG </b>DIWEBSITE KAMI</h1>
   		
		    <img src="<?php echo $slide_a1;?>">        		
   		    <div class="clearfix"></div>
         </div>
   </div>
   
    <div class="content_top">
   	  <div class="container">
   		<div class="col-md-4 bottom_nav">
   		   <div class="content_menu">
				
			</div>
		</div>
		<div class="col-md-12 content_dropdown1">
		   <marquee><font color="orange"><?php echo $judul_slide;?></font></marquee>
		</div>
		
   	</div>
   </div>

<?php } ?>