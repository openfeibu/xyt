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

class School extends Model
{
	use Recent;

	protected $guarded = [];
	
	public function area()
    {
        return $this->belongsTo(Area::class);
    }
}