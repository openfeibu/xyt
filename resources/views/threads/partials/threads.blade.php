
@if (count($threads) != 0)
<dl style="margin-left:0px;">
    @foreach ($threads as $k=>$thread)
    @if($k<=5)
     <dd>
       <img src="{{asset('images/index/img9.jpg')}}" alt="" style="margin-top:-10px;"/>
        <a  style="width:220px;display:inline-block;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;line-height:23px;" href="{{ route('thread.show', [$thread->id]) }}" title="{{{ $thread->title }}}">
            {{{ $thread->title }}}
        </a>
    </dd>
    @endif
    @endforeach
</dl>

@else
   <div style="margin-left:20px;margin-top:20px;" class="empty-block">{{ trans('hifone.noitem') }}</div>
@endif
