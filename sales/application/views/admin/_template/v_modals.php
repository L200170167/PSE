
<!doctype html>
<html class="no-js" lang="en">

<?php echo $head; ?>

<body class="template-color-1 font-family-01">

    <div class="main-wrapper">

        <?php echo $header; ?>

        <?php echo $content; ?>

        <?php echo $footer; ?>

        <?php echo $modal; ?>

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
                                        <?php echo $this->session->flashdata('msg');?>
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

        <!-- Scroll To Top Start -->
        <a class="scroll-to-top" href=""><i class="icon-arrow-up"></i></a>
        <!-- Scroll To Top End -->

    </div>

<?php echo $js; ?>
</body>

</html>