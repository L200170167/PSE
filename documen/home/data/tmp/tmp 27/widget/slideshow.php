<?php 
function slideshow()
{ 
	include_once "home/include/settings/settings.php";
?>


        <section id="home" class="home">
            <!-- Carousel -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel-inner -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="<?php echo $slide_a1;?>" alt="Construction">
                        <div class="overlay">
                            <div class="carousel-caption">
                                <h1 class="animated3">
                                <span><strong>SELAMAT</strong> DATANG</span>
                            </h1>
                            <p class="animated3">Diwebsite Kami</p>	
                                <a href="<?php echo $link_slide;?>"  class="btn know_btn"><?php echo $tombol_slide;?></a>
                              
                            </div>					
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo $slide_a2;?>" alt="Construction">
                        <div class="overlay">
                            <div class="carousel-caption">
                                <h1 class="animated3">
                                <span><strong>SELAMAT</strong> DATANG</span>
                            </h1>
                            <p class="animated3">Diwebsite Kami</p>	
                                <a href="<?php echo $link_slide;?>"  class="btn know_btn"><?php echo $tombol_slide;?></a>
                            </div>					
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo $slide_a3;?>" alt="Construction">
                        <div class="overlay">
                            <div class="carousel-caption">
                                <h1 class="animated3">
                                <span><strong>SELAMAT</strong> DATANG</span>
                            </h1>
                            <p class="animated3">Diwebsite Kami</p>	
                                <a href="<?php echo $link_slide;?>"  class="btn know_btn"><?php echo $tombol_slide;?></a>
                            </div>					
                        </div>
                    </div>
                </div><!-- Carousel-inner end -->



                <!-- Controls -->
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!-- Carousel end-->

        </section>





<?php } ?>