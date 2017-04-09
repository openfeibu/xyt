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

use Illuminate\Database\Eloquent\Model;


class SystemData extends Model
{
	protected $table = 'system_datas';

	protected $fillable = ['id', 'list',  'key','value', 'created_at','updated_at'];
}