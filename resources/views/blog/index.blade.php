@extends('layouts.common')


@section('content')
<div class="clear"></div>
<div class="b_l">
@if($type == 'other')
<strong class="green">{!! $breadcrumb or '' !!}</strong>
@else
<ul class="b_la">
<li><a href="{{route('blog.index')}}" @if($type !='me')class="b_laa"@endif>大家的日志</a></li>
<li><a href="{{route('blog.index',['type' => 'me'])}}" @if($type =='me')class="b_laa"@endif>我的日志</a></li>
<li class="b_lab"><span id="showss"><a href="{{route('blog.create')}}">+发起新日志</a></span>
</li>
</ul>
@endif
<div class="b_lc">

<div class="b_ld">
@foreach($blogs as $key => $blog)
<dl>
<dt><a href="{{route('user.home',$blog->user_id)}}"><img src="{{$blog->user->avatar}}" width="58" height="59" alt="" /></a><!--<p><span class="b_lbc">热</span><span class="b_lbd">26</span></p>--></dt>
<dd>
<div class="b_lda">
<div class="b_ldb"><p><a href="{{route('blog.show',$blog->id)}}" class="green">{{$blog->title}}</a></p>
<p><a href="{{route('user.home',$blog->user_id)}}"><span class="green">{{$blog->username}}</span></a> {{$blog->created_at}}</p></div>
<div class="b_ldc"><!-- JiaThis Button BEGIN -->
<!-- JiaThis Button END --></div>
</div>
<div class="b_ldd"><p>{{$blog->body_original}}</p><p>{{$blog->view_count}} 次阅读|{{$blog->digg_count}} 个点赞</p></div>
</dd>
</dl>
@endforeach

</div>

@if($type != 'me' && $type != 'other')
<div class="b_le">
<span>排行榜</span>
<a href="{{route('blog.index',['type' => 'recommend'])}}" @if($type =='recommend')class="selected"@endif>推荐阅读</a>
<a href="{{route('blog.index',['type' => 'new'])}}" @if($type =='new')class="selected"@endif>最新发表</a>
<a href="{{route('blog.index',['type' => 'reply'])}}" @if($type =='reply')class="selected"@endif>评论排行</a>
<a href="{{route('blog.index',['type' => 'view'])}}" @if($type =='view')class="selected"@endif>查看排行</a>
</div>
@endif
@if($type == 'me' && $cates)
<div class="b_le">
<span>日志分类</span>
<a href="{{route('blog.index',['type' => $type])}}" @if($cat_id == '')class="selected"@endif>全部日志</a>
@foreach($cates as $key => $cate)
<a href="{{route('blog.index',['type' => $type,'cat_id' => $cate->id])}}" @if($cat_id == $cate->id)class="selected"@endif>{{$cate->name}}</a>
@endforeach
</div>
@endif
@if($type != 'me' && $cates)
<div class="b_le">
<span>日志分类</span>
<a href="{{route('blog.index',['user_id' => $blog_user->id])}}" @if($cat_id == '')class="selected"@endif>全部日志</a>
@foreach($cates as $key => $cate)
<a href="{{route('blog.index',['user_id' => $blog_user->id,'cat_id' => $cate->id])}}" @if($cat_id == $cate->id)class="selected"@endif>{{$cate->name}}</a>
@endforeach
</div>
@endif
<div class="clear"></div>
{!!with(new \Hifone\Foundations\Pagination\CustomerPresenter($blogs))->render()!!}
</div>







</div>

@stop
