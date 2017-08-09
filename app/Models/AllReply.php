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

class AllReply extends Model
{
	use ForUser,Recent,SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'all_replies';

	protected $fillable = [
		'post_id',
		'post_user_id',
		'post_from',
		'user_id',
		'to_reply_id',
		'to_user_id',
		'content',
		'digg_count',
		'comment_id',
		'created_at',
		'updated_at',
		'delete_at',
	];
	public function user()
    {
        return $this->belongsTo(User::class);
    }
	public function notifications()
    {
        return $this->morphMany(Notification::class, 'object');
    }
}
