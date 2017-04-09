<div class="col-md-3 side-bar">
  <?php if(Auth::check()): ?>
  <div class="panel panel-default corner-radius">
      <div class="panel-heading">
        <h3 class="panel-title"><?php echo isset($node) ? $node->name : $site_name.' - '.$site_about; ?></h3>
      </div>
    <div class="panel-body text-center">
      <div class="btn-group">
        <a href="<?php echo isset($node) ? URL::route('thread.create', ['node_id' => $node->id]) : URL::route('thread.create') ;; ?>" class="btn btn-primary">
          <i class="fa fa-pencil"> </i> <?php echo trans('hifone.threads.add'); ?>

        </a>
        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span class="caret"></span>
        </button>
        <?php if($new_thread_dropdowns): ?>
        <ul class="dropdown-menu">
          <?php echo $new_thread_dropdowns; ?>

        </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php else: ?>
  <div class="panel panel-default corner-radius">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo e($site_name); ?> - <?php echo e($site_about); ?></h3>
    </div>
    <div class="panel-body text-center">
        <a href="/auth/register" class="btn btn-primary">
          <i class="fa fa-user"> </i> <?php echo trans('hifone.signup'); ?>

        </a>
    </div>
    <div class="panel-footer text-center">
      <?php echo e(trans('hifone.registered_users')); ?> <a href="/auth/login"><?php echo e(trans('hifone.login.login')); ?></a>
    </div>
  </div>
  <?php endif; ?>

<?php echo e(Widget::Adblock(['slug' => 'sidebar_top', 'template'=>'sidebar'])); ?>


<?php if(Request::is('/')): ?>
<div class="panel panel-default corner-radius">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo e(trans('hifone.ranking')); ?></h3>
    </div>
    <div class="panel-body">
      <table class="table table-bordered table-striped">
      <tbody>
      <tr>
        <th>#</th>
        <th><?php echo e(trans('hifone.users.users')); ?></th>
        <th><?php echo e(trans('hifone.users.score')); ?></th>
      </tr>
      <?php foreach($top_users as $index => $user): ?>
        <tr>
        <td><?php echo e($index + 1); ?></td>
        <td><a href="<?php echo e(route('user.home',$user->username)); ?>"><?php echo e($user->username); ?></a></td>
        <td><?php echo e($user->score); ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
      </table>
    </div>
</div>
<div class="panel panel-default corner-radius">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo e(trans('hifone.tags.hot')); ?></h3>
    </div>
    <div class="panel-body">
    <?php foreach($top_tags as $index => $tag): ?>
    <a href="/tag/<?php echo e(urlencode($tag->name)); ?>"><?php echo e($tag->name); ?></a>(<?php echo e($tag->count); ?>) 
    <?php endforeach; ?>
    </div>
</div>
<?php if(isset($links) && count($links)): ?>
  <div class="panel panel-default corner-radius">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo trans('hifone.links.links'); ?></h3>
    </div>
    <ul class="list-group">
      <?php foreach($links as $link): ?>
      <li class="list-group-item"><a href="<?php echo e($link->url); ?>" rel="nofollow" title="<?php echo e($link->title); ?>" target="_blank"><img src="<?php echo e($link->cover); ?>" style="width:150px; margin:6px 0;"></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
<?php endif; ?>

<?php echo e(Widget::Adblock(['slug' => 'sidebar_middle', 'template'=>'sidebar'])); ?>


<?php if(isset($nodeThreads) && count($nodeThreads)): ?>
  <div class="panel panel-default corner-radius">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo trans('hifone.nodes.same_node_threads'); ?></h3>
    </div>
    <div class="panel-body">
      <ul class="list">

        <?php foreach($nodeThreads as $nodeThread): ?>
          <li>
          <a href="<?php echo route('thread.show', $nodeThread->id); ?>">
            <?php echo $nodeThread->title; ?>

          </a>
          </li>
        <?php endforeach; ?>

      </ul>
    </div>
  </div>
<?php endif; ?>

<div class="panel panel-default corner-radius">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo trans('hifone.tips.tips'); ?></h3>
  </div>
  <div class="panel-body">
    <?php echo (isset($tip) && $tip) ? $tip->body : null; ?>

  </div>
</div>

<div class="panel panel-default corner-radius">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo e(trans('hifone.stats.title')); ?></h3>
  </div>
    <ul class="list-group">
      <li class="list-group-item"><?php echo e(trans('hifone.stats.users')); ?>: <?php echo e($stats['user_count']); ?> </li>
      <li class="list-group-item"><?php echo e(trans('hifone.stats.threads')); ?>: <?php echo e($stats['thread_count']); ?></li>
      <li class="list-group-item"><?php echo e(trans('hifone.stats.replies')); ?>: <?php echo e($stats['reply_count']); ?></li>
    </ul>
</div>

<?php echo e(Widget::Adblock(['slug' => 'sidebar_bottom', 'template'=>'sidebar'])); ?>


</div>
<div class="clearfix"></div>
