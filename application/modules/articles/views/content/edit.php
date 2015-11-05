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

$id = isset($articles->id) ? $articles->id : '';

?>
<div class='admin-box'>
    <h3><?php echo lang('articles_area_title'); ?></h3>
    <?php echo form_open_multipart($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>
            <?php echo form_input('title', $articles->title, lang('articles_field_title'), 'class="input-xxlarge" maxlength="256"'); ?>

            <?php echo form_multiselect('categories[]', $categories, $articles->categories, lang('articles_field_categories'), 'class="select2-tags input-xxlarge"'); ?>

            <?php echo form_multiselect('authors[]', $articles->authors, array_keys($articles->authors), lang('articles_field_authors'), 'class="select2-tags input-xxlarge"'); ?>

            <?php echo form_input('author_email', $articles->author_email, lang('articles_field_author_email'), 'class="input-xxlarge" maxlength="256"'); ?>

            <?php echo form_input('affiliation', $articles->affiliation, lang('articles_field_affiliation'), 'class="input-xxlarge" maxlength="256"'); ?>

            <?php echo form_input('page', $articles->page, lang('articles_field_page'), 'class="input-xxlarge" maxlength="6"'); ?>

            <div class="control-group<?php echo form_error('references') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_references') , 'references', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <?php echo form_textarea('references', $articles->references, 'class="input-xxlarge"'); ?>
                    <span class='help-inline'><?php echo form_error('references'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('summary') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_summary') , 'summary', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <?php echo form_textarea('summary', $articles->summary, 'class="input-xxlarge"'); ?>
                    <span class='help-inline'><?php echo form_error('summary'); ?></span>
                </div>
            </div>

            <?php echo form_multiselect('tags[]', $articles->tags, $articles->tags, lang('articles_field_tags'), 'class="select2-tags-token input-xxlarge"'); ?>
        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('bf_action_save'); ?>" />
            <?php echo anchor(SITE_AREA . '/content/articles/index/'.$articles->issue_id, lang('bf_action_cancel'), 'class="btn btn-warning"'); ?>
        </fieldset>
    <?php echo form_close(); ?>
</div>
