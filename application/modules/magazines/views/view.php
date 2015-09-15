<?php
$baseCoverPath = './media/';
if ($article_active) {
    $found = false;
    foreach ($articles as $i => $article) {
        if ($article->id == $article_active) {
            $found = true;
            break;
        }
    }
}
?>

<?php if ($found) { ?>
<div class="article_main">
<hr/>
<h1>
    <?php e($article->title); ?>
</h1>
<h3>
    <?php echo implode(', ', $article->authors); ?>,
    <small>
        <?php echo e($article->affiliation_name); ?>
    </small>
</h3>

<hr/>

    <p>
        <?php e($article->summary); ?>
    </p>

<hr/>
</div>

<h2>
    <?php e("{$magazine->title} {$issue->full_title}"); ?>
</h2>

<?php } else { ?>

<h1>
    <?php e("{$magazine->title} {$issue->full_title}"); ?>
</h1>

<?php } ?>
<div class="row-fluid">
    <div class="span4">
        <div class="issue-cover">
            <div class="thumbnail">
                <?php if ($issue->cover_file) { ?>
                <img src="<?php echo base_url($baseCoverPath.$issue->cover_file); ?>" />
                <?php } else { ?>
                <div class="no-image">
                    <span><?php e("{$magazine->title} {$issue->full_title}"); ?></span>
                </div>
                <?php } ?>
            </div>
        </div>
        <div>
            <a href="<?php echo site_url("magazines/download/{$issue->id}"); ?>" class="btn btn-primary btn-lg btn-block"><i class="fa fa-download"></i> Download PDF</a>
        </div>
    </div>
    <div class="span8">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach ($articles as $i => $article) : ?>
            <?php $show = ($article->id == $article_active) ? ' in' : ''; ?>
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php e($i); ?>">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php e($i); ?>" aria-expanded="true" aria-controls="collapse<?php e($i); ?>">
                    <span class="pull-right">page <?php e($article->page); ?></span>
                  <?php e($article->title); ?>
                </a>
              </h4>
            </div>
            <div id="collapse<?php e($i); ?>" class="panel-collapse collapse<?php e($show); ?>" role="tabpanel" aria-labelledby="heading<?php e($i); ?>">
              <div class="panel-body">
                <div>
                    Author(s): <?php echo implode(', ', $article->authors); ?>
                </div>
                <div>
                    Affiliation: <?php e($article->affiliation_name); ?>
                </div>
                <hr/>
                <div>
                 <?php e($article->summary); ?>
                </div>
                <hr/>
                 <div>
                 <?php foreach ($article->tags as $tag) { ?>
                    <span class="label label-info"><?php e($tag); ?></span>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
