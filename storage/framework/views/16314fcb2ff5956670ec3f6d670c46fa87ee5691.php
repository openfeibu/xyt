<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/album.css')); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo e(asset('/js/lang/public_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/lang/admin_zh-cn.js')); ?>"></script>
<script src="<?php echo e(asset('/js/common.js')); ?>"></script>
<script type="text/javascript" src = "<?php echo e(asset('/js/ui.core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/core.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.common.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.atwho.js')); ?>"></script>
<script src="<?php echo e(asset('/js/weiba.js')); ?>"></script>
<script type="text/javascript" src = "<?php echo e(asset('/js/ui.draggable.js')); ?>"></script>
<div class="clear"></div>
    <div class="show">
        <div class="show_top" style="height:125px">
            <div class="show_top_user">
	            <a href="<?php echo route('user.home', [$user->id]); ?>">
					<img src="<?php echo asset($user->avatar_url); ?>" class="fleft show_top_user_img" alt=""  />
				</a>
                <div class="show_top_user_span fleft">
                    <p><?php echo e($user->username); ?>的相册</p>
                    <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

                </div>
                <div class="fright show_top_user_right">
                    <span style="font-size: 12px;"><a href="javascript:;" onclick="history.go(-1)"><<返回上一页</a></span>
                </div>
            </div>
        </div>
        <div class="show_content">
	        <div class="photobox">
			<style>
			#photo_pic{margin-top:10px;float:left;width:750px;}
			#photo_pic img { max-width: 750px;max-height: 800px;_width:expression(this.width > 750 ? "750px" : this.width);_height:expression(this.height > 800 ? "800px" : this.height); }
			* html #photo_pic img { width: expression(this.width > 750 ? 750 : true);height: expression(this.height > 800 ? 800 : true); }
			#rightmenu {position:relative}
			#rightmenu a{float:left;width:100px;margin-top:10px;padding:3px;border: 1px solid #CCCCCC;}
			#rightmenu a img{max-width:92px;_width:expression(this.width > 92 ? "92px" : this.width);}
			#rightmenu .a{border: 1px solid #FF0000;}
			</style>
			<div style="float:left;width:960px;" id="pic_block">
			<div id="photo_pic" class="">

			<a href="<?php echo e(route('album.show',$next->id)); ?>"><img src="<?php echo e($photo->image); ?>" alt="" id="pic" class="showimg"></a>
			</div>
			<script type="text/javascript"> 
			function fetchOffset2(obj, mode) {
			var left_offset = 0, top_offset = 0, mode = !mode ? 0 : mode;

			if(obj.getBoundingClientRect && !mode) {
			var rect = obj.getBoundingClientRect();
			var scrollTop = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
			var scrollLeft = Math.max(document.documentElement.scrollLeft, document.body.scrollLeft);
			if(document.documentElement.dir == 'rtl') {
			scrollLeft = scrollLeft + document.documentElement.clientWidth - document.documentElement.scrollWidth;
			}
			left_offset = rect.left + scrollLeft - document.documentElement.clientLeft;
			top_offset = rect.top + scrollTop - document.documentElement.clientTop;
			}
			if(left_offset <= 0 || top_offset <= 0) {
			left_offset = obj.offsetLeft;
			top_offset = obj.offsetTop;
			while((obj = obj.offsetParent) != null) {
			position = getCurrentStyle(obj, 'position', 'position');
			if(position == 'relative') {
			continue;
			}
			left_offset += obj.offsetLeft;
			top_offset += obj.offsetTop;
			}
			}
			return {'left' : left_offset, 'top' : top_offset};
			}
			function createElem(e){
			var obj = document.createElement(e);
			obj.style.position = 'absolute';
			obj.style.zIndex = '1';
			obj.style.cursor = 'pointer';
			obj.onmouseout = function(){ this.style.background = 'none';}
			return obj;
			}
			function viewPhoto(){
			var pager = createElem('div');
			var pre = createElem('div');
			var next = createElem('div');
			var cont = $('photo_pic');
			var tar = $('pic');
			var space = 0;
			var w = tar.width/2;
			if(!!window.ActiveXObject && !window.XMLHttpRequest){
			space = -(cont.offsetWidth - tar.width)/2;
			}
			var objpos = fetchOffset2(tar);
			 
			pager.style.position = 'absolute';
			pager.style.top = '0';
			pager.style.left = objpos['left'] + 'px';
			pager.style.top = objpos['top'] + 'px';
			pager.style.width = tar.width + 'px';
			pager.style.height = tar.height + 'px';
			pre.style.left = 0;
			next.style.right = 0;
			pre.style.width = next.style.width = w + 'px';
			pre.style.height = next.style.height = tar.height + 'px';
			pre.innerHTML = next.innerHTML = '<img src="image/emp.gif" width="' + w + '" height="' + tar.height + '" />';
			 
			pre.onmouseover = function(){ this.style.cursor = 'url(http://a.xnimg.cn/imgpro/arrow/pre.cur),auto'; }
			pre.onclick = function(){ window.location = 'space.php?uid=99535&do=album&picid=183304&goto=up#pic_block'; }
			 
			next.onmouseover = function(){ this.style.cursor = 'url(http://a.xnimg.cn/imgpro/arrow/next.cur),auto'; }
			next.onclick = function(){ window.location = 'space.php?uid=99535&do=album&picid=183304&goto=down#pic_block'; }
			 
			//cont.style.position = 'relative';
			cont.appendChild(pager);
			pager.appendChild(pre);
			pager.appendChild(next);
			}
			$('pic').onload = function(){
			viewPhoto();
			}
			</script>
			
			<div id="rightmenu" style="float:left;width:130px;margin-left:20px;">
			<a href="<?php echo e(route('album.show',$previous->id)); ?>#pic_block" title="上一张">∧</a>
			
			<?php foreach($photos as $photoList): ?>
			<a href="<?php echo e(route('album.show',$photoList->id)); ?>#pic_block" <?php if($photoList->id == $photo->id ): ?> class="a" <?php endif; ?>><img alt="" src="<?php echo e($photoList->image); ?>"></a>
			<?php endforeach; ?>
			<a href="<?php echo e(route('album.show',$next->id)); ?>#pic_block" title="下一张">∨</a>
			</div>
			</div>
			<div class="clear"></div>
			<div class="yinfo" style="text-align: left;">
			<p></p>
			<p class="">
			上传于 <?php echo e($photo->created_at); ?>

			</p>
			</div>
			<div class="clear"></div>
			<table width="100%">
			<tbody><tr><td align="left">
			<a href="<?php echo e($photo->image); ?>" target="_blank">查看原图</a>
			</td>
			<td align="right">  
			    <a href="cp.php?ac=share&amp;type=pic&amp;id=183304" id="a_share_183304" class="a_share" onclick="ajaxmenu(event, this.id, 1)">分享</a>
				<a href="cp.php?ac=common&amp;op=report&amp;idtype=picid&amp;id=183304" id="a_report" onclick="ajaxmenu(event, this.id, 1)">举报</a>
			</td></tr>
			</tbody></table>
			</div>
	    </div>
	    <div class="">
		    <?php echo Widget::Reply([ 'tpl'=>'reply','post_id'=>$photo->id, 'post_user_id' => $photo->user_id, 'limit'=>'20', 'post_from'=>'photo','space_id'=>$photo->space_id,'addtoend'=>0 ]); ?>

		</div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>