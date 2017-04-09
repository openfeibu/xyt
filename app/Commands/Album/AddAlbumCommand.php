<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Commands\Album;
use Validator;

final class AddAlbumCommand
{
    public $name;

    public $desc;

    public $user_id;

    public $theme;

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'name'		=> 'required|string',
        'desc'		=> 'string',
        //'theme'		=> 'int',
        'user_id'   => 'int',
    ];

    /**
     * Create a new add thread command instance.
     *
     * @param string $body
     */
    public function __construct($name, $desc, $user_id)
    {
        $this->name = $name;
        $this->desc = $desc;
        $this->user_id = $user_id;
        //$this->theme = $theme;
    }
}
