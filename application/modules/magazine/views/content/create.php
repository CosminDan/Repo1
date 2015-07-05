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
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>


            <div class="control-group<?php echo form_error('title') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_title') , 'title', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='title' type='text' name='title' maxlength='100' value="<?php echo set_value('title', isset($articles->title) ? $articles->title : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('title'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('raw_text') ? ' error' : ''; ?>">
                <?php echo form_label('Raw Text' , 'raw_text', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='raw_text' type='text' name='raw_text' maxlength='100' value="<?php echo set_value('title', isset($articles->title) ? $articles->title : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('raw_text'); ?></span>
                </div>
            </div>


            <div class="control-group<?php echo form_error('references') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_references') , 'references', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='references' type='text' name='references' maxlength='100' value="<?php echo set_value('references', isset($articles->references) ? $articles->references : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('references'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('summary') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_summary') , 'summary', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='summary' type='text' name='summary' maxlength='1000' value="<?php echo set_value('summary', isset($articles->summary) ? $articles->summary : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('summary'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('tags') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_tags') , 'tags', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='tags' type='text' name='tags' maxlength='100' value="<?php echo set_value('tags', isset($articles->tags) ? $articles->tags : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('tags'); ?></span>
                </div>
            </div>
        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('articles_action_create'); ?>" />
            <?php echo lang('bf_or'); ?>
            <?php echo anchor(SITE_AREA . '/content/articles', lang('articles_cancel'), 'class="btn btn-warning"'); ?>

        </fieldset>
    <?php echo form_close(); ?>
</div>
