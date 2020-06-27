
<!doctype html>
<html class="no-js" lang="en">

<?php echo $head; ?>

<body class="template-color-1 font-family-01">

    <div class="main-wrapper">

        <?php echo $header; ?>

        <?php echo $content; ?>

        <?php echo $footer; ?>

        <div class="modal fade" id="login">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area sp-area row">
                                <form action="<?php echo base_url().'user/member/auth'?>" method="post">
                                    <div class="login-form">
                                        <?php echo $this->session->flashdata('login');?>
                                        <h4 class="login-title">Login</h4>
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <label>Email Address*</label>
                                                <input type="email" name="email" placeholder="Email Address">
                                            </div>
                                            <div class="col-12 mb--20">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="check-box">
                                                    <input type="checkbox" id="remember_me">
                                                    <label for="remember_me">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="login_btn">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="register">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area sp-area row">
                                <form action="<?php echo base_url().'user/member/simpan_pelanggan'?>" method="post">
                                    <div class="login-form">
                                    <?php echo $this->session->flashdata('register');?>
                                        <h4 class="login-title">Register</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Full Name</label>
                                                <input type="text" name="nama" placeholder="First Name">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Email Address*</label>
                                                <input type="email" name="email" placeholder="Email Address">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Password</label>
                                                <input type="password" name="pass" placeholder="Password">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Confirm Password</label>
                                                <input type="password" name="pass2" placeholder="Confirm Password">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="register_btn">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="view">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area sp-area row">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_model">

                                        </tbody>
                                        <tfoot id="show_total">

                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card-header" id="#payment-1">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Direct Bank Transfer.
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Make sure the recipient's name is  PT. Textile Indonesia</p>
                                                        <p>BNI   81234 56412<br>
                                                        BRI   06478 12323 21321<br>
                                                        BCA   67889 12323</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-button-payment">
                                            <input value="Confirm" type="button" data-dismiss="modal" aria-label="Close">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll To Top Start -->
        <a class="scroll-to-top" href=""><i class="icon-arrow-up"></i></a>
        <!-- Scroll To Top End -->

    </div>

<?php echo $js; ?>
<script type="text/javascript">
	$(document).ready(function(){
        //fungsi tampil barang
		$('#show_data').on('click','.item_show',function(){
            var ids=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('history/get_invoice')?>",
                dataType : "JSON",
                data : {ids:ids},
                success: function(data){
                	var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr class="cart_item">'+
                                '<td class="cart-product-name">'+data[i].detail_produk_nama+'<strong class="product-quantity"> x '+data[i].detail_jumlah+'</strong></td>'+
                                '<td style="text-align:center" class="cart-product-total"><span class="amount">Rp '+data[i].detail_subtotal+'</span></td>'+
                                '</tr>';
		            }

		            $('#show_model').html(html);
                }
            });
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('history/get_total_invoice')?>",
                dataType : "JSON",
                data : {ids:ids},
                success: function(data){
                    $('#view').modal('show');
                	var htmls = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                htmls += '<tr class="cart-subtotal">'+
                                '<th>Inv Subtotal</th>'+
                                '<td style="text-align:center"><span class="amount">Rp '+data[i].inv_total+'</span></td>'+
                                '</tr>'+
                                '<tr class="order-total">'+
                                '<th>Order Total</th>'+
                                '<td style="text-align:center"><strong><span class="amount">Rp '+data[i].inv_total+'</span></strong></td>'+
                                '</tr>';
		            }

		            $('#show_total').html(htmls);
                }
            });
            return false;
        });
	});

</script>
<?php if ($this->session->flashdata('login')) { ?>
<script>
    $(document).ready(function(){
        $("#login").modal('show');
    });
</script>
<?php } ?>

<?php if ($this->session->flashdata('register')) { ?>
<script>
    $(document).ready(function(){
        $("#register").modal('show');
    });
</script>
<?php } ?>
</body>

</html>