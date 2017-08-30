@extends('layouts.common')

@section('content')
<script src="{{ asset('/build/dist/js/choose2.js') }}" type="text/jscript"></script>
<div class="clear"></div>

<div class="b_i">
<div class="b_ia">
日志
</div>
<div class="tab1s" id="b_ib">
	<div class="menuss">
		<ul>
			<li id="ones1" onclick="setTab('ones',1)" class="offs">发表新日志</li>
            <li id="ones3" onclick="javascript:window.location.href='{{route('blog.index',['type' => 'me'])}}'">返回我的日志</li>
		</ul>
	</div>
	<div class="menudivss b_ie" style="height: 1000px;">
		<div id="cons_ones_1" class="b_ic">
        <div class="b_id">
	        <form action="{{route('blog.store')}}" method="post">
		    {{ csrf_field() }}
	        <div class="b_ih">
		         <select class="b_idinp8" name="cat_id" onchange="addSort(this)" id="cat_id">
			         <option value='' selected>选择分类</option>
			         @foreach($cates as $key => $cate)
			         	<option value='{{$cate->id}}'>{{$cate->name}}</option>
			         @endforeach
			         <option value="addoption" style="color:red;">+新建分类</option>
			     </select>
			     <input type="text" name="title" id="title" class="b_idinp1" />
		     </div>
	         <!-- //编辑器 -->
	        <div class="b_ig">
	           <textarea id="editor" cols="20" rows="2" class="ckeditor" name="body" style="height:500px;"></textarea>
	        </div>
	        <table cellpadding="0" cellspacing="0">
	        <tr><td width="100">隐私设置</td>
	        	<td>
		        	<select class="b_idinp4" name="friend" onchange="passwordShow(this.value);">
			        	<option value="0">全站用户可见</option>
						<!--<option value="1">全好友可见</option>
						<option value="2">仅指定的好友可见</option>-->
						<option value="3">仅自己可见</option>
						<option value="4">凭密码查看</option>
			        </select>
			        <span id="span_password" style="display: none;">密码:<input type="text" name="password" value="" size="10" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" class="b_idinp4"></span>
		      	</td>
		    </tr>
	       <!-- <tr><td>动态选项</td><td><input type="checkbox" class="b_idinp5" name="makefeed" value="1" checked/>产生动态<span class="green">（更改默认设置）</span></td></tr>-->
	        <tr><td></td><td> <div id="fileList" class="uploader-list"></div></td></tr>
	        <tr><td></td><td><input type="button" class="b_idinp7" value="保存发布" id="submit_btn" /></td></tr>
			<textarea name="body_original" id="body_original" style="display: none;"></textarea>
			<input type="submit" name="submit" id="submit"  style="display: none;">
	        </table>
	        </form>
        </div>

</div>

</div>
</div>
</div>
<div class="clear"></div>
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
		  //  var body = CKEDITOR.instances.body.getData();
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
<script type="text/javascript" charset="utf-8" src="{{ asset('js/edit/ueditor.config.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('js/edit/ueditor.all.min.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('js/edit/lang/zh-cn/zh-cn.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('js/ueditor.js') }}"></script>
@stop
