<?php 
function slideshow()
{
    include_once "home/include/settings/settings.php";
    ?>
	
	
<div class="slider-wrapper row">
    <div class="slider">
        <div class="fs_loader"></div>

        <div class="slide">
            <p class="slide-1" data-position="100,170" data-in="top" data-out="bottom" data-delay="2500"><?php echo $judul_slide;?></p>
            <a class="slide-1 a " href="<?php echo $link_slide;?>" data-position="145,170" data-in="right" data-out="left" data-delay="2900"><?php echo $tombol_slide;?></a>
        </div>

        <div class="slide">
            <p class="slide-1" data-position="100,170" data-in="top" data-out="bottom" data-delay="2500"><?php echo $judul_slide;?></p>
            <a class="slide-1 a " href="<?php echo $link_slide;?>" data-position="145,170" data-in="right" data-out="left" data-delay="2900"><?php echo $tombol_slide;?></a>
        </div>

        <div class="slide">
            <p class="slide-1" data-position="100,170" data-in="top" data-out="bottom" data-delay="2500"><?php echo $judul_slide;?></p>
            <a class="slide-1 a " href="<?php echo $link_slide;?>" data-position="145,170" data-in="right" data-out="left" data-delay="2900"><?php echo $tombol_slide;?></a>
        </div>
      
    </div>
</div>
<!--End Slider-->
<br>
<br>




	
<?php } ?>