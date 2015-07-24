<?php

$segment = $this->uri->segment(4);
$areaUrl = SITE_AREA . '/content/issues';

?>
<ul class="nav nav-pills">
    <?php if ($this->auth->has_permission('Issues.Content.Create')) : ?>
    <li<?php echo $segment == 'create' ? ' class="active"' : ''; ?>>
        <a href="<?php echo site_url($areaUrl.'/create/'.$magazine->id); ?>" id="create_new">
            <?php echo lang('articles_new'); ?>
        </a>
    </li>
    <?php endif; ?>
</ul>
