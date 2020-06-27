<?php 
function slideshow()
{
	include_once "home/include/settings/settings.php";
	?>
	
<div class="banner">
	<div class="container">
		<div class="banner_desc">
			<h1><font color="black"><?php echo $judul_slide;?></h1>
			<div class="button">
			      <a href="<?php echo $link_slide;?>" class="hvr-shutter-out-horizontal"><?php echo $tombol_slide;?></a>
			    </div>
		</div>
	</div>
</div>
<?php } ?>