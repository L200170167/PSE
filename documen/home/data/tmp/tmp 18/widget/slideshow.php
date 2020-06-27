<?php 
function slideshow()
{
	include_once "home/include/settings/settings.php";
	?>
<div class="banner-agile">
	<div class="container">
		<h2><font color="white"><?php echo $judul_slide;?></font></h2><br>
		<a href="<?php echo $link_slide;?>"><?php echo $tombol_slide;?> </a>	<br>
	</div>
</div>

<?php } ?>