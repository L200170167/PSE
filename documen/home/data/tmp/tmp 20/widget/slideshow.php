<?php 
function slideshow()
{
    include_once "home/include/settings/settings.php";
    ?>

 <div id="exampleSlider">
        <div class="sliderBox" id="sl1" style="z-index: 2; left: -100%;"><h3><?php echo $judul_slide;?> </h3>
        <a href="" class="btn btn-warning"> <?php echo $tombol_slide;?></a>
        </div>

        <div class="sliderBox" id="sl2" style="z-index: 1; left: 0px;"><h3><?php echo $judul_slide;?> </h3><a href="" class="btn btn-warning"> <?php echo $tombol_slide;?></a></div>

         <div class="sliderBox" id="sl3" style="z-index: 0; left: 0px;"><h3><?php echo $judul_slide;?> </h3><a href="" class="btn btn-warning"> <?php echo $tombol_slide;?></a></div>

		  <div class="sliderBox" id="sl4" style="z-index: 0; left: 0px;"><h3><?php echo $judul_slide;?> </h3><a href="" class="btn btn-warning"> <?php echo $tombol_slide;?></a></div>

   </div>

<?php } ?>