        <!-- Begin Quicky's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Get Your Own</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Quicky's Breadcrumb Area End Here -->

        <!-- Begin Quicky's Content Wrapper Area -->
        <div class="quicky-content_wrapper pt-90 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-toolbar">
                            <div class="product-view-mode">
                                <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="zmdi zmdi-grid"></i></a>
                                <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="zmdi zmdi-view-list-alt"></i></a>
                            </div>
                            <div class="product-page_count">
                                <p>Showing 1–9 of 40 results)</p>
                            </div>
                        </div>
                        <div class="shop-product-wrap grid gridview-3 row">
                        <?php foreach ($data->result_array() as $a) {
                          $id=$a['produk_id'];
                          $nama=$a['produk_nama'];	
                          $deskripsi=$a['produk_deskripsi'];
                          $harga_lama=$a['produk_harga_lama'];
                          $harga_baru=$a['produk_harga_baru'];
                          $like=$a['produk_likes'];
                          $kat_id=$a['produk_kategori_id'];
                          $kat_nama=$a['produk_kategori_nama'];
                          $gambar=$a['produk_gambar'];
    				    ?>    
                            <div class="col-12">
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="<?php echo base_url().'user/produk/detail_produk/'.$id ;?>">
                                                <img src="<?php echo base_url().'assets/gambar/'.$gambar ;?>">
                                            </a>
                                            <div class="add-actions">
                                                <ul>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#detail_<?php echo $id; ?>"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-magnifier"></i></a>
                                                    </li>
                                                    <!--<li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    </li>-->
                                                    <li><a href="<?php echo base_url().'user/produk/add_to_cart/'.$id ;?>" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="icon-bag"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="manufacture-product_top">
                                                    <span><?php echo $kat_nama; ?></span>
                                                </div>
                                                <h3 class="product-name"><a href="<?php echo base_url().'user/produk/detail_produk/'.$id ;?>"><?php echo $nama; ?></a></h3>
                                                <div class="price-box">
                                                    <span class="new-price ml-0">Rp. <?php echo number_format($harga_baru,0,",","."); ?></span>
                                                </div>
                                                <div class="review-area d-flex justify-content-between align-items-center">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-product_item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="<?php echo base_url().'user/produk/detail_produk/'.$id ;?>">
                                            <div class="crop">
                                                <img src="<?php echo base_url().'assets/gambar/'.$gambar ;?>">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="quicky-product-content">
                                            <div class="product-desc_info">
                                                <h6 class="product-name"><a href="<?php echo base_url().'user/produk/detail_produk/'.$id ;?>"><?php echo $nama; ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if ($harga_lama < $harga_baru) { ?>
                                                        <span class="new-price ml-0">Rp. <?php echo number_format($harga_baru,0,",","."); ?></span>
                                                
                                                    <?php } else { ?>
                                                    <span class="old-price">Rp. <?php echo number_format($harga_lama,0,",","."); ?></span>
                                                    <span class="new-price">Rp. <?php echo number_format($harga_baru,0,",","."); ?></span>
                                                    <?php } ?>
                                                </div>
                                                
                                                <div class="product-short_desc">
                                                    <p><?php echo $deskripsi; ?></p>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li class="quick-view-btn" data-toggle="modal" data-target="#detail_<?php echo $id; ?>"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Quick View"><i class="icon-magnifier"></i></a>
                                                    </li>
                                                    <!--<li><a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    </li>-->
                                                    <li><a href="<?php echo base_url().'user/produk/add_to_cart/'.$id ;?>" data-toggle="tooltip" data-placement="top" title="Add To cart"><i class="icon-bag"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="quicky-paginatoin-area">
                                    <?php echo $pagination; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quicky's Content Wrapper Area End Here -->

        <!-- Begin Brand Area -->
        <div class="brand-area pb-95">
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
                                    
                                </div>
                                <div class="brand-item">
                                    
                                </div>
                                <div class="brand-item">
                                    
                                </div>
                                <div class="brand-item">
                                    
                                </div>
                                <div class="brand-item">
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand Area End Here -->