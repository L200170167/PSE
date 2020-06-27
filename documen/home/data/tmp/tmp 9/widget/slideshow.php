<?php 
function slideshow()
{ 
	include_once "home/include/settings/settings.php";
	?>
<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li> 
		</ol>
		<div class="carousel-inner" role="listbox">
			
			
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h3><?php echo $judul_slide;?></h3>
						<a class="hvr-outline-out button2" href="<?php echo $link_slide;?>"><?php echo $tombol_slide;?> </a>
					</div>
				</div>
			</div>


			<div class="item item2"> 
				<div class="container">
					<div class="carousel-caption">
					<h3><?php echo $judul_slide;?></h3>
						<a class="hvr-outline-out button2" href="<?php echo $link_slide;?>"><?php echo $tombol_slide;?> </a>
					</div>
				</div>
			</div>
			<div class="item item3"> 
				<div class="container">
					<div class="carousel-caption">
					<h3><?php echo $judul_slide;?></h3>
						<a class="hvr-outline-out button2" href="<?php echo $link_slide;?>"><?php echo $tombol_slide;?> </a>
					</div>
				</div>
			</div>
			<div class="item item4"> 
				<div class="container">
					<div class="carousel-caption">
					<h3><?php echo $judul_slide;?></h3>
						<a class="hvr-outline-out button2" href="<?php echo $link_slide;?>"><?php echo $tombol_slide;?> </a>
					</div>
				</div>
			</div>
			<div class="item item5"> 
				<div class="container">
					<div class="carousel-caption">
					<h3><?php echo $judul_slide;?></h3>
						<a class="hvr-outline-out button2" href="<?php echo $link_slide;?>"><?php echo $tombol_slide;?> </a>
					</div>
				</div>
			</div> 
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
    </div> 
	<!-- //banner -->
    
	
<?php } ?>