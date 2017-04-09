@extends('layouts.auth')

@section('content')
<div class="b_j">
	<div class="b_k b_k_pass">
   	  <div class="message_email">
      <p><img src="{{ asset('/build/dist/images/cue.png') }}" width="28"/> {{$title}} </p>
      <p>{{$content}}</p>
      <p class="fright"><a href="javascript:history.go(-1);" class="white">返回上一页</a> | <a href="{{ route('index.index') }}" class="white">返回首页</a></p>
      </div>
    </div>
</div>
<div class="clear"></div>


@stop