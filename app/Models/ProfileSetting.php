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

class ProfileSetting extends Model
{
	protected $table = 'user_profile_setting';

	public $rules = [
        'id'   => 'int',
    ];
}