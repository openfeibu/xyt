<?php

namespace Hifone\Models;

use Illuminate\Database\Eloquent\Model;

class UserDisable extends Model
{
    protected $table = 'user_disable';
    
    protected $fillable = [
        'id',
        'user_id',
        'type',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
    ];
}
