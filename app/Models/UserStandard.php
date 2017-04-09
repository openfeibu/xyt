<?php

namespace Hifone\Models;

use Illuminate\Database\Eloquent\Model;

class UserStandard extends Model
{
	
    protected $table = 'user_standards';
    
    protected $guarded = [];

    public static function findByUidOrFail ($uid,$columns = ['*'])
	{
		 if (!is_null($user_standard = static::where('user_id',$uid)->first($columns))) {
            return $user_standard;
        }

        throw new ModelNotFoundException();
	}
	public static function findByUid ($uid,$columns = ['*'])
	{
		 if (!is_null($user_standard = static::where('user_id',$uid)->first($columns))) {
            return $user_standard;
        }

        return false;
	}
}
