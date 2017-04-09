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
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
	use ForUser,Recent,SoftDeletes;
	
    protected $dates = ['deleted_at'];

	protected $fillable = ['user_id','space_id','name','location','province','city','cate_pid','cate_id','begin_time','close_time','deadline','exittime','number_count','pay','payboy','paygirl','mobile','join_count','follow_count','view_count','poster','status','body','created_at','updated_at'];
}
