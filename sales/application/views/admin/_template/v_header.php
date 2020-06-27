<?php 
$b=$user->row_array();
$qry=$this->db->query("SELECT COUNT(inv_no) AS jum_order FROM tbl_invoice WHERE inv_status='1'");
$o=$qry->row_array();
$chat=$this->db->query("SELECT COUNT(id) AS jum_chat FROM tbl_pesan WHERE status='0'");
$oc=$chat->row_array();
$q=$this->db->query("SELECT DATE_FORMAT(inv_tanggal,'%d %M %Y') AS tgl,inv_plg_nama,inv_status FROM tbl_invoice WHERE inv_status='1' order by date(inv_tanggal) desc");

?>
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline noti-icon"></i>
                            <?php if($o['jum_order'] > 0) { ?>
                            <span class="noti-icon-badge"></span>
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="font-16 text-white m-0">
                                    <span class="float-right">
                                        <a href="" class="text-white">
                                        </a>
                                    </span>New Order
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                <div class="inbox-widget">
                                <?php if($q->num_rows > 0) {
                                foreach ($q->result_array() as $x) {
										$plg=$x['inv_plg_nama'];
									
								?>
                                    <a href="#">
                                        <div class="inbox-item">
                                            
                                            <p class="inbox-item-author"><?php echo $plg;?></p>
                                            <p class="inbox-item-text text-truncate">Saya telah memesan produk ...</p>
                                        </div>
                                    </a>
                                <?php }
                                } else { ?>
                                    <a href="#">
                                        <div class="inbox-item">
                                            <center><p class="inbox-item-text text-truncate">No Notification</p></center>
                                        </div>
                                    </a>
                                <?php } ?>

                                </div> <!-- end inbox-widget -->

                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-email-outline noti-icon"></i>
                            <?php if($oc['jum_chat'] > 0) { ?>
                            <span class="noti-icon-badge"></span>
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="font-16 text-white m-0">
                                    <span class="float-right">
                                        <a href="" class="text-white">
                                        </a>
                                    </span>Messages
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                <div class="inbox-widget">
                                <?php if($psn->num_rows > 0) {
                                foreach ($psn->result_array() as $oss) {
                                    $id=$oss['id'];
                                    $nama=$oss['nama'];
                                    $subjek=$oss['subjek'];
                                ?>
                                    <a href="<?php echo base_url(); ?>admin/pesan"">
                                        <div class="inbox-item">
                                            
                                            <p class="inbox-item-author"><?php echo $nama; ?></p>
                                            <p class="inbox-item-text text-truncate"><?php echo substr($subjek,0,25); ?>...</p>
                                        </div>
                                    </a>
                                    <?php } } ?>
                                </div> <!-- end inbox-widget -->

                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            
                            <span class="d-none d-sm-inline-block ml-1 font-weight-medium"><?php echo $b['pengguna_nama'];?></span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow text-white m-0">Welcome !</h6>
                            </div>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="<?php echo base_url().'administrator/logout'?>" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout-variant"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="<?php echo base_url(); ?>assets/admin/images/logo.png" alt="" height="22">
                            <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="<?php echo base_url(); ?>assets/admin/images/logo-sm.png" alt="" height="24">
                        </span>
                    </a>

                    <a href="index.html" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="<?php echo base_url(); ?>assets/admin/images/logo-light.png" alt="" height="22">
                            <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="<?php echo base_url(); ?>assets/admin/images/logo-sm-light.png" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
        
                </ul>
            </div>