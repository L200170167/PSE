<?php 
function slideshow()
{ 
	include_once "home/include/settings/settings.php";
?>


	
			<div class="col-sm-12">
				<!-- Carousel -->
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="<?php echo $slide_a1;?>" alt="First slide">
							<!-- Static Header -->
							<div class="header-text hidden-xs">
								<div class="col-md-12 text-center">
									<h2><?php echo $judul_slide;?> </h2>
									<br>
									<a href="<?php echo $link_slide;?> " class="btn btn-info"><?php echo $tombol_slide;?> </a>
									<br>
								</div>
							</div><!-- /header-text -->
						</div>
						<div class="item">
							<img src="<?php echo $slide_a2;?>" alt="Second slide">
							<!-- Static Header -->
							<div class="header-text hidden-xs">
								<div class="col-md-12 text-center">
								<h2><?php echo $judul_slide;?> </h2>
									<br>
									<a href="<?php echo $link_slide;?> " class="btn btn-info"><?php echo $tombol_slide;?> </a>
									<br>
								</div>
							</div><!-- /header-text -->
						</div>
						<div class="item">
							<img src="<?php echo $slide_a3;?>" alt="Third slide">
							<!-- Static Header -->
							<div class="header-text hidden-xs">
								<div class="col-md-12 text-center">
								<h2><?php echo $judul_slide;?> </h2>
									<br>
									<a href="<?php echo $link_slide;?> " class="btn btn-info"><?php echo $tombol_slide;?> </a>
									<br>
								</div>
							</div><!-- /header-text -->
						</div>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="<?php echo $url;?>#carousel-example-generic" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="<?php echo $url;?>#carousel-example-generic" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div><!-- /carousel -->
			</div>
		
		</div>
	
	


<?php } ?>