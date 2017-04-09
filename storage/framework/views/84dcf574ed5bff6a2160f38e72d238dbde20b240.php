 

<?php $__env->startSection('title'); ?>
<?php echo e($thread->title); ?> - @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
<?php echo e($thread->excerpt); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script type="text/javascript" src="<?php echo e(asset('build/dist/js/thread.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/public_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/admin_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(asset('/js/common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jwidget_1.0.0.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.atwho.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.caret.js')); ?>"></script>
<script src="<?php echo e(asset('/js/ui.core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/ui.draggable.js')); ?>"></script>
<script src="<?php echo e(asset('/js/plugins/core.digg.js')); ?>"></script>
<script src="<?php echo e(asset('/js/plugins/core.comment.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/home/module.home.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/js/module.weibo.js')); ?>"></script>
<div class="clear"></div>
<div class="b_n">
<div class="b_na">
	<strong class="green">【<?php echo e($thread->node->name); ?>】 </strong>
	<ul style=""><li class="b_lab"><a href="<?php echo e(route('thread.create')); ?>"><span id="showss">+发起新话题</span></a>
	</li><li><a href="<?php echo e(route('thread.index', [$thread->id])); ?>"><< 返回上一页</a></li></ul>
</div>
<div class="b_nb">
<div id="post_li">
<div class="secretList">
<ul>
<li>
<div class="puppetdiv" style="height:90px;">
<a href="<?php echo route('user.home', [$user->id]); ?>"><img id="avatar_82392_1510" class="useravatar" uid="82392" src="<?php echo e(asset($user->avatar_url)); ?>" style="width:60px;height:60px;">
<span>
<?php echo e($user->username); ?></span></a>
</div>
<div class="secretdiv">
<div class="secretHead">
<div class="secretType secretType-5" style="font-size:16px;color:#000000;font-weight:bold;font-family:微软雅黑">
<h3 style="line-height:22px"><?php echo e($thread->title); ?><div style="color:gray"><?php echo e(friendlyDate($thread->created_at)); ?></div></h3>
</div>
</div>
<div class="secretBody">
<div class="secretWord">

<div class="detail"><?php echo $thread->body; ?></div>
</div>
<div class="status">
<?php echo e($thread->favorite_count); ?>次收藏<span class="pipe">|</span>
<?php echo e($thread->view_count); ?> 次阅读<span class="pipe">|</span>
<?php echo e($thread->reply_count); ?>个回复<span class="pipe">|</span>
<span id="thread_count<?php echo e($thread->id); ?>"><?php echo e($thread->like_count); ?></span><a title="<?php echo trans('hifone.like'); ?>" id="thread<?php echo e($thread->id); ?>">点赞</a>

</div>
</div>
</li>
<div class="divclear"></div>
</ul>
<div class="divclear"></div>
</div>

<ul class="line_list">
<li>
<table width="100%">
<tbody><tr>
<td align="right">
<a href="#com_form"  class="a1" >回复</a>&nbsp;
<a href="#" class="jubaoshow" style="margin-left:10px;">举报</a>
<?php
	$sid = !empty($space->app_row_id)? $space->app_row_id : $space->id;
?>
<?php echo Widget::Share(['sid'=>$sid,'stable'=>$space->app_row_table,'initHTML'=>'','current_table'=>'spaces','current_id'=>$space->id,'nums'=>$space->repost_count,'appname'=>$space->app,'cancomment'=>1,'feed_type'=>$space->type,'is_repost'=>$space->is_repost]); ?>

</div>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>

</td>
</tr>
</tbody></table>
</li>
</ul>

</div>

<?php foreach($alls as $k => $all): ?>
<dl class="b_nc">
	<dt>
		<a href="<?php echo route('user.home', [$all->user_id]); ?>">
			<img src="<?php echo asset($all->avatar_url); ?>"style="width:48px;height:48px" alt="" />
		</a>
	</dt>
	<dd class="b_nd">
		<p>
			<span class="green">
				<a href="<?php echo route('user.home', [$all->user_id]); ?>">
					<?php echo $all->username; ?>

				</a>
					<?php if(!empty($reply_user_id[$k]->username)): ?>

					回复<a href="<?php echo route('user.home', [$reply_user_id[$k]->id]); ?>">
							<?php echo $reply_user_id[$k]->username; ?>

						</a>
				
			</span> 
			(<?php echo $reply_user_id[$k]->work; ?> 
			<?php if(!empty($reply_user_id[$k]->work) && !empty($reply_user_id[$k]->school)): ?>
				/
			<?php endif; ?>
			<?php echo $reply_user_id[$k]->school; ?>) 
				<?php if(!empty($replies_reply[$k])): ?>
					<?php echo e($replies_content[$k]->created_at); ?>

				<?php else: ?>		
					<?php echo e($reply_user_id[$k]->created_at); ?>

				<?php endif; ?>
			<?php else: ?>
				<span style="color:black">
					(<?php echo $all->work; ?> 
					<?php if(!empty($all->work) && !empty($all->school)): ?>
						/
					<?php endif; ?>
					<?php echo $all->school; ?>) 
					
					<?php if(!empty($replies_reply[$k])): ?>
						<?php echo e($replies_content[$k]->created_at); ?>

					<?php else: ?>		
						<?php echo e($all->created_at); ?>

					<?php endif; ?>
				</span>
			<?php endif; ?>
		</p>
		
		<?php
			if(!empty($replies_reply[$k])){
				echo $replies_content[$k]->body;
			}else{
				echo "<p>$all->body </p>";
			}
		?>
	</dd>
	<dd class="b_ne" style="margin-top:0px">
		<a  id="like<?php echo $all->id; ?>" title="<?php echo e(trans('hifone.like')); ?>" onclick="zang(<?php echo $all->id; ?>,<?php echo $thread->id; ?>)">
			<img src="<?php echo e(asset('images/index/like1.jpg')); ?>" width="20" height="20" alt="" />
		</a>
		<span id="like_count<?php echo $all->id; ?>"><?php echo $all->like_count; ?></span>
		<!-- //回复的点赞 -->
		<a href="#" class="aa<?php echo $all->id; ?>"  onclick="reply_show(<?php echo $all->id; ?>)" >回复</a>&nbsp;<a href="#" onclick="jubao_show(<?php echo $all->id; ?>)" >举报</a>
	</dd>
</dl>

	<div class="l_ahoverb" id="reply_search<?php echo $all->id; ?>">
		<div class="l_ahoverc">
		<strong">回复</strong><span onclick="reply_hide(<?php echo $all->id; ?>)">关闭</span>
		</div>
		<div class="reply_show<?php echo $all->id; ?>"></div>
		<div class="comment">
		<div class="com_form" model-node="comment_textarea">
			<form class="" action="<?php echo e(route('reply.store')); ?>" method="post" model-node="mini_editor">
				<input name="thread_id" type="hidden" value="<?php echo $thread->id; ?>">
				<input name="reply_id" type="hidden" value="<?php echo $all->id; ?>">
				<textarea class="input" id="reply_saytext<?php echo $all->id; ?>" name="saytext2" event-node="mini_editor_textarea"></textarea>
				<p><input type="submit" class="sub_btn" value="提交"></p>
			</form>
			<a event-node="comment_insert_face" class="face-block" href="javascript:;" title="表情" style=" top: -25px;position: relative;"> <img src="/images/index/img51.jpg" class="face">表情 </a>
			<input type="hidden" id="postvideourl" value="">
			<div model-node="faceDiv" style="position: relative;"></div>
		</div>
		</div>
	</div>
</form>
<form class="" action="" method="">
	<div  class="jubao" id="jubao<?php echo $all->id; ?>" style="margin-top:-100px;display:none">
		<div class="jubaoa"><strong>举报</strong><span onclick="jubao_hide(<?php echo $all->id; ?>)">关闭</span></div>
		<table>
		<tr><td>感谢您能协助我们一起管理站点，我们会对您的举报尽快处理。
		请填写举报理由（最多150字符):</td></tr>
		<tr><td>
			<textarea name="content" id="reply_jubao<?php echo $all->id; ?>"></textarea>
			<input type="hidden" name="reply_id" value="<?php echo $all->id; ?>">
			<input type="hidden" name="type" id="type<?php echo $all->id; ?>" value="reply_report">
			<input type="hidden" name="type_id" id="type_id<?php echo $all->id; ?>" value="<?php echo $all->id; ?>">
		</td></tr>
		<tr><td><input type="button" value="提交" id="reply_report" /></td></tr>
		</table>
	</div>
</form>
<?php endforeach; ?>
<div class="clear"></div>
	<div class="paging" style="">
		<a href="<?php echo e($alls->url(1)); ?>">首页</a>
		<?php if($alls->currentPage()>1): ?>
		<a href="<?php echo $alls->url($alls->currentPage()-1); ?>">上一页</a>
		<?php endif; ?>
		<?php if($alls->lastPage()<6): ?>
			<?php for($i=1;$i<=$alls->lastPage();$i++): ?>
				<?php if($i == $alls->currentPage()): ?>
					<a style="background:#51b837;color:#fff" href="<?php echo e($alls->url($i)); ?>"><?php echo $i; ?></a>			
				<?php else: ?>
					<a href="<?php echo e($alls->url($i)); ?>"><?php echo $i; ?></a>
				<?php endif; ?>				
			<?php endfor; ?>
		<?php elseif($alls->lastPage()>2): ?>
			<?php if($alls->currentPage()>3): ?>
				<a href="<?php echo e($alls->url($alls->currentPage()-1)); ?>">...</a>
			<?php endif; ?>
			<?php if($alls->currentPage()>1): ?>
				<a href="<?php echo e($alls->url($alls->currentPage()-1)); ?>"><?php echo $alls->currentPage()-1; ?></a>
			<?php endif; ?>
			<a href="<?php echo e($alls->url($alls->currentPage())); ?>"><?php echo $alls->currentPage(); ?></a>
			<?php if($alls->currentPage()<$alls->lastPage()): ?>
				<a href="<?php echo e($alls->url($alls->currentPage()+1)); ?>"><?php echo $alls->currentPage()+1; ?></a>
			<?php endif; ?>
			
			<?php if(($alls->lastPage()-$alls->currentPage()) > 1 && $alls->currentPage()<$alls->lastPage()): ?>
				<a href="<?php echo e($alls->url($alls->currentPage()+1)); ?>">...</a>
			<?php endif; ?>
		<?php endif; ?>
		<?php if($alls->currentPage()<$alls->lastPage()): ?>
		<a href="<?php echo $alls->url($alls->currentPage()+1); ?>">下一页</a>
		<?php endif; ?>
		<a href="<?php echo e($alls->url($alls->lastPage())); ?>">尾页</a>
		<?php if($alls->lastPage() == 0): ?>
		<div class="clear" style="text-align:center;font-size:16px;color:#818181;margin-top:5px">当前页面<?php echo $alls->currentPage(); ?>/1</div>
		<?php else: ?>
		<div class="clear" style="text-align:center;font-size:16px;color:#818181;margin-top:5px">当前页面<?php echo $alls->currentPage(); ?>/<?php echo $alls->lastPage(); ?></div>
		<?php endif; ?>
	</div>
<!--<div class="activity_page">
	<div class="paging f_r">
		<a href="<?php echo e($alls->url(1)); ?>">第一页</a>
		<?php for($i = 1; $i <= $alls->lastPage(); $i++): ?>
			<a href="<?php echo e($alls->url($i)); ?>"><?php echo e($i); ?></a>
		<?php endfor; ?>
		<a href="<?php echo e($alls->url($alls->lastPage())); ?>">最后一页</a>
	</div>
	<div style="text-align:center;font-size:16px;color:#818181">当前页面是第<?php echo $alls->currentPage(); ?>/<?php echo $alls->lastPage(); ?>页</div>
 </div>-->
<div class="clear"></div>


<div class="b_nf" id="com_form">
	<div class="b_nfa">

		<div class="com_form" style="width:400px; height:200px; margin-left:20px; color:#696969;" model-node="comment_textarea">
			<a event-node="comment_insert_face" class="face-block" href="javascript:;" title="表情" > <img src="/images/index/img51.jpg" class="face">表情 </a>
			<input type="hidden" id="postvideourl" value="">
			<div model-node="faceDiv" style="position: relative;"></div>
			<form class="" action="<?php echo e(route('reply.store')); ?>" method="post" model-node="mini_editor">
				<input name="thread_id" type="hidden" value="<?php echo $thread->id; ?>">
				<textarea class="input" id="saytext2" name="saytext2" event-node="mini_editor_textarea"></textarea>
				<p style="position: relative;width: 250px;"><input type="checkbox" /> 匿名回复（需要花费5分积分）</p>
				<p style="top:-42px;"><input type="submit" class="sub_btn" value="提交"></p>
			</form>
		</div>
	</div>
</div>
</div>

<form class="" action="<?php echo e(route('thread.report')); ?>" method="post">
	<div class="jubao" style="margin-top:-100px;">
		<div class="jubaoa"><strong>举报</strong><span>关闭</span></div>
		<table>
		<tr><td>感谢您能协助我们一起管理站点，我们会对您的举报尽快处理。
		请填写举报理由（最多150字符):</td></tr>
		<tr><td>
			<textarea name="content" id="reply_jubao"></textarea>
			<input type="hidden" name="type_id" value="<?php echo $thread->id; ?>">
			<input type="hidden" name="type" id="type" value="thread_report">
		</td></tr>	
		<tr><td>
		<input type="button" id="thread_report" value="提交" /></td></tr>
		</table>
	</div>
</form>
<script type="text/javascript" src="<?php echo e(asset('/build/dist/js/qqhideshow.js')); ?>"></script>
<script type="text/javascript">
	$('#reply_report').on('click',function(){
		id = window.sessionStorage.getItem('reply_id');;
		if($('#reply_jubao'+id).val() == ""){
			alert("请填写举报内容！");
		}else{
			$.post("<?php echo e(route('report.nodeReport')); ?>",'content='+$('#reply_jubao'+id).val()+'&type='+$('#type'+id).val()+'&type_id='+$('#type_id'+id).val(),function(data){
					if(data == 200){
						alert("举报成功，我们会根据实际情况给予警告！");
					}else if(data == 403){
						alert("举报失败,请重试！");
					}
			});
		}
	});

	$('#thread_report').on('click',function(){
		if($('#reply_jubao').val() == ""){
			alert("请填写举报内容！");
		}else{
			$.post("<?php echo e(route('report.nodeReport')); ?>",'content='+$('#reply_jubao').val()+'&type='+$('#type').val()+'&type_id='+$('#type_id').val(),function(data){
					if(data == 200){
						alert("举报成功，我们会根据实际情况给予警告！");
					}else if(data == 403){
						alert("举报失败,请重试！");
					}
			});
		}
	});
	function zang(reply_id,threah_id){
		$.ajax({
			type: 'GET',
			url: "<?php echo e(route('like.index')); ?>",
			data: { type : 'Reply',id:reply_id,tid:threah_id},
			dataType: 'json',
			success: function(data){
				$("#like_count"+reply_id).text(data);
			},
			error: function(xhr, type){
				location.href="<?php echo e(route('auth.login')); ?>";
			}
		});	
	}
	function reply_show(reply_id){
		//////////////显示隐藏
		$("#reply_search"+reply_id).show();
	}
	function reply_hide(reply_id){
		$("#reply_search"+reply_id).hide();
	}
	function jubao_show(reply_id){
		//////////////显示隐藏
		$("#jubao"+reply_id).show();
		window.sessionStorage.setItem('reply_id', reply_id);
	}
	function jubao_hide(reply_id){
		$("#jubao"+reply_id).hide();
		window.sessionStorage.removeItem('reply_id', reply_id);
	}
	function reply_emotion(reply_id){
		  $(function(){
			$('.reply_emotion'+reply_id).qqFace({
				id : 'facebox'+reply_id,
				assign:'reply_saytext'+reply_id,
				path:'../images/arclist/' //表情存放的路径
			});
			$(".sub_btn").click(function(){
				var str = $("#reply_saytext"+reply_id).val();
				$("#reply_show"+reply_id).html(replace_em(str));
			});
		});
	}
</script>
<script type="text/javascript">
$('#thread<?php echo e($thread->id); ?>').click(function(){
	$.ajax({
		type: 'GET',
		url: "<?php echo e(route('like.index')); ?>",
		data: { type : 'Thread',id:'<?php echo $thread->id; ?>'},
		dataType: 'json',
		success: function(data){
			$('#thread_count<?php echo e($thread->id); ?>').text(data);
		},
		error: function(xhr, type){
			location.href="<?php echo e(route('auth.login')); ?>";
		}
	});

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>