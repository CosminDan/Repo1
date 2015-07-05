<?php

$checkSegment = $this->uri->segment(4);
$areaUrl = SITE_AREA . '/content/articles';

?>
<ul class='nav nav-pills'>
    <?php if ($this->auth->has_permission('Articles.Content.Create')) : ?>
    <li<?php echo $checkSegment == 'add' ? ' class="active"' : ''; ?>>
        <a href="<?php echo site_url(SITE_AREA . '/content/issues/add/'.$issue->id); ?>" id='create_new'>
            <?php echo lang('articles_new'); ?>
        </a>
    </li>
    <?php endif; ?>
</ul>
