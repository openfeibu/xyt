<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Handlers\Commands\Space;

use Auth;
use Carbon\Carbon;
use Hifone\Commands\Space\AddSpaceCommand;
use Hifone\Models\Space;
use Hifone\Services\Dates\DateFactory;


class AddSpaceCommandHandler
{
    /**
     * The date factory instance.
     *
     * @var \Hifone\Services\Dates\DateFactory
     */
    protected $dates;

    /**
     * Create a new report issue command handler instance.
     *
     * @param \Hifone\Services\Dates\DateFactory $dates
     */
    public function __construct(DateFactory $dates)
    {
        $this->dates = $dates;
    }

    /**
     * Handle the report thread command.
     *
     * @param \Hifone\Commands\Thread\AddThreadCommand $command
     *
     * @return \Hifone\Models\Thread
     */
    public function handle(AddSpaceCommand $command)
    {
        $data = [
            'user_id'       => $command->user_id,
            'feed_content'  => $command->feed_content,
			'feed_file'		=> $command->feed_file,
			'type'			=> $command->type,
            'created_at'    => Carbon::now()->toDateTimeString(),
            'updated_at'    => Carbon::now()->toDateTimeString(),
        ];
        // Create the space
        $space = Space::create($data);

        Auth::user()->increment('space_count', 1);

        return $space;
    }
}
