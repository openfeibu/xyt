
@extends('layouts.common')

@section('title')
@if(Request::is('/'))

@else
{{ trans('hifone.threads.list') }}
 - @parent
@endif
@stop
<style>
    #btn1{width:20px;height:21px;font-size:12px;margin-top: -3px;}
    #btn2{width:20px;height:21px;font-size:12px;margin-top: -2px;}
</style>
@section('content')


<link href="{{ asset('/build/dist/css/space.css') }}" type="text/css" rel="stylesheet" />
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

    <div class="TA ">
        <div class="clear"></div>
        <div class="content " >
            <div class="tab1s" id="b_hb">
                <div class="b_he fleft" style="border: 0px;">
                    <div class="b_hr fleft">
	                    {!! Widget::SendSpace() !!}
	                </div>

                    <div class="px10 clear"></div>
                    <div class="space_nav clear">
                        <div class="px10 clear"></div>
                        <ul class="space_nav_ul1">
                            <a href="{{ route('space.index')}}"><li @if($d ['type'] == 'all')class="space_nav_select"@endif>全部动态</li></a>
                            <a href="{{ route('space.index',['type' => 'following'])}}"><li @if($d ['type'] == 'following')class="space_nav_select"@endif>我关注的</li></a>
                            <a href="{{ route('space.index',['type' => 'recommend'])}}"><li @if($d ['type'] == 'recommend')class="space_nav_select"@endif>热门推荐</li></a>
                        </ul>
                        <div class="px10 clear"></div>
                        <ul class="space_nav_ul2">
                            <a href="{{ route('space.index',['type' => $d['type']])}}"><li>全部 | </li></a>
                            <a href="{{ route('space.index',['app' => 'space','type' => $d['type']])}}"><li>说说 | </li></a>
                            <a href="{{ route('space.index',['app' => 'blog'])}}"><li>日志 | </li></a>
                            <a href="{{ route('space.index',['app' => 'thread'])}}"><li>话题 | </li></a>
                            <a href="{{ route('space.index',['app' => 'activity'])}}"><li>活动 | </li></a>
                            <a href="{{ route('space.index',['app' => 'photo'])}}"><li>照片 | </li></a>
                            <a href="{{ route('space.index',['app' => 'gift'])}}"><li>礼物 | </li></a>
                            <a href="{{ route('space.index',['app' => 'vote'])}}"><li>投票 | </li></a>
                            <a href=""><li>打赏 | </li></a>
                        </ul>
                    </div>
                    <div class="px10"></div>
                    {{ Widget::FeedList($d) }}
                </div>
                <div class="space_right fleft" >
                        <div class="space_right_userinfo">
                            <div class="px20"></div>
                            <dl class="space_right_userinfo_dl">
                                <dd><img src="{{$user->avatar}}?v={!!time()!!}" alt="" class="space_right_userinfo_img" /></dd>
                                <dd>{{ $user->username }}</dd>
                				<dd>{{ $user->school }}/{{ $user->work }}</dd>
                                <dd>
                                    <ul style="margin-top: 10px;">
                                        <li style="border-right: 1px #ccc solid;">
                                            <dl>
                                                <dd>{{ $user->following_count }}</dd>
                                                <dd>关注</dd>
                                            </dl>
                                        </li>

                                        <li style="border-right: 1px #ccc solid;">
                                            <dl>
                                                <dd>{{ $user->follower_count }}</dd>
                                                <dd>粉丝</dd>
                                            </dl>
                                        </li>
                                        <li>
                                            <dl>
                                                <dd>{{ $user->space_count }}</dd>
                                                <dd>说说</dd>
                                            </dl>
                                        </li>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                        <div class="space_right_like clear">
                            <div >
                                <ul>
                                   <li style="color: #51b837">推荐话题</li>
                                </ul>
                            </div>
                            <hr size="1" style="border:1px #cccccc dotted;width: 93%;margin: 0 auto;" class="clear" />
                            <div class="space_right_like_content">
                                <dl>
	                                @foreach($hot_threads as $key => $thread)
                                    <a href="{{route('thread.show',$thread->id)}}" title="{{$thread->title}}"><dd> <span class="space_right_like_content_span1">{{$thread->title}}</span><span class="space_right_like_content_span2">{{$thread->id}}</span></dd></a>
                                    @endforeach
                                </dl>
                                <div class="clear"></div>
                            </div>
                            <hr size="0.5" style="border:1px #e2e1e1 solid;width: 100%;margin: 0 auto;" class="clear" />
                            <div class="space_right_like_footer">
                                <a href="{{route('thread.index')}}">查看更多>>></a>
                            </div>
                        </div>

                        <div class="space_right_like clear">
                            <div  class="space_right_state">
                                推荐日志
                            </div>
                            <hr size="1" style="border:1px #cccccc dotted;width: 93%;margin: 0 auto;" class="clear" />
                            <div class="space_right_like_content" style="    padding: 7px;padding-top: 10px">
                                @foreach($ex_blogs as $key => $blog)
                                <p class="space_right_p"><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></p>
                                @endforeach
                            </div>
                            <hr size="0.5" style="border:1px #e2e1e1 solid;width: 100%;margin: 0 auto;" class="clear" />
                            <div class="space_right_like_footer">
                                <a href="{{route('blog.index')}}">查看更多>>></a>
                            </div>
                        </div>

                        <div class="space_right_like clear" >
                            <div >
                                <ul>
                                    <a href="javascript:;" onclick="javascript:chooseTab(this,'tab1')" class="active"><li>最新投票</li></a>
                                    <a href="javascript:;" onclick="javascript:chooseTab(this,'tab2')"><li>热门投票</li></a>
                                </ul>
                            </div>
                            <hr size="1" style="border:1px #cccccc dotted;width: 93%;margin: 0 auto;" class="clear" />
                            <div class="space_right_like_content tab1 tab" style="min-height: 360px;">
	                            @foreach($new_votes as $key => $vote)
	                            <a style="display: block;" href="{{route('vote.show',$vote->id)}}">
                                <dl>
                                    <dd class="space_right_vote">
                                        <img src="{{ asset('images/index/xin.png') }}" alt="" style="width: 10px;height: 10px" class="fleft" />
                                        <span class="vote_span1 fleft">{{$vote->subject}}</span>
                                        <span class="vote_span2 fright"><b style="color: red">{{$vote->user_count}}人</b>参与</span>
                                    </dd>
                                </dl>
                                </a>
                                @endforeach
                                <div class="clear"></div>
                            </div>
                            <div class="space_right_like_content tab2 tab" style="min-height: 360px;display: none;">
	                            @foreach($hot_votes as $key => $vote)
	                            <a style="display: block;" href="{{route('vote.show',$vote->id)}}">
                                <dl>
                                    <dd class="space_right_vote">
                                        <img src="{{ asset('images/index/xin.png') }}" alt="" style="width: 10px;height: 10px" class="fleft" />
                                        <span class="vote_span1 fleft">{{$vote->subject}}</span>
                                        <span class="vote_span2 fright"><b style="color: red">{{$vote->user_count}}人</b>参与</span>
                                    </dd>
                                </dl>
                                </a>
                                @endforeach
                                <div class="clear"></div>
                            </div>
                            <hr size="0.5" style="border:1px #e2e1e1 solid;width: 100%;margin: 0 auto;" class="clear" />
                            <div class="space_right_like_footer">
                                <a href="{{route('vote.index')}}">查看更多>>></a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- Nodes List -->



<script type="text/javascript" src="{{ asset('/build/dist/js/jquery-browser.js') }}"></script>
<script type="text/javascript" src="{{ asset('/build/dist/js/jquery.qqFace.js') }}"></script>

<script type="text/javascript" src="{{ asset('/js/home/module.home.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/module.weibo.js') }}"></script>

<script type="text/javascript">
$(function(){
	$('#btn2').click(function() {
	    var bbb = $("#saytext").val($("#saytext").val()+"#...#");
	});
    $('.emotion').qqFace({
        id : 'facebox',
        assign:'saytext',
        path:'./images/arclist/' //表情存放的路径
    });
    //$(".sub_btn").click(function(){
    //    var str = $("#saytext").val();
    //    $("#show").html(replace_em(str));
    //});
    $("#saytext").keyup(function(){
	   	var len = $(this).val().length;
	   	if(len > 139){
	    	$(this).val($(this).val().substring(0,140));
	   	}
	   	var num = 140 - len  ;
	   	var num = num > 0 ? num :0 ;
   		$("#word").text(num);
	});
});


//查看结果
function replace_em(str){
    str = str.replace(/\</g,'&lt;');
    str = str.replace(/\>/g,'&gt;');
    str = str.replace(/\n/g,'<br/>');
    str = str.replace(/\[em_([0-9]*)\]/g,'<img src="./images/arclist/$1.gif" border="0" />');
    return str;
}
</script>



@stop
