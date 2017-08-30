<div id="notification-{{ $notification->id }}" data-id="{{ $notification->id }}" class="media notification notification-topic_reply">
  <div class="media-left">
    <a title="{{ $notification->author->username }}" class="user-avatar" href="{{ route('user.home', [$notification->author->id]) }}"><img src="{{ $notification->author->avatar_small }}" alt="{{ $notification->author->id }}"></a>
  </div>
  <div class="media-body">

  <div class="media-heading">
      <a href="{{ route('user.home', [$notification->author->id]) }}">
        {{ $notification->author->username }}
      </a>
      •
    {{ $notification->labelUp }}
    @if($notification->type == 'send_gift')
	{!! $notification->object->gift->gift_name !!}
    <img src="{!! $notification->object->gift->gift_img !!}" width="70" height="70"/>
    @else
    <img src="/images/emoji/{!! $notification->body !!}" width="70" height="70"/>
    @endif

  </div>
    <div class="media-content summary markdown-reply">
      {!! $notification->body !!}
    </div>

  </div>
  <div class="media-right">
		<span class="timeago">{{ $notification->created_at }}</span>
  </div>
</div>