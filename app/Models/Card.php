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

class Card extends Model
{
	protected $table = 'cards';

	protected $fillables = [
		'name',
		'coin',
		'img',
		'experience',
		'number',
	];
}
