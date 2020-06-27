        <?php 
			$b=$data->row_array();
        ?>
        <!-- Begin Quicky's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Do Your Best</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">My Account</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Quicky's Breadcrumb Area End Here -->

        <!-- Begin Page Content Area -->
        <main class="page-content">
            <!-- Begin Account Page Area -->
            <div class="account-page-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-logout-tab" href="<?php echo base_url(); ?>logout" role="tab" aria-selected="false">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                                    <div class="myaccount-dashboard">
                                        <p>Hello <b><?php echo $this->session->userdata('nama_pel'); ?></b> (not <?php echo $this->session->userdata('nama_pel'); ?>? <a href="<?php echo base_url(); ?>logout">Sign
                                                out</a>)</p>
                                        <p>From your account dashboard you can manage your shipping and edit your password and account details.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
                                        <p>The following addresses will be used on the checkout page by default.</p>
                                        <div class="row">
                                            <div class="col">
                                                <h4 class="small-title">SHIPPING ADDRESS</h4>
                                                <address>
                                                    <?php if ($b['plg_alamat']=="") {
                                                        echo "Alamat pengiriman belum diatur";
                                                    } else {
                                                    echo $b['plg_alamat']; 
                                                    } ?>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
                                        <form action="<?php echo base_url(); ?>user/member/update_pelanggan" method="post" class="quicky-form">
                                            <div class="quicky-form-inner">
                                            <?php echo $this->session->flashdata('msg');?></br>
                                                <div class="single-input">
                                                    <label for="account-details-firstname">Full Name*</label>
                                                    <input type="text" name="nama" id="account-details-firstname" value="<?php echo $b['plg_nama']; ?>" required>
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-email">Email*</label>
                                                    <input type="email" name="email" value="<?php echo $b['plg_email']; ?>" id="account-details-email" required>
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-phone">Phone*</label>
                                                    <input type="text" name="phone" value="<?php echo $b['plg_notelp']; ?>" id="account-details-phone" required>
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-address">Address*</label>
                                                    <input type="text" name="alamat" value="<?php echo $b['plg_alamat']; ?>" id="account-details-address" required>
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-oldpass">Current Password(leave blank to leave
                                                        unchanged)</label>
                                                    <input type="password" name="passlama" id="account-details-oldpass">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-newpass">New Password (leave blank to leave
                                                        unchanged)</label>
                                                    <input type="password" name="passbaru" id="account-details-newpass">
                                                </div>
                                                <div class="single-input">
                                                    <label for="account-details-confpass">Confirm New Password</label>
                                                    <input type="password" name="passdoang" id="account-details-confpass">
                                                </div>
                                                <div class="single-input">
                                                    <button class="quicky-btn-2" type="submit"><span>Save
                                                    Changes</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Account Page Area End Here -->
        </main>
        <!-- Page Content Area End Here -->