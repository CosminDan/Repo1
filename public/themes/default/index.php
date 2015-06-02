<?php echo theme_view('header'); ?>

<?php echo theme_view('_top_menu'); ?>

<div class="container">

    <?php echo Template::message(); ?>

    <?php echo isset($content) ? $content : Template::content(); ?>

</div>

<?php echo theme_view('footer'); ?>