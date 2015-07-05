<div class="masthead main">
<div class="container">
    <nav class="navbar">
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php e(settings_item('site.title')); ?></a>
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
      <div class="text-center">
        <?php if (isset($firstPage)) : ?>
        <div class="heading">
            <h1>Welcome!</h1>
            <p>lorem ipsum dolor sit amet.. lorem ipsum dolor sit amet.. lorem ipsum dolor sit amet.. lorem ipsum dolor sit amet.. lorem ipsum dolor sit amet.. lorem ipsum dolor sit amet.. lorem ipsum dolor sit amet.. lorem ipsum dolor sit amet.. lorem ipsum dolor sit amet.. lorem ipsum dolor sit amet.. lorem ipsum dolor sit amet.. </p>
        </div>
        <?php endif; ?>
        <form class="heading">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" placeholder="Search...">
            <div class="input-group-btn">
            <button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#advancedSearch"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
        </div>
        <div class="collapse" id="advancedSearch">
            <hr/>
            <hr/>
            <hr/>
            <hr/>
            <hr/>
            <hr/>
            <hr/>
            <hr/>
            <hr/>
        </div>
    </form>
    </div>
  </div>
</div>

</div>
</div>
