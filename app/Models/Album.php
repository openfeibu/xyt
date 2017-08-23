<?php

/*
 * This file is part of Hifone.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Models;
use AltThree\Validator\ValidatingTrait;
use Hifone\Models\Scopes\ForUser;
use Hifone\Models\Scopes\Recent;
use Illuminate\Database\Eloquent\Model;
use Input;
use Auth;

class Album extends Model
{
	use ValidatingTrait,ForUser,Recent;
    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'desc',
        'theme',
        'user_id',
		'activity_id',
        'space_id',
        'created_at',
        'updated_at',
    ];
    public $rules = [
        'name'		=> 'required|unique:albums,name,NULL,id,user_id,1',
        'desc'		=> 'string',
        //'theme'		=> 'int',
        'user_id'   => 'int',
    ];
}
