<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Handlers\Listeners\Thread;

use Hifone\Events\Thread\ThreadWasRemovedEvent;
use Hifone\Models\Notification;
use Hifone\Models\Thread;

class CleanupThreadRepliesHandler
{
    public function handle(ThreadWasRemovedEvent $event)
    {
        $thread = $event->thread;

        // Cleanup the replies.
        foreach ($thread->replies as $reply) {
            $reply->delete();
        }

        $notification = Notification::forObject($thread->id);

        // Cleanup the notifications;
        $notification->delete();
    }
}
