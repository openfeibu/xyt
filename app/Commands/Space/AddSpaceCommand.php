<?php

/*
 * This file is part of Hifone.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Commands\Space;
 
final class AddSpaceCommand
{
    public $feed_content;

	public $feed_file;

	public $user_id;

	public $type;
    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'feed_content'   => 'required|string',
        'feed_file'    => 'string',
        'user_id' => 'int',
        'type' => 'string',
    ];

    /**
     * Create a new add thread command instance.
     *
     * @param string $body
     */
    public function __construct($feed_content, $feed_file,$user_id,  $type)
    {
        $this->feed_content = $feed_content;      
        $this->feed_file = $feed_file;
        $this->user_id = $user_id;
        $this->type = $type;
    }
}
