<?php 
function slideshow()
{
	include_once "home/include/settings/settings.php";
	?>

<section id="featured">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<!-- Slider -->
						<div id="main-slider" class="flexslider">
							<ul class="slides">
								<li>
									<img src="<?php echo $slide_a1;?>" alt="" />
									<div class="flex-caption">
									<br>
										<h3><?php echo $judul_slide;?></h3>
										<h4 href="<?php echo $link_slide;?>" class="btn btn-info"><?php echo $tombol_slide;?>a</h4>
									</div>
								</li>
								
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>



		</section>

<?php } ?>