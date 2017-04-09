<ul class="list-group">

  <?php foreach($threads as $index => $thread): ?>
   <li class="list-group-item" >

      <a href="<?php echo route('thread.show', [$thread->id]); ?>" title="<?php echo $thread->title; ?>">
        <?php echo str_limit($thread->title, '100'); ?>

      </a>

      <span class="meta">

        <a href="<?php echo $thread->node->url; ?>" title="<?php echo $thread->node->name; ?>">
          <?php echo $thread->node->name; ?>

        </a>
        <span> • </span>
        <?php echo $thread->reply_count; ?> <?php echo trans('hifone.replies.replies'); ?>

        <span> • </span>
        <span class="timeago"><?php echo $thread->created_at; ?></span>

      </span>

  </li>
  <?php endforeach; ?>

</ul>
