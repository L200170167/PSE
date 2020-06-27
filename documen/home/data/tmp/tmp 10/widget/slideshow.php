<?php 
function slideshow()
{ 
	include_once "home/include/settings/settings.php";
	?>
	
	<div class="banner">
		<div class="container">
			<section class="slider">
					<div class="flexslider">
						
					<div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1000%; transition-duration: 0s; transform: translate3d(-1140px, 0px, 0px);"><li class="clone" style="width: 1140px; float: left; display: block;">
								<div class="agileits_w3layouts_banner_info">
									<h3><?php echo $judul_slide;?></h3>
									<div class="agileits_w3layouts_more">
										<a href="<?php echo $link_slide;?>" data-toggle="modal" data-target="#myModal"><?php echo $tombol_slide;?></a>
									</div>
								</div>
							</li>
							<li style="width: 1140px; float: left; display: block;" class="flex-active-slide">
							<div class="agileits_w3layouts_banner_info">
									<h3><?php echo $judul_slide;?></h3>
									<div class="agileits_w3layouts_more">
										<a href="<?php echo $link_slide;?>" data-toggle="modal" data-target="#myModal"><?php echo $tombol_slide;?></a>
									</div>
								</div>
							</li>
							<li class="" style="width: 1140px; float: left; display: block;">
							<div class="agileits_w3layouts_banner_info">
									<h3><?php echo $judul_slide;?></h3>
									<div class="agileits_w3layouts_more">
										<a href="<?php echo $link_slide;?>" data-toggle="modal" data-target="#myModal"><?php echo $tombol_slide;?></a>
									</div>
								</div>
							</li>
							<li class="" style="width: 1140px; float: left; display: block;">
							<div class="agileits_w3layouts_banner_info">
									<h3><?php echo $judul_slide;?></h3>
									<div class="agileits_w3layouts_more">
										<a href="<?php echo $link_slide;?>" data-toggle="modal" data-target="#myModal"><?php echo $tombol_slide;?></a>
									</div>
								</div>
							</li>
						<li style="width: 1140px; float: left; display: block;" class="clone">
						<div class="agileits_w3layouts_banner_info">
									<h3><?php echo $judul_slide;?></h3>
									<div class="agileits_w3layouts_more">
										<a href="<?php echo $link_slide;?>" data-toggle="modal" data-target="#myModal"><?php echo $tombol_slide;?></a>
									</div>
								</div>
							</li></ul></div><ol class="flex-control-nav flex-control-paging"><li><a class="flex-active">1</a></li><li><a class="">2</a></li><li><a class="">3</a></li></ol><ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul></div>
				</section>
		
		</div>
	</div>

<?php } ?>