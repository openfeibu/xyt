<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/blog.css')); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo e(asset('/js/lang/public_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/admin_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.atwho.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(asset('/js/common.js')); ?>"></script>
<script type="text/javascript" src = "<?php echo e(asset('/js/ui.core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/weiba.js')); ?>"></script>
<script type="text/javascript" src = "<?php echo e(asset('/js/ui.draggable.js')); ?>"></script>
<div class="clear"></div>
<div class="b_n">
<div class="b_na">
	<strong class="green"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></strong>
</div>
<div class="b_nb">
	<div class="left blog">
		<div class="main">
			<div class="blog_main">
				<div class="blog_title">
					<p class="title"><?php echo e($blog->title); ?></p>
					<p class="time"><?php echo e($blog->created_at); ?></p>
				</div>
				<div class="blog_body">
					<p><?php echo $blog->body; ?></p>
					<div class="blog_handle"><a href="">点赞（<?php echo e($blog->digg_count); ?>）</a><a href="">阅读（<?php echo e($blog->view_count); ?>）</a></div>
 				</div>
			</div>
			<div class="blog_comment">
				<?php echo Widget::Reply([ 'tpl'=>'reply','post_id'=>$blog->id, 'post_user_id' => $blog->user_id, 'limit'=>'20', 'post_from'=>'blog','space_id'=>$blog->space_id,'addtoend'=>0 ]); ?>

			</div>
		</div>
	</div>
	<div class="left blog_right">
		<div class="blog_right_userinfo common_border">
            <div class="px20"></div>
            <dl class="blog_right_userinfo_dl">
                <dd><a href="<?php echo e(route('user.home',$user->id)); ?>"><img src="<?php echo $user->avatar_small; ?>" alt="" class="right_avatar" /></a></dd>
                <dd><?php echo e($user->username); ?></dd>
                <dd><?php echo e($user->school); ?>/<?php echo e($user->work); ?></dd>
                <dd>
                    <ul style="margin-top: 10px;">
                        <li style="border-right: 1px #ccc solid;">
                            <dl>
                                <dd><?php echo e($user->blog_count); ?></dd>
                                <dd>日志</dd>
                            </dl>
                        </li>
                        <li style="border-right: 1px #ccc solid;">
                            <dl>
                                <dd><?php echo e($user->thread_count); ?></dd>
                                <dd>话题</dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dd><?php echo e($user->space_count); ?></dd>
                                <dd>说说</dd>
                            </dl>
                        </li>
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="common_border blog_other">
	        <div class="px20"></div>
	        <div class="common_head">
		        <p>作者的其它最新日志<a href="" class="right">全部</a></p>
	        </div>
	        <div class="blog_list">
		        <ul>
			        <?php foreach($new_blogs as $key => $blog): ?>
                    <li class="space_right_p"><a href="<?php echo e(route('blog.show',$blog->id)); ?>"><?php echo e($blog->title); ?></a></li>
                    <?php endforeach; ?>
				</ul>
		    </div>
	    </div>
	    <div class="common_border blog_hot">
	        <div class="px20"></div>
	        <div class="common_head">
		        <p >作者的热门日志</p>
	        </div>
	        <div class="blog_list">
		        <ul>
			        <?php foreach($hot_blogs as $key => $blog): ?>
                    <li class="space_right_p"><a href="<?php echo e(route('blog.show',$blog->id)); ?>"><?php echo e($blog->title); ?></a></li>
                    <?php endforeach; ?>
				</ul>
		    </div>
	    </div>
	</div>
</div>

<script type="text/javascript" src="<?php echo e(asset('/js/module.weibo.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>