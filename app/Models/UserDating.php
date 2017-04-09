<?php

namespace Hifone\Models;

use Illuminate\Database\Eloquent\Model;

class UserDating extends Model
{
	
    protected $table = 'user_datings';
    
    protected $guarded = [];

    public static function findByUidOrFail ($uid,$columns = ['*'])
	{
		if (!is_null($user_dating = static::where('user_id',$uid)->first($columns))) {
            return $user_dating;
        }

        throw new ModelNotFoundException();
	}
	public static function findByUid ($uid,$columns = ['*'])
	{
		if (!is_null($user_dating = static::where('user_id',$uid)->first($columns))) {
            return $user_dating;
        }

        return false;
	}
}
