<?php

/*
 * This file is part of Hifone  -- gouweiba.
 *
 * 
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Models;

use AltThree\Validator\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;
use Hifone\Models\Scopes\ForUser;
use Hifone\Models\Scopes\Recent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Space extends Model
{
	use ForUser,Recent,SoftDeletes;
	 //use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

    /**
     * The fillable properties.
     *
     * @var string[]
     */
	protected $fillable = ['space_id', 'user_id', 'type', 'app', 'app_row_id', 'app_row_table', 'publish_time', 'is_del', 'from', 'comment_count', 'repost_count', 'comment_all_count', 'digg_count', 'is_repost', 'is_audit', 'latitude', 'longitude', 'address', 'is_recommend', 'recommend_time', 'feed_data','feed_content','client_ip','client_port'];
	
    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'feed_content' => 'required',
        'user_id'      => 'required|int',
    ];

    public function user ()
    {
    	return $this->belongsTo (User::class);
    }
}