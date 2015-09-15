<div role="tabpanel">

    <div class="tab-content">
        <div role="tabpanel">
            <div class="row-fluid">
        <?php foreach ($mainCats as $i => $mainCat) { ?>
                <div class="col-md-4 categs <?php echo $mainCat->tab_id; ?>">
                    <i class="fa fa-<?php echo $mainCat->icon; ?>"></i><br/><br/>
                    <?php echo $mainCat->name; ?>

                <div class="panel <?php e($mainCat->panel); ?>">
                    <div class="panel-heading"><h4>Top Articles</h4></div>
                    <div class="list-group">
                        <?php foreach ($mainCat->articles_popular as $art) { ?>
                            <a href="<?php echo site_url("magazines/view/pub-{$art->issue_id}-{$art->article_id}"); ?>" class="list-group-item"><?php echo $art->title; ?></a>
                        <?php } ?>
                    </div>
                </div>


                <div class="panel <?php e($mainCat->panel); ?>">
                    <div class="panel-heading"><h4>Last Added</h4></div>
                    <div class="list-group">
                        <?php foreach ($mainCat->articles_recent as $art) { ?>
                            <a href="<?php echo site_url("magazines/view/pub-{$art->issue_id}-{$art->article_id}"); ?>" class="list-group-item"><?php echo $art->title; ?></a>
                        <?php } ?>
                    </div>
                </div>
                </div>
        <?php } ?>
            </div>
        </div>
    </div>

</div>
