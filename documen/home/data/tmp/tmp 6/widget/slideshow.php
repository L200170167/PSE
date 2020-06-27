<?php 
function slideshow()
{ 
	include_once "home/include/settings/settings.php";
	?>
	
<!-- banner-->
<div class="agile_banner">
<div class="s1">
			<h4><font color="white"><?php echo $judul_slide;?></font></h4>
			<div class="w3-button">
				<div class="w3ls-button">
					<a href="<?php echo $link_slide;?>" class="scroll"><?php echo $tombol_slide;?></a>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>


</div>
<!--/banner-->
	
<?php } ?>