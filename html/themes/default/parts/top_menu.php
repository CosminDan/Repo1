<?php $sq = isset($search_query) ? $search_query : ''; ?>
<div class="masthead main">
<div class="container">
    <nav class="navbar">
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo site_url(); ?>">
            <img src="<?php echo Assets::assets_url('image')."site-logo.png" ?>" width="300" />
        </a>
    </div>
    <div class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
                <?php if (empty($current_user)) : ?>
                <li><a href="<?php echo site_url(LOGIN_URL); ?>">Sign In</a></li>
                <?php else : ?>
                <li <?php echo check_method('profile'); ?>><a href="<?php echo site_url('users/profile'); ?>"><?php e(lang('bf_user_settings')); ?></a></li>
                <li><a href="<?php echo site_url('admin'); ?>">Admin</a></li>
                <li><a href="<?php echo site_url('logout'); ?>"><?php e(lang('bf_action_logout')); ?></a></li>
                <?php endif; ?>
          </ul>
        </div>
  </div>
</nav>

<div class="row">
  <div class="col-md-8 col-md-offset-2">
        <?php if (isset($firstPage)) : ?>
        <div class="heading">
            <h1>What is Polyphemus-ASI?</h1>
            <p>Polyphemus – Advanced Scientific Index is a database comprised of scientific magazines and their articles. Our main goal is to maintain a real scientific database with information from various fields.</p>
        </div>
        <?php endif; ?>
        <div class="search_top">
        <?php echo form_open(site_url('search/page'), 'class=""'); ?>
        <div class="input-group input-group-lg">
            <input name="q" type="text" class="form-control" placeholder="Search" value="<?php e($sq); ?>">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#advancedSearch"><i class="glyphicon glyphicon-plus"></i></button>
                <button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        <div class="collapse" id="advancedSearch">
            <div class="form-group col-md-6">
                <label for="s_category">Category</label>
                <input type="text" class="form-control" id="s_category">
            </div>
            <div class="form-group col-md-6">
                <label for="s_author">Author</label>
                <input type="text" class="form-control" id="s_author">
            </div>
            <div class="form-group col-md-6">
                <label for="s_pubdate_from">Publication Date from</label>
                <input type="text" class="form-control datepicker" id="s_pubdate_from">
            </div>
            <div class="form-group col-md-6">
                <label for="s_pubdate_to">to</label>
                <input type="text" class="form-control datepicker" id="s_pubdate_to">
            </div>
            <div class="clearfix"></div>
        </div>
        <?php echo form_close(); ?>
        </div>
  </div>
</div>

</div>
</div>
