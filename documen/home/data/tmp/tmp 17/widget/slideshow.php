<?php 
function slideshow()
{
	include_once "home/include/settings/settings.php";
	?>
<div class="albums"> 
		<div class="w3lalbums-grid">
			<div class="col-md-6 col-sm-6 albums-left"> 
				<div class="wthree-almubimg">  
				</div>
			</div>
			<div class="col-md-6 col-sm-6 albums-right"><br>
				<h4><?php echo $judul_slide;?></h4>	<br>
				<a href="<?php echo $link_slide;?>" class="btn btn-info"><?php echo $tombol_slide;?> </a>	<br>
				<br>
			</div>
			<div class="clearfix"></div>
		</div> 
		
		<div class="clearfix"></div>  
	</div>

<?php } ?>