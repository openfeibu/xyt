<?php

namespace Hifone\Models;

use Illuminate\Database\Eloquent\Model;
use Hifone\Models\Scopes\ForUser;
use Hifone\Models\Scopes\Recent;

class UserRealname extends Model
{
	use ForUser, Recent;
	
    protected $table = 'user_realnames';
    
    protected $guarded = [];

    
}