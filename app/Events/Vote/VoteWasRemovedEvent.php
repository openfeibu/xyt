<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Events\Vote;

use Hifone\Models\Vote;

final class VoteWasRemovedEvent implements VoteEventInterface
{
   
    public $vote;

    public function __construct(Vote $vote)
    {
        $this->vote = $vote;
    }
}
