<?php

/*
 * This file is part of Hifone.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Presenters;

class NotificationPresenter extends AbstractPresenter
{
    public function template()
    {
        if (!isset($this->wrappedObject->object)) {
            return 'unknown';
        }

        if ($this->wrappedObject->object instanceof \Hifone\Models\Thread) {
            return 'thread';
        } elseif ($this->wrappedObject->object instanceof \Hifone\Models\Reply) {
            return 'reply';
        } elseif ($this->wrappedObject->object instanceof \Hifone\Models\Credit) {
            return 'credit';
        } elseif ($this->wrappedObject->object instanceof \Hifone\Models\SendGift) {
            return 'gift';
        } elseif ($this->wrappedObject->object instanceof \Hifone\Models\AllReply) {
            return 'all_reply';
        }
        else {
            return 'common';
        }
    }

    public function labelUp()
    {
        switch ($this->wrappedObject->type) {
            case 'thread_new_reply':
            $label = trans('hifone.notifications.thread_new_reply');
                break;
            case 'followed_thread_new_reply':
                $label = trans('hifone.notifications.followed_thread_new_reply');
                break;
            case 'thread_mention':
                $label = trans('hifone.notifications.thread_mention');
                break;
            case 'thread_favorite':
                $label = trans('hifone.notifications.thread_favorite');
                break;
            case 'thread_follow':
                $label = trans('hifone.notifications.thread_follow');
                break;
            case 'thread_like':
                $label = trans('hifone.notifications.thread_like');
                break;
            case 'reply_like':
                $label = trans('hifone.notifications.reply_like');
                break;
            case 'reply_mention':
                $label = trans('hifone.notifications.reply_mention');
                break;
            case 'thread_mark_excellent':
                $label = trans('hifone.notifications.thread_mark_excellent');
                break;
            case 'thread_move':
                $label = trans('hifone.notifications.thread_move');
                break;
            case 'commented_thread_new_append':
                $label = trans('hifone.notifications.commented_thread_new_append');
                break;
            case 'followed_thread_new_append':
                $label = trans('hifone.notifications.followed_thread_new_append');
                break;
            case 'user_follow':
                 $label = trans('hifone.notifications.user_follow');
                break;
            case 'followed_user_new_thread':
                $label = trans('hifone.notifications.followed_user_new_thread');
                break;
            case 'credit_register':
                $label = trans('hifone.notifications.credit_register');
                break;
            case 'credit_login':
                $label = trans('hifone.notifications.credit_login');
                break;
            case 'send_gift':
                $label = trans('hifone.notifications.send_gift');
                break;
            case 'say_hello':
                $label = trans('hifone.notifications.say_hello');
                break;
            case 'photo_new_comment':
                $label = trans('hifone.notifications.photo_new_comment');
                break;
            case 'photo_comment_comment':
                $label = trans('hifone.notifications.photo_comment_comment');
                break;
            case 'blog_new_comment':
                $label = trans('hifone.notifications.blog_new_comment');
                break;
            case 'blog_comment_comment':
                $label = trans('hifone.notifications.blog_comment_comment');
                break;
            default:
                $label = 'unknow';
                break;
        }

        return $label;
    }

    /**
     * Convert the presenter instance to an array.
     *
     * @return string[]
     */
    public function toArray()
    {
        return array_merge($this->wrappedObject->toArray(), [
            'created_at' => $this->created_at(),
            'updated_at' => $this->updated_at(),
        ]);
    }
}
