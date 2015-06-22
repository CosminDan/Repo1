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
    <h3>Articles</h3>
    <?php echo form_open_multipart($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>
            <div class="control-group<?php echo form_error('title') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_title') , 'title', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='title' type='text' name='title' maxlength='100' value="<?php echo set_value('title', isset($articles->title) ? $articles->title : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('title'); ?></span>
                </div>
            </div>

            <?php echo form_multiselect('authors[]', $articles->authors, array_keys($articles->authors), lang('articles_field_authors'), 'class="select2-tags"'); ?>

            <div class="control-group<?php echo form_error('affiliation') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_affiliation') , 'affiliation', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='affiliation' type='text' name='affiliation' maxlength='100' value="<?php echo set_value('affiliation', isset($articles->affiliation) ? $articles->affiliation : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('affiliation'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('references') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_references') , 'references', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='references' type='text' name='references' maxlength='100' value="<?php echo set_value('references', isset($articles->references) ? $articles->references : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('references'); ?></span>
                </div>
            </div>

            <!-- <div class="control-group<?php echo form_error('summary') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_summary') , 'summary', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='summary' type='text' name='summary' maxlength='1000' value="<?php echo set_value('summary', isset($articles->summary) ? $articles->summary : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('summary'); ?></span>
                </div>
            </div> -->

            <div class="control-group<?php echo form_error('summary') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_summary') , 'summary', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <textarea name="summary"><?php echo isset($articles->summary) ? $articles->summary : ''; ?></textarea>
                    <span class='help-inline'><?php echo form_error('summary'); ?></span>
                </div>
            </div>

            <?php echo form_multiselect('tags[]', $articles->tags, $articles->tags, lang('articles_field_tags'), 'class="select2-tags"'); ?>

            <div class="control-group">
                <div class='controls'>
                    <textarea name="raw_text"><?php echo isset($articles->raw_text) ? $articles->raw_text : ''; ?></textarea>
                </div>
            </div>

            <div class="control-group">
                <div class='controls'>
                    <input type="file" name="pdf_file"/>
                </div>
            </div>
        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('articles_action_edit'); ?>" />
            <?php echo lang('bf_or'); ?>
            <?php echo anchor(SITE_AREA . '/content/articles', lang('articles_cancel'), 'class="btn btn-warning"'); ?>

            <?php if ($this->auth->has_permission('Articles.Content.Delete')) : ?>
                <?php echo lang('bf_or'); ?>
                <button type='submit' name='delete' formnovalidate class='btn btn-danger' id='delete-me' onclick="return confirm('<?php e(js_escape(lang('articles_delete_confirm'))); ?>');">
                    <span class='icon-trash icon-white'></span>&nbsp;<?php echo lang('articles_delete_record'); ?>
                </button>
            <?php endif; ?>
        </fieldset>
    <?php echo form_close(); ?>
</div>
