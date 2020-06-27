<?php 
function slideshow()
{
	include_once "home/include/settings/settings.php";
	?>

<!--/banner-->
	<section class="banner-top">
	<div class="banner">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<div class="carousel-caption">
							<h3><?php echo $judul_slide;?></h3>
					
								<a href="<?php echo $link_slide;?>"  role="button"><?php echo $tombol_slide;?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			
		</div>
	

	</div>
	</section>
	<!--//banner-->

<?php } ?>