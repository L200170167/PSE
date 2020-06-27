        <!-- Begin Loading Area -->
        <div class="loading">
            <div class="text-center middle">
                <span class="loader">
            <span class="loader-inner"></span>
                </span>
            </div>
        </div>
        <!-- Loading Area End Here -->

        <!-- Begin Main Header Area -->
        <header class="main-header_area">
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-header_nav position-relative">
                                <div class="header-logo_area">
                                    <a href="<?php echo base_url(); ?>">
                                        <img src="<?php echo base_url(); ?>assets/images/menu/logo/1.png" alt="Header Logo">
                                    </a>
                                </div>
                                <div class="main-menu_area d-none d-lg-block">
                                    <nav class="main-nav d-flex justify-content-center">
                                        <ul>
                                            <li class="dropdown-holder"><a href="<?php echo base_url(); ?>">Home</a>
                                                
                                            </li>
                                            <li class="megamenu-holder position-static"><a href="<?php echo base_url(); ?>shop">Shop</a>

                                            </li>
                                            <?php if ($this->session->userdata('online') == TRUE) { ?>
                                                <li><a href="<?php echo base_url(); ?>history">History</a>
                                                </li>
                                            <?php } ?>
                                            <li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right_area">
                                    <ul>
                                        <li class="mobile-menu_wrap d-inline-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                                <i class="zmdi zmdi-menu"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#searchBar" class="search-btn toolbar-btn">
                                                <i class="zmdi zmdi-search"></i>
                                            </a>
                                        </li>
                                        <li class="minicart-wrap mr-md_0">
                                            <a href="#miniCart" class="minicart-btn toolbar-btn">
                                                <div class="minicart-count_area">
                                                    <i class="zmdi zmdi-mall"></i>
                                                    <p class="total-price">Rp. <?php echo number_format($this->cart->total());?> <span>(<?=$this->cart->total_items();?>)</span></p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-holder user-setting_wrap"><a href="javascript:void(0)"><i class="zmdi zmdi-account-o"></i></a>
                                            <ul class="quicky-dropdown">
                                            <?php if ($this->session->userdata('online') == TRUE) { ?>
                                                <li class="position-relative"><a href="<?php echo base_url(); ?>account">My Account</a>
                                                </li>
                                                <li class="position-relative"><a href="<?php echo base_url(); ?>logout">Log Out</a>
                                                </li>
                                            <?php } else { ?>
                                                <li class="position-relative" data-toggle="modal" data-target="#login"><a href="javascript:void(0)">Login</a>
                                                </li>
                                                <li class="position-relative" data-toggle="modal" data-target="#register"><a href="javascript:void(0)">Register</a>
                                                </li>
                                            <?php } ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-header_nav position-relative">
                                <div class="header-logo_area">
                                    <a href="index.html">
                                        <img src="<?php echo base_url(); ?>assets/images/menu/logo/1.png" alt="Header Logo">
                                    </a>
                                </div>
                                <div class="main-menu_area d-none d-lg-block">
                                    <nav class="main-nav d-flex justify-content-center">
                                        <ul>
                                            <li class="dropdown-holder"><a href="<?php echo base_url(); ?>">Home</a>
                                                
                                            </li>
                                            <li class="megamenu-holder position-static"><a href="<?php echo base_url(); ?>shop">Shop</a>

                                            </li>
                                            <?php if ($this->session->userdata('online') == TRUE) { ?>
                                                <li><a href="<?php echo base_url(); ?>history">History</a>
                                                </li>
                                            <?php } ?>
                                            <li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right_area">
                                    <ul>
                                        <li class="mobile-menu_wrap d-inline-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                                <i class="zmdi zmdi-menu"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#searchBar" class="search-btn toolbar-btn">
                                                <i class="zmdi zmdi-search"></i>
                                            </a>
                                        </li>
                                        <li class="minicart-wrap mr-md_0">
                                            <a href="#miniCart" class="minicart-btn toolbar-btn">
                                                <div class="minicart-count_area">
                                                    <i class="zmdi zmdi-mall"></i>
                                                    <p class="total-price">Rp. <?php echo number_format($this->cart->total());?> <span>(<?=$this->cart->total_items();?>)</span></p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-holder user-setting_wrap"><a href="javascript:void(0)"><i class="zmdi zmdi-account-o"></i></a>
                                            <ul class="quicky-dropdown">
                                            <?php if ($this->session->userdata('online') == TRUE) { ?>
                                                <li class="position-relative"><a href="<?php echo base_url(); ?>account">My Account</a>
                                                </li>
                                                <li class="position-relative"><a href="<?php echo base_url(); ?>logout">Log Out</a>
                                                </li>
                                            <?php } else { ?>
                                                <li class="position-relative" data-toggle="modal" data-target="#login"><a href="javascript:void(0)">Login</a>
                                                </li>
                                                <li class="position-relative" data-toggle="modal" data-target="#register"><a href="javascript:void(0)">Register</a>
                                                </li>
                                            <?php } ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-minicart_wrapper" id="miniCart">
                <div class="offcanvas-menu-inner">
                    <a href="#" class="btn-close"><i class="zmdi zmdi-close"></i></a>
                    <div class="minicart-content">
                        <div class="minicart-heading">
                            <h4>Shopping Cart</h4>
                        </div>
                        <ul class="minicart-list">
                        <?php if ($this->cart->total_items() == 0) { ?>
                            <p>Your cart is empty</p>
                            <?php } else { ?>
                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items): ?>
                            <li class="minicart-product">
                                <a class="product-item_remove" href="<?php echo base_url().'user/produk/removecart/'.$items['rowid'];?>"><i
                                    class="zmdi zmdi-close"></i></a>
                                <div class="product-item_img">
                                    <img src="<?php echo base_url(); ?>assets/images/product/small-size/1.jpg" alt="Product Image">
                                </div>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop-left-sidebar.html"><?=$items['name'];?></a>
                                    <span class="product-item_quantity"><?php echo number_format($items['qty']);?> x Rp. <?php echo number_format($items['price']);?></span>
                                </div>
                            </li>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                            <?php } ?> 
                        </ul>
                    </div>
                    <div class="minicart-item_total">
                        <span>Subtotal</span>
                        <span class="ammount">Rp. <?php echo number_format($this->cart->total());?></span>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="<?php echo base_url(); ?>shop/cart" class="quicky-btn-2 quicky-btn_fullwidth square-btn">Minicart</a>
                    </div>
                    <div class="minicart-btn_area">
                        <a href="<?php echo base_url().'user/produk/check_out'?>" class="quicky-btn-2 quicky-btn_fullwidth square-btn">Checkout</a>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close white-close_btn"><i class="zmdi zmdi-close"></i></a>
                        <div class="offcanvas-inner_logo">
                            <a href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url(); ?>assets/images/menu/logo/1.png" alt="Header Logo">
                            </a>
                        </div>
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active"><a href="<?php echo base_url(); ?>"><span
                                        class="mm-text">Home</span></a>
                                    
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?php echo base_url(); ?>shop">
                                        <span class="mm-text">Shop</span>
                                    </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?php echo base_url(); ?>history">
                                        <span class="mm-text">History</span>
                                    </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?php echo base_url(); ?>contact">
                                        <span class="mm-text">Contact</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <nav class="offcanvas-navigation user-setting_area">
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children active">
                                    <a href="<?php echo base_url(); ?>account">
                                        <span class="mm-text">User
                                        Setting
                                    </span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>account">
                                                <span class="mm-text">My Account</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>user/home">
                                                <span class="mm-text">Login | Register</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            
            <div class="offcanvas-search_wrapper" id="searchBar">
                <div class="offcanvas-menu-inner">
                    <div class="container">
                        <a href="#" class="btn-close"><i class="zmdi zmdi-close"></i></a>
                        <!-- Begin Offcanvas Search Area -->
                        <div class="offcanvas-search">
                            <form action="<?php echo base_url().'search';?>" method="post" class="hm-searchbox">
                                <input type="text" name="keyword" placeholder="Search for item..." autofocus>
                                <button class="search_btn" type="submit"><i
                                    class="zmdi zmdi-search"></i></button>
                            </form>
                        </div>
                        <!-- Offcanvas Search Area End Here -->
                    </div>
                </div>
            </div>
            <div class="global-overlay"></div>
        </header>
        <!-- Main Header Area End Here -->