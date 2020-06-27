<?php 
$a=$info->row_array();
?>
        <!-- Begin Footer Area -->
        <div class="footer-area">
            <div class="footer-top_area bg-buttery-white">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-widgets_area">
                                <div class="logo-area">
                                    <a href="javascript:void(0)">
                                        <img src="<?php echo base_url(); ?>assets/images/footer/1.png" alt="Quicky's Logo">
                                    </a>
                                </div>
                                <p class="short-desc"><?php echo $a['penjelasan']; ?></p>
                                <div class="social-link">
                                    <ul>
                                        <li class="facebook">
                                            <a href="<?php echo $a['fb']; ?>" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="icon-social-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="twitter">
                                            <a href="<?php echo $a['twitter']; ?>" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="icon-social-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="<?php echo $a['google']; ?>" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="icon-social-google"></i>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="footer-widgets_area">
                                <h3 class="heading">Quick Link</h3>
                                <div class="footer-widgets">
                                    <ul>
                                        <li><a href="javascript:void(0)">Home</a></li>
                                        <li><a href="javascript:void(0)">Shop</a></li>
                                        <li><a href="javascript:void(0)">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <div class="footer-widgets_area">
                                <h3 class="heading">Information</h3>
                                <div class="footer-widgets">
                                    <ul>
                                        <li><a href="javascript:void(0)">Payment System</a></li>
                                        <li><a href="javascript:void(0)">Return Policy</a></li>
                                        <li><a href="javascript:void(0)">Terms & Conditins</a></li>
                                        <li><a href="javascript:void(0)">Quick Support</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="footer-widgets_area">
                                <h3 class="heading"><?php echo $a['nama']; ?></h3>
                                <div class="footer-widgets">
                                    <p class="address-info"><?php echo $a['alamat']; ?></p>
                                    <div class="widgets-mail">
                                        <a href="mailto://<?php echo $a['email']; ?>"><?php echo $a['email']; ?></a>
                                        
                                    </div>
                                    <a class="widgets-contects" href="tel://<?php echo $a['nohp']; ?>"><?php echo $a['nohp']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom_area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright">
                                <span>Copyright &copy; 2020
                                <a href="index.html">Sudikama.</a>
                                <a href="http://pmblsn.my.id/" target="_blank">All Rights Reserved.</a>
                            </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment">
                                <img src="<?php echo base_url(); ?>assets/images/footer/payment/1.png" alt="Payment Method">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Area End Here -->