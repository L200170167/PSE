<!-- Begin Quicky's Breadcrumb Area -->
<div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>One Step Closer</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Quicky's Breadcrumb Area End Here -->

        <!-- Begin Quicky's Cart Area -->
        <div class="quicky-cart-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="quicky-product-remove">remove</th>
                                            <th class="quicky-product-thumbnail">images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="quicky-product-price">Unit Price</th>
                                            <th class="quicky-product-quantity">Quantity</th>
                                            <th class="quicky-product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <form action="<?php echo base_url().'user/produk/update/'?>" method="post" id="update">
                                    <?php if ($this->cart->total_items() == 0) { ?>
                                        <tr>
                                        <td colspan="6">Your cart is empty</td>
                                        </tr>
                                      <?php } else { ?>
                                    <?php $i = 1; ?>
							                      <?php foreach ($this->cart->contents() as $items): ?>
                                        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                        <tr>
                                            <td class="quicky-product-remove"><a href="<?php echo base_url().'user/produk/remove/'.$items['rowid'];?>"><i class="zmdi zmdi-close"
                                                title="Remove"></i></a></td>
                                            <td class="quicky-product-thumbnail"><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/product/small-size/1.jpg" alt="Product Image"></a></td>
                                            <td class="quicky-product-name"><a href="javascript:void(0)"><?=$items['name'];?></a></td>
                                            <td class="quicky-product-price"><span class="amount">Rp. <?php echo number_format($items['price']);?></span></td>
                                            <td class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" name="<?php echo $i.'[qty]'?>" value="<?php echo number_format($items['qty']);?>" type="number">
                                                    <div class="dec qtybutton"><i class="zmdi zmdi-chevron-down"></i></div>
                                                    <div class="inc qtybutton"><i class="zmdi zmdi-chevron-up"></i></div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">Rp. <?php echo number_format($items['subtotal']);?></span></td>
                                        </tr>
                                    <?php $i++; ?>
							                      <?php endforeach; ?>
                                    <?php } ?> 
                                    </form>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon2">
                                            <input class="button" form="update" value="Update cart" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($this->cart->total_items() !== 0) { ?>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul>
                                            <li>Subtotal <span>Rp. <?php echo number_format($this->cart->total());?></span></li>
                                            <li>Total <span>Rp. <?php echo number_format($this->cart->total());?></span></li>
                                        </ul>
                                        <a href="<?php echo base_url().'user/produk/check_out'?>">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quicky's Cart Area End Here -->