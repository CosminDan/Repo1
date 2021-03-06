<?php

Assets::add_css(array('bootstrap.3.3.5.min.css', 'bootstrap-responsive.min.css'));
Assets::add_css('main.css');
Assets::add_css('font-awesome.min.css');
Assets::add_css('jquery-ui.min.css');
Assets::add_css('jquery-ui.structure.min.css');
Assets::add_css('jquery-ui.theme.min.css');
Assets::add_js('bootstrap.3.3.5.min.js');
Assets::add_js('jquery-ui.min.js');

$inline  = '$(".dropdown-toggle").dropdown();';
$inline .= '$(".tooltips").tooltip();';
Assets::add_js($inline, 'inline');

?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <title><?php
echo isset($page_title) ? "{$page_title} : " : '';
e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire');
?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php e(isset($meta_description) ? $meta_description : ''); ?>">
    <meta name="author" content="<?php e(isset($meta_author) ? $meta_author : ''); ?>">
    <?php
/* Modernizr is loaded before CSS so CSS can utilize its features */
//echo Assets::js('modernizr-2.5.3.js');
?>
    <?php echo Assets::css(); ?>
    <script src="<?php echo js_path(); ?>jquery-1.11.3.min.js"></script>
    <?php echo Assets::js(); ?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
</head>
<body>
