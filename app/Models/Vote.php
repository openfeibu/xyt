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
use Illuminate\Database\Eloquent\SoftDeletes;
use Input;
use Auth;

class Vote extends Model
{
	use ForUser,Recent,SoftDeletes;

	protected $dates = ['deleted_at'];
    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'subject',
        'message',
        'user_id',
        'maxchoice',
        'expiration',
        'sex',
        'noreply',
        'reward',
        'makefeed',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function options()
    {
        return $this->hasMany(VoteOption::class);
    }
    public function user ()
    {
    	return $this->belongsTo(User::class);
    }
}