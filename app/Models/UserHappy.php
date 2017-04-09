<?php

namespace Hifone\Models;

use Illuminate\Database\Eloquent\Model;

class UserHappy extends Model
{
	
    protected $table = 'user_happys';
    
    protected $guarded = [];

    public static function findByUidOrFail ($uid,$columns = ['*'])
	{
		if (!is_null($user_happy = static::where('user_id',$uid)->first($columns))) {
            return $user_happy;
        }

        throw new ModelNotFoundException();
	}
	public static function findByUid ($uid,$columns = ['*'])
	{
		if (!is_null($user_happy = static::where('user_id',$uid)->first($columns))) {
            return $user_happy;
        }

        return false;
	}
}
