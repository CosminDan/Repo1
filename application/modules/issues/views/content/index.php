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
    <h3>
        <?php echo lang('magazine_issues_area_title'); ?>
    </h3>
    <?php echo form_open($this->uri->uri_string()); ?>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <?php if ($can_delete && $has_records) : ?>
                    <th class='column-check'><input class='check-all' type='checkbox' /></th>
                    <?php endif;?>

                    <th><?php echo lang('magazines_field_title'); ?></th>
                    <th><?php echo lang('magazines_field_number'); ?></th>
                    <th><?php echo lang('magazines_field_volume'); ?></th>
                    <th><?php echo lang('magazines_field_special'); ?></th>
                    <th><?php echo lang('magazines_field_year_issue'); ?></th>
                    <th><?php echo lang('magazines_field_year_published'); ?></th>
                    <th><?php echo lang('magazines_field_status'); ?></th>
                    <th></th>
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
if ($has_records) :
    foreach ($records as $record) :
?>
                <tr>
                    <?php if ($can_delete) : ?>
                    <td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->id; ?>' /></td>
                    <?php endif;?>

                    <td><?php e($magazine->title); ?></td>
                    <td><?php e($record->number); ?></td>
                    <td><?php e($record->volume); ?></td>
                    <td><?php e($record->special); ?></td>
                    <td><?php echo integerToRoman($record->year_issue); ?></td>
                    <td><?php e($record->year_published); ?></td>
                    <td><?php e($record->status); ?></td>
                    <td><?php echo anchor(SITE_AREA . '/content/articles/index/' . $record->id, "{$record->count} articles"); ?></td>
                </tr>
                <?php
endforeach;
else:
?>
                <tr>
                    <td colspan='<?php echo $num_columns; ?>'><?php echo lang('articles_records_empty'); ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php
echo form_close();

echo $this->pagination->create_links();
?>
</div>
