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
use AltThree\Validator\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;
use Input;

class AlbumPhoto extends Model
{
	use ForUser, ValidatingTrait,Recent;
    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'album_id',
        'user_id',
        'image',
        'created_at',
        'updated_at',
        'type'
    ];
    public $rules = [
        'image'      => 'required|string',
        'user_id'    => 'required|int',
        'album_id' 	 => 'required|int',
    ];
	public function album()
    {
        return $this->belongsTo(AlbumPhoto::class,'album_id');
    }
    public function user ()
    {
    	return $this->belongsTo (User::class);
    }
}