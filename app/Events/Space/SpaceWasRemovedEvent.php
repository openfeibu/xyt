<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Events\Space;

use Hifone\Models\Space;

final class SpaceWasRemovedEvent implements SpaceEventInterface
{
    /**
     * The thread that has been reported.
     *
     * @var \Hifone\Models\Thread
     */
    public $space;

    /**
     * Create a new thread has reported event instance.
     */
    public function __construct(Space $space)
    {
        $this->space = $space;
    }
}
