 @extends('layouts.common')

@section('content')
<style>
	.sign_show{margin-left: 20px;font-size: 16px;margin-top: 5px;height: 30px;line-height: 20px;}
	.pointer{cursor: pointer}
</style>
 
<link href="{{ asset('/build/dist/css/interaction2.css') }}" type="text/css" rel="stylesheet" />

<div class="clear"></div>
<div class="container">
	<div class="container-top">
		<div class="container-top-left">
			<span><img src="{{asset('images/index/home.png')}}" alt="" /></span>
			<span>&gt;</span>
			<span>新人专区</span>
			<span>&gt;</span>
			<span>{!!$node->name!!}</span>
		</div>
		<div class="container-top-right jiathis_style">
			<span ><a href="#" class="jubaoshow">举报</a></span>
			<span>|</span>
			<span style="margin-left:10px;margin-top:4px;display:inline-block"><a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank">分享</a></span>
		</div>
		<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
	</div>
	<div class="content">
		<div class="content-left">
		   <div class="content-left-title">
			   <div class="title-theme">
				   <span style="font-size: 30px;margin-left: 20px;margin-right:20px;font-family:细体;color: #51B837">{!!$node->name!!}</span>
				   <div class="title-content">
					   <!--<span>今日:9</span>
					   <span><img src="{{asset('images/index/top.png')}}" alt="" /></span>
					   <span>|</span>-->
					   <span>主题:{!!$node->thread_count!!}</span>
					   <span>|</span>
					   <span>排名:
						@foreach($nodes as $k=>$node_one)
							@if($node_one->id == $node->id)
								{{$k+1}}
							@endif
						@endforeach
					   </span>
				   </div>
				   <!-- <div class="title-version">
					   <span><img src="{{asset('images/index/star.png')}}" alt="" style="height: 30px;width: 30px" /></span>
						<span>收藏本版({!!$node->order!!})</span>
				   </div> -->
			   </div>
			   <div class="left-title-content">
					<div class="fleft">
					  <img src="{{asset('images/index/TAhphoto.png')}}" alt="" />
					</div>
					<div class="content-approval fleft">
						<p>公告</p>
						<p>{!!$node->description!!}</p>
					</div>
			   </div>
			   <div class="clear"></div>
			   <div class="left-title-discuss">
				   <!-- <p>新来找到哪行医生</p>
				   <p>自我介绍一下，可以让你快速融入妖刀</p>
				   <p>对论坛操作及使用不解，可以发帖求助</p>
				   <p>哥不够帅，但哥有一颗闷骚的心</p> -->
			   </div>
		   </div>
		   <form action=" " method="">
				   <div class="content-left-middle">
					   <div class="middle-top">
							<a href="{{ route('thread.create')}}">
								<li style="margin-left:10px">+发起新话题</li>
							</a>
							<li style="background:#51B837;cursor:pointer" id="sign">+每日签到</li>
							<li class="sign_show"></li>
					   </div>

					   <div class="middle-bottom">
						   <ul>
							   <li>最新更新:</li>
							   <li style="cursor:pointer"  onclick="get_node_thread('all',{!!$node->id!!},1)" class="middle-bottom_begin">全部</li>
							   <li style="cursor:pointer" onclick="get_node_thread('day',{!!$node->id!!},1)"  class="middle-bottom_begin">一天</li>
							   <li style="cursor:pointer" onclick="get_node_thread('week',{!!$node->id!!},1)" class="middle-bottom_begin">一周</li>
							   <li style="cursor:pointer" onclick="get_node_thread('month',{!!$node->id!!},1)" class="middle-bottom_begin">一月</li>
<!-- 							   <li>
								 <select class="" name="">
								   <option name="" value="">默认排序</option>
								   <option name="" value="">时间排序</option>
								   <option name="" value="">名称排序</option>
								 </select>
							   </li> -->
							   <li>
								 <select class="" name=""  id="node_change">
								   <option name="" value="">全部主题</option>
								   @foreach($nodes as $node_one)
										<option name="" value="{!!$node_one->id!!}">{!!$node_one->name!!}</option>
								   @endforeach
								 </select>
							   </li>
						   </ul>
					   </div>
				   </div>
				   <div class="content-left-bottom" id="content-left-bottom">
						<div class="bottom-nav">
							<ul>
								<a href="{{ route('thread.node_content', $node->id)}}"><li class="pointer" >主题</li></a>
								<li class="pointer"  onclick="get_node_threadByNew({{$node->id}},1)">最新</li>
								<li class="pointer"  onclick="get_node_threadByHot({{$node->id}},1)">热门</li>
								<li class="pointer"  onclick="get_node_threadByGood({{$node->id}},1)">精华</li>
								<a class="pointer" href="{{route('thread.index')}}"><li style="width:60px" >更多&lt;&lt;</li></a>
							</ul>
						</div>

						<div class="bottom-content">
							@foreach($thread_two as $k=>$thread_one)
							<div class="user"  onclick="ToShow({!!$thread_one->id!!})">
								<div class="user-message">
									<a href="{!! route('user.home', [$thread_one->uid]) !!}">
										<img src="{{asset($thread_one->avatar_url)}}" style="width:90px;height:90px;" alt="" />
										<span>{!!$thread_one->username!!}</span>
									</a>
								</div>
								<div class="user-content">
									<span style="width:370px;">{!!$thread_one->title!!}</span>
									<p style="margin-left:80px">发表时间：{!!$thread_one->created_at!!}</p>
								</div>
								 <div class="user-rely">
										<span>回复:{!!$thread_one->reply_count!!}</span>
										<span>阅读:{!!$thread_one->view_count!!}</span>
										<span>参与:{!!$thread_one->reply_count+$thread_one->like_count!!}人</span>
								</div>
								<div class="user-last-ask">
									<span>最后回复</span>
									<span>{!!$thread_last_reply_user[$k]->username!!}</span>
									<span>{!!$reply_last_time[$k]->updated_at!!}</span>
								</div>
							</div>
							<hr  style="border: 1px #e2e1e1 solid" />
							<div class="px20"></div>
							@endforeach
							<div class="paging" style="">
								<a href="{{ $thread_two->url(1) }}">首页</a>
								@if($thread_two->currentPage()>1)
								<a href="{!!$thread_two->url($thread_two->currentPage()-1)!!}">上一页</a>
								@endif
								@if($thread_two->lastPage()<6)
									@for($i=1;$i<=$thread_two->lastPage();$i++)		
										@if($i == $thread_two->currentPage())
											<a style="background:#51b837;color:#fff" href="{{ $thread_two->url($i) }}">{!!$i!!}</a>			
										@else
											<a href="{{ $thread_two->url($i) }}">{!!$i!!}</a>
										@endif
									@endfor
								@elseif($thread_two->lastPage()>2)
									@if($thread_two->currentPage()>3)
										<a href="{{ $thread_two->url($thread_two->currentPage()-1) }}">...</a>
									@endif
									@if($thread_two->currentPage()>1)
										<a href="{{ $thread_two->url($thread_two->currentPage()-1) }}">{!!$thread_two->currentPage()-1!!}</a>
									@endif
									<a href="{{ $thread_two->url($thread_two->currentPage()) }}">{!!$thread_two->currentPage()!!}</a>
									@if($thread_two->currentPage()<$thread_two->lastPage())
										<a href="{{ $thread_two->url($thread_two->currentPage()+1) }}">{!!$thread_two->currentPage()+1!!}</a>
									@endif
									
									@if(($thread_two->lastPage()-$thread_two->currentPage()) > 1 && $thread_two->currentPage()<$thread_two->lastPage())
										<a href="{{ $thread_two->url($thread_two->currentPage()+1) }}">...</a>
									@endif
								@endif
								@if($thread_two->currentPage()<$thread_two->lastPage())
								<a href="{!!$thread_two->url($thread_two->currentPage()+1)!!}">下一页</a>
								@endif
								<a href="{{ $thread_two->url($thread_two->lastPage()) }}">尾页</a>
								@if($thread_two->lastPage() == 0)
								<div class="clear" style="text-align:center;font-size:16px;color:#818181;margin-top:5px">当前页面{!!$thread_two->currentPage()!!}/1</div>
								@else
								<div class="clear" style="text-align:center;font-size:16px;color:#818181;margin-top:5px">当前页面{!!$thread_two->currentPage()!!}/{!!$thread_two->lastPage()!!}</div>
								@endif
							</div>

						</div>

				   </div>
		    </form>
		</div>
		<div class="content-right">
			<div class="content-right-about">
				<span>本互动情况</span>
				<div class="right-about-condition">
					<span>成员总数：{!!$node->member_count!!}</span>
					<span>发话题数：{!!$node->thread_count!!}</span>
					<span>回帖数：{!!$node->reply_count!!}</span>
				</div>
			</div>
			<div class="content-right-range">
				<span>活跃榜</span>
				<div class="line"></div>
				<div class="range-container">
						<div class="container-left">
							<a href="{!! route('user.home', [$user_top3[0]->id]) !!}">
								<div>
									<img src="{{asset($user_top3[0]->avatar_url)}}" alt="" />
								</div>
								<span style="margin-left:35px">{!!$user_top3[0]->username!!}</span>
							</a>
							<span style="margin-left:30px;">发帖数:{!!$thread_count_top[0]!!}</span>
						</div>
						<div class="container-right">
							<a href="{!! route('user.home', [$user_top3[1]->id]) !!}">
								<div>
									<img src="{{asset($user_top3[1]->avatar_url)}}" alt="" />
								</div>
								<span style="margin-left:40px">{!!$user_top3[1]->username!!}</span>
							</a>
							<span style="margin-left:30px;">发帖数:{!!$thread_count_top[1]!!}</span>
						</div>
				</div>
				@foreach($user_top3 as $k=>$user_top_list)
				<div class="user-active">
					<a href="{!! route('user.home', [$user_top3[$k]->id]) !!}">
						<img src="{{asset($user_top3[$k]->avatar_url)}}" alt="" style="width:50px;height:50px;margin-top:10px;"/>
						<div style="width:60px;display:inline-block">
							<span>{!!$user_top3[$k]->username!!}</span>
						</div>
					</a>
					<span style="width:60px;display:inline-block">发帖数:{!!$thread_count_top[$k]!!}</span>
				</div>
				@endforeach
				<div style="height:20px;"></div>
			

			</div>

			</div>
		</div>
	</div>
	<form action="">
		<div class="jubao" style="margin-top:-100px">
			<div class="jubaoa"><strong>举报</strong><span>关闭</span></div>
			<table>
				<tr><td>感谢您能协助我们一起管理站点，我们会对您的举报尽快处理。
				请填写举报理由（最多150字符):</td></tr>
				<tr><td><textarea name="content" id="content"></textarea></td></tr>
				<input type="hidden" name="type" id="type" value="node_report">
				<input type="hidden" name="type_id" id="type_id" value="{!!$node->id!!}">
				<tr><td><input type="button" value="提交" id="jubao_sub" /></td></tr>
			</table>
		</div>
	</form>

<script type="text/javascript" src="{{ asset('/build/dist/js/qqhideshow.js') }}"></script>
<script>
	$('#jubao_sub').on('click',function(){
		if($('#content').val() == ""){
			alert("请填写举报内容！");
		}else{
			$.post("{{route('report.nodeReport')}}",'content='+$('#content').val()+'&type='+$('#type').val()+'&type_id='+$('#type_id').val(),function(data){
					if(data == 200){
						alert("举报成功，我们会根据实际情况给予警告！");
					}else if(data == 403){
						alert("举报失败,请重试！");
					}
			});
		}
	});

	$('#sign').on('click',function(){
		$.get("{{route('sign.index')}}",function(data){
			if(data == 200){
				if($('.alert_sign').length > 0){
					$('.alert_sign').remove();
				}
				$('.sign_show').append('<span class="alert_sign">\
						<marquee direction="up" truespeed="truespeed" height="20px"  behavior="slide" speed="slow">\
							<span class="sign_desc" style="font-size: 16px;">签到成功</span>\
						</marquee>\
					</span>');
				setTimeout(function(){
					$('.alert_sign').remove();
				},2000);
			}else{
				if($('.alert_sign').length > 0){
					$('.alert_sign').remove();
				}
				$('.sign_show').append('<span class="alert_sign">\
						<marquee direction="up" truespeed="truespeed" height="20px"  behavior="slide" speed="slow">\
							<span class="sign_desc" style="font-size: 16px;">已经签到过了，明天再来吧</span>\
						</marquee>\
					</span>');
				setTimeout(function(){
					$('.alert_sign').remove();
				},2000);
			}
		});
	});
	
	$('#node_change').on('change',function(){
		window.location.href="/thread/"+$(this).val()+"/node_content";
	});

	function getHtml(type,condition,node_id,page){
		$.get("/thread/1/"+type,'condition='+condition+"&node_id="+node_id+"&page="+page,function(data){
		var $html_con = '<div class="bottom-nav">\
							<ul>\
								<a href="/thread/'+node_id+'/node_content"><li class="pointer">主题</li></a>\
								<li  class="pointer" onclick="get_node_threadByNew('+node_id+',1)">最新</li>\
								<li class="pointer" onclick="get_node_threadByHot('+node_id+',1)">热门</li>\
								<li  class="pointer" onclick="get_node_threadByGood('+node_id+',1)">精华</li>\
								<a  class="pointer" href="/index"><li style="width:60px" >更多&lt;&lt;</li></a>\
							</ul>\
						</div>\
						<div class="bottom-content">';
			if(data.thread_two.length != 0){
				var thread_two = data.thread_two; 
				for(var i=0; i<thread_two.length;i++){
						var join = thread_two[i].reply_count+thread_two[i].like_count;
						$html_con += '<div class="user"  onclick="ToShow({!!$thread_one->id!!})">\
							<div class="user-message">\
								<a href="u/'+thread_two[i].uid+'">\
									<img src="'+thread_two[i].avatar_url+'" style="width:90px;height:90px;" alt="" />\
									<span>'+thread_two[i].username+'</span>\
								</a>\
							</div>\
							<div class="user-content">\
								<span style="width:370px;">'+thread_two[i].title+'</span>\
								<p style="margin-left:80px;">发表时间:'+thread_two[i].created_at+'</p>\
							</div>\
							 <div class="user-rely">\
									<span>回复:'+thread_two[i].reply_count+'</span>\
									<span>阅读:'+thread_two[i].view_count+'</span>\
									<span>参与:'+join+'人</span>\
							</div>\
							<div class="user-last-ask">\
								<span>最后回复</span>\
								<span>'+data.thread_last_reply_user[0].username+'</span>\
								<span>'+data.reply_last_time[0].updated_at+'</span>\
							</div>\
						</div>\
						<hr  style="border: 1px #e2e1e1 solid" />\
						<div class="px20"></div>';
				}
				$html_con += '<div class="paging" style="">';
				$html_con += '<a  class="pointer" onclick="getHtml(\''+type+'\',\''+condition+'\','+node_id+',1)">首页</a>';
				if(page > 1){
					if(thread_two.length < 5){
						$html_con += '<a  class="pointer" onclick="getHtml(\''+type+'\',\''+condition+'\','+node_id+','+(page-1)+')">上一页</a>';
					}else{
						$html_con += '<a class="pointer" onclick="getHtml(\''+type+'\',\''+condition+'\','+node_id+','+(page-1)+')">上一页</a>';
						$html_con += '<a class="pointer" onclick="getHtml(\''+type+'\',\''+condition+'\','+node_id+','+(page+1)+')">下一页</a>';
					}
				}else{
					if(thread_two.length = 5){
						$html_con += '<a class="pointer" onclick="getHtml(\''+type+'\',\''+condition+'\','+node_id+','+(page+1)+')">下一页</a>';
					}
				}
				$html_con += '<a  class="pointer" onclick="getHtml(\''+type+'\',\''+condition+'\','+node_id+','+Math.ceil(data.count/5)+')">尾页</a>';
				$html_con += '<div class="clear" style="text-align:center;font-size:16px;color:#818181;margin-top:5px">当前页面'+page+'/'+Math.ceil(data.count/5)+'</div>';
				$html_con += '</div>';
			}else{
				$html_con += '<div style="font-size:18px;color:#717171;text-align:center">暂无话题</div>';
			}
			$html_con += '</div>';
			
			$('#content-left-bottom').html($html_con);
		});
	}

	function get_node_thread(condition,node_id,page){
		getHtml("get_node_thread",condition,node_id,page);
	}

	function get_node_threadByNew(node_id,page){
		getHtml("get_node_threadByNew",0,node_id,page);
	}

	function get_node_threadByHot(node_id,page){
		getHtml("get_node_threadByHot",0,node_id,page);
	}

	function get_node_threadByGood(node_id,page){
		getHtml("get_node_threadByGood",0,node_id,page);
	}

	function ToShow(id){
		window.location.href="/thread/"+id;
	}

</script>
@stop
