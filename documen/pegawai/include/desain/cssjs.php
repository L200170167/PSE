        <title><?php echo ucwords($judul);?></title>

        <!-- CSSJS -->
        <?php if ($popup==1) {?>
        <link
            rel="stylesheet"
            type="text/css"
            href="../../../data/cssjs/popup/popup.css">
        <?php } ?>
        <?php if ($ckeditor==1)
{
    ?>
        <script
            type="text/javascript"
            src="../../../data/cssjs/ckeditor/ckeditor/ckeditor.js"></script>
        <?php
}
?>
        <?php if ($combosearch==1)
{
    ?>
        <link
            rel="stylesheet"
            href="../../../data/cssjs/combosearch/css/bootstrap-select.min.css"/>
        <script
            type="text/javascript"
            src="../../../data/cssjs/combosearch/js/jquery-3.1.0.min.js"></script>
        <script
            type="text/javascript"
            src="../../../data/cssjs/combosearch/js/bootstrap-select.min.js"></script>
        <?php
}
?>