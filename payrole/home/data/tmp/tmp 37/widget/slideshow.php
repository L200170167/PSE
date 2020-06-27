<?php 
function slideshow()
{ 
	include_once "home/include/settings/settings.php";
?>


   <!--./ Social Div End -->
    <div id="main-slider">

        <div id="carousel-example" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="item active">

                    <img width="100%"src="<?php echo $slide_a1;?>" alt="" />
                    <div class="carousel-caption ">
                        

                    </div>
                </div>
                <div class="item">
                    <img width="100%" src="<?php echo $slide_b1;?>" alt="" />
                    <div class="carousel-caption ">

                    </div>
                </div>
                <div class="item">
                    <img width="100%" src="<?php echo $slide_a3;?>" alt="" />
                    <div class="carousel-caption ">

                    </div>
                </div>
            </div>
            <!--INDICATORS-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example" data-slide-to="1"></li>
                <li data-target="#carousel-example" data-slide-to="2"></li>
            </ol>
            <!--PREVIUS-NEXT BUTTONS-->
            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                <i class="fa fa-angle-left fa-3x control-icon clr-main"></i>
            </a>
            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                <i class="fa fa-angle-right fa-3x control-icon clr-main"></i>
            </a>
        </div>

    </div>
  
			

<?php } ?>