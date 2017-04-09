<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Handlers\Commands\Album;

use Auth;
use Carbon\Carbon;
use Hifone\Commands\Album\AddAlbumCommand;
use Hifone\Models\Album;
use Hifone\Services\Dates\DateFactory;

class AddAlbumCommandHandler
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
     * Handle the report Album command.
     *
     * @param \Hifone\Commands\Album\AddAlbumCommand $command
     *
     * @return \Hifone\Models\Album
     */
    public function handle(AddAlbumCommand $command)
    {
        $data = [
            'user_id'       => $command->user_id,
            'name'         	=> $command->name,
            'desc'       	=> $command->desc,
            //'theme'       	=> $command->theme,
        ];
        // Create the Album
        $Album = Album::create($data);
        return $Album;
    }
}
