<?php 
function slideshow()
{
	include_once "home/include/settings/settings.php";
	?>


<div id="myCarousel1" class="carousel slide" data-ride="carousel"> 
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel1" data-slide-to="0" class=""></li>
                    <li data-target="#myCarousel1" data-slide-to="1" class=""></li>
                    <li data-target="#myCarousel1" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item"> <img src="<?php echo $slide_b1;?>" style="width:100%; height: 500px" alt="First slide">
                        <div class="carousel-caption">
                            <h1><?php echo $judul_slide;?></h1>
							<a href="<?php echo $link_slide;?>"><font color="orange"><?php echo $tombol_slide;?></font> </a>	<br>
                        </div>
                    </div>
                    <div class="item active left"> <img src="<?php echo $slide_b2;?>" style="width:100%; height: 500px" alt="Second slide">
                        <div class="carousel-caption">
                            <h1><?php echo $judul_slide;?></h1>
							<a href="<?php echo $link_slide;?>"><font color="orange"><?php echo $tombol_slide;?></font> </a>	<br>
                        </div>
                    </div>
                    <div class="item next left"> <img src="<?php echo $slide_b3;?>" style="width:100%; height: 500px" alt="Third slide">
                        <div class="carousel-caption">
                            <h1><?php echo $judul_slide;?></h1>
							<a href="<?php echo $link_slide;?>"><font color="orange"><?php echo $tombol_slide;?></font> </a>	<br>
                        </div>
                    </div>

                </div>
                <a class="left carousel-control" href="#myCarousel1" data-slide="prev"> < </a>
                <a class="right carousel-control" href="#myCarousel1" data-slide="next"> > </a>

            </div>
<?php } ?>