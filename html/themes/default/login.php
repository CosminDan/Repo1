<?php echo theme_view('parts/header'); ?>

<div class="container">
    <?php
echo isset($content) ? $content : Template::content();

?>
    <div id="debug"></div>

</body>
</html>
