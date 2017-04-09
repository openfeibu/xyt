<?php

namespace Hifone\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
	
    protected $table = 'user_details';
    
    protected $guarded = [];

    public static function findByUidOrFail ($uid,$columns = ['*'])
	{
		if (!is_null($user_detail = static::where('user_id',$uid)->first($columns))) {
            return $user_detail;
        }

        throw new ModelNotFoundException();
	}
	public static function findByUid ($uid,$columns = ['*'])
	{
		if (!is_null($user_detail = static::where('user_id',$uid)->first($columns))) {
            return $user_detail;
        }

        return false;
	}
}
