<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Events\Comment;

use Hifone\Models\Comment;

final class CommentWasAddedEvent implements CommentEventInterface
{
   
    public $comment;

    public function __construct()
    {
        
    }
}
