<?php

/*
 * This file is part of Hifone.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Events\Wall;

use Hifone\Models\Wall;

final class WallWasAddedEvent implements WallEventInterface
{
    /**
     * The thread that has been reported.
     *
     * @var \Hifone\Models\Thread
     */
    public $wall;

    /**
     * Create a new thread has reported event instance.
     */
    public function __construct()
    {

    }
}
