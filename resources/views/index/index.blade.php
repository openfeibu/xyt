@extends('layouts.common')

@section('content')
<script src="{{ asset('/build/dist/js/choose.js') }}"></script>
<hr class="hr" />
<div class="left1">
<!--Luara图片切换骨架begin-->
<div class="example2">
<ul>
<li><img src="{{asset('images/index/img4.jpg')}}" alt="1" width="646" height="298"/></li>
<li><img src="{{asset('images/index/img4.jpg')}}" alt="2" width="646" height="298"/></li>
<li><img src="{{asset('images/index/img4.jpg')}}" alt="3" width="646" height="298"/></li>
<li><img src="{{asset('images/index/img4.jpg')}}" alt="4" width="646" height="298"/></li>
</ul>
</div>
<!--Luara图片切换骨架end-->
<script>
$(function(){
$(".example2").luara({width:"646",height:"298",interval:4500,selected:"seleted",deriction:"left"});
});
</script>
<div class="l_a">
<div class="l_atitle">
<a href="{{route('user.rank')}}" ><strong>最新会员</strong></a>
<a href="{{route('user.weekstar')}}" target="_blank" style="float:right; ">本周之星</a><a href="{{route('user.birth_users')}}" target="_blank">今日生日会员</a>
</div>
<ul>
@foreach($new_girls as $key => $user)
<li class="user_info_abroad"><a href="{{route('user.home',$user->id)}}" class="user_info" rel='{{$user->id}}'><img src="{{$user->avatar}}" width="100" height="105" alt="" /></a><a href="#"><p>昵称：{{$user->username}}</p><p>职业：{{$user->work}}</p></a>
</li>
@endforeach
</ul>
<div class="l_aa"><a href="{{route('user.more',['type' => 'girl'])}}">更多女士>></a></div>
<ul>
@foreach($new_boys as $key => $user)
<li class="user_info_abroad"><a href="{{route('user.home',$user->id)}}" class="user_info" rel='{{$user->id}}'><img src="{{$user->avatar}}" width="100" height="105" alt="" /></a><a href="#"><p>昵称：{{$user->username}}</p><p>职业：{{$user->work}}</p></a>
</li>

@endforeach
</ul>
<div class="l_aa"><a href="{{route('user.more',['type' => 'boy'])}}">更多男士>></a></div>
<div class="l_ahoverb" id="search">
<div class="l_ahoverc">
<strong>象牙塔高校单身校友联盟</strong><span>关闭</span>
</div>
<div class="show"></div>
<div class="comment">
<div class="com_form">
<textarea class="input" id="saytext" name="saytext"></textarea>
<p><input type="button" class="sub_btn" value="提交"><span class="emotion">表情</span></p>
</div>
</div>
</div>
</div>
<div class="l_b">
<form action="{{route('search.result',['page'=>1])}}" method="get" target='_blank'>
<input type="hidden" name="hidden" value="this_search">
<span>寻找：居住在</span>{{ Widget::Areas([ 'user_id' => Auth::id(),'type'=> 'location','name' => 'location' ,'province_name' => 'province','city_name' => 'city','prefix' => ''] ) }}
<span>年龄</span>
<select name="age_min">
	@foreach($standard_data['opage']['value'] as $k=>$opage)<option value="{!!$k!!}">{!!$standard_data['opage']['value'][$k]!!}</option> @endforeach
</select>
<span>-</span>
<select name="age_max">
	@foreach($standard_data['opage2']['value'] as $k=>$opage2)
    <option value="{!!$k!!}">{!!$standard_data['opage2']['value'][$k]!!}</option>
	@endforeach
</select><span>岁的</span>
<select style="width:90px;" name="sex">
@foreach($basic_data['sex']['value'] as $k=>$sex)
<option value="{!!$k!!}">{!!$basic_data['sex']['value'][$k]!!}&nbsp;</option>
@endforeach
</select>
<input type="submit" value="搜索" />
</div>
</form>
<div class="l_c">
<div class="l_ctitle"><strong>精彩话题榜</strong><a href="{{route('thread.index')}}">+更多</a></div>
<ul>
<?php $i=1 ;?>
@foreach($threads as $key => $thread)
<li><a href="{{route('thread.show',$thread->id)}}" target='_blank'><div class="l_clist"><span class="l_c1">{{$i}}</span><span class="l_c2">【{{$thread->node_name}}】{{handle_text($thread->title,20)}}</span></div><div class="l_c5">{{$thread->updated_at}}</div></a></li>
<?php $i++;?>
@endforeach

</ul>
</div>
<div class="l_d">
<div class="l_dtitle">
<strong>青春风采</strong><a href="javascript:;" onclick="javascript:show_list()">我要加入</a>
</div>
<div class="l_da" style="display:none;" id="list">
上榜条件:<span><b>1.</b>设置清晰的形象照;</span><span><b>2.</b>资料完整度100%;</span><span><b>3.</b>通过身份实名认证</span>
</div>
@foreach($recommend_users as $key => $user)
<li class="user_info_abroad">
<a href="{{route('user.home',$user->id)}}" class="l_db user_info"  rel='{{$user->id}}'><img src="{{$user->avatar}}" width="155" height="146" alt="" /> <span class="green">{{$user->username}}</span>
<p>
  {!! getAge($user->birthday) !!}岁 {{ config('form_config.basic_data.education.value.'.$user->education)}} <br />
{{$user->school}}/{{$user->work}}</p>
</a>
</li>
@endforeach

</div>
</div>
<!--------左边结束------------------->
<div class="right1">
<div class="r_a">
<div class="r_aa">动态公告：</div>
<div class="r_ab">
<div class="apple">
	<ul>
		@foreach($page_notices as $key=> $page)
		<li><a href="{{route('about.show',['id' => $page->id])}}" target="_blank">{{$page->title}}</a></li>
		@endforeach
    </ul>
</div>


<script type="text/javascript">
	  function autoScroll(obj){
			$(obj).find("ul").animate({
				marginTop : "-30px"
			},500,function(){
				$(this).css({marginTop : "0px"}).find("li:first").appendTo(this);
			})
		}
		$(function(){
			setInterval('autoScroll(".maquee")',3000);
			setInterval('autoScroll(".apple")',2000);

		})

</script>
</div>
</div>
<!--选项卡1--->
<div class="r_b" id="tab1s">
	<div class="menus">
		<ul>
			<li id="one1" onclick="setTab('one',1)" class="off">活动公告 </li>
			<li id="one2" onclick="setTab('one',2)">活动总结</li>
			<li id="one3" onclick="setTab('one',3)">活动照片</li>
			<li id="one4" onclick="setTab('one',4)">网站公告</li>
		</ul>
	</div>
	<div class="menudivs">
		<div id="con_one_1" class="con_one">
			@foreach($new_activities as $key => $activity)
	        <a href="{{route('activity.show',['id' => $activity->id])}}" target="_blank"><span class="r_b1">{{$activity->name}}</span><span class="r_b2">已报<b>{{$activity->join_count}}人</b></span></a>
	        @endforeach
        </div>
		<div id="con_one_2" class="con_one" style="display:none;">
			@foreach($summaries as $key => $summary)
	        <a href="{{route('activity.summary',['activity_id' => $summary->activity_id])}}" target="_blank"><span class="r_b1">{{$summary->title}}</span></a>
	        @endforeach
		</div>
		<div id="con_one_3" style="display:none;">
			<img src="{{asset('images/index/img6.jpg')}}" alt="" /><img src="{{asset('images/index/img7.jpg')}}" alt="" />
		</div>
		<div id="con_one_4" class="con_one" style="display:none;">
			@foreach($announcements as $key => $announcement)
	        <a href="{{route('about.show',['id' => $announcement->id])}}" target="_blank"><span class="r_b1">{{$announcement->title}}</span></a>
	        @endforeach
		</div>
	</div>
</div>
<!--选项卡2--->
<div class="company_con" class="choose">

	<ul class="choose_nav">
		<li class="selected"><a href="javascript:void(0);" ondblclick="window.open('{{route('space.index')}}')">最新说说</a></li>
		<li><a href="javascript:void(0);" ondblclick="window.open('{{route('blog.index',['type' => 'new'])}}')">最新日记</a></li>
        <li><a href="javascript:void(0);" ondblclick="window.open('{{route('blog.index',['type' => 'recommend'])}}')">热门日记</a></li>
	</ul>


	<div class="company_b2b clearfix r_c choose_list" >
	{!!$space_content!!}
	</div>
	<div class="company_b2b company_b2b_p choose_list" style="display: none;">
		@foreach($new_blogs as $key => $blog)
        <p><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></p>
		@endforeach

	</div>
    <div class="company_b2b company_b2b_p choose_list" style="display: none;">
		@foreach($hot_blogs as $key => $blog)
		<p><a href="{{route('blog.show',$blog->id)}}">{{$blog->title}}</a></p>
		@endforeach
	</div>



</div>
<!--选项卡2--->
<div class="company_con" class="choose">

	<ul class="choose_nav">
		<li class="selected"><a href="javascript:void(0);" ondblclick="window.open('{{route('vote.index')}}')">最新投票</a></li>
		<li><a href="javascript:void(0);" ondblclick="window.open('{{route('vote.index')}}')">热门投票</a></li>
	</ul>


	<div class="company_b2b company_b2b_p clearfix r_c choose_list" >
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
	</div>
	<div class="company_b2b company_b2b_p choose_list" style="display: none;">
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
	</div>



</div>
<!--选项卡2-end-->
<!--<div class="r_d">
<div class="r_da">
<strong>热点辩论 </strong><a href="#">更多</a>
</div>
<h4>避孕谁来做更好？</h4>
<p>无论情侣还是夫妻，享受性的美好时都要避免baby的意外降
 临。男性和女性都有相应的避孕方式，男性可以用避孕套...</p>
 <dl>
 <div class="clear"></div>
 <dt> 观点：<a href="#" class="red">＃男性，主动避孕才是好男人＃ </a></dt>
 <dd><span><img src="{{asset('images/index/img17.jpg')}}" width="236"  height="14" alt="" /></span><span class="r_db"><b class="red">4008</b> 票</span></dd>
 </dl>
 <dl>
 <div class="clear"></div>
 <dt> 观点：<a href="#" class="red">观点：＃女性，带套影响快感 ＃</a></dt>
 <dd><span><img src="{{asset('images/index/img18.jpg')}}" width="236"  height="14" alt="" /></span><span class="r_db"><b class="red">4008</b> 票</span></dd>
 </dl>
  <div class="clear"></div>
  <p style="text-align:center;"><a href="#">参与讨论</a></p>
</div>-->

</div>
<div class="clear"></div>
<script type="text/javascript">
	function show_list()
	{
		layer.alert('<a href="/setting/avatar" target="_blank">1.设置清晰的形象照;</a><a href="/profile/base" target="_blank">2.资料完整度100%;</a><a href="/identify/name" target="_blank">3.通过身份实名认证</a>');
	}
</script>
@stop
