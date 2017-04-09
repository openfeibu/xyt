<?php

namespace Hifone\Models;

use Illuminate\Database\Eloquent\Model;
use Hifone\Models\Scopes\ForUser;
use Hifone\Models\Scopes\Recent;

class UserView extends Model
{
	use ForUser, Recent;
	
    protected $table = 'user_views';
    
    protected $guarded = [];

    public $timestamps = false;
}
