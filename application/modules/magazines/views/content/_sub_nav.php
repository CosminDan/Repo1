<?php

$segment = $this->uri->segment(4);
$areaUrl = SITE_AREA . '/content/magazines';

?>
<ul class='nav nav-pills'>
    <li<?php echo $segment == '' ? ' class="active"' : ''; ?>>
        <a href="<?php echo site_url($areaUrl); ?>" id='list'>
            <?php echo lang('magazines_list'); ?>
        </a>
    </li>
    <?php if ($this->auth->has_permission('Magazines.Content.Create')) : ?>
    <li<?php echo $segment == 'create' ? ' class="active"' : ''; ?>>
        <a href="<?php echo site_url($areaUrl . '/create'); ?>" id='create_new'>
            <?php echo lang('magazines_new'); ?>
        </a>
    </li>
    <?php endif; ?>
</ul>
