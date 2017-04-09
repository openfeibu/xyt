 

<?php $__env->startSection('title'); ?>
    <?php echo e(trans('hifone.threads.add')); ?>_@parent
<?php $__env->stopSection(); ?>
<link rel="stylesheet" href="<?php echo e(elixir('dist/css/all.css')); ?>">
<script src="<?php echo e(elixir('dist/js/all.js')); ?>"></script>
<?php $__env->startSection('content'); ?>
	<div class="clear" style="height:50px"></div>	
    <div class="thread_create">
		<div style="margin-top:-20px;margin-bottom:15px;font-size:18px">
			<a href="<?php echo e(route('thread.index')); ?>" style="color:#51B837">&lt;&lt;返回话题主页</a>
		</div>
        <div class="col-md-9 main-col" style="width:1000px;margin-left:-15px;">
            <div class="panel panel-default corner-radius">
                <div class="panel-heading">发起新话题</div>
                <div class="panel-body">
                    <div class="reply-box form box-block">
                        <?php if(isset($thread)): ?>
                            <?php echo Form::model($thread, ['route' => ['thread.update', $thread->id], 'id' => 'thread_edit_form', 'class' => 'create_form', 'method' => 'patch']); ?>

                        <?php else: ?>
                            <?php echo Form::open(['route' => 'thread.store','id' => 'thread_create_form', 'class' => 'create_form', 'method' => 'post']); ?>

                        <?php endif; ?>

                        <div class="form-group">
                            <?php echo Form::text('thread[title]', isset($thread) ? $thread->title : null, ['class' => 'form-control', 'id' => 'thread_title', 'placeholder' => trans('hifone.threads.title')]); ?>

                        </div>

                        <div class="form-group">
                            <select class="form-control selectpicker" name="thread[node_id]">
                                <option value=""
                                        disabled <?php echo $node ? null : 'selected';; ?>><?php echo e(trans('hifone.threads.pick_node')); ?></option>
                                <?php foreach($sections as $section): ?>
                                        <?php if(isset($section->nodes)): ?>
                                            <?php foreach($section->nodes as $item): ?>
                                                <option value="<?php echo e($item->id); ?>" <?php echo (Input::old('node_id') == $item->id || (isset($node) && $node->id==$item->id)) ? 'selected' : '';; ?> >
                                                    - <?php echo e($item->name); ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- editor start -->
                    <!-- end -->
                        <div class="form-group">
                            <?php echo Form::textarea('thread[body]', isset($thread) ? $thread->body_original : null, ['class' => 'post-editor form-control',
                                                              'rows' => 15,
                                                              'style' => "overflow:hidden",
                                                              'id' => 'body_field',
                                                              'placeholder' => "请填写话题内容"]); ?>

                        </div>

                       

                        <div class="form-group status-post-submit">
                            <?php echo Form::submit(trans('forms.publish'), ['class' => 'btn btn-primary col-xs-2', 'style' => "background:#51B837;border:0px",'id' => 'thread-create-submit']); ?>

                        </div>

                        <div class="box preview markdown-body" id="preview-box" style="display:none;"></div>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-3 side-bar">
            <?php if( $node ): ?>
                <div class="panel panel-default corner-radius help-box">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title"><?php echo e(trans('hifone.nodes.current')); ?> : <?php echo e($node->name); ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php echo e($node->description); ?>

                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>