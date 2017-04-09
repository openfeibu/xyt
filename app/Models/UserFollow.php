<?php

namespace Hifone\Models;

use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
	
    protected $table = 'user_follows';
    
    protected $fillable = [
        'id',
        'user_id',
        'follow_id',
        'remark',
        'created_at',
        'updated_at',
    ];
}
