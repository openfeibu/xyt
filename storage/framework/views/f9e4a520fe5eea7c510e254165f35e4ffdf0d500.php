<?php $__env->startSection('content'); ?>
<div class="b_j">
<div class="b_ja">
<span>></span>排行榜
</div>
<div class="tab1s" id="b_ib">
	<div class="menuss">
		<ul>
			<li id="ones1" <?php if($type == 'view'): ?>class="offs"<?php endif; ?>><a href="<?php echo e(route('user.rank',['type'=>'view'])); ?>">访问量排行</a></li>
            <li id="ones2" <?php if($type == 'follower'): ?>class="offs"<?php endif; ?>><a href="<?php echo e(route('user.rank',['type'=>'follower'])); ?>">粉丝数排行</a></li>
            <li id="ones3" <?php if($type == 'girl'): ?>class="offs"<?php endif; ?>><a href="<?php echo e(route('user.rank',['type'=>'girl'])); ?>">美女排行</a></li>
            <li id="ones4" <?php if($type == 'boy'): ?>class="offs"<?php endif; ?>><a href="<?php echo e(route('user.rank',['type'=>'boy'])); ?>">帅哥排行</a></li>
            <li id="ones5" <?php if($type == 'experience'): ?>class="offs"<?php endif; ?>><a href="<?php echo e(route('user.rank',['type'=>'experience'])); ?>">资产排行</a></li>
            <li id="ones6" <?php if($type == 'score'): ?>class="offs"<?php endif; ?>><a href="<?php echo e(route('user.rank',['type'=>'score'])); ?>">积分排行</a></li>
		</ul>
	</div>
	<div class="menudivss b_jc">
<div id="cons_ones_1">
<!--<div class="b_jd">
	<div class="b_jda">排行榜公告：</div>
    <div class="b_jdb">
    <div class="apple">
        <ul>
            <li><a href="#" target="_blank">你是我的小丫小苹果 </a></li>  
            <li><a href="#" target="_blank">怎么爱你都不嫌多</a></li> 
            <li><a href="#" target="_blank">红红的小脸儿温暖我的心窝 </a></li>  
            <li><a href="#" target="_blank">点亮我生命的火 火火火火</a></li> 
            <li><a href="#" target="_blank">你是我的小丫小苹果 </a></li>  
            <li><a href="#" target="_blank">就像天边最美的云朵</a></li>  
            <li><a href="#" target="_blank">春天又来到了花开满山坡 </a></li>  
            <li><a href="#" target="_blank">种下希望就会收获</a></li> 
        </ul> 
    </div>
    </div>
</div>-->
<div class="b_je">
<div class="b_jf">
	<?php if(($type != 'girl' && $user->sex!= 2) || ($type != 'boy' && $user->sex!= 1)): ?>
	<p><span class="green"><?php echo e($rank_desc); ?>：</span><?php echo e($score); ?> ，当前排名<span class="red"> <?php echo e($rank); ?></span> ，再接再厉！</p>
	<?php endif; ?>
</div>
<?php foreach($users as $key => $user): ?>
<dl>
<dt><a href="<?php echo e(route('user.home',$user->id)); ?>"><img src="<?php echo e($user->avatar); ?>" /></a></dt>
<dd class="b_jg"><p><?php echo e($user->username); ?></p>
<p><?php echo e(trans('hifone.users.sex.'.$user->sex)); ?></p>
<p><?php echo e($user->location); ?></p>
<p><?php echo e($user->work); ?> <?php echo e($user->school); ?></p>
<p>积分：<?php echo e($user->score); ?> /  资产：<?php echo e($user->experience); ?> / 人气：<?php echo e($user->view_count); ?> / 关注：<?php echo e($user->following_count); ?> 粉丝：<?php echo e($user->follower_count); ?></p></dd>
<dd class="b_jh"><a href="javascript:;" data-type="User" data-id="<?php echo e($user->id); ?>" data-url="<?php echo e(route('follow.user',$user->id)); ?>" class="followbtn" >加关注</a><a href="javascript:ajaxgethtml('<?php echo e(route('hello',['user_id' => $user->id])); ?>');">打招呼</a><a  href="javascript:ajaxgethtml('<?php echo e(route('gift',['user_id' => $user->id])); ?>');">赠送礼物</a></dd>
</dl>
<?php endforeach; ?>

<div class="clear"></div>
<?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($users))->render(); ?>

</div>

</div>

</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>