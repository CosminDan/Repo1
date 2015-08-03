<div role="tabpanel">

    <ul class="nav nav-pills nav-justified categs">
        <li class="arts active" role="presentation" text-align="center">
            <a href="#arts" aria-controls="arts" role="tab" data-toggle="pill"><i class="fa fa-institution"></i><br/><br/>Arts &amp; Humanities</a>
        </li>

        <li class="science" role="presentation" text-align="center">
            <a href="#science" aria-controls="science" role="tab" data-toggle="pill"><i class="fa fa-flask"></i><br/><br/>Science</a>
        </li>

        <li class="social" role="presentation" text-align="center">
            <a href="#social" aria-controls="social" role="tab" data-toggle="pill"><i class="fa fa-group"></i><br/><br/>Social Science</a>
        </li>
    </ul>

    <div class="tab-content">
        <?php foreach ($mainCats as $i => $mainCat) { ?>
        <div role="tabpanel" class="tab-pane fade <?php if (!$i) echo 'active in'; ?>" id="<?php echo $mainCat->tab_id; ?>">
            <div class="row-fluid">

                    <div class="col-md-4">
                    <div class="panel <?php e($mainCat->panel); ?>">
                        <div class="panel-heading"><h4>Top Articles</h4></div>
                        <div class="list-group">
                            <?php foreach ($mainCat->articles_popular as $art) { ?>
                                <a href="<?php echo site_url("magazines/view/pub-{$art->issue_id}-{$art->article_id}"); ?>" class="list-group-item"><?php echo $art->title; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="panel <?php e($mainCat->panel); ?>">
                        <div class="panel-heading"><h4>Last Added</h4></div>
                        <div class="list-group">
                            <?php foreach ($mainCat->articles_recent as $art) { ?>
                                <a href="<?php echo site_url("magazines/view/pub-{$art->issue_id}-{$art->article_id}"); ?>" class="list-group-item"><?php echo $art->title; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="panel <?php e($mainCat->panel); ?>">
                        <div class="panel-heading"><h4>Popular Subcategories</h4></div>
                        <div class="list-group">
                            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                            <a href="#" class="list-group-item">Morbi leo risus</a>
                            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                            <a href="#" class="list-group-item">Vestibulum at eros</a>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>
