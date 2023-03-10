 

<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('build/dist/css/setting.css')); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo e(asset('/js/module.js')); ?>"></script>
<script src="<?php echo e(asset('/js/module.form.js')); ?>"></script>
<script src="<?php echo e(asset('/packages/hifone/dashboard/js/ckeditor/ckeditor.js')); ?>"></script>
	<div class="clear"></div>
    <div class="TA">
        <div class="b_ja">
            <img src="<?php echo e(asset('images/photologo.png')); ?>" alt="" /><span style="color: #aaa;font-size: 16px;">活动</span>
        </div>
        <div class="clear" style="height: 30px;"></div>
           <div class=" fleft">
				<?php if(!empty(Session::get('input'))): ?>
				<?php $data = Session::get('input');?>
				<?php endif; ?>
				<div class="b_hf" style="width: 1000px;">
					<ul>
					    <li class="select"><a href="<?php echo e(route('activity.create')); ?>">发起活动</a></li>
					    <li><a href="<?php echo e(route('activity.index')); ?>">返回活动首页</a></li>
					</ul>
				</div>
              <div class="gexing_main" >
                  	<div class="c_form">
						<form id="edit_form" name="edit_form" method="post" enctype="multipart/form-data" action="/activity/store">
						<table class="infotable" width="100%" cellspacing="4" cellpadding="4">				
						<tbody>	
						<tr>
							<th width="100" style="vertical-align: top;">活动分类 : </th>
							<td>
								<?php echo Widget::ActivityCategoryWidget(['name' => 'cate_name' ,'province_name' => 'cate_pid','city_name' => 'cate_id','prefix' => ''] ); ?>

								<span id="classid_info">
								</span>
							</td>
						</tr>				
						<tr>
							<th>活动名称 : </th>
							<td>
								<input class="t_input" id="name" name="name" value="<?php echo e(Input::old('name')); ?>" size="56" type="text" maxlength="80">&nbsp;&nbsp;<span id="title_msg" style="color:red">活动标题限于5个字符和24个字符之内</span>
							</td>
						</tr>
						<tr>
						<th>活动城市 : </th>
							<td id="citybox">
							 <?php echo e(Widget::Areas([ 'user_id' => Auth::id(),'type'=> 'location','name' => 'location' ,'province_name' => 'province','city_name' => 'city','prefix' => ''] )); ?>

							</td>
						</tr>
						<tr>
							<th>活动地点 : </th>
							<td>
								<input class="t_input" id="location" name="location" value="<?php echo e(Input::old('location')); ?>" size="56" type="text" maxlength="80">
							</td>
						</tr>
						<tr>
							<th>活动时间 : </th>
							<td>
								<input type="text" name="begin_time" id="begin_time" event-node="input_date" mode="full" event-args="mode=full&min=1&error=请选择时间"  value="<?php echo e(Input::old('begin_time')); ?>" class="t_input">
							 至
								<input type="text" name="close_time" id="close_time" event-node="input_date" event-args="mode=full&min=1&error=请选择时间" value="<?php echo e(Input::old('close_time')); ?>" class="t_input">
							</td>
						</tr>
						<tr>
							<th>报名截止 : </th>
							<td>
								<input type="text" class="t_input" name="deadline" id="deadline" event-node="input_date" event-args="mode=full&min=1&error=请选择时间" value="<?php echo e(Input::old('deadline')); ?>" >
							</td>
						</tr>
						<tr>
							<th>退出截止 : </th>
							<td>
								<input type="text" class="t_input" name="exittime" id="exittime" event-node="input_date" event-args="mode=full&min=1&error=请选择时间" value="<?php echo e(Input::old('exittime')); ?>" >
							在这之前还能退出活动
							</td>
						</tr>
						<tr>
							<th>活动人数 : </th>
							<td>
								<input name="number_count" class="t_input"  value="<?php echo e(Input::old('number_count')); ?>" id="limitnum" type="text" size="4" maxlength="8">
	                            <span class="tiptext">
	                                活动人数限制为"3--300"人
	                            </span>
							</td>
						</tr>
						<tr>
						<th>联系电话 : </th>
						<td>
							<input class="t_input" id="mobile" name="mobile" value="<?php echo e(Input::old('mobile')); ?>" size="20" type="text" maxlength="20">
						</td>
						</tr>
						<tr>
							<th>活动费用 : </th>
							<td>
								<span id="payboy">男  ：<input class="t_input" id="payboy" name="payboy" value="<?php echo e(Input::old('payboy')); ?>" size="3" type="text" maxlength="20"></span>
								<span id="paygirl">女 ：<input class="t_input" id="paygirl" name="paygirl" value="<?php echo e(Input::old('paygirl')); ?>" size="3" type="text" maxlength="20"></span>
							</td>
						</tr>
						<tr>
							<th>支付方式 : </th>
							<td>
								<input name="pay[]" id="offlinepay" value="1" type="checkbox" <?php if(Input::old('pay.0')): ?>checked="checked"<?php endif; ?>>现场支付
								<input name="pay[]" id="alipay" value="2" type="checkbox" <?php if(Input::old('pay.1')): ?>checked="checked"<?php endif; ?>>支付宝支付
								<input name="pay[]" id="wxpay" value="3" type="checkbox" <?php if(Input::old('pay.2')): ?>checked="checked"<?php endif; ?>>微信支付
							</td>
						</tr>
						<tr>
							<th>活动详情 : </th>
							<td>
								<textarea id="body" cols="20" rows="2" class="ckeditor" name="body"><?php echo e(Input::old('body')); ?></textarea>
							</td>
						</tr>
						<tr>
							<th style="vertical-align: top;">活动海报</th>
							<td>
								<input type="file" name="poster" id="poster"> 图片将上传到您的默认相册。<br>
							</td>
						</tr>
						</tbody>
						</table>
						<table class="infotable" width="100%" cellspacing="4" cellpadding="4">
						<tbody>
						<!--<tr>
							<th width="100">动态选项</th>
							<td>
								<input type="checkbox" name="makefeed" id="makefeed" value="1" checked=""> 产生动态 
							</td>
						</tr>-->
						<tr>
							<th width="100">&nbsp;</th>
							<td>
                        		<input class="btn-green-big" style="margin:0px;" value="提交" type="submit" >
							</td>
						</tr>
						</tbody>
						</table>
						</form>
					</div>
                  
              </div>
                
                     
    	</div>
	</div>
	<div class="clear"></div>
<script type="text/javascript">
	$(function(){
		var editor = CKEDITOR.replace( 'body',{
			toolbar : [
				['-','Save','NewPage','Preview','-','Templates'],
				['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
				['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
				['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],

				['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
				['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['Link','Unlink','Anchor'],
				['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],

				['Styles','Format','Font','FontSize'],
				['TextColor','BGColor'],
			]
		});
		function check_eventpost(){			
			// 活动类型
			if (parseInt($("#classid").value) < 0){
			alert("活动类型必须选择。");
			$("#classid").focus();
			return false;
			}	
			// 标题
			var val = trim($("#title").value);
			if ( val == "" ){
			alert("活动标题不能为空！");
			$("#title").focus();
			return false;
			} else if (val.length > 24 ||val.length <5){
			alert("活动标题太长，请限制在5个字符和24个字符之内！");
			$("#title").focus();
			return false;
			}	
			// 活动地点
			if($('city').value == ""){
			alert("活动举办城市不能为空。");
			$("#city").focus();
			return false;
			}			
			// 报名时间，起始-结束时间
			var deadline = parsedate($("#deadline").value).getTime();
			var starttime = parsedate($("#starttime").value).getTime();
			var nowtime = new Date().getTime();
			if (starttime < nowtime){
			alert("活动开始时间不能早于现在。");
			$("#starttime").focus();
			return false;
			}

			// 联系电话
			if (! /^[0-9]{1,11}$/.test($("#etel").value)){
			alert("联系电话输入不正确。");
			$("#etel").focus();
			return false;
			}
			// 活动海报
			if ($("#poster").value.length == 0){
			alert("请上传活动海报图片。");
			$("#poster").focus();
			return false;
			}
			// 限制人数
			if (! /^[0-9]{1,8}$/.test($("#limitnum").value)||$("#limitnum").value<3||$("#limitnum").value>300){
			alert("活动人数输入不正确。");
			$("#limitnum").focus();
			return false;
			}

		    var makefeed = $('#makefeed');
		    if(makefeed) {
		    	if(makefeed.checked == false) {
		    		if(!confirm("友情提醒：您确定此次发布不产生动态吗？\n有了动态，粉丝才能及时看到你的更新。")) {
		    			return false;
		    		}
		    	}
		    }
		    
		    // 编辑器内容同步
			edit_save();
			// 活动描述，默认可能有一个<br/>或<div></div>，需要去掉再判断
			val = trim($("#uchome-ttHtmlEditor").val().replace(/<br[ \/]*>|<div><\/div>/img,''));
			if (val == ""){
				alert("活动描述不能为空。");
				return false;
			}						

		    $("#edit_form").submit();

		}
	});
	

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>