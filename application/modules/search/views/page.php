<?php if (count($records)) : ?>
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
<?php else : ?>
<h1>No results found</h1>
<p>Please try other keywords or remove some of the advanced search options.</p>
<?php endif; ?>
