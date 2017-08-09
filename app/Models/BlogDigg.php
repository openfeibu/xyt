<?php

namespace Hifone\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Space;

class BlogDigg extends Model
{
   	protected $table = 'blog_digg';

	protected $fillable = ['user_id', 'blog_id', 'creted_at','updated_at'];
}
