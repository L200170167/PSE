<?php 
function slideshow()
{ 
	include_once "home/include/settings/settings.php";
	?>
	
	<div class="content-middle">
				<div class="middle-content">
					<div class="middle">
						<h3><?php echo $judul_slide;?></h3>						
					</div>
						<a href="<?php echo $link_slide;?>" class="get"><?php echo $tombol_slide;?></a>
				</div>
					<div class="clearfix"> </div>
			</div>

	
<?php } ?>