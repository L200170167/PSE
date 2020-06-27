
        <!-- Begin Slider Area -->
        <div class="slider-area">

            <div class="quicky-element-carousel home-slider arrow-style" data-slick-options='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "infinite": true,
                "arrows": true,
                "dots": false,
                "autoplay" : true,
                "fade" : true,
                "autoplaySpeed" : 7000,
                "pauseOnHover" : false,
                "pauseOnFocus" : false
                }' data-slick-responsive='[
                {"breakpoint":768, "settings": {
                "slidesToShow": 1
                }},
                {"breakpoint":575, "settings": {
                "slidesToShow": 1
                }}
            ]'>
            <?php foreach ($fav->result_array() as $a) {
                        $id=$a['produk_id'];
                        $nama=$a['produk_nama'];	
                        $deskripsi=$a['produk_deskripsi'];
                        $harga_lama=$a['produk_harga_lama'];
                        $harga_baru=$a['produk_harga_baru'];
                        $harlam=$a['harga_lama'];
                        $harbar=$a['harga_baru'];
                        $like=$a['produk_likes'];
                        $kat_id=$a['produk_kategori_id'];
                        $kat_nama=$a['produk_kategori_nama'];
                        $gambar=$a['produk_gambar'];
                        $diskon = ($harga_baru - $harga_lama) / 100;
    		?>
                <div class="slide-item animation-style-0<?php echo $rand = rand(1, 3); ?> bg-1">
                    <div class="slider-progress"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-slide">
                                    <div class="slide-content">
                                        <h2><?php echo $nama; ?></h2>
                                        <p class="short-desc"><?php echo $deskripsi; ?></p>
                                        <div class="slide-btn">
                                            <a class="quicky-btn horizontal-line_ltr" href="<?php echo base_url().'user/produk/detail_produk/'.$id ;?>">Discover Now!</a>
                                        </div>
                                    </div>
                                    <div class="slider-img">
                                        <img src="<?php echo base_url().'assets/gambar/'.$gambar ;?>" alt="Promo Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
                

            </div>

        </div>
        <!-- Slider Area End Here -->

        <!-- Begin Product Area -->
        <div class="product-area pt-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h3 class="heading">Featured Products</h3>
                            <p class="short-desc">Produce and supply various Handicraft items all over
                                the world which were very attractive</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="quicky-element-carousel product-slider" data-slick-options='{
                        "slidesToShow": 3,
                        "slidesToScroll": 1,
                        "infinite": false,
                        "arrows": false,
                        "dots": false,
                        "spaceBetween": 30
                        }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint":480, "settings": {
                        "slidesToShow": 1
                        }}
                    ]'>

                    <?php foreach ($data->result_array() as $a) {
                        $id=$a['produk_id'];
                        $nama=$a['produk_nama'];	
                        $deskripsi=$a['produk_deskripsi'];
                        $harga_lama=$a['produk_harga_lama'];
                        $harga_baru=$a['produk_harga_baru'];
                        $harlam=$a['harga_lama'];
                        $harbar=$a['harga_baru'];
                        $like=$a['produk_likes'];
                        $kat_id=$a['produk_kategori_id'];
                        $kat_nama=$a['produk_kategori_nama'];
                        $gambar=$a['produk_gambar'];
                        $diskon = round((($harga_lama - $harga_baru) / $harga_lama) * 100);
    				?>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="<?php echo base_url().'user/produk/detail_produk/'.$id ;?>">
                                            <img src="<?php echo base_url().'assets/gambar/'.$gambar ;?>">
                                        </a>
                                        <span class="sticker">Hot</span>
                                        <span class="sticker-2"><?php echo $diskon; ?>%</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#detail_<?php echo $id; ?>"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                        class="icon-magnifier"></i></a>
                                                </li>
                                                <!--<li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="icon-heart"></i></a>
                                                </li>-->
                                                <li><a href="<?php echo base_url().'user/produk/add_to_cart/'.$id ;?>" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="icon-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="<?php echo base_url().'user/produk/detail_produk/'.$id ;?>"><?php echo $nama; ?></a></h3>
                                            <div class="price-box">
                                                <span class="old-price">Rp. <?php echo number_format($harga_lama,0,",","."); ?></span>
                                                <span class="new-price">Rp. <?php echo number_format($harga_baru,0,",","."); ?></span>
                                            </div>
                                            <div class="review-area d-flex justify-content-between align-items-center">
                                                
                                                <span class="manufacture-product"><?php echo $kat_nama; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End Here -->

        <!-- Begin Product Area Two -->
        <div class="product-area product-area-2 pt-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h3 class="heading">Popular Products</h3>
                            <p class="short-desc">Produce and supply various Handicraft items all over
                                the world which were very attractive</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="quicky-element-carousel product-slider" data-slick-options='{
                        "slidesToShow": 3,
                        "slidesToScroll": 1,
                        "infinite": false,
                        "arrows": false,
                        "dots": false,
                        "spaceBetween": 30,
                        "rows" : 2
                        }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint":480, "settings": {
                        "slidesToShow": 1
                        }}
                    ]'>
                    <?php foreach ($fav->result_array() as $a) {
                        $id=$a['produk_id'];
                        $nama=$a['produk_nama'];	
                        $deskripsi=$a['produk_deskripsi'];
                        $harga_lama=$a['produk_harga_lama'];
                        $harga_baru=$a['produk_harga_baru'];
                        $harlam=$a['harga_lama'];
                        $harbar=$a['harga_baru'];
                        $like=$a['produk_likes'];
                        $kat_id=$a['produk_kategori_id'];
                        $kat_nama=$a['produk_kategori_nama'];
                        $gambar=$a['produk_gambar'];
                        $diskon = ($harga_baru - $harga_lama) / 100;
    				?>

                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="<?php echo base_url().'user/produk/detail_produk/'.$id ;?>">
                                            <img src="<?php echo base_url().'assets/gambar/'.$gambar ;?>" alt="Quicky's Product Image">
                                        </a>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-toggle="modal" data-target="#detail_<?php echo $id; ?>"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                    class="icon-magnifier"></i></a>
                                                </li>
                                                <!--<li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i class="icon-heart"></i></a>
                                                </li>-->
                                                <li><a href="<?php echo base_url().'user/produk/add_to_cart/'.$id ;?>" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="icon-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="<?php echo base_url().'user/produk/detail_produk/'.$id ;?>"><?php echo $nama; ?></a></h3>
                                            <div class="price-box">
                                                <span class="new-price ml-0">Rp. <?php echo number_format($harga_baru,0,",","."); ?></span>
                                            
                                            </div>
                                            <div class="review-area d-flex justify-content-between align-items-center">
                                                
                                                <span class="manufacture-product"><?php echo $kat_nama; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area Two End Here -->


        <!-- Begin Service Area -->
        <div class="service-area pt-100 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="<?php echo base_url(); ?>assets/images/service/1.png" alt="Quicky's Service">
                            </div>
                            <div class="service-content">
                                <h3 class="heading">Free Home Delivery</h3>
                                <p class="short-desc">Provide free home delivery
                                    for all product over Rp. 100.000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="<?php echo base_url(); ?>assets/images/service/2.png" alt="Quicky's Service">
                            </div>
                            <div class="service-content">
                                <h3 class="heading">Quality Products</h3>
                                <p class="short-desc">We ensure our product
                                    quality all times</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="<?php echo base_url(); ?>assets/images/service/3.png" alt="Quicky's Service">
                            </div>
                            <div class="service-content">
                                <h3 class="heading">3 Day Return</h3>
                                <p class="short-desc">Our producr return policy
                                    is very easy & simple</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service Area End Here -->