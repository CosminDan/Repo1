<?php echo theme_view('parts/header'); ?>

<?php echo theme_view('parts/top_menu'); ?>

<div class="container">

    <?php echo Template::message(); ?>

    <?php echo isset($content) ? $content : Template::content(); ?>

</div>

<?php echo theme_view('parts/footer'); ?>