 @extends('layouts.common')

@section('title')
{{{ $thread->title }}} - @parent
@stop

@section('description')
{{{ $thread->excerpt }}}
@stop

@section('content')
<script type="text/javascript" src="{{asset('build/dist/js/thread.js')}}"></script>
<script src="{{ asset('/js/lang/public_zh-cn.js') }}"></script>
<script src="{{ asset('/js/lang/admin_zh-cn.js') }}"></script>
<script src="{{ asset('/js/jquery.form.js') }}"></script>
<script src="{{ asset('/js/common.js') }}"></script>
<script src="{{ asset('/js/core.js') }}"></script>
<script src="{{ asset('/js/module.js') }}"></script>
<script src="{{ asset('/js/module.common.js') }}"></script>
<script src="{{ asset('/js/jwidget_1.0.0.js') }}"></script>
<script src="{{ asset('/js/jquery.atwho.js') }}"></script>
<script src="{{ asset('/js/jquery.caret.js') }}"></script>
<script src="{{ asset('/js/ui.core.js') }}"></script>
<script src="{{ asset('/js/ui.draggable.js') }}"></script>
<script src="{{ asset('/js/plugins/core.digg.js') }}"></script>
<script src="{{ asset('/js/plugins/core.comment.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/home/module.home.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/module.weibo.js') }}"></script>
<div class="clear"></div>
<div class="b_n">
<div class="b_na">
	<strong class="green">【{{$thread->node->name}}】 </strong>
	<ul style=""><li class="b_lab"><a href="{{ route('thread.create')}}"><span id="showss">+发起新话题</span></a>
	</li><li><a href="{{ route('thread.index', [$thread->id]) }}"><< 返回上一页</a></li></ul>
</div>
<div class="b_nb">
<div id="post_li">
<div class="secretList">
<ul>
<li>
<div class="puppetdiv" style="height:90px;">
<a href="{{$user->link}}"><img id="avatar_82392_1510" class="useravatar" uid="82392" src="{{asset($user->avatar_url)}}" style="width:60px;height:60px;">
<span>
{{$user->username}}</span></a>
</div>
<div class="secretdiv">
<div class="secretHead">
<div class="secretType secretType-5" style="font-size:16px;color:#000000;font-weight:bold;font-family:微软雅黑">
<h3 style="line-height:22px">{{$thread->title}}<div style="color:gray">{{ friendlyDate($thread->created_at)}}</div></h3>
</div>
</div>
<div class="secretBody">
<div class="secretWord">

<div class="detail">{!!$thread->body!!}</div>
</div>
<div class="status">
<!-- {{{$thread->favorite_count}}}次收藏<span class="pipe">|</span> -->
{{{$thread->view_count}}} 次阅读<span class="pipe">|</span>
{{{$thread->reply_count}}}个回复<span class="pipe">|</span>
<span id="thread_count{{{$thread->id}}}">{{{$thread->like_count}}}</span><a title="{!! trans('hifone.like') !!}" id="thread{{{$thread->id}}}">点赞</a>

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
</div>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>

</td>
</tr>
</tbody></table>
</li>
</ul>

</div>

@foreach($alls as $k => $all)
<dl class="b_nc">
	<dt>
		<a href="{!! route('user.home', [$all->user_id]) !!}">
			<img src="{!! asset($all->avatar_url) !!}"style="width:48px;height:48px" alt="" />
		</a>
	</dt>
	<dd class="b_nd">
		<p>
			<span class="green">
				<a href="{!! $all->link !!}">
					{!!$all->username!!}
				</a>
					@if(!empty($reply_user_id[$k]->username))

					回复<a href="{{$reply_user_id[$k]->link}}">
							{!!$reply_user_id[$k]->username!!}
						</a>

			</span>
			({!!$reply_user_id[$k]->work!!}
			@if (!empty($reply_user_id[$k]->work) && !empty($reply_user_id[$k]->school))
				/
			@endif
			{!!$reply_user_id[$k]->school!!})
				@if(!empty($replies_reply[$k]))
					{{{$replies_content[$k]->created_at}}}
				@else
					{{{$reply_user_id[$k]->created_at}}}
				@endif
			@else
				<span style="color:black">
					({!!$all->work!!}
					@if (!empty($all->work) && !empty($all->school))
						/
					@endif
					{!!$all->school!!})

					@if(!empty($replies_reply[$k]))
						{{{$replies_content[$k]->created_at}}}
					@else
						{{{$all->created_at}}}
					@endif
				</span>
			@endif
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
		<a  id="like{!! $all->id !!}" title="{{ trans('hifone.like') }}" onclick="zang({!!$all->id!!},{!!$thread->id!!})">
			<img src="{{asset('images/index/like1.jpg')}}" width="20" height="20" alt="" />
		</a>
		<span id="like_count{!! $all->id !!}">{!! $all->like_count !!}</span>
		<!-- //回复的点赞 -->
		<a href="#" class="aa{!! $all->id !!}"  onclick="reply_show({!!$all->id!!})" >回复</a>&nbsp;<a href="#" onclick="jubao_show({!!$all->id!!})" >举报</a>
	</dd>
</dl>

	<div class="l_ahoverb" id="reply_search{!! $all->id !!}">
		<div class="l_ahoverc">
		<strong">回复</strong><span onclick="reply_hide({!! $all->id !!})">关闭</span>
		</div>
		<div class="reply_show{!! $all->id !!}"></div>
		<div class="comment">
		<div class="com_form" model-node="comment_textarea">
			<a event-node="comment_insert_face" class="face-block" href="javascript:;" title="表情" style=" top: -4px;position: relative;"> <img src="/images/index/img51.jpg" class="face">表情 </a>
			<input type="hidden" id="postvideourl" value="">
			<div model-node="faceDiv" style="position: relative;"></div>
			<form class="" action="{{ route('reply.store')}}" method="post" model-node="mini_editor">
				<input name="thread_id" type="hidden" value="{!!$thread->id!!}">
				<input name="reply_id" type="hidden" value="{!!$all->id!!}">
				<textarea class="input" id="reply_saytext{!! $all->id !!}" name="saytext2" event-node="mini_editor_textarea"></textarea>
				<p style="position: relative;width: 250px;    z-index: 1000;"><input type="checkbox" name="anonymous" value="1"/> 匿名回复（需要花费{{config('system_config.anonymous_integral')}}分积分）</p>
				<p style="top:-32px;"><input type="submit" class="sub_btn" value="提交"></p>
			</form>

		</div>
		</div>
	</div>
</form>
<form class="" action="" method="">
	<div  class="jubao" id="jubao{!! $all->id !!}" style="margin-top:-100px;display:none">
		<div class="jubaoa"><strong>举报</strong><span onclick="jubao_hide({!!$all->id!!})">关闭</span></div>
		<table>
		<tr><td>感谢您能协助我们一起管理站点，我们会对您的举报尽快处理。
		请填写举报理由（最多150字符):</td></tr>
		<tr><td>
			<textarea name="content" id="reply_jubao{!! $all->id !!}"></textarea>
			<input type="hidden" name="reply_id" value="{!! $all->id !!}">
			<input type="hidden" name="type" id="type{!! $all->id !!}" value="reply_report">
			<input type="hidden" name="type_id" id="type_id{!! $all->id !!}" value="{!! $all->id !!}">
		</td></tr>
		<tr><td><input type="button" value="提交" id="reply_report" /></td></tr>
		</table>
	</div>
</form>
@endforeach
<div class="clear"></div>
	<div class="paging" style="">
		<a href="{{ $alls->url(1) }}">首页</a>
		@if($alls->currentPage()>1)
		<a href="{!!$alls->url($alls->currentPage()-1)!!}">上一页</a>
		@endif
		@if($alls->lastPage()<6)
			@for($i=1;$i<=$alls->lastPage();$i++)
				@if($i == $alls->currentPage())
					<a style="background:#51b837;color:#fff" href="{{ $alls->url($i) }}">{!!$i!!}</a>
				@else
					<a href="{{ $alls->url($i) }}">{!!$i!!}</a>
				@endif
			@endfor
		@elseif($alls->lastPage()>2)
			@if($alls->currentPage()>3)
				<a href="{{ $alls->url($alls->currentPage()-1) }}">...</a>
			@endif
			@if($alls->currentPage()>1)
				<a href="{{ $alls->url($alls->currentPage()-1) }}">{!!$alls->currentPage()-1!!}</a>
			@endif
			<a href="{{ $alls->url($alls->currentPage()) }}">{!!$alls->currentPage()!!}</a>
			@if($alls->currentPage()<$alls->lastPage())
				<a href="{{ $alls->url($alls->currentPage()+1) }}">{!!$alls->currentPage()+1!!}</a>
			@endif

			@if(($alls->lastPage()-$alls->currentPage()) > 1 && $alls->currentPage()<$alls->lastPage())
				<a href="{{ $alls->url($alls->currentPage()+1) }}">...</a>
			@endif
		@endif
		@if($alls->currentPage()<$alls->lastPage())
		<a href="{!!$alls->url($alls->currentPage()+1)!!}">下一页</a>
		@endif
		<a href="{{ $alls->url($alls->lastPage()) }}">尾页</a>
		@if($alls->lastPage() == 0)
		<div class="clear" style="text-align:center;font-size:16px;color:#818181;margin-top:5px">当前页面{!!$alls->currentPage()!!}/1</div>
		@else
		<div class="clear" style="text-align:center;font-size:16px;color:#818181;margin-top:5px">当前页面{!!$alls->currentPage()!!}/{!!$alls->lastPage()!!}</div>
		@endif
	</div>
<!--<div class="activity_page">
	<div class="paging f_r">
		<a href="{{ $alls->url(1) }}">第一页</a>
		@for ($i = 1; $i <= $alls->lastPage(); $i++)
			<a href="{{ $alls->url($i) }}">{{ $i }}</a>
		@endfor
		<a href="{{ $alls->url($alls->lastPage()) }}">最后一页</a>
	</div>
	<div style="text-align:center;font-size:16px;color:#818181">当前页面是第{!!$alls->currentPage()!!}/{!!$alls->lastPage()!!}页</div>
 </div>-->
<div class="clear"></div>


<div class="b_nf" id="com_form">
	<div class="b_nfa">

		<div class="com_form" style="width:400px; height:200px; margin-left:20px; color:#696969;" model-node="comment_textarea">
			<a event-node="comment_insert_face" class="face-block" href="javascript:;" title="表情" > <img src="/images/index/img51.jpg" class="face">表情 </a>
			<input type="hidden" id="postvideourl" value="">
			<div model-node="faceDiv" style="position: relative;"></div>
			<form class="" action="{{ route('reply.store')}}" method="post" model-node="mini_editor">
				<input name="thread_id" type="hidden" value="{!!$thread->id!!}">
				<textarea class="input" id="saytext2" name="saytext2" event-node="mini_editor_textarea"></textarea>
				<p style="position: relative;width: 250px;    z-index: 1000;"><input type="checkbox" name="anonymous" value="1"/> 匿名回复（需要花费{{config('system_config.anonymous_integral')}}分积分）</p>
				<p style="top:-32px;"><input type="submit" class="sub_btn" value="提交"></p>
			</form>
		</div>
	</div>
</div>
</div>

<form class="" action="{{ route('thread.report')}}" method="post">
	<div class="jubao" style="margin-top:-100px;">
		<div class="jubaoa"><strong>举报</strong><span>关闭</span></div>
		<table>
		<tr><td>感谢您能协助我们一起管理站点，我们会对您的举报尽快处理。
		请填写举报理由（最多150字符):</td></tr>
		<tr><td>
			<textarea name="content" id="reply_jubao"></textarea>
			<input type="hidden" name="type_id" id="type_id" value="{!!$thread->id!!}">
			<input type="hidden" name="type" id="type" value="thread_report">
		</td></tr>
		<tr><td>
		<input type="button" id="thread_report" value="提交" /></td></tr>
		</table>
	</div>
</form>
<script type="text/javascript" src="{{ asset('/build/dist/js/qqhideshow.js') }}"></script>
<script type="text/javascript">
	$('#reply_report').on('click',function(){
		id = window.sessionStorage.getItem('reply_id');;
		if($('#reply_jubao'+id).val() == ""){
			alert("请填写举报内容！");
		}else{
			$.post("{{route('report.nodeReport')}}",'content='+$('#reply_jubao'+id).val()+'&type='+$('#type'+id).val()+'&type_id='+$('#type_id'+id).val(),function(data){
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
			$.post("{{route('report.nodeReport')}}",'content='+$('#reply_jubao').val()+'&type='+$('#type').val()+'&type_id='+$('#type_id').val(),function(data){
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
			url: "{{ route('like.index') }}",
			data: { type : 'Reply',id:reply_id,tid:threah_id},
			dataType: 'json',
			success: function(data){
				$("#like_count"+reply_id).text(data);
			},
			error: function(xhr, type){
				location.href="{{ route('auth.login') }}";
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
$('#thread{{{$thread->id}}}').click(function(){
	$.ajax({
		type: 'GET',
		url: "{{ route('like.index') }}",
		data: { type : 'Thread',id:'{!!$thread->id!!}'},
		dataType: 'json',
		success: function(data){
			$('#thread_count{{{$thread->id}}}').text(data);
		},
		error: function(xhr, type){
			location.href="{{ route('auth.login') }}";
		}
	});

});
</script>
@stop
