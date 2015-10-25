<?php

$num_columns = 7;
$can_delete = $this->auth->has_permission('Articles.Content.Delete');
$can_edit  = $this->auth->has_permission('Articles.Content.Edit');
$has_records = isset($records) && is_array($records) && count($records);

if ($can_delete) {
    $num_columns++;
}
?>
<div class='admin-box'>
    <h3>
        <?php echo lang('articles_area_title'); ?>
    </h3>
    <?php echo form_open($this->uri->uri_string()); ?>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <?php if ($can_delete && $has_records) : ?>
                    <th class='column-check'><input class='check-all' type='checkbox' /></th>
                    <?php endif;?>

                    <th><?php echo lang('articles_field_title'); ?></th>
                    <th><?php echo lang('articles_field_page'); ?></th>
                    <th><?php echo lang('articles_field_authors'); ?></th>
                    <th><?php echo lang('articles_field_summary'); ?></th>
                    <th><?php echo lang('articles_field_tags'); ?></th>
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
if ($has_records) :
    foreach ($records as $record) :
?>
                <tr>
                    <?php if ($can_delete) : ?>
                    <td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->id; ?>' /></td>
                    <?php endif;?>

                    <td><?php echo anchor(SITE_AREA . '/content/articles/edit/' . $record->id, $record->title); ?></td>
                    <td><?php e($record->page); ?></td>
                    <td><?php e(implode(', ', $record->authors)); ?></td>
                    <td><?php echo "{$record->summary_count} words"; ?></td>
                    <td>
                        <?php foreach ($record->tags as $tag) { ?>
                            <span class="label label-info"><?php e($tag); ?></span>
                        <?php } ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="<?php echo site_url(SITE_AREA . '/content/articles/edit/' . $record->id); ?>" class="btn btn-primary btn-mini"><i class="icon-pencil icon-white"></i> Edit</a>
                        </div>
                    </td>
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
