<?php if(isset($sections) && count($sections)): ?>
<div id="sections" class="panel panel-default">
  <div class="panel-heading"><?php echo e(trans('hifone.nodes.all')); ?></div>
  <div class="panel-body">
    <div class="row node-list">
      <?php foreach($sections as $index => $section): ?>
      <div class="node media">
        <label class="media-left"><?php echo e($section->name); ?></label>
        <?php if(isset($section->nodes)): ?>
        <span class="nodes media-body">
              <?php foreach($section->nodes as $node): ?>
              <span class="name"><a title="<?php echo e($node->name); ?>" href="<?php echo e($node->url); ?>"><?php echo e($node->name); ?></a></span>
              <?php endforeach; ?>
        </span>
         <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>