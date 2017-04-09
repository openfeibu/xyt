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

use Illuminate\Database\Eloquent\Model;

class GiftType extends Model
{
	protected $table = 'gift_types';
    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
    ];
}
