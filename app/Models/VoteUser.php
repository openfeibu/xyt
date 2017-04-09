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
use Hifone\Models\Scopes\Recent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Input;
use Auth;

class VoteUser extends Model
{
	
	protected $fillable = [
        'vote_id',
        'vote_option_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function vote ()
    {
    	return $this->belongsTo(Vote::class);
    }
}