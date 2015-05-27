<?php

$num_columns	= 8;
$can_delete	= $this->auth->has_permission('Articles.Content.Delete');
$can_edit		= $this->auth->has_permission('Articles.Content.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

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
					
					<th><?php echo lang('articles_field_magazines_id'); ?></th>
					<th><?php echo lang('articles_field_title'); ?></th>
					<th><?php echo lang('articles_field_authors_id'); ?></th>
					<th><?php echo lang('articles_field_affiliation'); ?></th>
					<th><?php echo lang('articles_field_references'); ?></th>
					<th><?php echo lang('articles_field_summary'); ?></th>
					<th><?php echo lang('articles_field_tags'); ?></th>
					<th><?php echo lang('articles_field_pdf_url'); ?></th>
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
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/content/articles/edit/' . $record->id, '<span class="icon-pencil"></span> ' .  $record->magazines_id); ?></td>
				<?php else : ?>
					<td><?php e($record->magazines_id); ?></td>
				<?php endif; ?>
					<td><?php e($record->title); ?></td>
					<td><?php e($record->authors_id); ?></td>
					<td><?php e($record->affiliation); ?></td>
					<td><?php e($record->references); ?></td>
					<td><?php e($record->summary); ?></td>
					<td><?php e($record->tags); ?></td>
					<td><?php e($record->pdf_url); ?></td>
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