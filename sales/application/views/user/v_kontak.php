<?php 
$a=$info->row_array();
?>        
        <!-- Begin Quicky's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <h2>Call Me</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Quicky's Breadcrumb Area End Here -->
        <!-- Begin Contact Main Page Area -->
        <div class="contact-main-page ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-page-side-content">
                            <h3 class="contact-page-title">Contact Us</h3>
                            <p class="contact-page-message">If you have questions or feedback about our services, please contact us via this form:</p>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-fax"></i> Address</h4>
                                <p><?php echo $a['nama']; ?></p>
                                <p><?php echo $a['alamat']; ?></p>
                            </div>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-phone"></i> Phone</h4>
                                <p>Mobile: <?php echo $a['nohp']; ?></p>
                            </div>
                            <div class="single-contact-block last-child">
                                <h4><i class="fa fa-envelope"></i> Email</h4>
                                <p><?php echo $a['email']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form-content">
                            <h3 class="contact-page-title">Tell Us Your Message</h3>
                            <div class="contact-form">
                            <?php echo $this->session->flashdata('msg');?><br>
                                <form id="contact-form" action="<?php echo base_url().'user/home/kirim_pesan'?>" method="post">
                                    <div class="form-group">
                                        <label>Your Name <span class="required">*</span></label>
                                        <input type="text" name="nama" id="con_name" value="<?php echo $this->session->userdata('nama_pel'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Your Email <span class="required">*</span></label>
                                        <input type="email" name="email" id="con_email" value="<?php echo $this->session->userdata('email_pel'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="subjek" id="con_subject">
                                    </div>
                                    <div class="form-group form-group-2">
                                        <label>Your Message</label>
                                        <textarea name="isi" id="con_message"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" value="submit" id="submit" class="contact-form_btn" name="submit">send</button>
                                    </div>
                                </form>
                            </div>
                            <p class="form-messege mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Main Page Area End Here -->