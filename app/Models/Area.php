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

use Hifone\Models\School;
use AltThree\Validator\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;

class Area extends Model
{
	public $timestamps = false;

	protected $guarded = [];

	public function schools()
    {
        return $this->hasMany(School::class);
    }
	public static function getSchools($area_id)
	{
		$ids[] = $area_id;
		$list = app('categoryTreeRepository')->setTable('areas',app(Area::class))->getSubs('104');
		$ids = array_merge($ids,array_column($list, 'id'));
		$schools = School::whereIn('area_id',$ids)->get();
		return $schools;
	}
}
