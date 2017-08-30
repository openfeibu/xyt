@extends('layouts.common')

@section('content')
<script src="{{ asset('/build/dist/js/choose2.js') }}" type="text/jscript"></script>
<div class="clear"></div>

<div class="b_i">
<!--<div class="b_ia">
日志
</div>-->
	<div class="tab1s" id="b_ib">
		<div class="menuss">
			<ul>
				<li id="ones1" onclick="setTab('ones',1)" class="offs">创建活动总结</li>
			</ul>
		</div>
		<div class="menudivss b_ie" style="height: 1000px;">
			<div id="cons_ones_1" class="b_ic">
	        <div class="b_id">
		        <form action="{{route('activity.store_summary')}}" method="post">
				    {{ csrf_field() }}
				    <div class="b_ih">
					     标题：<input type="text" name="title" id="title" class="b_idinp1" value="@if($summary){{$summary->title}}@endif"/>
				     </div>
			         <!-- //编辑器 -->
			        <div class="b_ig">
			           <textarea id="editor"  class="ckeditor h500" name="body">@if($summary){{$summary->body}}@endif</textarea>
			        </div>
					<div class="clear"></div>
					<div style="margin-top:100px">
				        <table cellpadding="0" cellspacing="0">
					        <tr><td></td><td> <div id="fileList" class="uploader-list"></div></td></tr>
					        <tr><td></td><td><input type="button" class="b_idinp7" value="保存发布" id="submit_btn" /></td></tr>
							<textarea name="body_original" id="body_original" style="display: none;"></textarea>
							<input type="hidden" name="activity_id" value="{{$activity->id}}" />
							<input type="submit" name="submit" id="submit"  style="display: none;">
				        </table>
					</div>
		        </form>
	        </div>
		</div>

	</div>
</div>
</div>
<div class="clear"></div>
<script type="text/javascript" charset="utf-8" src="{{ asset('js/edit/ueditor.config.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('js/edit/ueditor.all.min.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('js/edit/lang/zh-cn/zh-cn.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('js/ueditor.js') }}"></script>
<script type="text/javascript">
	$(function(){
		$("#submit_btn").click(function(){
		    var subject = $('#title');
		    if (subject) {
		    	var slen = $.trim(subject.val()).length;
		        if (slen < 1 || slen > 80) {
		            alert("标题长度(1~80字符)不符合要求");
		            subject.focus();
		            return false;
		        }
		    }
			var body = UE.getEditor('editor').hasContents();
		    //var body = CKEDITOR.instances.body.getData();
            if($.trim(body).length<1){
	            alert("内容不能为空");
	            return false;
            }
			var body_original = UE.getEditor('editor').getContentTxt();
            //var body_original = editor.document.getBody().getText();
            $("#body_original").html(body_original);
            $("#submit").click();
		});
	});
</script>
@stop
