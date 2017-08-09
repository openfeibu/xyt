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

  </div>
    <div class="media-content summary markdown-reply">
      {!! parse_html(preg_html($notification->body)) !!}
    </div>

  </div>
  <div class="media-right">
		<span class="timeago">{{ $notification->created_at }}</span>
  </div>
</div>
