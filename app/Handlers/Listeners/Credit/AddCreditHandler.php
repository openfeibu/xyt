<?php

/*
 * This file is part of Hifone.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Handlers\Listeners\Credit;

use Auth;
use Log;
use Hifone\Commands\Credit\AddCreditCommand;
use Hifone\Events\Credit\CreditWasAddedEvent;
use Hifone\Events\EventInterface;
use Hifone\Events\Image\ImageWasUploadedEvent;
use Hifone\Events\Image\ImageWasRemovedEvent;
use Hifone\Events\Reply\ReplyWasAddedEvent;
use Hifone\Events\Reply\ReplyWasRemovedEvent;
use Hifone\Events\Thread\ThreadWasAddedEvent;
use Hifone\Events\Thread\ThreadAnonymousEvent;
use Hifone\Events\User\UserWasAddedEvent;
use Hifone\Events\User\UserWasLoggedinEvent;
use Hifone\Events\Space\SpaceWasAddedEvent;
use Hifone\Events\Space\SpaceWasRemovedEvent;
use Hifone\Events\Comment\CommentWasAddedEvent;
use Hifone\Events\Comment\CommentWasRemovedEvent;
use Hifone\Events\Vote\VoteWasAddedEvent;
use Hifone\Events\Vote\VoteWasRemovedEvent;
use Hifone\Events\Album\AlbumPhotoWasRemovedEvent;
use Hifone\Events\Album\AlbumPhotoWasUploadedEvent;
use Hifone\Events\Sign\SignWasAddedEvent;
use Hifone\Events\Wall\WallWasAddedEvent;

class AddCreditHandler
{
    public function handle(EventInterface $event)
    {
        $action = '';
        if ($event instanceof ThreadWasAddedEvent) {
            $action = 'thread_new';
            $user = $event->thread->user;
        } elseif ($event instanceof ThreadAnonymousEvent) {
            $action = 'thread_anonymous';
            $user = $event->thread->user;
        } elseif ($event instanceof ReplyWasAddedEvent) {
            $action = 'reply_new';
            $user = $event->reply->user;
        } elseif ($event instanceof ReplyWasRemovedEvent) {
            $action = 'reply_remove';
            $user = $event->reply->user;
        } elseif ($event instanceof ImageWasUploadedEvent) {
            $action = 'photo_upload';
            $user = Auth::user();
        } elseif ($event instanceof UserWasAddedEvent) {
            $action = 'register';
            $user = $event->user;
        } elseif ($event instanceof UserWasLoggedinEvent) {
            $action = 'login';
            $user = $event->user;
        } elseif ($event instanceof SpaceWasAddedEvent) {
            $action = 'space_new';
            $user = Auth::user();
        }elseif ($event instanceof SpaceWasRemovedEvent) {
            $action = 'space_remove';
            $user = $event->space->user;
        }
        elseif ($event instanceof CommentWasAddedEvent) {
            $action = 'comment';
            $user = Auth::user();
        }
         elseif ($event instanceof CommentWasRemovedEvent) {
            $action = 'comment_remove';
            $user = $event->comment->user;
        }
        elseif ($event instanceof VoteWasAddedEvent) {
            $action = 'create_vote';
            $user = Auth::user();
        }
        elseif ($event instanceof VoteWasRemovedEvent) {
            $action = 'vote_remove';
            $user = $event->vote->user;
        }
        elseif ($event instanceof AlbumPhotoWasRemovedEvent) {
            $action = 'photo_remove';
            $user = $event->photo->user;
        }
        elseif ($event instanceof AlbumPhotoWasUploadedEvent) {
	        $action = 'photo_upload';
            $user = Auth::user();
        }elseif ($event instanceof SignWasAddedEvent) {
	        $action = 'sign';
            $user = Auth::user();
        }elseif ($event instanceof WallWasAddedEvent) {
	        $action = 'wall';
            $user = Auth::user();
        }

        $this->apply($event, $action, $user);
    }

    protected function apply($event, $action, $user)
    {
        if (!$action) {
            return;
        }

        $credit = dispatch(new AddCreditCommand($action, $user));

        if (!$credit) {
            return;
        }

        // event trigger
        event(new CreditWasAddedEvent($credit, $event));
    }
}
