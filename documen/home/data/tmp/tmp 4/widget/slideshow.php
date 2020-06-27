<?php 
function slideshow()
{
	include_once "home/include/settings/settings.php";
	?>

<div class="callbacks_container w3-layouts">
      <ul class="rslides callbacks callbacks1 agileits" id="slider4">
        
		<li id="callbacks1_s0" class="callbacks1_on" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 500ms ease-in-out 0s;">
          <img src="<?php echo $slide_a1;?>" alt="home">
          <div class="caption text-center">
			<div class="col-md-8 banner_text_left">
			<h3><?php echo $judul_slide;?></h3>
			<a href="<?php echo $link_slide;?>" class="btn btn-danger brn-large"><?php echo $tombol_slide;?></a>
			</div>
			
        </li>
		
       
      </ul>
    </div>

<?php } ?>