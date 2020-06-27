<?php 
function slideshow()
{ 
	include_once "home/include/settings/settings.php";
?>


    
    <!-- Start Home Page Slider -->
    <section id="page-top">
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
                    <img class="img-responsive" src="<?php echo $slide_b1;?>" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated3">
                                <span><strong>SELAMAT</strong> DATANG</span>
                            </h1>
                            <p class="animated3">Diwebsite Kami</p>	
                            <a href="<?php echo $link_slide;?>" class="page-scroll btn btn-primary animated1"><?php echo $tombol_slide;?></a>
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
                
                <div class="item">
                    <img class="img-responsive" src="<?php echo $slide_b2;?>" alt="slider">
                    
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated2">
                                <span><strong>SELAMAT</strong> DATANG</span>
                            </h1>
                            <p class="animated2">Diwebsite Kami</p>	
                            <a href="<?php echo $link_slide;?>" class="page-scroll btn btn-primary animated1"><?php echo $tombol_slide;?></a>
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
                
                <div class="item">
                    <img class="img-responsive" src="<?php echo $slide_b3;?>" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated1">
                                <span><strong>SELAMAT</strong> DATANG</span>
                            </h1>
                            <p class="animated1">Diwebsite Kami</p>	
                            <a href="<?php echo $link_slide;?>" class="page-scroll btn btn-primary animated1"><?php echo $tombol_slide;?></a>
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
            </div>
            <!-- Carousel inner end-->

            <!-- Controls -->
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div>
        <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->





<?php } ?>