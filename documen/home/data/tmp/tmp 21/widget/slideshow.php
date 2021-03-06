<?php 
function slideshow()
{
	include_once "home/include/settings/settings.php";
	?>


					
			    <section id="home">
      <!-- Carousel -->
      <div id="main-slide" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#main-slide" data-slide-to="0" class="active"></li>
          <li data-target="#main-slide" data-slide-to="1"></li>
          <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <!--/ Indicators end-->

        <!-- Carousel inner -->
        <div class="carousel-inner">
          <div class="item active">
            <img class="img-responsive" src="<?php echo $slide_a1;?>" alt="slider">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                 <h2 class="animated7 white">
                  <span><?php echo $judul_slide;?></span>
                </h2>
                <h3 class="animated3">
                   
                  </h3>
                <p class="animated4"><a href="<?php echo $link_slide;?>" class="slider btn btn-system btn-large"><?php echo $tombol_slide;?></a>
                </p>
              </div>
            </div>
          </div>
          <!--/ Carousel item end -->
          <div class="item">
            <img class="img-responsive" src="<?php echo $slide_a2;?>" alt="slider">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                <h2 class="animated7 white">
                  <span><?php echo $judul_slide;?></span>
                </h2>
                <h3 class="animated5">
                
                </h3>
                <p class="animated6"><a href="<?php echo $link_slide;?>" class="slider btn btn-system btn-large"><?php echo $tombol_slide;?></a>
                </p>
              </div>
            </div>
          </div>
          <!--/ Carousel item end -->
          <div class="item">
            <img class="img-responsive" src="<?php echo $slide_a3;?>" alt="slider">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                <h2 class="animated7 white">
                  <span><?php echo $judul_slide;?></span>
                </h2>
                <h3 class="animated8 white">
                  
                </h3>
                <div class="">
                  <a class="animated4 slider btn btn-system btn-large btn-min-block" href="<?php echo $link_slide;?>"><?php echo $tombol_slide;?></a>
                </div>
              </div>
            </div>
          </div>
          <!--/ Carousel item end -->
        </div>
        <!-- Carousel inner end-->

        <!-- Controls -->
        <a class="left carousel-control" href="<?php echo $url;?>#main-slide" data-slide="prev">
          <span><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="<?php echo $url;?>#main-slide" data-slide="next">
          <span><i class="fa fa-angle-right"></i></span>
        </a>
      </div>
      <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->

   
<?php } ?>