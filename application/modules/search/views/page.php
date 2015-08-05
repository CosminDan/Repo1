<?php foreach ($records as $item) : ?>
<div>
<a href="<?php echo site_url("magazines/view/pub-{$item->issue_id}-{$item->id}"); ?>">
<h3>
    <?php e($item->title); ?>
    <small> - <?php echo implode(', ', $item->authors); ?></small>
</h3>
</a>
<p><i><?php e($item->summary); ?></i></p>
<p><?php echo implode(', ', $item->cat_names); ?></p>
</div>
<hr/>
<?php endforeach; ?>
