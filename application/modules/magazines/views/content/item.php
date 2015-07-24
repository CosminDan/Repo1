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
    <h3>Edit Magazine</h3>
    <?php echo form_open_multipart($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>

            <?php echo form_input('title', $item->title, 'Title'); ?>

            <?php echo form_input('issn', $item->issn, 'ISSN'); ?>

            <?php echo form_dropdown('language', $languages, $item->language, lang('pa_language')); ?>

            <?php echo form_input('publisher', $item->publisher, 'Publisher'); ?>

            <?php echo form_input('editorial_address', $item->editorial_address, 'Editorial Address'); ?>

            <?php echo form_input('email', $item->email, 'E-Mail'); ?>

            <?php echo form_input('website', $item->website, 'Website'); ?>

            <?php echo form_input('phoneno', $item->phoneno, 'Phone Number'); ?>

            <?php echo form_input('founded_year', $item->founded_year, 'Year Founded'); ?>

            <?php echo form_input('description', $item->description, 'Description'); ?>

        </fieldset>
        <fieldset class="form-actions">
            <input type="submit" name="save" class='btn btn-primary' value="<?php echo lang('bf_action_save'); ?>" />
            <?php echo anchor(SITE_AREA . '/content/magazines', lang('bf_action_cancel'), 'class="btn btn-warning"'); ?>
        </fieldset>
    <?php echo form_close(); ?>
</div>
