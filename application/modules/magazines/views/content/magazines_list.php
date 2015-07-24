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
        <?php echo lang('magazines_area_title'); ?>
    </h3>
    <?php echo form_open($this->uri->uri_string()); ?>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <?php if ($can_delete && $has_records) : ?>
                    <th class='column-check'><input class='check-all' type='checkbox' /></th>
                    <?php endif;?>

                    <th><?php echo lang('magazines_field_title'); ?></th>
                    <th><?php echo lang('magazines_field_issn'); ?></th>
                    <th><?php echo lang('magazines_field_founded_year'); ?></th>
                    <th><?php echo lang('magazines_field_publisher'); ?></th>
                    <th>Actions</th>
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
        $vis_icon = $record->approved ? 'icon-eye-open' : 'icon-eye-close';
?>
                <tr>
                    <?php if ($can_delete) : ?>
                    <td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->id; ?>' /></td>
                    <?php endif;?>

                    <td><?php e($record->title); ?></td>
                    <td><?php e($record->issn); ?></td>
                    <td><?php e($record->founded_year); ?></td>
                    <td><?php e($record->publisher); ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?php echo site_url(SITE_AREA . '/content/issues/index/' . $record->id); ?>" class="btn btn-primary btn-mini"><i class="icon-book icon-white"></i> Issues</a>
                            <a href="<?php echo site_url(SITE_AREA . '/content/magazines/edit/' . $record->id); ?>" class="btn btn-primary btn-mini"><i class="icon-pencil icon-white"></i> Edit</a>
                            <a href="<?php echo site_url(SITE_AREA . '/content/magazines/toggleVisibility/' . $record->id); ?>" class="btn btn-primary btn-mini"><i class="<?php echo $vis_icon; ?> icon-white"></i> Visibility</a>
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
