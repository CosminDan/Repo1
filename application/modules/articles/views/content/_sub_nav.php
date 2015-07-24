<?php

$checkSegment = $this->uri->segment(4);
$areaUrl = SITE_AREA . '/content/articles';

?>
<ul class="nav nav-pills">
    <?php if ($this->auth->has_permission('Articles.Content.Create')) : ?>
    <li<?php echo $checkSegment == 'create' ? ' class="active"' : ''; ?>>
        <a href="<?php echo site_url($areaUrl.'/create/'.$issue->id); ?>" id="create_new">
            <?php echo lang('articles_new'); ?>
        </a>
    </li>
    <?php endif; ?>
</ul>
