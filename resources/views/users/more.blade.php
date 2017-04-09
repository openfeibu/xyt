@extends('layouts.common')

@section('content')
<div class="b_j">
<div class="b_ja">
<span>></span>佳丽社区
</div>
<div class="b_k">
@inject('formTypePresenter','Hifone\Presenters\FormTypePresenter')
@foreach($users as $key => $user)
<div class="b_ka">
<table cellpadding="0" cellspacing="0">
<tr><td rowspan="4" width="120px"><a href="{{route('user.home',$user->id)}}"><img src="{{$user->avatar}}" width="95" height="118" alt="" title="" /></a></td><td><span class="green">姓名:</span>{{$user->username}}</td><td><span class="green">居住地:</span> {{$user->location}}</td><td><span class="green">职业:</span> {{$user->work}}</td></tr>
<tr><td><span class="green">学历:</span>{{form_config_value('basic_data','education',$user->education)}}</td><td><span class="green">学校: </span>{{$user->school}}</td><td><span class="green">恋爱状态:</span> {{form_config_value('standard_data','lovestatus',$user->lovestatus)}}</td></tr>
<tr><td colspan="3"><span class="green">内心独白:</span> {{$user->aboutme}}</td></tr>
<tr><td colspan="3"><a href="" class="b_kb">会员的详细资料及择偶要求</a>（会员号：{{$user->id}}）</td></tr>

</table>
</div>
@endforeach

<div class="clear"></div>
{!!with(new \Hifone\Foundations\Pagination\CustomerPresenter($users))->render()!!}
</div>
</div>
@stop
