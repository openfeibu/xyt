 

<?php $__env->startSection('content'); ?>

<div class="clear"></div>
<div class="container">
	<div class="container-top-left" style="margin-top: 27px;">
		<?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

	</div>
	<div class="about_left entry">
		<div class="title" style="background-color:#F7F7F7; border-width:0px;">
			<h1 style="font-size:22px; text-align:center;"> <?php echo e($page->title); ?></h1>
		</div>
		<div id="blog_article">
			<div class="resizeimg">
				<?php echo $page->body; ?>

			</div>
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