		<!-- Begin Quicky's Breadcrumb Area -->
		<div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>#BestQualityProduct</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Product</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Quicky's Breadcrumb Area End Here -->
        <?php 
			$b=$data->row_array();
			$url=base_url().'user/produk/detail_produk/'.$b['produk_id'];
	        $img=base_url().'assets/gambar/'.$b['produk_gambar'];
	   		$title=$b['produk_nama'];
			$deskripsi=strip_tags($b['produk_deskripsi']);
		?>
        <!-- Begin Quicky's Single Product Area -->
        <div class="sp-area pt-100">
            <div class="container">
                <div class="sp-nav">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="sp-img_area">
                                <div class="sp-img_slider slick-img-slider quicky-element-carousel" data-slick-options='{
                                    "slidesToShow": 1,
                                    "arrows": false,
                                    "fade": true,
                                    "draggable": false,
                                    "swipe": false,
                                    "asNavFor": ".sp-img_slider-nav"
                                    }'>
                                    <div class="single-slide zoom">
                                        <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="sp-content ml-lg-4">
                                <div class="sp-heading">
                                    <h5><a href="#"><?php echo $title; ?></a></h5>
                                </div>
                                <div class="sp-essential_stuff">
                                    <ul>
                                        <li>Brands <a href="javascript:void(0)">PT. Textile Sejahtera</a></li>
                                        <li>Product Code: <a href="javascript:void(0)"><?php echo $b['produk_id']; ?></a></li>
                                        <li>Availability: <a href="javascript:void(0)"><?php echo $b['stok']; ?></a></li>
                                        <li>Price: <a href="javascript:void(0)"><span>Rp. <?php echo $b['produk_harga_baru']; ?></span></a></li>
                                        
                                    </ul>
                                </div>
                                <form action="<?php echo base_url().'user/produk/add_to_cart/'.$b['produk_id'] ;?>" method="post" id="add">
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" name="jumlah" value="1" type="text">
                                        <div class="dec qtybutton"><i class="zmdi zmdi-chevron-down"></i></div>
                                        <div class="inc qtybutton"><i class="zmdi zmdi-chevron-up"></i></div>
                                    </div>
                                </div>
                                </form>
                                <div class="qty-btn_area">
                                    <ul>
                                        <li><button class="qty-cart_btn" type="submit" form="add" >Add To Cart</button></li>
                                        <!--<li><a class="qty-wishlist_btn" href="wishlist.html" data-toggle="tooltip" title="Add To Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                        </li>-->
									</ul>
                                </div>
                                <div class="quicky-tag-line">
                                    <h6>Tags:</h6>
                                    <a href="javascript:void(0)"><?php echo $b['produk_kategori_nama']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quicky's Single Product Area End Here -->

        <!-- Begin Product Tab Area Two -->
        <div class="product-tab_area pt-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sp-product-tab_nav">
                            <div class="product-tab">
                                <ul class="nav product-menu">
                                    <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content uren-tab_content">
                                <div id="description" class="tab-pane active show" role="tabpanel">
                                    <div class="product-description">
                                        <ul>
                                            <li>
                                                <span class="title"><?php echo $title; ?></span>
                                                <span><?php echo $deskripsi; ?></span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Tab Area Two End Here -->
        <!-- Begin Brand Area -->
        <div class="brand-area ptb-90">
            <div class="container">
                <div class="brand-nav">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="quicky-element-carousel brand-slider" data-slick-options='{
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "arrows": false,
                                "dots": false,
                                "spaceBetween": 30
                                }' data-slick-responsive='[
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 3
                                }},
                                {"breakpoint":768, "settings": {
                                "slidesToShow": 2
                                }},
                                {"breakpoint":575, "settings": {
                                "slidesToShow": 2
                                }}
                            ]'>

                                <div class="brand-item">
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/brand/1.png" alt="Quicky's Brand">
                                    </a>
                                </div>
                                <div class="brand-item">
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/brand/2.png" alt="Quicky's Brand">
                                    </a>
                                </div>
                                <div class="brand-item">
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/brand/3.png" alt="Quicky's Brand">
                                    </a>
                                </div>
                                <div class="brand-item">
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/brand/4.png" alt="Quicky's Brand">
                                    </a>
                                </div>
                                <div class="brand-item">
                                    <a href="javascript:void(0)">
                                        <img src="assets/images/brand/1.png" alt="Quicky's Brand">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand Area End Here -->