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

class SendGift extends Model
{
	protected $table = 'send_gift';

	public function notifications()
    {
        return $this->morphMany(Notification::class, 'object');
    }
	public function gift()
    {
        return $this->belongsTo(Gift::class, 'gift_id');
    }
}
