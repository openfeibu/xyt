<div id="notification-{{ $notification->id }}" data-id="{{ $notification->id }}" class="media notification notification-topic_reply">
  <div class="media-left">
    <a title="{{ $notification->author->username }}" class="user-avatar" href="{{ $notification->author->link }}"><img src="{{ $notification->author->avatar_small }}" alt="{{ $notification->author->id }}"></a>
  </div>
  <div class="media-body">

  <div class="media-heading">
    未知
  </div>
    <div class="media-content summary markdown-reply">
      <span class="deleted text-center">{{ trans('hifone.notifications.deleted') }}</span>
    </div>

  </div>
  <div class="media-right">
    <span class="timeago">{{ $notification->created_at }}</span>
  </div>
</div>
