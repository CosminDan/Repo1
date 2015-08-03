<?php

$num_columns = 8;
$can_delete = $this->auth->has_permission('Articles.Content.Delete');
$can_edit  = $this->auth->has_permission('Articles.Content.Edit');
$has_records = isset($records) && is_array($records) && count($records);

if ($can_delete) {
    $num_columns++;
}
?>
<div class='admin-box'>
    <h3><?php echo $page_head; ?></h3>
    <?php echo form_open($this->uri->uri_string()); ?>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <?php if ($can_delete && $has_records) : ?>
                    <th class='column-check'><input class='check-all' type='checkbox' /></th>
                    <?php endif;?>

                    <th><?php echo lang('issues_heading_title'); ?></th>
                    <th><?php echo lang('issues_heading_year_issue'); ?></th>
                    <th><?php echo lang('issues_heading_year_published'); ?></th>
                    <th><?php echo lang('issues_heading_articles_count'); ?></th>
                    <th><?php echo lang('issues_heading_pdf_loaded'); ?></th>
                    <th><?php echo lang('issues_heading_status'); ?></th>
                    <th><?php echo lang('pa_actions'); ?></th>
                </tr>
            </thead>
            <?php if ($has_records) : ?>
            <tfoot>
                <?php if ($can_delete) : ?>
                <tr>
                    <td colspan='<?php echo $num_columns; ?>'>
                        <?php echo lang('bf_with_selected'); ?>
                        <input type='submit' name='delete' id='delete-me' class='btn btn-danger' value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('articles_delete_confirm'))); ?>')" />
                    </td>
                </tr>
                <?php endif; ?>
            </tfoot>
            <?php endif; ?>
            <tbody>
                <?php
foreach ($records as $record) :
    if ($record->status == 'published') {
        $publish_icon = 'icon-remove';
        $publish_name = 'Unpublish';
        $pubBtn = 'btn-danger';
    } else {
    $publish_icon = 'icon-ok';
    $publish_name = 'Publish';
    $pubBtn = 'btn-success';
}
$publish = "<i class=\"{$publish_icon} icon-white\"></i> {$publish_name}"
?>
                <tr>
                    <?php if ($can_delete) : ?>
                    <td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->id; ?>' /></td>
                    <?php endif;?>

                    <td><?php e("{$magazine->title} {$record->full_title}"); ?></td>
                    <td><?php echo integerToRoman($record->year_issue); ?></td>
                    <td><?php e($record->year_published); ?></td>
                    <td><?php e($record->count); ?></td>
                    <td><?php if ($record->pdf_file) echo '<i class="icon-ok"></i>'; ?></td>
                    <td><?php e($record->status); ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?php echo site_url(SITE_AREA . '/content/issues/edit/' . $record->id); ?>" class="btn btn-primary btn-mini"><i class="icon-pencil icon-white"></i> Edit</a>
                            <a href="<?php echo site_url(SITE_AREA . '/content/articles/index/' . $record->id); ?>" class="btn btn-primary btn-mini"><i class="icon-book icon-white"></i> Articles</a>
                            <a href="<?php echo site_url(SITE_AREA . '/content/issues/pdf/' . $record->id); ?>" class="btn btn-primary btn-mini"><i class="icon-download icon-white"></i> PDF</a>
                            <a href="<?php echo site_url(SITE_AREA . '/content/issues/publish/' . $record->id); ?>" class="btn <?php e($pubBtn); ?> btn-mini"><?php echo $publish; ?></a>
                        </div>
                    </td>
                </tr>
                <?php
endforeach;

?>
            </tbody>
        </table>
    <?php
echo form_close();

echo $this->pagination->create_links();
?>
</div>
