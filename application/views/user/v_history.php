<!-- Begin Quicky's Breadcrumb Area -->
<div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Thank You</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">History</li>
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
                                        <th class="quicky-product-remove">ORDER</th>
                                        <th class="quicky-product-thumbnail">DATE</th>
                                        <th class="cart-product-name">STATUS</th>
                                        <th class="quicky-product-price">TOTAL</th>
                                        <th class="quicky-product-quantity"></th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                <?php if ($data->num_rows > 0) {
                                    foreach ($data->result_array() as $a): 
                                    $invoice=$a['inv_no'];
                                    $tanggal=$a['inv_tanggal'];
                                    $total=$a['inv_total'];
                                    $status=$a['status_nama']; ?>
                                        <tr>
                                            <td class="quicky-product-remove"><?php echo $invoice;?></a></td>
                                            <td class="quicky-product-thumbnail"><?php echo date("d F Y", strtotime($tanggal));?></a></td>
                                            <td class="quicky-product-name"><?php echo $status;?></td>
                                            <td class="quicky-product-price"><span class="amount"><?php echo $total;?></span></td>
                                            <td><a href="javascript:void(0)" class="quicky-btn-2 quicky-btn_sm item_show" data="<?php echo $invoice;?>"><span>View</span></a></td></tr>
                                    <?php endforeach; 
                                    } else { ?>
                                        <tr>
                                        <td colspan="5">Your history is empty</td>
                                        </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quicky's Cart Area End Here -->