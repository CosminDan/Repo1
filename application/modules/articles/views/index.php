

<h1 class='page-header'>
    <?php echo lang('articles_area_title'); ?>
</h1>
<?php if (isset($records) && is_array($records) && count($records)) : ?>
<table class='table table-striped table-bordered'>
    <thead>
        <tr>
            <th>Magazines Id</th>
            <th>Title</th>
            <th>Authors Id</th>
            <th>Affiliation</th>
            <th>References</th>
            <th>Summary</th>
            <th>Tags</th>
            <th>Pdf Url</th>
            <th><?php echo lang('articles_column_created'); ?></th>
            <th><?php echo lang('articles_column_modified'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($records as $record) :
        ?>
        <tr>
            <?php
            foreach($record as $field => $value) :
                
            ?>
            <td>
                <?php
                if ($field == 'deleted') {
                    e(($value > 0) ? lang('articles_true') : lang('articles_false'));
                } else {
                    e($value);
                }
                ?>
            </td>
            <?php
            endforeach;
            ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php

    echo $this->pagination->create_links();
endif; ?>