<?php

if (validation_errors()) :
?>
<div class='alert alert-block alert-error fade in'>
    <a class='close' data-dismiss='alert'>&times;</a>
    <h4 class='alert-heading'>
        <?php echo lang('articles_errors_message'); ?>
    </h4>
    <?php echo validation_errors(); ?>
</div>
<?php
endif;

$id = isset($item->id) ? $item->id : '';

?>
<div class='admin-box'>
    <h3><?php echo $page_head; ?></h3>
    <?php echo form_open_multipart($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>

            <?php echo form_hidden('id', $item->id); ?>

            <?php echo form_hidden('magazine_id', $item->magazine_id); ?>

            <?php echo form_input('number', $item->number, lang('issues_field_number')); ?>

            <?php echo form_input('special', $item->special, lang('issues_field_special')); ?>

            <?php echo form_input('volume', $item->volume, lang('issues_field_volume')); ?>

            <?php echo form_input('year_published', $item->year_published, lang('issues_field_year_published')); ?>

            <?php echo form_input('year_issue', $item->year_issue, lang('issues_field_year_issue')); ?>

            <?php if (!$id) echo form_input('articles_no', '0', 'Number of articles'); ?>

        </fieldset>
        <fieldset class="form-actions">
            <input type="submit" name="save" class='btn btn-primary' value="<?php echo lang('bf_action_save'); ?>" />
            <?php echo anchor(SITE_AREA . '/content/issues', lang('bf_action_cancel'), 'class="btn btn-warning"'); ?>
        </fieldset>
    <?php echo form_close(); ?>
</div>
