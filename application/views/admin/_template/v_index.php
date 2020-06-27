<!DOCTYPE html>
<html lang="en">

<?php echo $head; ?>

    <body class="enlarged boxed-layout" data-keep-enlarged="true">

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <?php echo $header; ?>
            <!-- end Topbar -->

            
            <!-- ========== Left Sidebar Start ========== -->
            <?php echo $sidebar; ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
            <?php echo $content; ?>
            <?php echo $footer; ?>
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->


        <!-- Vendor js -->
        <?php echo $js; ?>
        
    </body>
</html>