        <!-- Begin Quicky's Modal Area -->
        <?php foreach ($modal->result_array() as $a) {
            $id=$a['produk_id'];
            $nama=$a['produk_nama'];	
            $deskripsi=$a['produk_deskripsi'];
            $harga_lama=$a['produk_harga_lama'];
            $harga_baru=$a['produk_harga_baru'];
            $like=$a['produk_likes'];
            $stok=$a['stok'];
            $kat_nama=$a['produk_kategori_nama'];
            $gambar=$a['produk_gambar'];
            $diskon = ($harga_baru - $harga_lama) / 100;
        ?> 
        <div class="modal fade modal-wrapper" id="detail_<?php echo $id; ?>">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area sp-area row">
                            <div class="col-xl-5 col-lg-6">
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
                                            <img src="<?php echo base_url(); ?>assets/gambar/<?php echo $gambar; ?>" alt="<?php echo $nama; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6">
                                <div class="sp-content">
                                    <div class="sp-heading">
                                        <h5><a href="#"><?php echo $nama; ?></a></h5>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li><i class="zmdi zmdi-star"></i></li>
                                            <li><i class="zmdi zmdi-star-outline"></i></li>
                                        </ul>
                                    </div>
                                    <div class="sp-essential_stuff">
                                        <ul>
                                            <li>Brands <a href="javascript:void(0)">PT. Textile Sejahtera</a></li>
                                            <li>Product Code: <a href="javascript:void(0)"><?php echo $id; ?></a></li>
                                            <li>Availability: <a href="javascript:void(0)"><?php echo $stok; ?></a></li>
                                            <li>Price: <a href="javascript:void(0)"><span>Rp. <?php echo $harga_baru; ?></span></a></li>
                                            
                                        </ul>
                                    </div>
                                    <form action="<?php echo base_url().'user/produk/add_to_cart/'.$id ;?>" method="post" id="add_<?php echo $id; ?>">
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" name="jumlah" value="1" type="text">
                                            <div class="dec qtybutton"><i class="zmdi zmdi-chevron-down"></i></div>
                                            <div class="inc qtybutton"><i class="zmdi zmdi-chevron-up"></i></div>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="quicky-group_btn">
                                        <ul>
                                            <li><button class="add-to_cart" type="submit" form="add_<?php echo $id; ?>" >Add To Cart</button></li>
                                            <!--<li><a href="wishlist.html" data-toggle="tooltip" title="Add To Wishlist"><i class="zmdi zmdi-favorite-outline"></i></a>
                                            </li>-->
                                        </ul>
                                    </div>
                                    <div class="quicky-tag-line">
                                        <h6>Tags:</h6>
                                        <a href="javascript:void(0)"><?php echo $kat_nama; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- Quicky's Modal Area End Here -->