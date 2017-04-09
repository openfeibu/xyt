<?php

namespace Hifone\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Space;

class SpaceDigg extends Model
{
   	protected $table = 'space_digg';

	protected $fillable = ['user_id', 'space_id', 'creted_at','updated_at'];
}
