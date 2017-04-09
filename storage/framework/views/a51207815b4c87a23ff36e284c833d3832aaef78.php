<?php $__env->startSection('content'); ?>
<div class="clear"></div>
<div class="b_l">
<?php if($type == 'other'): ?>	
<strong class="green"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></strong>
<?php else: ?>
<ul class="b_la">
<li><a href="<?php echo e(route('blog.index')); ?>" <?php if($type !='me'): ?>class="b_laa"<?php endif; ?>>大家的日志</a></li>
<li><a href="<?php echo e(route('blog.index',['type' => 'me'])); ?>" <?php if($type =='me'): ?>class="b_laa"<?php endif; ?>>我的日志</a></li>
<li class="b_lab"><span id="showss"><a href="<?php echo e(route('blog.create')); ?>">+发起新日志</a></span>
</li>
</ul>
<?php endif; ?>
<div class="b_lc">
	
<div class="b_ld">
<?php foreach($blogs as $key => $blog): ?> 
<dl>
<dt><a href="<?php echo e(route('user.home',$blog->user_id)); ?>"><img src="<?php echo e($blog->user->avatar); ?>" width="58" height="59" alt="" /></a><!--<p><span class="b_lbc">热</span><span class="b_lbd">26</span></p>--></dt>
<dd>
<div class="b_lda">
<div class="b_ldb"><p><a href="<?php echo e(route('blog.show',$blog->id)); ?>" class="green"><?php echo e($blog->title); ?></a></p>
<p><a href="<?php echo e(route('user.home',$blog->user_id)); ?>"><span class="green"><?php echo e($blog->username); ?></span></a> <?php echo e($blog->created_at); ?></p></div>
<div class="b_ldc"><!-- JiaThis Button BEGIN -->
<!-- JiaThis Button END --></div>
</div>
<div class="b_ldd"><p><?php echo e($blog->body_original); ?></p><p><?php echo e($blog->view_count); ?> 次阅读|<?php echo e($blog->reply_count); ?> 个评论</p></div>
</dd>
</dl>
<?php endforeach; ?>	

</div>

<?php if($type != 'me' && $type != 'other'): ?>
<div class="b_le">
<span>排行榜</span>
<a href="<?php echo e(route('blog.index',['type' => 'recommend'])); ?>" <?php if($type =='recommend'): ?>class="selected"<?php endif; ?>>推荐阅读</a>
<a href="<?php echo e(route('blog.index',['type' => 'new'])); ?>" <?php if($type =='new'): ?>class="selected"<?php endif; ?>>最新发表</a>
<a href="<?php echo e(route('blog.index',['type' => 'reply'])); ?>" <?php if($type =='reply'): ?>class="selected"<?php endif; ?>>评论排行</a>
<a href="<?php echo e(route('blog.index',['type' => 'view'])); ?>" <?php if($type =='view'): ?>class="selected"<?php endif; ?>>查看排行</a>
</div>
<?php endif; ?>
<?php if($type == 'me' && $cates): ?>
<div class="b_le">
<span>日志分类</span>
<a href="<?php echo e(route('blog.index',['type' => $type])); ?>" <?php if($cat_id == ''): ?>class="selected"<?php endif; ?>>全部日志</a>
<?php foreach($cates as $key => $cate): ?>
<a href="<?php echo e(route('blog.index',['type' => $type,'cat_id' => $cate->id])); ?>" <?php if($cat_id == $cate->id): ?>class="selected"<?php endif; ?>><?php echo e($cate->name); ?></a>
<?php endforeach; ?>
</div>
<?php endif; ?>
<?php if($type != 'me' && $cates): ?>
<div class="b_le">
<span>日志分类</span>
<a href="<?php echo e(route('blog.index',['user_id' => $blog_user->id])); ?>" <?php if($cat_id == ''): ?>class="selected"<?php endif; ?>>全部日志</a>
<?php foreach($cates as $key => $cate): ?>
<a href="<?php echo e(route('blog.index',['user_id' => $blog_user->id,'cat_id' => $cate->id])); ?>" <?php if($cat_id == $cate->id): ?>class="selected"<?php endif; ?>><?php echo e($cate->name); ?></a>
<?php endforeach; ?>
</div>
<?php endif; ?>
<div class="clear"></div>
<?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($blogs))->render(); ?>

</div>







</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>