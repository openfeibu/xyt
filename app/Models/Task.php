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

class Task extends Model
{
	use Recent;

	const NO_LIMIT = 0;

    const DAILY = 1;

    const ONCE = -1;
    
	protected $guarded  = [];
}
