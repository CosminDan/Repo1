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
            

            <div class="control-group<?php echo form_error('magazines_id') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_magazines_id') , 'magazines_id', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='magazines_id' type='text' name='magazines_id' maxlength='11' value="<?php echo set_value('magazines_id', isset($articles->magazines_id) ? $articles->magazines_id : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('magazines_id'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('title') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_title') , 'title', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='title' type='text' name='title' maxlength='100' value="<?php echo set_value('title', isset($articles->title) ? $articles->title : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('title'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('authors_id') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_authors_id') , 'authors_id', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='authors_id' type='text' name='authors_id' maxlength='11' value="<?php echo set_value('authors_id', isset($articles->authors_id) ? $articles->authors_id : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('authors_id'); ?></span>
                </div>
            </div>

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

            <div class="control-group<?php echo form_error('pdf_url') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_pdf_url') , 'pdf_url', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='pdf_url' type='text' name='pdf_url' maxlength='50' value="<?php echo set_value('pdf_url', isset($articles->pdf_url) ? $articles->pdf_url : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('pdf_url'); ?></span>
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