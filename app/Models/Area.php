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

class Area extends Model
{
	public $timestamps = false;

	protected $guarded = [];
	
	public function schools()
    {
        return $this->hasMany(School::class);
    }
}