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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gift extends Model
{
	protected $table = 'gift';

	protected $fillables = [
		'gift_name',
		'coin',
		'gift_img',
		'gift_experience',
		'gift_number',
	];
	public function type ()
    {
    	return $this->belongsTo(GiftType::class,'type_id','id');
    }
}
