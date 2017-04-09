 

<?php $__env->startSection('content'); ?>

<div class="clear"></div>
<div class="container">
	<div class="container-top-left" style="margin-top: 27px;">
		<span><img style="width:30px;height:30px;" src="<?php echo e(asset('images/index/home.png')); ?>" alt="" /></span>
		<span>文章中心</span>
	</div>
	<div class="about_left">
		<div class="container-top entry_list">
			
			<ul>		
				<?php foreach($abouts as $about): ?>
				<li style="padding-left:10px;">
				    <div class="title">
						<h4>[<a href="<?php echo e(route('about.index',['type_id' => $about->type_id])); ?>"><?php echo e($about->type_name); ?></a>]<a href="<?php echo e(route('about.show',['id' => $about->id])); ?>"><?php echo e($about->title); ?></a></h4>
						<br>
					</div>
					<div class="detail image_right l_text s_clear" id="blog_article_37">
						<?php echo e($about->body_original); ?>

					</div>

				</li>
				<?php endforeach; ?>
			</ul>
			<?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($abouts))->render();; ?>

		</div>
	</div>

	<div id="obar" style="width:126px;margin-right:10px;height:auto;float:right">
		<div id="sidebox">
		<ul class="line_list" style="line-height:30px;">
		<li><a href="">全部分类</a></li>
		<?php foreach($types as $type): ?>	
			<li style="font-weight:bold;">
				<a href="<?php echo e(route('about.index',['type_id' => $type['id']])); ?>"><?php echo e($type['type']); ?></a>
			</li>
			<?php foreach($type['child'] as $key => $typechilds): ?>
				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				»<a href="<?php echo e(route('about.index',['type_id' => $typechilds['id']])); ?>"><?php echo e($typechilds['type']); ?></a>
				</li>
			<?php endforeach; ?>
		<?php endforeach; ?>
		
		</ul>
		</div>
		 
	</div>


</div>

<script>	
	function getType(id){
		alert(id);
	}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>