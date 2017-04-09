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

class TaskUser extends Model
{
	use ForUser,Recent;

	protected $table = 'task_users';
	
	protected $guarded  = [];
}
