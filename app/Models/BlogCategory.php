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
use Input;
use Auth;

class BlogCategory extends Model
{
	use ForUser,Recent;

	protected $table = 'blog_categorys';
    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'blog_id',
        'user_id',
        'name',
        'digg_count',
        'created_at',
        'updated_at',
    ];
}