@extends('layouts.common')

@section('content')

<script src="{{ asset('/build/dist/js/qqhideshow.js') }}" type="text/jscript"></script>

<div class="b_o">
<div class="b_oa">
<h3>今日生日会员</h3>
<p>下列会员今天过生日, 本网站谨代表大都市的全体工作人员、会员及在线网友, 祝下列会员生日快乐、 工作顺利、心想事成！
今天共有<span class="green"> {{$count}} </span> 位会员过生日:</p>

<table cellpadding="0" cellspacing="0">
<tr><th>头像</th><th>ID</th><th>昵称</th><th>性别</th><th>学历</th><th>职业</th><th>学校</th><th>留言</th><th>祝福</th></tr>
@foreach($users as $key=> $user)
<tr><td><a href="{{route('user.home',$user->id)}}"><img src="{{$user->avatar}}" width="40" height="41" alt="" /></a></td><td>{{$user->id}}</td><td>{{$user->username}}</td><td>{!!config('form_config')['basic_data']['sex']['value'][$user->sex]!!}</td><td>{!!config('form_config')['basic_data']['education']['value'][$user->education]!!}</td><td>{{$user->work}}</td><td>{{$user->school}}</td><td><b class="liuyan"><img src="{{ asset('/build/dist/images/img56-02.jpg') }}" width="20" height="20" alt="" /></b></td><td><b class="zhufu"><img src="{{ asset('/build/dist/images/img57.jpg') }}" width="20" height="20" alt="" /></b></td></tr>
@endforeach
</table>
</div>
<div class="clear"></div>
{!!with(new \Hifone\Foundations\Pagination\CustomerPresenter($users))->render()!!}
<p style="text-align:center;"><img src="{{ asset('/build/dist/images/img60.jpg') }}" width="517" height="95" alt="" /></p>
</div>
@stop
<div class="b_ob">
<div class="b_oba"><strong>象牙塔-高校单身校友大联盟</strong><span>关闭</span></div>
<table>
<tr><td><p>给志云的一封信</p>
<p>大家庭的好吃呢公园均来自重大，化工大家庭的好吃呢公
园均来自重大，化工大家庭的好吃呢公园均来自重大</p>您当前的象币数为：<span class="green">30</span>个
</p><p>本次留言需要：<span class="green">20</span>个</p></td></tr>
<tr><td align="center">&nbsp;</td></tr>
<tr><td align="center"><input type="submit" value="给对方留言" /></td></tr>
</table>
</div>
<!---->
<div class="b_oc">
<div class="b_oca"><strong>象牙塔-高校单身校友大联盟</strong><span>关闭</span></div>
<table>
<tr><td><h3>祝福语：</h3></td></tr>
<tr><td><textarea></textarea></td></tr>
<tr><td><input type="submit" value="发送" /></td></tr>
</table>
</div>