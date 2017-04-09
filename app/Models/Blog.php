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
use Hifone\Models\Scopes\ForUser;
use Hifone\Models\Scopes\Recent;
use Illuminate\Database\Eloquent\Model;
use Input;
use Auth;

class Blog extends Model
{
	use ForUser,Recent;

	protected $table = 'blogs';
    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'title',
        'space_id',
        'body',
        'makefeed',
        'password',
        'friend',
        'view_count',
        'digg_count',
        'created_at',
        'updated_at',
    ];
    public function user ()
    {
    	return $this->belongsTo(User::class);
    }
}