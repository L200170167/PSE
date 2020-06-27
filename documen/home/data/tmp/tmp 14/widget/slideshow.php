<?php 
function slideshow()
{ 
  include_once "home/include/settings/settings.php";
  ?>
<section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="wow fadeInDown animated" data-wow-offset="0" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">
                <h2 class="h-ultra"><?php echo $judul_slide;?></h2>
              </div>
              
              <div class="well well-trans">
                <div class="wow fadeInRight animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">

                
                  <p class="text-right wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: bounceIn;">
                    <a href="<?php echo $link_slide;?>" class="btn btn-skin btn-lg"><?php echo $tombol_slide;?>  <i class="fa fa-angle-right"></i></a>
                  </p>
                </div>
              </div>


            </div>
            <div class="col-lg-6">
              <div class="wow fadeInUp animated" data-wow-duration="2s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                <img width="500" src="<?php echo $slide_b1;?>" class="img-responsive" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php } ?>