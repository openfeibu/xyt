 

<?php $__env->startSection('content'); ?>
<div class="clear"></div>
    <div style="height: 30px;"></div>
    <div class="left_content">
        <div class="top_th">
            <span>以下是根据您的条件搜索的结果，如果没有找到您满意的结果,</span>
            <a href="<?php echo e(route('search.index')); ?>">请重新设定搜索条件搜索</a>
        </div>
        <div class="left_page">
            <form action="" name="order_result">
                <table>
                    <tr>
                        <td>搜索排序：&nbsp;&nbsp;</td>
                        <td>
                            <input type="radio" onclick="javascript:jump();" id="ib1" name="order" value="descBylogin"/>
                            <label for="ib1">最近登录&nbsp;&nbsp;</label>
                            <input type="radio"  onclick="javascript:jump();" id="ib2" name="order" value="descByregister"/>
                            <label for="ib2">最近注册&nbsp;&nbsp;</label>
                            <input type="radio"  onclick="javascript:jump();" id="ib3" name="order" value="descByrq"/>
                            <label for="ib3">综合人气&nbsp;&nbsp;</label>
                        </td>
                    </tr>
                </table>
            </form>
            <ul class="search_ul"> <!--这里面的li 双数的时候 右外边距为0-->
				<?php foreach($users as $k=>$user): ?>
					<li class="search_li " style="float:left;width:300px;margin-right:0px;margin-left:12px;">
						
						<div class="search_div1  user_info_abroad">
							<a href="<?php echo route('user.home', [$user->id]); ?>"   <?php if($uid != $user->id): ?> class="user_info" <?php endif; ?> rel='<?php echo e($user->id); ?>'><img style="border:1px #e2e1e1 solid;width:100px;height:100px " src="<?php echo asset($user->avatar); ?>" alt=""/></a>
							<div style="height: 17px;"></div>
							<p class="name"><?php echo $user->username; ?></p>
							<p class="gender">
								<?php if($user->sex==0): ?>
									未知性别
								<?php elseif($user->sex==1): ?>
									帅哥
								<?php elseif($user->sex==2): ?>
									美女
								<?php endif; ?>
							</p>
							<p class="location"><?php echo $user->location; ?></p>
							<p class="Occupation"><?php echo $user->work; ?> <?php echo $user->school; ?></p>
						</div>
						
						<div class="clear"></div>
						<div class="search_div2" style="margin-top:20px;">
							<span>积分：111/</span>
							<span>象币：82/</span>
							<span>人气：190/</span>
							<span>关注：7</span>
							<span>粉丝：<?php echo $user->follower_count; ?></span>
						</div>
						
					</li>
				<?php endforeach; ?>
            </ul>
        </div>
        <div class="clear"></div>
		
		<?php if($page_count == 0): ?>
			<div style="width:100%;text-align:center;font-size:20px;color:#aaa">无搜索结果,请重新设定搜索条件搜索</div>
		<?php else: ?>
			<div class="paging" style="">
				<a href="<?php echo e(route('search.result',['page'=>1])); ?>">首页</a>
				<?php if($page>1): ?>
				<a href="<?php echo e(route('search.result',['page'=>$page-1])); ?>">上一页</a>
				<?php endif; ?>
				<?php if($page_count<6): ?>
					<?php for($i=1;$i<=$page_count;$i++): ?>	
						<?php if($i == $page): ?>
							<a style="background:#51b837;color:#fff" href="<?php echo e(route('search.result',['page'=>$i])); ?>"><?php echo $i; ?></a>			
						<?php else: ?>
							<a href="<?php echo e(route('search.result',['page'=>$i])); ?>"><?php echo $i; ?></a>
						<?php endif; ?>
					<?php endfor; ?>
				<?php elseif($page_count>2): ?>
					<?php if($page>3): ?>
						<a href="<?php echo e(route('search.result',['page'=>$page-1])); ?>">...</a>
					<?php endif; ?>
					<?php if($page>1): ?>
						<a href="<?php echo e(route('search.result',['page'=>$page-1])); ?>"><?php echo $page-1; ?></a>
					<?php endif; ?>
					<a href="<?php echo e(route('search.result',['page'=>$page])); ?>"><?php echo $page; ?></a>
					<?php if($page<$page_count): ?>
						<a href="<?php echo e(route('search.result',['page'=>$page+1])); ?>"><?php echo $page+1; ?></a>
					<?php endif; ?>
					
					<?php if(($page_count-$page) > 1 && $page<$page_count): ?>
						<a href="<?php echo e(route('search.result',['page'=>$page+1])); ?>">...</a>
					<?php endif; ?>
				<?php endif; ?>
				<?php if($page<$page_count): ?>
				<a href="<?php echo e(route('search.result',['page'=>$page+1])); ?>">下一页</a>
				<?php endif; ?>
				<a href="<?php echo e(route('search.result',['page'=>$page_count])); ?>">尾页</a>
				<div class="clear" style="text-align:center;font-size:16px;color:#818181;margin-top:5px">当前页面<?php echo $page; ?>/<?php echo $page_count; ?></div>
			</div>
		<?php endif; ?>
		
    </div>
    <div class="right_content">
        <div class="top_th">
            <span>快速搜索</span>
        </div>
        <div class="form-search">
           
            
            <form action="<?php echo e(route('search.result',['page'=>1])); ?>" method="get">
				<input type="hidden" name="hidden" value="this_search">
			    <div class="search-username"><input type="text" name="nickname" id="nickname" placeholder="按昵称搜索" /></div>
                <table>
                    <tr>
						<td align="right"><?php echo $basic_data['sex']['desc']; ?>：</td>
						<td>
							<select name="sex" id="sex" class="select1">
								<?php foreach($basic_data['sex']['value'] as $k=>$sex): ?>
								<option value="<?php echo $k; ?>"><?php echo $basic_data['sex']['value'][$k]; ?>&nbsp;</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
                    <tr>
						<td align="right"><?php echo $basic_data['city']['desc']; ?>：</td>
						<td>
							<select name="province" id="province"  class="select1">
								<option value="">省份</option>
								<option value="广东">广东</option>
							</select>
							<select name="city" id="city" class="select1">
								<option value="">城市</option>
								<option value="广州">广州</option>
							</select>
						</td>
					</tr>
                    <tr>
						<td align="right">年龄：</td>
						<td>
							<select name="age_min" id="age_min" class="select1">
								<option value="0">请选择</option>
								<?php foreach($standard_data['opage']['value'] as $k=>$opage): ?>
								<option value="<?php echo $k; ?>"><?php echo $standard_data['opage']['value'][$k]; ?>&nbsp;</option>
								<?php endforeach; ?>
							</select>
							<span>至</span>
							<select name="age_max" id="age_max" class="select1">
								<option value="0">请选择</option>
								<?php foreach($standard_data['opage2']['value'] as $k=>$opage2): ?>
								<option value="<?php echo $k; ?>"><?php echo $standard_data['opage2']['value'][$k]; ?>&nbsp;</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
                   <tr>
						<td align="right">身高：</td>
						<td>
							<select name="height_min" id="height_min" class="select1">
								<option value="0">请选择</option>
								<?php foreach($standard_data['opheight']['value'] as $k=>$opheight): ?>
								<option value="<?php echo $k; ?>"><?php echo $standard_data['opheight']['value'][$k]; ?>&nbsp;</option>
								<?php endforeach; ?>
							</select>
							<span>至</span>
							<select name="height_max" id="height_max" class="select1">
								<option value="0">请选择</option>
								<?php foreach($standard_data['opheight2']['value'] as $k=>$opheight2): ?>
								<option value="<?php echo $k; ?>"><?php echo $standard_data['opheight2']['value'][$k]; ?>&nbsp;</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
                    <tr>
						<td align="right"><?php echo $basic_data['education']['desc']; ?>：</td>
						<td>
							<select name="education" id="education" class="select1">
								<?php foreach($basic_data['education']['value'] as $k=>$education): ?>
								<option value="<?php echo $k; ?>"><?php echo $basic_data['education']['value'][$k]; ?>&nbsp;</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
                    <tr>
						<td align="right"><?php echo $basic_data['work']['desc']; ?>：</td>
						<td>
							<select name="work" id="work" class="select1">
								<?php foreach($basic_data['work']['value'] as $k=>$work): ?>
								<option value="<?php echo $k; ?>"><?php echo $basic_data['work']['value'][$k]; ?>&nbsp;</option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
                    <tr>
                        <td></td>
                        <td align="center">
                            <input type="submit" id="buttonTosubmit" value="立即搜索" style="margin-left:-50px;"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="clear"></div>
	<script>
		$(".followbtn").click(function(){
			var loading = layer.load(1, {shade: false});
			t = $(this);
			i = t.attr('data-type'), r = t.attr("data-id"), n = t.attr("data-action"), a = t.attr("data-url")
			$.ajax({
				url: a,
				type: "POST",
				data: {
					type: i,
					id: r
				},
				success: function(data) {
					layer.close(loading);
					t.hasClass("active") ? t.removeClass("active") : t.addClass("active");
					layer.msg('操作成功', {icon:1});
				},
				error: function(e) {
					layer.close(loading);
					layer.msg('操作失败', {icon: 5});
				}
			}, "json")
		});
		

		function jump() {
			order_result.action="<?php echo e(route('search.result',['page'=>1])); ?>";
			order_result.submit();
		}
		
		
		var name,value; 
	    var str=location.href; //取得整个地址栏
	    var num=str.indexOf("?") 
	    str=str.substr(num+1); //取得所有参数   stringvar.substr(start [, length ]

		num=str.indexOf("="); 
		if(num>0){ 
		 name=str.substring(0,num);
		 value=str.substr(num+1);
		} 
		if(value == "descBylogin"){
			$("#ib1").attr('checked','true');
		}else if(value == "descByregister"){
			$("#ib2").attr('checked','true');
		}else{
			$("#ib3").attr('checked','true');
		}


	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>